<?php

namespace Siscourb\User\Form;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2015-03-30 at 19:54:23.
 */
class UserFieldsetTest extends \PHPUnit_Framework_TestCase
{

    public function testFieldsetCreation()
    {
        $userFieldset = new UserFieldset();

        $this->assertInstanceOf('Siscourb\User\Form\UserFieldset', $userFieldset);
        $this->assertInstanceOf('Zend\Form\Element\Hidden', $userFieldset->get('id'));
        $this->assertInstanceOf('Zend\Form\Element\Text', $userFieldset->get('name'));
        $this->assertInstanceOf('Zend\Form\Element\Email', $userFieldset->get('email'));
        $this->assertInstanceOf('Zend\Form\Element\Password', $userFieldset->get('password'));
    }
}
