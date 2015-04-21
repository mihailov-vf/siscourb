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

use Zend\Form\Fieldset;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Description of TicketFieldset
 *
 * @author Mihailov Vasilievic Filho <mihailov.vf@gmail.com>
 */
class TicketFieldset extends Fieldset implements ObjectManagerAwareInterface
{

    /**
     * @var ObjectManager
     */
    protected $objectManager;

    public function __construct(LocationFieldset $locationFieldset)
    {
        parent::__construct('TicketFieldset');

        $this->addIdField();
        $this->addUserField();
        $this->addDescriptionField();
        $this->addLocationFieldset($locationFieldset);
        $this->addIssueField();
    }

    public function setObjectManager(ObjectManager $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    public function getObjectManager()
    {
        return $this->objectManager;
    }

    protected function addIdField()
    {
        $this->add(array(
            'name' => 'id',
            'type' => 'Zend\Form\Element\Hidden'
        ));
    }

    protected function addUserField()
    {
        $this->add(array(
            'name' => 'user',
            'type' => 'Zend\Form\Element\Hidden'
        ));
    }

    protected function addDescriptionField()
    {
        $this->add(array(
            'name' => 'description',
            'type' => 'Zend\Form\Element\Text'
        ));
    }

    protected function addLocationFieldset($locationFieldset)
    {
        $locationFieldset->setName('location');
        
        $this->add($locationFieldset);
    }

    protected function addIssueField()
    {
        $this->add(array(
            'name' => 'issue',
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'options' => array(
                'object_manager' => $this->getObjectManager(),
                'target_class' => 'Siscourb\Issue\Entity\Issue',
                'label_generator' => function ($targetEntity) {
                    return $targetEntity->getId() . ' - ' . $targetEntity->getTitle();
                },
            ),
        ));
    }
}
