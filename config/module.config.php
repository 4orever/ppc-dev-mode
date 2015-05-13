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
            'paths' => array(
                'ppc-backend-client' => __DIR__ . '/../src/',
            ),
            'map' => [
                'framework.js' => __DIR__ . '/../src/build/production/App/framework.js',
                'bootstrap.js' => __DIR__ . '/../src/bootstrap.js',
                'bootstrap.json' => __DIR__ . '/../src/bootstrap.json'
            ]
        ),
    )
];