<?php

namespace Siscourb\User\Repository;

use Doctrine\ORM\Mapping\ClassMetadata;
use Siscourb\User\Repository\UserRepository;
use Siscourb\User\Entity\User;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2015-03-30 at 12:34:40.
 */
class UserRepositoryTest extends \PHPUnit_Framework_TestCase
{

    private $entityManager;
    private $userRepository;

    public function setUp()
    {
        $this->entityManager = \Mockery::mock('Doctrine\ORM\EntityManager');

        $this->userRepository = new UserRepository(
            $this->entityManager,
            new ClassMetadata('Siscourb\User\Entity\User')
        );
    }

    /**
     * @dataProvider createValidUser
     */
    public function testInsertValidUser(User $user)
    {
        $this->entityManager->shouldReceive('persist')->with($user)->andReturn(null)->once();
        $this->entityManager->shouldReceive('flush')->with($user)->andReturn(null)->once();

        $returnedUser = $this->userRepository->insert($user);
        $this->assertEquals($user, $returnedUser);
        $this->assertInstanceOf('Siscourb\User\Entity\User', $returnedUser);
    }
    
    /**
     * @dataProvider createValidUser
     */
    public function testUpdateValidUser(User $user)
    {
        $this->entityManager->shouldReceive('flush')->with($user)->andReturn(null)->once();
        
        $returnedUser = $this->userRepository->update($user);
        $this->assertEquals($user, $returnedUser);
        $this->assertInstanceOf('Siscourb\User\Entity\User', $returnedUser);
    }
    
    /**
     * @dataProvider createValidUser
     */
    public function testDelete($user)
    {
        $this->entityManager->shouldReceive('remove')->with($user)->once();
        $this->entityManager->shouldReceive('flush')->with($user)->andReturn(null)->once();
        
        $this->userRepository->delete($user);
    }

    public function createValidUser()
    {
        $user = new User();
        $user->setId(1);
        $user->setName('Joe');
        $user->setEmail('joe@joe.com');
        $user->setPassword("jo3Max");

        return array(array($user));
    }
}
