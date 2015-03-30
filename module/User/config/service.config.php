<?php

return array(
    'service_manager'=>array(
        'factories' => array(
            'Siscourb\User\Mapper\UserMapper' => 'Siscourb\User\Mapper\UserMapperFactory',
        ),
    ),
    'form_elements'=>array(
        'factories' => array(
            'Siscourb\User\Form\UserFieldset' => 'Siscourb\User\Form\UserFieldsetFactory',
            'Siscourb\User\Form\UserForm' => 'Siscourb\User\Form\UserFormFactory',
        ),
    ),
    'controllers' => array(
        'factories' => array(
            'Siscourb\User\Controller\User' => 'Siscourb\User\Controller\UserControllerFactory',
        ),
    ),
);
