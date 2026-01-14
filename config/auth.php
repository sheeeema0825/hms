<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    */
    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    */
    'guards' => [

        // ADMIN (users table)
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        // STAFF
        'staff' => [
            'driver' => 'session',
            'provider' => 'staff',
        ],

        // GUEST
        'guest' => [
            'driver' => 'session',
            'provider' => 'guests',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    */
    'providers' => [

        // ADMIN
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        // STAFF
        'staff' => [
            'driver' => 'eloquent',
            'model' => App\Models\Staff::class,
        ],

        // GUEST
        'guests' => [
            'driver' => 'eloquent',
            'model' => App\Models\Guest::class,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Reset
    |--------------------------------------------------------------------------
    */
    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Timeout
    |--------------------------------------------------------------------------
    */
    'password_timeout' => 10800,

];
