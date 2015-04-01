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

namespace Siscourb\User\Dispatch;

use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;
use DoctrineDataFixtureModule\Loader\ServiceLocatorAwareLoader;
use Doctrine\Common\DataFixtures\Executor\ORMExecutor;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Doctrine\ORM\Tools\SchemaTool;

/**
 * Description of UserControllerTest
 *
 * @author Mihailov Vasilievic Filho
 */
class UserControllerTest extends AbstractHttpControllerTestCase
{

    public function setUp()
    {
        parent::setUp();
        
        $this->setApplicationConfig(include 'config/application.config.php');
    }

    public function testIndexActionCanBeAccessed()
    {
        $this->dispatch('/user/');
        $this->assertMatchedRouteName('user');
        $this->assertControllerName('Siscourb\User\Controller\User');
        $this->assertControllerClass('UserController');
        $this->assertActionName('index');
        $this->assertResponseStatusCode(200);
        
        $this->dispatch('/user');
        $this->assertMatchedRouteName('user');
        $this->assertControllerName('Siscourb\User\Controller\User');
        $this->assertControllerClass('UserController');
        $this->assertActionName('index');
        $this->assertResponseStatusCode(200);
    }
    
    public function testRegisterActionCanBeAccessed()
    {
        $this->dispatch('/user/register');
        $this->assertMatchedRouteName('user/register');
        $this->assertControllerName('Siscourb\User\Controller\User');
        $this->assertControllerClass('UserController');
        $this->assertActionName('register');
        $this->assertResponseStatusCode(200);
    }
}
