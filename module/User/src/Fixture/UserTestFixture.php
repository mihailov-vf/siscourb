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

namespace Siscourb\User\Fixture;

/**
 * Description of UserTestFixture
 *
 * @author Mihailov Vasilievic Filho <mihailov.vf@gmail.com>
 */
class UserTestFixture extends \Doctrine\Common\DataFixtures\AbstractFixture
{

    public function load(\Doctrine\Common\Persistence\ObjectManager $objectManager)
    {
        $role = $objectManager->find('Siscourb\User\Entity\Role', 4);
        
        $user = new \Siscourb\User\Entity\User();
        $user->setDisplayName('Joe');
        $user->setEmail('joe@joe.com');
        $user->setPassword('$2y$14$UGVccdSnf6ED8UM6GnK60OZI23Z2L5tLzRDJ9ZXPa9jA/K4dujpKG');
        $user->addRole($role);
        $user->setState(1);
        
        $objectManager->persist($user);
        $objectManager->flush();
    }
}
