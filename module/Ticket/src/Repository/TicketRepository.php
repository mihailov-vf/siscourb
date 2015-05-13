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

namespace Siscourb\Ticket\Repository;

use Doctrine\ORM\EntityRepository;
use Siscourb\Ticket\Entity\Ticket;
use Siscourb\Ticket\Mapper\TicketMapperInterface;

/**
 * Description of TicketRepository
 *
 * @author Mihailov Vasilievic Filho <mihailov.vf@gmail.com>
 */
class TicketRepository extends EntityRepository implements TicketMapperInterface
{

    public function insert(Ticket $ticket)
    {
        $this->_em->persist($ticket);
        $this->_em->flush($ticket);

        return $ticket;
    }

    public function update(Ticket $ticket)
    {
        $this->_em->flush($ticket);

        return $ticket;
    }

    public function delete(Ticket $ticket)
    {
        $this->_em->remove($ticket);
        $this->_em->flush($ticket);
    }

    /**
     * @see \Siscourb\Ticket\Mapper\TicketMapperInterface::getArrayList
     */
    public function getGeoLocationArrayList($filter = array())
    {
        $queryBuilder = $this->getEntityManager()->createQueryBuilder();
        $queryBuilder->select(
            't.id,'
            . ' t.status,'
            . ' t.description,'
            . ' t.location.latitude,'
            . ' t.location.longitude,'
            . ' t.location.address'
        )->from('Siscourb\Ticket\Entity\Ticket', 't');

        if (!empty($filter)) {
            $where = $queryBuilder->expr()->andX();
            foreach (array_keys($filter) as $key) {
                $where->add($queryBuilder->expr()->eq("t.$key", ":$key"));
            }
            $queryBuilder->where($where);
            $queryBuilder->setParameters($filter);
        }

        $results = $queryBuilder->getQuery()
            ->getResult(\Doctrine\ORM\AbstractQuery::HYDRATE_ARRAY);
        return $results;
    }
}
