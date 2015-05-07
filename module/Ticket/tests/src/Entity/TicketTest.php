<?php

namespace Siscourb\Ticket\Entity;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2015-04-16 at 10:45:55.
 */
class TicketTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Ticket
     */
    protected $ticket;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $user = new \Siscourb\User\Entity\User();
        $this->ticket = new Ticket($user);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
        \Mockery::close();
    }

    public function testConstruction()
    {
        $this->assertAttributeSame(Ticket::STATUS_OPEN, 'status', $this->ticket);
        $this->assertAttributeInstanceOf('Siscourb\User\Entity\User', 'user', $this->ticket);
        $this->assertAttributeInstanceOf('DateTime', 'creationDate', $this->ticket);
        $this->assertAttributeEmpty('reopenDate', $this->ticket);
        $this->assertAttributeEmpty('closeDate', $this->ticket);
    }
    
    public function testOpenTicket()
    {
        $ticket = \Mockery::mock('Siscourb\Ticket\Entity\Ticket')->makePartial();
        
        $this->assertEmpty($ticket->getStatus());
        
        $ticket->open();
        $this->assertEquals('open', $ticket->getStatus());
        $this->assertAttributeEmpty('reopenDate', $ticket);
    }
    
    public function testCloseTicket()
    {
        $this->assertAttributeEquals('open', 'status', $this->ticket);
        $this->assertAttributeEmpty('closeDate', $this->ticket);
        
        $this->ticket->close();
        $this->assertAttributeEquals('closed', 'status', $this->ticket);
        $this->assertAttributeInstanceOf('DateTime', 'closeDate', $this->ticket);
    }
    
    public function testReopenClosedTicket()
    {
        $this->ticket->close();
        $this->assertAttributeEquals('closed', 'status', $this->ticket);
        $this->assertAttributeInstanceOf('DateTime', 'closeDate', $this->ticket);
        
        $this->ticket->open();
        $this->assertAttributeEquals('open', 'status', $this->ticket);
        $this->assertAttributeInstanceOf('DateTime', 'reopenDate', $this->ticket);
        $this->assertAttributeEmpty('closeDate', $this->ticket);
    }
    
    /**
     * @expectedException Exception
     * @expectedExceptionMessage Cannot reopen a non-closed Ticket
     */
    public function testReopenAnOpenTicket()
    {
        $this->assertAttributeEquals('open', 'status', $this->ticket);
        $this->ticket->open();
    }
    
    //Getters And Setters
    /**
     * @covers Siscourb\Ticket\Entity\Ticket::getId
     * @covers Siscourb\Ticket\Entity\Ticket::setId
     */
    public function testGetAndSetId()
    {
        $this->assertNull($this->ticket->getId());

        $this->ticket->setId(1);
        $this->assertAttributeSame(1, 'id', $this->ticket);

        $this->assertSame(1, $this->ticket->getId());
    }

    /**
     * @covers Siscourb\Ticket\Entity\Ticket::getStatus
     */
    public function testGetStatus()
    {
        $this->assertEquals(Ticket::STATUS_OPEN, $this->ticket->getStatus());
    }

    /**
     * @covers Siscourb\Ticket\Entity\Ticket::getCreationDate
     */
    public function testGetCreationDate()
    {
        $this->assertInstanceOf('DateTime', $this->ticket->getCreationDate());
    }

    /**
     * @covers Siscourb\Ticket\Entity\Ticket::getUser
     */
    public function testGetUser()
    {
        $this->assertInstanceOf('Siscourb\User\Entity\User', $this->ticket->getUser());
    }

    /**
     * @covers Siscourb\Ticket\Entity\Ticket::getDescription
     * @covers Siscourb\Ticket\Entity\Ticket::setDescription
     */
    public function testGetAndSetDescription()
    {
        $this->assertNull($this->ticket->getDescription());

        $expected = 'Description test';
        $this->ticket->setDescription($expected);
        $this->assertAttributeSame($expected, 'description', $this->ticket);

        $this->assertSame($expected, $this->ticket->getDescription());
    }

    /**
     * @covers Siscourb\Ticket\Entity\Ticket::getLocation
     * @covers Siscourb\Ticket\Entity\Ticket::setLocation
     */
    public function testGetAndSetLocation()
    {
        $this->assertNull($this->ticket->getLocation());

        $expected = \Mockery::mock('Siscourb\Ticket\ValueObject\Location');
        $this->ticket->setLocation($expected);
        $this->assertAttributeSame($expected, 'location', $this->ticket);

        $this->assertSame($expected, $this->ticket->getLocation());
    }

    /**
     * @covers Siscourb\Ticket\Entity\Ticket::getIssue
     * @covers Siscourb\Ticket\Entity\Ticket::setIssue
     */
    public function testGetAndSetIssue()
    {
        $this->assertNull($this->ticket->getIssue());

        $expected = \Mockery::mock('Siscourb\Issue\Entity\Issue');
        $this->ticket->setIssue($expected);
        $this->assertAttributeSame($expected, 'issue', $this->ticket);

        $this->assertSame($expected, $this->ticket->getIssue());
    }

    /**
     * @covers Siscourb\Ticket\Entity\Ticket::getNotes
     */
    public function testGetNotes()
    {
        $this->assertInstanceOf('Doctrine\Common\Collections\ArrayCollection', $this->ticket->getNotes());
        $this->assertCount(0, $this->ticket->getNotes());
    }
}
