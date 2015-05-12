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

/**
 * Description of LocationFieldset
 *
 * @author Mihailov Vasilievic Filho <mihailov.vf@gmail.com>
 */
class LocationFieldset extends Fieldset
{

    /**
     * @var Fieldset
     */
    private $pointFieldset;

    public function __construct()
    {
        parent::__construct('LocationFieldset');

        $this->add(array(
            'name' => 'latitude',
            'type' => 'Zend\Form\Element\Hidden',
        ));

        $this->add(array(
            'name' => 'longitude',
            'type' => 'Zend\Form\Element\Hidden',
        ));

        $this->add(array(
            'name' => 'address',
            'type' => 'Zend\Form\Element\Text',
            'options' => array('label' => 'Endereço'),
        ));
    }
}
