<?php


return [
    'colors' => [
        'primary' => '',
        'secondary' => ''
    ],
    'public-folder' => 'laravel-components',
    'commands' => [
        \Andresdevr\LaravelComponents\Console\ChangeColors::class,
        \Andresdevr\LaravelComponents\Console\PublishAssets::class
    ]
];