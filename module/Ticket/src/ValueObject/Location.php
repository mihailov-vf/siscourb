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

namespace Siscourb\Ticket\ValueObject;

use Doctrine\ORM\Mapping as ORM;

/**
 * Description of TicketLocation
 *
 * @author Mihailov Vasilievic Filho <mihailov.vf@gmail.com>
 *
 * @ORM\Embeddable
 */
class Location
{

    /**
     * @ORM\Embedded(class = "Siscourb\Ticket\ValueObject\Point", columnPrefix = "point_")
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
    
    public function __construct(Point $point, $address)
    {
        $this->point = $point;
        $this->address = $address;
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
}
