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

namespace Siscourb\User\Controller;

use Siscourb\User\Form\UserForm;
use Siscourb\User\Mapper\UserMapper;
use Zend\Mvc\Controller\AbstractRestfulController;

/**
 * Description of UserController
 *
 * @author Mihailov Vasilievic Filho
 */
class UserController extends AbstractRestfulController
{

    /**
     *
     * @var UserMapper
     */
    protected $userMapper;

    /**
     *
     * @var UserForm
     */
    protected $userForm;

    public function __construct(UserMapper $userMapper, UserForm $userForm)
    {
        $this->userMapper = $userMapper;
        $this->userForm = $userForm;
    }

    public function create($data)
    {
        $this->userForm->setData($data);

        if ($this->userForm->isValid()) {
            $user = $this->userForm->getData();
            $this->userMapper->insert($user);

            $this->flashMessenger()->setNamespace('success')
                    ->addMessage('Usuário cadastrado com sucesso');

            return $this->redirect()->toRoute('user');
        }

        return array('form' => $this->userForm);
    }

    public function indexAction()
    {
        return array();
    }

    public function registerAction()
    {
        if ($this->getRequest()->isPost()) {
            $this->create($this->getRequest()->getPost());
        }
        
        $form = $this->userForm;
        return array('form' => $form);
    }
}
