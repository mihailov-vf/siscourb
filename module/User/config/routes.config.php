<?php

return array(
    'router' => array(
        'routes' => array(
            'user' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/user[/]',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Siscourb\User\Controller',
                        'controller' => 'User',
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'register' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => 'register[/]',
                            'defaults' => array(
                                'action' => 'register',
                            )
                        ),
                    )
                )
            ),
        )
    ),
);
