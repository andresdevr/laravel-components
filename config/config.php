<?php


return [
    'asset-route' => [
        'name' => 'laravel-components',
        'prefix' => 'components',
        'middlewares' => [
            'web'
        ],
        'controller' => \Andresdevr\LaravelComponents\Http\Controllers\AssetController::class
    ]
];