<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'Siscourb\Application\Controller\Siscourb' => 'Siscourb\Application\Controller\SiscourbController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'siscourb' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Siscourb\Application\Controller',
                        'controller' => 'Siscourb',
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'about' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => 'about[/]',
                            'defaults' => array(
                                'action' => 'about',
                            )
                        ),
                    )
                )
            ),
        )
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => array(
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
        'controller_map' => array(
            'Siscourb\Application' => 'application',
        ),
    ),
    'bjyauthorize' => array(
        'guards' => array(
            'BjyAuthorize\Guard\Controller' => array(
                array(
                    'controller' => 'Siscourb\Application\Controller\Siscourb',
                    'roles' => array()
                ),
            ),
        ),
    ),
);
