<?php

return array(
    'router' => array(
        'routes' => array(
            'ticket' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/ticket',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Siscourb\Ticket\Controller',
                        'controller' => 'Ticket',
                        'action' => 'list',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'list' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/list',
                            'defaults' => array(
                                'action' => 'list',
                            ),
                        ),
                        'may_terminate' => true,
                    ),
                    'add' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/add',
                            'defaults' => array(
                                'action' => 'add',
                            ),
                        ),
                        'may_terminate' => true,
                    ),
                    'create' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/create',
                            'defaults' => array(
                                'action' => 'create',
                            ),
                        ),
                        'may_terminate' => true,
                    ),
                ),
            ),
        )
    ),
);
