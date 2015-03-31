<?php

namespace Siscourb\User\Controller;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2015-03-24 at 21:01:50.
 */
class UserControllerFactoryTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @covers Siscourb\User\Controller\UserControllerFactory::createService
     * @todo   Implement testCreateService().
     */
    public function testCreateService()
    {
        $userMapper = \Mockery::mock('Siscourb\User\Repository\UserRepository');
        $userForm = \Mockery::mock('Siscourb\User\Form\UserForm');

        $serviceLocator = \Mockery::mock('Zend\ServiceManager\ServiceManager');
        $serviceLocator->shouldReceive('get')
                ->with('Siscourb\User\Mapper\UserMapper')->once()->andReturn($userMapper);
        
        $formManager = \Mockery::mock('Zend\Form\FormElementManager');

        $controllerManager = \Mockery::mock('Zend\Mvc\Controller\ControllerManager');
        $controllerManager->shouldReceive('getServiceLocator')->once()->andReturn($serviceLocator);
        $serviceLocator->shouldReceive('get')->with('FormElementManager')
                ->once()->andReturn($formManager);

        $userControllerFactory = new UserControllerFactory();

        $userController = $userControllerFactory->createService($controllerManager);
        
        $this->assertInstanceOf(
            'Siscourb\User\Controller\UserController',
            $userController
        );
        
        $this->assertObjectHasAttribute('userMapper', $userController);
        $this->assertObjectHasAttribute('userForm', $userController);
    }
}
