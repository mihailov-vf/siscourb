<?php

return array(
    'view_manager' => array(
        'template_path_stack' => array(
            'Contribute' => __DIR__ . '/../view',
        ),
        'controller_map' => array(
            'Siscourb\Contribute' => 'contribute',
        ),
    ),
    //doctrine config
    'doctrine' => array(
        'driver' => array(
            'contribute_entity' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'paths' => __DIR__ . '/../src/Entity',
            ),
            'orm_default' => array(
                'drivers' => array(
                    'Siscourb\Contribute\Entity' => 'contribute_entity'
                )
            )
        ),
    ),
);
