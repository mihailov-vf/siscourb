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

namespace Siscourb\Contribute\Controller;

use Doctrine\ORM\EntityRepository as MessageMapper;
use Zend\Form\Form as MessageForm;
use Zend\Mvc\Controller\AbstractActionController;

/**
 * Description of ContributeController
 *
 * @author Mihailov Vasilievic Filho <mihailov.vf@gmail.com>
 */
class ContributeController extends AbstractActionController
{

    /**
     *
     * @var MessageMapper
     */
    private $messageMapper;

    /**
     *
     * @var MessageForm
     */
    private $messageForm;

    public function __construct(MessageMapper $messageMapper, MessageForm $messageForm)
    {
        $this->messageMapper = $messageMapper;
        $this->messageForm = $messageForm;
    }

    public function sendMessageAction()
    {
        
    }

    public function confirmationAction()
    {
        
    }
}
