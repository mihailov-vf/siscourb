<?php

namespace Siscourb\Ticket\Form;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2015-04-20 at 23:07:17.
 */
class TicketFieldsetTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var TicketFieldset
     */
    protected $ticketFieldset;
    
    /**
     *
     * @var LocationFieldset
     */
    protected $locationFieldset;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->locationFieldset = \Mockery::mock('Siscourb\Ticket\Form\LocationFieldset')->makePartial();

        $this->ticketFieldset = new TicketFieldset($this->locationFieldset);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
        
    }

    public function testTicketFieldsetConstruction()
    {
        $this->assertInstanceOf('Siscourb\Ticket\Form\TicketFieldset', $this->ticketFieldset);
        $this->assertInstanceOf('DoctrineModule\Persistence\ObjectManagerAwareInterface', $this->ticketFieldset);
        $this->assertEquals('TicketFieldset', $this->ticketFieldset->getName());
        
        $this->assertAttributeSame($this->locationFieldset, 'locationFieldset', $this->ticketFieldset);
    }

    public function testInit()
    {
        $this->ticketFieldset->init();

        //Elements
        $this->assertInstanceOf('Zend\Form\Element\Hidden', $this->ticketFieldset->get('id'));
        $this->assertInstanceOf('Zend\Form\Element\Hidden', $this->ticketFieldset->get('user'));
        $this->assertInstanceOf('Zend\Form\Element\Text', $this->ticketFieldset->get('description'));
        $this->assertInstanceOf('Siscourb\Ticket\Form\LocationFieldset', $this->ticketFieldset->get('location'));
        $this->assertInstanceOf('DoctrineModule\Form\Element\ObjectSelect', $this->ticketFieldset->get('issue'));
    }

    public function testGetAndSetObjectManager()
    {
        $this->assertEmpty($this->ticketFieldset->getObjectManager());

        $objectManager = \Mockery::mock('Doctrine\Common\Persistence\ObjectManager');

        $this->ticketFieldset->setObjectManager($objectManager);

        $this->assertInstanceOf(
            'Doctrine\Common\Persistence\ObjectManager',
            $this->ticketFieldset->getObjectManager()
        );
    }
}