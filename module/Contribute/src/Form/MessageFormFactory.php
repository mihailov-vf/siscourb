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

namespace Siscourb\Contribute\Form;

use DoctrineORMModule\Form\Annotation\AnnotationBuilder;
use Siscourb\Contribute\Entity\Message;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Description of MessageFormFactory
 *
 * @author Mihailov Vasilievic Filho <mihailov.vf@gmail.com>
 */
class MessageFormFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $formManager = $serviceLocator;

        $serviceManager = $formManager->getServiceLocator();
        $objectManager = $serviceManager->get('Doctrine\ORM\EntityManager');

        $hydrator = new \DoctrineModule\Stdlib\Hydrator\DoctrineObject($objectManager);

        $message = new Message();

        $builder = new AnnotationBuilder($objectManager);
        $messageForm = $builder->createForm('Message');
        $messageForm->add(array(
            'name' => 'submit',
            'type' => 'Zend\Form\Element\Submit',
            'attributes' => array(
                'value' => 'Enviar',
                'id' => 'submit',
            ),
            'options' => array('label' => 'Enviar')
        ));
        $messageForm->setAttribute('method', 'post');

        $messageForm->setHydrator($hydrator);
        $messageForm->bind($message);

        return $messageForm;
    }
}
