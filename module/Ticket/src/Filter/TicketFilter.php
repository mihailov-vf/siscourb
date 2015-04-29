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

namespace Siscourb\Ticket\Filter;

use Zend\InputFilter\InputFilter;

/**
 * Description of TicketFilter
 *
 * @author Mihailov Vasilievic Filho <mihailov.vf@gmail.com>
 */
class TicketFilter extends InputFilter
{
    public function __construct()
    {
        $this->add(array(
            'name' => 'id',
            'required' => false,
        ));
        
        $this->add(array(
            'name' => 'user',
            'required' => false,
        ));
        
        $this->add(array(
            'name' => 'description',
            'required' => true,
            'filters'  => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                    'name'    => 'StringLength',
                    'options' => array(
                        'encoding' => 'UTF-8',
                        'min'      => 1,
                        'max'      => 255,
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'location',
            'required' => true,
        ));
        
        $this->add(array(
            'name' => 'issue',
            'required' => true,
        ));
        
        $this->add(array(
            'name' => 'notes',
            'required' => false,
        ));
        
        $this->add(array(
            'name' => 'justification',
            'required' => false,
        ));
    }
}
