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
use Zend\Mvc\Controller\AbstractActionController;

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
        $tickets = array();

        return array('tickets' => $tickets);
    }

    public function addAction()
    {
        $form = $this->ticketForm;
        return array('form' => $form);
    }

    public function createAction()
    {
        
    }

    public function viewAction()
    {
        
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
