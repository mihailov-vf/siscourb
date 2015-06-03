<?php

return array(
    'router' => array(
        'routes' => array(
            'contribute' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/contribute',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Siscourb\Contribute\Controller',
                        'controller' => 'Contribute',
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
            ),
        )
    ),
);
