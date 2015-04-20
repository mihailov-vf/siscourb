<?php

namespace Siscourb\Ticket\Type;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2015-04-15 at 20:36:29.
 */
class PointTypeTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var PointType
     */
    protected $pointType;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->pointType = \Doctrine\DBAL\Types\Type::getType('point');
        $this->platform = \Mockery::mock('Doctrine\DBAL\Platforms\AbstractPlatform');
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
        
    }

    /**
     * @covers Siscourb\Ticket\Type\PointType::getName
     */
    public function testGetName()
    {
        $this->assertEquals('point', PointType::POINT);
        $this->assertEquals(PointType::POINT, $this->pointType->getName());
    }

    /**
     * @covers Siscourb\Ticket\Type\PointType::getSQLDeclaration
     */
    public function testGetSQLDeclaration()
    {
        $this->assertEquals('POINT', $this->pointType->getSQLDeclaration([], $this->platform));
    }

    /**
     * @covers Siscourb\Ticket\Type\PointType::convertToPHPValue
     */
    public function testConvertToPHPValue()
    {

        $value = "POINT(10 -20)";
        $this->assertStringMatchesFormat('POINT(%f %f)', $value);

        $result = $this->pointType->convertToPHPValue($value, $this->platform);

        $this->assertInstanceOf('Siscourb\Ticket\ValueObject\Point', $result);
        $this->assertAttributeEquals(10, 'latitude', $result);
        $this->assertAttributeEquals(-20, 'longitude', $result);
    }

    /**
     * @covers Siscourb\Ticket\Type\PointType::convertToDatabaseValue
     */
    public function testConvertToDatabaseValue()
    {
        $value = new \Siscourb\Ticket\ValueObject\Point(10, -20);
        $string = $this->pointType->convertToDatabaseValue($value, $this->platform);

        $this->assertStringMatchesFormat('POINT(%f %f)', $string);
    }

    /**
     * @covers Siscourb\Ticket\Type\PointType::canRequireSQLConversion
     */
    public function testCanRequireSQLConversion()
    {
        $this->assertTrue($this->pointType->canRequireSQLConversion());
    }

    /**
     * @covers Siscourb\Ticket\Type\PointType::convertToPHPValueSQL
     */
    public function testConvertToPHPValueSQL()
    {
        $sql = 'INSERT INTO';
        $result = $this->pointType->convertToPHPValueSQL($sql, $this->platform);

        $this->assertStringMatchesFormat('AsText(%s)', $result);
    }

    /**
     * @covers Siscourb\Ticket\Type\PointType::convertToDatabaseValueSQL
     */
    public function testConvertToDatabaseValueSQL()
    {
        $sql = 'INSERT INTO';
        $result = $this->pointType->convertToDatabaseValueSQL($sql, $this->platform);

        $this->assertStringMatchesFormat('PointFromText(%s)', $result);
    }
}