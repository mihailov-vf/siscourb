<?php

return array(
    'service_manager'=>array(
        'factories' => array(
            'Siscourb\User\Mapper\UserMapper' => 'Siscourb\User\Mapper\UserMapperFactory',
        ),
    ),
    'controllers' => array(
        'factories' => array(
            'Siscourb\User\Controller\User' => 'Siscourb\User\Controller\UserControllerFactory',
        ),
    ),
);
