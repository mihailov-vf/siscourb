<?php

namespace Siscourb\User\Mapper;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2015-03-30 at 13:40:51.
 */
class UserMapperFactoryTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var UserMapperFactory
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new UserMapperFactory;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
        
    }

    /**
     * @covers Siscourb\User\Mapper\UserMapperFactory::createService
     * @todo   Implement testCreateService().
     */
    public function testCreateService()
    {
        $entityManager = \Mockery::mock('Doctrine\ORM\EntityManager');

        $serviceLocator = \Mockery::mock('Zend\ServiceManager\ServiceManager');
        $serviceLocator->shouldReceive('get')
                ->with('Doctrine\ORM\EntityManager')->once()->andReturn($entityManager);
        
        $userRepository = \Mockery::mock('Siscourb\User\Repository\UserRepository');
        
        $entityManager->shouldReceive('getRepository')->with('Siscourb\User\Entity\User')
            ->andReturn($userRepository)->once();
        
        $userMapper = $this->object->createService($serviceLocator);
        
        $this->assertInstanceOf('Siscourb\User\Repository\UserRepository', $userMapper);
    }
}
