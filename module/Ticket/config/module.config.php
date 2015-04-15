<?php

return array(
    'view_manager' => array(
        'template_path_stack' => array(
            'Ticket' => __DIR__ . '/../view',
        ),
        'controller_map' => array(
            'Siscourb\Ticket' => 'ticket',
        ),
    ),
    //doctrine config
    'doctrine' => array(
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
        'fixture' => array(
            'ticket_fixture' => __DIR__ . '/../src/Fixture',
        )
    ),
);
