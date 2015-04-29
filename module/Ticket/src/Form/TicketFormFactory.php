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

namespace Siscourb\Ticket\Form;

use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Siscourb\Ticket\Entity\Ticket;
use Siscourb\Ticket\Filter\TicketFilter;
use Zend\InputFilter\InputFilter;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Description of TicketFormFactory
 *
 * @author Mihailov Vasilievic Filho <mihailov.vf@gmail.com>
 */
class TicketFormFactory implements FactoryInterface
{

    /**
     * @todo Binds Entity to Form
     * @param ServiceLocatorInterface $formManager
     * @return TicketForm
     */
    public function createService(ServiceLocatorInterface $formManager)
    {
        $serviceManager = $formManager->getServiceLocator();
        $objectManager = $serviceManager->get('Doctrine\ORM\EntityManager');
        
        $authService = $serviceManager->get('zfcuser_auth_service');
        $user = $authService->getIdentity();
        
        
        $ticketFieldset = $formManager->get('Siscourb\Ticket\Form\TicketFieldset');
        
        $ticketFormFilter = new InputFilter();
        $ticketFormFilter->add(new TicketFilter(), 'Ticket');

        $ticketForm = new TicketForm($ticketFieldset);
        $ticketForm->setInputFilter($ticketFormFilter);
        $ticketForm->setHydrator(new DoctrineHydrator($objectManager));
        $ticketForm->bind(new Ticket($user));
                
        return $ticketForm;
    }
}
