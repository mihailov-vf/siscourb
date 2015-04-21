<?php

namespace Siscourb\Ticket\Form;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2015-04-20 at 23:22:36.
 */
class LocationFieldsetTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var LocationFieldset
     */
    protected $locationFieldset;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->locationFieldset = new LocationFieldset;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
        
    }
    
    public function testLocationFieldsetConstruction()
    {
        $this->assertInstanceOf('Siscourb\Ticket\Form\LocationFieldset', $this->locationFieldset);
        $this->assertEquals('LocationFieldset', $this->locationFieldset->getName());
        
        //Elements
        $this->assertInstanceOf('Zend\Form\Element\Text', $this->locationFieldset->get('point'));
        $this->assertInstanceOf('Zend\Form\Element\Text', $this->locationFieldset->get('address'));
    }
}
