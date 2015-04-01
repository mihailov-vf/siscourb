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

namespace Siscourb\User\Filter;

use Zend\InputFilter\InputFilter;

/**
 * Description of UserFilter
 *
 * @author Mihailov Vasilievic Filho
 */
class UserFilter extends InputFilter
{

    public function __construct()
    {
        $this->add(
            array(
                'name' => 'id',
                'required' => 'false',
                'allow_empty' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                ),
                'validators' => array(
                    array('name'    => 'Digits')
                )
            )
        );
        
        $this->add(
            array(
                'name' => 'name',
                'required' => 'true',
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 3,
                            'max'      => 255,
                        ),
                    ),
                    array(
                        'name' => 'Alpha',
                        'options' => array(
                            'allowWhiteSpace' => true
                        )
                    )
                ),
            )
        );
        
        $this->add(
            array(
                'name' => 'email',
                'required' => 'true',
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array('name'    => 'EmailAddress')
                )
            )
        );
        
        $this->add(
            array(
                'name' => 'password',
                'required' => 'true',
                'filters'  => array(
                    array('name' => 'StripTags'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 8,
                            'max'      => 255,
                        ),
                    ),
                ),
            )
        );
    }
}
