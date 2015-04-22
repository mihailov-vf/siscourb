<?php

return array(
    'service_manager' => array(
        'factories' => array(
            'Siscourb\Ticket\Mapper\TicketMapper' => 'Siscourb\Ticket\Mapper\TicketMapperFactory',
        ),
    ),
    'form_elements' => array(
        'factories' => array(
            'Siscourb\Ticket\Form\LocationFieldset' => 'Siscourb\Ticket\Form\LocationFieldsetFactory',
            'Siscourb\Ticket\Form\TicketFieldset' => 'Siscourb\Ticket\Form\TicketFieldsetFactory',
            'Siscourb\Ticket\Form\TicketForm' => 'Siscourb\Ticket\Form\TicketFormFactory',
        ),
    ),
    'controllers' => array(
    ),
);
