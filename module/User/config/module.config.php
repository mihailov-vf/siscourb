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
            'user_entities' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => __DIR__ . '/../src/Entity'
            ),
            'orm_default' => array(
                'drivers' => array(
                    'Siscourb\User\Entity' => 'user_entities'
                )
            )
        ),
        'fixture' => array(
            'user_fixture' => __DIR__ . '/../src/Fixture',
        )
    ),
);
