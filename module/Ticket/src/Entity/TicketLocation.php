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

namespace Siscourb\Ticket\Entity;

use Doctrine\ORM\Mapping as ORM;
use Siscourb\Ticket\ValueObject\Point;

/**
 * Description of TicketLocation
 *
 * @author Mihailov Vasilievic Filho <mihailov.vf@gmail.com>
 *
 * @ORM\Entity
 * @ORM\Table(name="ticket_location")
 */
class TicketLocation
{

    /**
     * @ORM\Column(type="point")
     *
     * @var Point
     */
    private $point;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    private $address;

    /**
     * @var Ticket
     *
     * @ORM\Id
     * @ORM\OneToOne(targetEntity="Ticket", inversedBy="location");
     */
    private $ticket;

    public function __construct(Ticket $ticket)
    {
        $this->ticket = $ticket;
    }

    /**
     * @return Point
     */
    public function getPoint()
    {
        return $this->point;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return Ticket
     */
    public function getTicket()
    {
        return $this->ticket;
    }

    /**
     * @param Point $point
     * @param string $address
     */
    public function changeLocation(Point $point, $address)
    {
        $this->setPoint($point);
        $this->setAddress($address);
    }

    /**
     * @param Point $point
     */
    protected function setPoint(Point $point)
    {
        $this->point = $point;
    }

    /**
     * @param string $address
     */
    protected function setAddress($address)
    {
        $this->address = $address;
    }
}
