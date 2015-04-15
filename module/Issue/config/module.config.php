<?php

return array(
    'view_manager' => array(
        'template_path_stack' => array(
            'Issue' => __DIR__ . '/../view',
        ),
        'controller_map' => array(
            'Siscourb\Issue' => 'issue',
        ),
    ),
    //doctrine config
    'doctrine' => array(
        'driver' => array(
            'issue_entity' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'paths' => __DIR__ . '/../src/Entity',
            ),
            'orm_default' => array(
                'drivers' => array(
                    'Siscourb\Issue\Entity' => 'issue_entity'
                )
            )
        ),
        'fixture' => array(
            'issue_fixture' => __DIR__ . '/../src/Fixture',
        )
    ),
);
