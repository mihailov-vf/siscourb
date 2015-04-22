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
            ),
        )
    ),
);
