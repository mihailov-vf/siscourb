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

namespace Siscourb\User\Repository;

use Doctrine\ORM\EntityRepository;
use Siscourb\User\Entity\User;
use Siscourb\User\Mapper\UserMapper;

/**
 * Description of UserRepository
 *
 * @author Mihailov Vasilievic Filho
 */
class UserRepository extends EntityRepository implements UserMapper
{

    public function insert(User $user)
    {
        $this->_em->persist($user);
        $this->_em->flush($user);

        return $user;
    }

    public function update(User $user)
    {
        $this->_em->flush($user);

        return $user;
    }

    public function delete(User $user)
    {
        $this->_em->remove($user);
        $this->_em->flush($user);
    }
}
