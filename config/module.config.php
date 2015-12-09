<?php
namespace PpcDevMode;

return [
    'service_manager' => [
        'factories' => [
            'log' => 'PpcDevMode\Factory\Log',
        ]
    ],
    'asset_manager' => array(
        'resolver_configs' => array(
        ),
        // don't use cache
        'caching' => [
            'default' => [
                'cache' => '',
            ],
        ],
    ),
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions' => true,
    ],
];