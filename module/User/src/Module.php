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

namespace Siscourb\User;

/**
 * Description of Module
 *
 * @author Mihailov Vasilievic Filho
 */

use Zend\EventManager\EventInterface;
use Zend\EventManager\StaticEventManager;
use Zend\Mvc\MvcEvent;
use Zend\ServiceManager\ServiceManager;
use Zend\Stdlib\ArrayUtils;

class Module
{

    public function onBootstrap(MvcEvent $e)
    {
        /**
         * @var ServiceManager Description
         */
        $sm = $e->getApplication()->getServiceManager();
        $entityManager = $sm->get('Doctrine\ORM\EntityManager');

        $em = StaticEventManager::getInstance();
        $em->attach(
            'ZfcUser\Service\User',
            'register',
            function (EventInterface $e) use ($entityManager) {
                $user = $e->getParam('user');  // User account object
                //user role as default to new users
                $role = $entityManager->getRepository('Siscourb\User\Entity\Role')
                        ->findOneBy(array('roleId' => 'user'));

                $user->addRole($role);
            }
        );
    }

    public function getConfig()
    {
        $config = array();
        $configFiles = array(
            __DIR__ . '/../config/module.config.php',
        );
        foreach ($configFiles as $configFile) {
            $config = ArrayUtils::merge($config, include $configFile);
        }
        return $config;
    }
}
