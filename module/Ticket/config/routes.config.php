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
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/list',
                            'defaults' => array(
                                'action' => 'list',
                            ),
                        ),
                        'may_terminate' => true,
                        'child_routes' => array(
                            'export' => array(
                                'type' => 'Segment',
                                'options' => array(
                                    'route' => '/:export',
                                    'constraints' => array(
                                        'export' => 'json|xml'
                                    ),
                                    'defaults' => array(
                                        'action' => 'export',
                                    ),
                                ),
                                'may_terminate' => true,
                            ),
                        ),
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
                    'view' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/view/:id',
                            'constraints' => array(
                                'id' => '[0-9]+'
                            ),
                            'defaults' => array(
                                'action' => 'view',
                            ),
                        ),
                        'may_terminate' => true,
                        'child_routes' => array(
                            'export' => array(
                                'type' => 'Segment',
                                'options' => array(
                                    'route' => '/:export',
                                    'constraints' => array(
                                        'export' => 'json|xml'
                                    ),
                                    'defaults' => array(
                                        'action' => 'export',
                                    ),
                                ),
                                'may_terminate' => true,
                            ),
                        ),
                    ),
                ),
            ),
        )
    ),
);
