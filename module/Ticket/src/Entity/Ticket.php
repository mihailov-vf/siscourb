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

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Siscourb\Issue\Entity\Issue;
use Siscourb\Ticket\Entity\Location;
use Siscourb\User\Entity\User;

/**
 * Description of Ticket
 *
 * @author Mihailov Vasilievic Filho <mihailov.vf@gmail.com>
 *
 * @ORM\Entity(repositoryClass="Siscourb\Ticket\Repository\TicketRepository")
 * @ORM\Table(name="tickets")
 */
class Ticket
{

    const STATUS_OPEN = 'open';
    const STATUS_CLOSED = 'closed';

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=30, nullable=false)
     */
    private $status;

    /**
     * @var DateTime
     *
     * @ORM\Column(type="datetime")
     */
    private $creationDate;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="Siscourb\User\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var Location
     *
     * @ORM\Embedded(class = "Location", columnPrefix = "location_")
     */
    private $location;

    /**
     * @var Issue
     *
     * @ORM\ManyToOne(targetEntity="Siscourb\Issue\Entity\Issue")
     * @ORM\JoinColumn(name="issue_id", referencedColumnName="id")
     */
    private $issue;

    /**
     * @var DateTime
     *
     * @ORM\Column(type="datetime")
     */
    private $reopenDate;

    /**
     * @var DateTime
     *
     * @ORM\Column(type="datetime")
     */
    private $closeDate;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Note",  mappedBy="ticket", cascade={"all"})
     */
    private $notes;

    /**
     * @var Note
     *
     * @ORM\OneToOne(targetEntity="Note")
     * @ORM\JoinColumn(name="justification_note_id", referencedColumnName="id")
     */
    private $justification;

    public function __construct(User $user)
    {
        $this->user = $user;

        $this->creationDate = new DateTime();
        $this->notes = new ArrayCollection();

        $this->open();
    }

    /**
     * @return void
     * @throws \Exception
     */
    public function open()
    {
        if ($this->status == self::STATUS_OPEN) {
            throw new \Exception('Cannot reopen a non-closed Ticket.');
        }
        if ($this->status == self::STATUS_CLOSED) {
            $this->closeDate = null;
            $this->reopenDate = new DateTime();
        }
        $this->status = self::STATUS_OPEN;
    }

    /**
     * @return void
     */
    public function close()
    {
        $this->status = self::STATUS_CLOSED;
        $this->closeDate = new DateTime();
    }

    //Getters and Setters
    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return \DateTime
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return Location
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @return Issue
     */
    public function getIssue()
    {
        return $this->issue;
    }

    /**
     * @return DateTime
     */
    public function getCloseDate()
    {
        return $this->closeDate;
    }

    /**
     * @return ArrayCollection
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @return Note
     */
    public function getJustification()
    {
        return $this->justification;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @param Location $location
     */
    public function setLocation(Location $location)
    {
        $this->location = $location;
    }

    /**
     * @param Issue $issue
     */
    public function setIssue(Issue $issue)
    {
        $this->issue = $issue;
    }
}
