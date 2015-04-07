<?php

namespace Siscourb\User\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Siscourb\User\Entity\Role;

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

/**
 * Description of RoleFixture
 *
 * @author Mihailov Vasilievic Filho
 */
class RoleFixture extends AbstractFixture
{

    public function load(ObjectManager $objectManager)
    {
        $guest = new Role();
        $guest->setRoleId('guest');
        $objectManager->persist($guest);
        $objectManager->flush();

        $user = new Role();
        $user->setRoleId('user');
        $objectManager->persist($user);
        $objectManager->flush();

        $manager = new Role();
        $manager->setParent($user);
        $manager->setRoleId('manager');
        $objectManager->persist($manager);
        $objectManager->flush();

        $admin = new Role();
        $admin->setParent($user);
        $admin->setRoleId('admin');
        $objectManager->persist($admin);
        $objectManager->flush();
    }
}
