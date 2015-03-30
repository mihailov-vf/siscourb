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

namespace Siscourb\User\Form;

use Zend\Form\Form;

/**
 * Description of UserForm
 *
 * @author Mihailov Vasilievic Filho
 */
class UserForm extends Form
{

    public function __construct(UserFieldset $userFieldset)
    {
        parent::__construct('UserForm');
        
        $this->setAttribute('method', 'post');
        
        $userFieldset->setName('User');
        $userFieldset->setUseAsBaseFieldset(true);
        
        $this->add($userFieldset);
        
        $this->add(
            array(
                'name' => 'submit',
                'type' => 'Zend\Form\Element\Submit',
                'attributes' => array(
                    'value' => 'Enviar',
                    'id' => 'submit',
                ),
            )
        );
    }
}
