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

use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use Siscourb\Issue\Entity\Issue;
use Zend\Form\Fieldset;

/**
 * Description of TicketFieldset
 *
 * @author Mihailov Vasilievic Filho <mihailov.vf@gmail.com>
 */
class TicketFieldset extends Fieldset implements ObjectManagerAwareInterface
{

    /**
     *
     * @var LocationFieldset
     */
    private $locationFieldset;


    /**
     * @var ObjectManager
     */
    protected $objectManager;

    public function __construct(LocationFieldset $locationFieldset)
    {
        parent::__construct('TicketFieldset');
        $this->locationFieldset = $locationFieldset;
    }

    public function setObjectManager(ObjectManager $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    public function getObjectManager()
    {
        return $this->objectManager;
    }
    
    public function init()
    {
        $this->addIdField();
        $this->addUserField();
        $this->addDescriptionField();
        $this->addLocationFieldset($this->locationFieldset);
        $this->addIssueField();
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
            'type' => 'Zend\Form\Element\Text',
            'options' => array('label' => 'Descrição'),
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
                'label' => 'Necessidade',
                'object_manager' => $this->getObjectManager(),
                'target_class' => 'Siscourb\Issue\Entity\Issue',
                'label_generator' => function (Issue $issue) {
                    return $issue->getName();
                },
            ),
        ));
    }
}
