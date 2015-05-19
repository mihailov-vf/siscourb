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

/**
 * Description of LocationFilter
 *
 * @author Mihailov Vasilievic Filho <mihailov.vf@gmail.com>
 */
class LocationFilter extends \Zend\InputFilter\InputFilter
{

    public function __construct()
    {
        $this->add(array(
            'name' => 'latitude',
            'required' => true,
            'filters' => array(
                array('name' => 'NumberParse')
            ),
            'validators' => array(
                array(
                    'name' => 'IsFloat',
                ),
            ),
        ));

        $this->add(array(
            'name' => 'longitude',
            'required' => true,
            'filters' => array(
                array('name' => 'NumberParse')
            ),
            'validators' => array(
                array(
                    'name' => 'IsFloat',
                ),
            ),
        ));

        $this->add(array(
            'name' => 'address',
            'required' => false,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
                array(
                    'name' => 'Alnum',
                    'options' => array(
                        'allowWhiteSpace' => true
                    )
                ),
            ),
            'validators' => array(
                array(
                    'name' => 'StringLength',
                    'options' => array(
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 255,
                    ),
                ),
            ),
        ));
    }
}
