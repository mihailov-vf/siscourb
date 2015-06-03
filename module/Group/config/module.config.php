<?php

return array(
    'view_manager' => array(
        'template_path_stack' => array(
            'Group' => __DIR__ . '/../view',
        ),
        'controller_map' => array(
            'Siscourb\Group' => 'group',
        ),
    ),
    //doctrine config
    'doctrine' => array(
        'driver' => array(
            'group_entity' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'paths' => __DIR__ . '/../src/Entity',
            ),
            'orm_default' => array(
                'drivers' => array(
                    'Siscourb\Group\Entity' => 'group_entity'
                )
            )
        ),
        'fixture' => array(
            'group_fixture' => __DIR__ . '/../src/Fixture',
        )
    ),
);
