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

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

/**
 * Description of LocationFieldsetFactory
 *
 * @author Mihailov Vasilievic Filho <mihailov.vf@gmail.com>
 */
class LocationFieldsetFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $formManager)
    {
        $serviceManager = $formManager->getServiceLocator();

        $objectManager = $serviceManager->get('Doctrine\ORM\EntityManager');

        $locationFieldset = new LocationFieldset();
        //false para acessar os atributos da clase diretamente (Reflection)
        $locationHydrator = new DoctrineHydrator($objectManager, false);

        $locationFieldset->setHydrator($locationHydrator);
        //TODO: Incluir atributos do VO Point para Location
        $locationFieldset->setObject(
            new \Siscourb\Ticket\ValueObject\Location(0, 0, '')
        );

        return $locationFieldset;
    }
}
