<?php

return array(
    'view_manager' => array(
        'template_path_stack' => array(
            'Organization' => __DIR__ . '/../view',
        ),
        'controller_map' => array(
            'Siscourb\Organization' => 'organization',
        ),
    ),
    //doctrine config
    'doctrine' => array(
        'driver' => array(
            'organization_entity' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'paths' => __DIR__ . '/../src/Entity',
            ),
            'orm_default' => array(
                'drivers' => array(
                    'Siscourb\Organization\Entity' => 'organization_entity'
                )
            )
        ),
        'fixture' => array(
            'organization_fixture' => __DIR__ . '/../src/Fixture',
        )
    ),
);
