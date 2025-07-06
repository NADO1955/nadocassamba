<?php

return [

    'defaults' => [
        'guard' => 'clinico', // ← Trocado de 'web' para 'clinico' se deseja autenticação padrão do clínico
        'passwords' => 'users',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'utente' => [
            'driver' => 'session',
            'provider' => 'utentes',
        ],

        'clinico' => [
            'driver' => 'session',
            'provider' => 'clinicos',
        ],

        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        'utentes' => [
            'driver' => 'eloquent',
            'model' => App\Models\Utente::class,
        ],

        'clinicos' => [
            'driver' => 'eloquent',
            'model' => App\Models\Clinico::class,
        ],

        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class,
        ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],

        'utentes' => [
            'provider' => 'utentes',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],

        'clinicos' => [
            'provider' => 'clinicos',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],

        'admins' => [
            'provider' => 'admins',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];

