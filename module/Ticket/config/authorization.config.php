<?php

return array(
    'bjyauthorize' => array(
        'guards' => array(
            'BjyAuthorize\Guard\Controller' => array(
                array(
                    'controller' => 'Siscourb\Ticket\Controller\Ticket',
                    'roles' => array('user')
                ),
                array(
                    'controller' => 'Siscourb\Ticket\Controller\Ticket',
                    'action' => array('list', 'export', 'view'),
                    'roles' => array()
                ),
            ),
        ),
    ),
);
