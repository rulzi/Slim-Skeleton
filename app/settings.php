<?php
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        // Renderer settings
        'view' => [
            'path' => __DIR__ . '/../template/views/',
        ],
        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => __DIR__ . '/../logs/app.log',
        ],
        'mode' => 'development',
    ],
];