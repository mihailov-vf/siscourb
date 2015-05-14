<?php

return array(
    'service_manager' => array(
        'factories' => array(
            'Siscourb\Ticket\Mapper\TicketMapper' => 'Siscourb\Ticket\Mapper\TicketMapperFactory',
            'Siscourb\Ticket\GeoJson\GeoJsonConverter' => 'Siscourb\Ticket\GeoJson\GeoJsonConverterFactory',
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
        'factories' => array(
            'Siscourb\Ticket\Controller\Ticket' => 'Siscourb\Ticket\Controller\TicketControllerFactory',
        ),
    ),
);
