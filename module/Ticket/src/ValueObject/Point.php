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
 * Description of Point
 *
 * @author Mihailov Vasilievic Filho <mihailov.vf@gmail.com>
 *
 * @ORM\Embeddable
 */
class Point
{

    /**
     * @var float
     *
     * @ORM\Column(type="decimal")
     */
    protected $latitude;

    /**
     * @var float
     *
     * @ORM\Column(type="decimal")
     */
    protected $longitude;

    /**
     * @param float $latitude
     * @param float $longitude
     */
    public function __construct($latitude, $longitude)
    {
        $this->latitude = floatval($latitude);
        $this->longitude = floatval($longitude);
    }

    /**
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }
}
