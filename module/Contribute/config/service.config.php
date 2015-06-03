<?php

return array(
    'form_elements' => array(
        'factories' => array(
            'Siscourb\Contribute\Form\ContributeForm' => 'Siscourb\Contribute\Form\ContributeFormFactory',
        ),
    ),
    'controllers' => array(
        'factories' => array(
            'Siscourb\Contribute\Controller\Contribute' => 'Siscourb\Contribute\Controller\ContributeControllerFactory',
        ),
    ),
);
