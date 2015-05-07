<?php

return array(
    'view_manager' => array(
        'template_path_stack' => array(
            'Ticket' => __DIR__ . '/../view',
        ),
        'controller_map' => array(
            'Siscourb\Ticket' => 'ticket',
        ),
        'strategies' => array(
            'ViewJsonStrategy',
        ),
    ),
    //doctrine config
    'doctrine' => array(
        'configuration' => array(
            'orm_default' => array(
                'types' => array(
                    'point' => 'Siscourb\Ticket\Type\PointType'
                )
            ),
        ),
        'driver' => array(
            'ticket_entity' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'paths' => __DIR__ . '/../src/Entity',
            ),
            'orm_default' => array(
                'drivers' => array(
                    'Siscourb\Ticket\Entity' => 'ticket_entity'
                )
            )
        ),
        'connection' => array(
            'orm_default' => array(
                'doctrine_type_mappings' => array(
                    'point' => 'point',
                ),
            ),
        ),
        'fixture' => array(
            'ticket_fixture' => __DIR__ . '/../src/Fixture',
        )
    ),
);
