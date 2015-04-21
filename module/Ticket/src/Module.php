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

namespace Siscourb\Ticket;

/**
 * Description of Module
 *
 * @author Mihailov Vasilievic Filho
 */
use Zend\Stdlib\ArrayUtils;

class Module
{

    public function getConfig()
    {
        $config = array();
        $configFiles = array(
            __DIR__ . '/../config/module.config.php',
            __DIR__ . '/../config/routes.config.php',
            __DIR__ . '/../config/service.config.php',
        );
        foreach ($configFiles as $configFile) {
            $config = ArrayUtils::merge($config, include $configFile);
        }
        return $config;
    }
}
