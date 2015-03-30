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

use Siscourb\User\Entity\User;
use Siscourb\User\Filter\UserFilter;
use Zend\InputFilter\InputFilter;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Description of UserFormFactory
 *
 * @author Mihailov Vasilievic Filho
 */
class UserFormFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $formManager)
    {
        $userFieldset = $formManager->get('Siscourb\User\Form\UserFieldset');
        
        $userFormFilter = new InputFilter();
        $userFormFilter->add(new UserFilter(), 'User');
        
        $userForm =  new UserForm($userFieldset);
        $userForm->setInputFilter($userFormFilter);
        $userForm->bind(new User());
        
        return $userForm;
    }
}
