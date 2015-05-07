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

use Siscourb\Ticket\Form\TicketForm;
use Siscourb\Ticket\Mapper\TicketMapperInterface;
use Zend\Http\PhpEnvironment\Response;
use Zend\Mvc\Controller\AbstractActionController;
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

    public function __construct(TicketMapperInterface $ticketMapper, TicketForm $ticketForm)
    {
        $this->ticketMapper = $ticketMapper;
        $this->ticketForm = $ticketForm;
    }

    public function listAction()
    {
        $tickets = $this->ticketMapper->findAll();

        return array('tickets' => $tickets);
    }

    public function getListAction()
    {
        $format = $this->params()->fromRoute('export');
        if ($format == 'json') {
            $tickets = $this->ticketMapper->getArrayList();
            $result = array('tickets' => $tickets);
            $json = new \Zend\View\Model\JsonModel($result);

            return $json;
        }

        return new \Zend\View\Model\JsonModel(array('error' => "Not supported '$format' format."));
    }

    public function addAction()
    {
        $model = new ViewModel([
            'form' => $this->ticketForm
        ]);

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
        $this->ticketForm->setData($prg);

        $model->setVariable('form', $this->ticketForm);

        if ($this->ticketForm->isValid()) {
            $ticket = $this->ticketForm->getData();
            $this->ticketMapper->insert($ticket);

            $this->flashMessenger()->addSuccessMessage('Chamado registrado com sucesso!');

            return $this->redirect()->toRoute('ticket');
        }

        $this->flashMessenger()->addErrorMessage('Os dado providenciados não são válidos');
        return $model;
    }

    public function createAction()
    {
        
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
        
    }

    public function editAction()
    {
        
    }

    public function saveAction()
    {
        
    }

    public function closeAction()
    {
        
    }
}
