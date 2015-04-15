<?php

namespace Siscourb\Organization\Entity;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2015-04-15 at 11:02:15.
 */
class OrganizationTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Organization
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new Organization;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
        
    }

    public function testConstruct()
    {
        $this->assertAttributeInstanceOf(
            'Doctrine\Common\Collections\ArrayCollection',
            'contacts',
            $this->object
        );
    }

    /**
     * @covers Siscourb\Organization\Entity\Organization::getId
     * @covers Siscourb\Organization\Entity\Organization::setId
     */
    public function testGetAndSetId()
    {
        $this->assertAttributeEmpty('id', $this->object);
        $this->assertEmpty($this->object->getId());

        $this->object->setId(1);
        $this->assertEquals(1, $this->object->getId());
    }

    /**
     * @covers Siscourb\Organization\Entity\Organization::getName
     * @covers Siscourb\Organization\Entity\Organization::setName
     */
    public function testGetName()
    {
        $this->assertAttributeEmpty('name', $this->object);
        $this->assertEmpty($this->object->getName());

        $this->object->setName('Prefeitura');
        $this->assertEquals('Prefeitura', $this->object->getName());
    }

    /**
     * @covers Siscourb\Organization\Entity\Organization::getContacts
     */
    public function testGetContacts()
    {
        $this->assertInstanceOf('Doctrine\Common\Collections\ArrayCollection', $this->object->getContacts());
        $this->assertEmpty($this->object->getContacts());
    }

    /**
     * @covers Siscourb\Organization\Entity\Organization::addContact
     */
    public function testAddContact()
    {
        $this->assertAttributeCount(0, 'contacts', $this->object);

        $contact = new Contact();

        $this->object->addContact($contact);
        $this->assertAttributeCount(1, 'contacts', $this->object);

        $this->assertSame($this->object, $contact->getOrganization());
    }
}