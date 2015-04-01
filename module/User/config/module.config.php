<?php

return array(
    'view_manager' => array(
        'template_path_stack' => array(
            'User' => __DIR__ . '/../view',
        ),
        'controller_map' => array(
            'Siscourb\User' => 'user',
        ),
    ),
    //doctrine config
    'doctrine' => array(
        'driver' => array(
            'zfcuser_entity' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'paths' => __DIR__ . '/../src/Entity',
            ),
            'orm_default' => array(
                'drivers' => array(
                    'Siscourb\User\Entity' => 'zfcuser_entity'
                )
            )
        ),
        'fixture' => array(
            'user_fixture' => __DIR__ . '/../src/Fixture',
        )
    ),
    
    'zfcuser' => array(
        // telling ZfcUser to use our own class
        'user_entity_class'       => 'Siscourb\User\Entity\User',
        // telling ZfcUserDoctrineORM to skip the entities it defines
        'enable_default_entities' => false,
    ),

    'bjyauthorize' => array(
        'default_role' => 'guest',
        // Using the authentication identity provider,
        // which basically reads the roles from the auth service's identity
        'identity_provider' => 'BjyAuthorize\Provider\Identity\AuthenticationIdentityProvider',

        'role_providers'        => array(
            // using an object repository (entity repository) to load all roles into our ACL
            'BjyAuthorize\Provider\Role\ObjectRepositoryProvider' => array(
                'object_manager'    => 'doctrine.entity_manager.orm_default',
                'role_entity_class' => 'Siscourb\User\Entity\Role',
            ),
        ),
    ),
);
