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

namespace Siscourb\Ticket\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Description of TicketTestFixture
 *
 * @author Mihailov Vasilievic Filho <mihailov.vf@gmail.com>
 */
class TicketTestFixture extends AbstractFixture
{

    public function load(ObjectManager $objectManager)
    {
        $user = $objectManager->find('Siscourb\User\Entity\User', 1);
        $issue = $objectManager->find('Siscourb\Issue\Entity\Issue', 1);

        $point = new \Siscourb\Ticket\ValueObject\Point(-46.80244445800781, -23.577832956897737);
        $location = new \Siscourb\Ticket\ValueObject\Location($point, 'Guarulhos');

        $ticket = new \Siscourb\Ticket\Entity\Ticket($user);
        $ticket->setDescription('Teste 1');
        $ticket->setIssue($issue);
        $ticket->setLocation($location);
        
        $objectManager->persist($ticket);
        $objectManager->flush();
        
        $ticket2 = new \Siscourb\Ticket\Entity\Ticket($user);
        $ticket2->setDescription('Teste 2');
        $ticket2->setIssue($issue);
        $ticket2->setLocation($location);
        
        $objectManager->persist($ticket2);
        $objectManager->flush();
        
        $ticket3 = new \Siscourb\Ticket\Entity\Ticket($user);
        $ticket3->setDescription('Teste 3');
        $ticket3->setIssue($issue);
        $ticket3->setLocation($location);
        
        $objectManager->persist($ticket3);
        $objectManager->flush();
    }
}
