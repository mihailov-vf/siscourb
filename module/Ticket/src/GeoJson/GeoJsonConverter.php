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

namespace Siscourb\Ticket\GeoJson;

use GeoJson\CoordinateReferenceSystem\CoordinateReferenceSystem;
use GeoJson\Feature\Feature;
use GeoJson\Feature\FeatureCollection;
use GeoJson\Geometry\Point;
use Siscourb\Ticket\Entity\Ticket;

/**
 * Description of GeoJsonConverter
 *
 * @author Mihailov Vasilievic Filho <mihailov.vf@gmail.com>
 */
class GeoJsonConverter
{

    /**
     * @var CoordinateReferenceSystem
     */
    private $crs;

    public function __construct(CoordinateReferenceSystem $crs)
    {
        $this->crs = $crs;
    }

    /**
     * @param array $tickets
     * @return FeatureCollection
     */
    public function createPointFeatureCollection(array $tickets)
    {
        $features = array();
        foreach ($tickets as $ticket) {
            $features[] = $this->createPointFeature($ticket);
        }

        return new FeatureCollection($features, $this->crs);
    }

    /**
     * @param Ticket $ticket
     * @return Feature
     */
    public function createPointFeature(Ticket $ticket)
    {
        $point = new Point(
            array(
                $ticket->getLocation()->getLongitude(),
                $ticket->getLocation()->getLatitude(),
            )
        );

        $properties = array(
            'id' => $ticket->getId(),
            'description' => $ticket->getDescription(),
            'creationDate' => $ticket->getCreationDate(),
            'issue' => $ticket->getIssue()->getName(),
            'status' => $ticket->getStatus(),
        );

        return new Feature($point, $properties, $ticket->getId(), $this->crs);
    }
}
