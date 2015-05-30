<?php

/*
 * Copyright (C) 2015 Mihailov Vasilievic Filho
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace Siscourb\Ticket\Controller;

use Siscourb\Ticket\Entity\Note;
use Siscourb\Ticket\Entity\Ticket;
use Siscourb\Ticket\Filter\NoteFilter;
use Siscourb\Ticket\Form\TicketForm;
use Siscourb\Ticket\Mapper\TicketMapperInterface;
use Zend\Http\PhpEnvironment\Response;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;

/**
 * Description of TicketController
 *
 * @author Mihailov Vasilievic Filho <mihailov.vf@gmail.com>
 */
class TicketController extends AbstractActionController
{

    /**
     * @var TicketMapperInterface
     */
    private $ticketMapper;

    /**
     * @var TicketForm
     */
    private $ticketForm;

    public function __construct(TicketMapperInterface $ticketMapper)
    {
        $this->ticketMapper = $ticketMapper;
    }

    /**
     * @return TicketForm
     */
    public function getTicketForm()
    {
        if (!$this->ticketForm) {
            $formManager = $this->getServiceLocator()->get('FormElementManager');
            $this->ticketForm = $formManager->get('Siscourb\Ticket\Form\TicketForm');
        }

        return $this->ticketForm;
    }

    public function listAction()
    {
        $tickets = $this->ticketMapper->findAll();

        return array('tickets' => $tickets);
    }

    public function myTicketsAction()
    {
        $user = $this->getServiceLocator()->get('zfcuser_auth_service')->getIdentity();
        if (!$user) {
            $this->flashMessenger()
                ->addSuccessMessage('Você precisa estar logado para acessar esta página!');

            $this->redirect()->toRoute('user/login');
        }

        $tickets = $this->ticketMapper->findByUser($user);

        $model = new ViewModel(array('tickets' => $tickets));
        $model->setTemplate('ticket/ticket/list');
        
        return $model;
    }

    public function exportAction()
    {
        $format = $this->params()->fromRoute('export');
        $id = $this->params()->fromRoute('id');
        if ($id) {
            $tickets = $this->ticketMapper->findById($id);
        } else {
            $tickets = $this->ticketMapper->findAll();
        }

        $geoJsonConverter = $this->getServiceLocator()->get('Siscourb\Ticket\GeoJson\GeoJsonConverter');
        $result = $geoJsonConverter->createPointFeatureCollection($tickets)->jsonSerialize();

        if ($format == 'json') {
            $json = new JsonModel($result);

            return $json;
        }

        return new JsonModel(array('error' => "Not supported '$format' format."));
    }

    public function addAction()
    {
        $model = new ViewModel([
            'form' => $this->getTicketForm()
        ]);

        if ($this->params()->fromQuery('ajax') == 1) {
            $model->setTerminal(true);
        }

        $prg = $this->prg('ticket/add');

        if ($prg instanceof Response) {
            // returned a response to redirect us
            return $prg;
        } elseif ($prg === false) {
            // this wasn't a POST request, but there were no params in the flash messenger
            // probably this is the first time the form was loaded
            return $model;
        }

        // $prg is an array containing the POST params from the previous request
        $this->getTicketForm()->setData($prg);

        $model->setVariable('form', $this->getTicketForm());

        if ($this->getTicketForm()->isValid()) {
            $ticket = $this->getTicketForm()->getData();
            $this->ticketMapper->insert($ticket);

            $this->flashMessenger()->addSuccessMessage('Chamado registrado com sucesso!');

            return $this->redirect()->toRoute('ticket/view', array('id' => $ticket->getId()));
        }

        $this->flashMessenger()->addErrorMessage('Os dados providenciados não são válidos');
        return $model;
    }

    public function viewAction()
    {
        $id = intval($this->params()->fromRoute('id'));

        if ($id <= 0) {
            $this->flashMessenger()->addErrorMessage("Chamado '$id' não encontrado!");
            $this->redirect()->toRoute('ticket');
        }

        $ticket = $this->ticketMapper->findOneById($id);
        return array('ticket' => $ticket);
    }

    public function addNoteAction()
    {
        $id = $this->params()->fromRoute('id');

        $ticket = $this->ticketMapper->findOneById($id);
        $note = $this->createNoteForTicket($ticket);
        if (!$note instanceof Note) {
            return $note;
        }

        $ticket->addNote($note);

        $this->ticketMapper->update($ticket);

        return new JsonModel(
            ['message' => 'Comentário adicionado com sucesso.']
        );
    }

    public function editAction()
    {
        
    }

    public function statusChangeAction()
    {
        $id = $this->params()->fromRoute('id');
        $status = $this->params()->fromRoute('status');

        $ticket = $this->ticketMapper->findOneById($id);
        $justification = $this->createNoteForTicket($ticket);
        if (!$justification instanceof Note) {
            return $justification;
        }

        $ticket->$status($justification);

        $this->ticketMapper->update($ticket);

        return new JsonModel(
            ['message' => 'Status alterado com sucesso.']
        );
    }

    private function createNoteForTicket(Ticket $ticket)
    {
        $noteData = $this->params()->fromPost();

        $inputFilter = new NoteFilter();
        $inputFilter->setData($noteData['Note']);

        if (!$inputFilter->isValid()) {
            $this->getResponse()->setStatusCode(403);
            $model = new JsonModel(
                [
                'message' => 'É necessário informar um título e uma descrição da mensagem.',
                'error_messages' => $inputFilter->getMessages()
                ]
            );

            return $model;
        }

        $noteFilteredData = $inputFilter->getValues();

        $user = $this->getServiceLocator()->get('zfcuser_auth_service')->getIdentity();

        $note = new Note($ticket, $user);
        $note->setTitle($noteFilteredData['title']);
        $note->setDescription($noteFilteredData['description']);

        return $note;
    }
}
