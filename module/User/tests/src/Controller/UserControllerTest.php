<?php

namespace Siscourb\User\Controller;

use Mockery;
use PHPUnit_Framework_TestCase;
use Siscourb\User\Entity\User;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2015-03-30 at 22:12:08.
 */
class UserControllerTest extends PHPUnit_Framework_TestCase
{

    protected $userController;
    protected $userMapper;
    protected $userForm;

    protected function setUp()
    {
        $this->assertClassHasAttribute('userMapper', 'Siscourb\User\Controller\UserController');
        $this->assertClassHasAttribute('userForm', 'Siscourb\User\Controller\UserController');

        $this->userMapper = Mockery::mock('Siscourb\User\Repository\UserRepository');
        $this->userForm = Mockery::mock('Siscourb\User\Form\UserForm');

        $this->userController = new UserController($this->userMapper, $this->userForm);
    }

    public function testIndexAction()
    {
        $expected = array();
        $this->assertEquals($expected, $this->userController->indexAction());
    }

    public function testRegisterAction()
    {
        $expected = array('form' => $this->userForm);
        $this->assertEquals($expected, $this->userController->registerAction());
    }

    public function testCreateWithInvalidData()
    {
        $this->userForm->shouldReceive('setData')->once()->andReturn(null);
        $this->userForm->shouldReceive('isValid')->once()->andReturn(false);

        $expected = array('form' => $this->userForm);
        $this->assertEquals($expected, $this->userController->create(array()));
    }

    public function testCreateWithValidData()
    {
        $this->userMapper->shouldReceive('insert')->once()->andReturn(null);

        $this->userForm->shouldReceive('setData')->once()->andReturn(null);
        $this->userForm->shouldReceive('isValid')->once()->andReturn(true);
        $this->userForm->shouldReceive('getData')->once()->andReturn($this->getRowsetTask()[0]);

        $pluginManager = Mockery::mock('Zend\Mvc\Controller\PluginManager');
        $pluginManager->shouldReceive('setController')->andReturn(Mockery::self());

        $flashMessenger = Mockery::mock('Zend\Mvc\Controller\Plugin\FlashMessenger');
        $flashMessenger->shouldReceive('setNamespace')->once()->andReturn(Mockery::self());
        $flashMessenger->shouldReceive('addMessage')->once()->andReturn(Mockery::self());

        $pluginManager->shouldReceive('get')
                ->with('flashMessenger', Mockery::any())
                ->andReturn($flashMessenger)->once();

        $redirectPlugin = Mockery::mock('Zend\Mvc\Controller\Plugin\Redirect');
        $redirectPlugin->shouldReceive('toRoute')->once()->andReturn('redirect');
        $pluginManager->shouldReceive('get')
                ->with('redirect', Mockery::any())
                ->andReturn($redirectPlugin)->once();

        $this->userController->setPluginManager($pluginManager);
        $this->assertEquals('redirect', $this->userController->create(array()));
    }

    private function getRowsetTask()
    {
        $user = new User();
        $user->setId(1);
        $user->setName('Joe');
        $user->setEmail('joe@joe.com');
        $user->setPassword('done');
        return array($user);
    }
}
