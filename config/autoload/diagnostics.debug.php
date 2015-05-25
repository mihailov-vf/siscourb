<?php

return array(
    'diagnostics' => array(
        // "application" check group
        'Siscourb' => array(
            'Check PHP Version > 5.4' => ['PhpVersion', '5.4', '>'],
            'Check Extensions loaded' => ['ExtensionLoaded',
                [
                    'intl'
                ]
            ],
            'Check if public dirs exists' => array('DirReadable',
                [
                    'public/',
                    'public/js',
                ]
            ),
            'Check if data dirs are writable' => array('DirWritable',
                [
                    'data/',
                    'public/cache',
                ]
            ),
            'Check if basic modules are installed' => ['ClassExists',
                [
                    'Siscourb\User\Module',
                    'Siscourb\Organization\Module',
                    'Siscourb\Issue\Module',
                    'Siscourb\Ticket\Module',
                ]
            ],
        )
    )
);
