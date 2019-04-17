<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default authentication "guard" and password
    | reset options for your application. You may change these defaults
    | as required, but they're a perfect start for most applications.
    |
    */

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Next, you may define every authentication guard for your application.
    | Of course, a great default configuration has been defined for you
    | here which uses session storage and the Eloquent user provider.
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | Supported: "session", "token"
    |
    */

    'guards' => [
        'pupilparent' => [
            'driver' => 'session',
            'provider' => 'pupilparents',
        ],

        'visitor' => [
            'driver' => 'session',
            'provider' => 'visitors',
        ],

        // default options
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'api' => [
            'driver' => 'token',
            'provider' => 'users',
        ],
        // custom options
        // admin
        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],

        'admin-api' => [
            'driver' => 'token',
            'provider' => 'admins',
        ],
        // pupil
        'pupil' => [
            'driver' => 'session',
            'provider' => 'pupils',
        ],

        'pupil-api' => [
            'driver' => 'token',
            'provider' => 'pupils',
        ],
        // staff
        'staff' => [
            'driver' => 'session',
            'provider' => 'staff',
        ],

        'staff-api' => [
            'driver' => 'token',
            'provider' => 'staff',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | If you have multiple user tables or models you may configure multiple
    | sources which represent each model / table. These sources may then
    | be assigned to any extra authentication guards you have defined.
    |
    | Supported: "database", "eloquent"
    |
    */

    'providers' => [
        'pupilparents' => [
            'driver' => 'eloquent',
            'model' => App\Pupilparent::class,
        ],

        'visitors' => [
            'driver' => 'eloquent',
            'model' => App\Visitor::class,
        ],

        // default options
        'users' => [
            'driver' => 'eloquent',
            'model' => App\User::class,
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],

        // custom options
        // admins
        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Admin::class,
        ],

        // pupils
        'pupils' => [
            'driver' => 'eloquent',
            'model' => App\Pupil::class,
        ],

        // staff
        'staff' => [
            'driver' => 'eloquent',
            'model' => App\Staff::class,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | You may specify multiple password reset configurations if you have more
    | than one user table or model in the application and you want to have
    | separate password reset settings based on the specific user types.
    |
    | The expire time is the number of minutes that the reset token should be
    | considered valid. This security feature keeps tokens short-lived so
    | they have less time to be guessed. You may change this as needed.
    |
    */

    'passwords' => [
        'pupilparents' => [
            'provider' => 'pupilparents',
            'table' => 'pupilparent_password_resets',
            'expire' => 60,
        ],

        'visitors' => [
            'provider' => 'visitors',
            'table' => 'visitor_password_resets',
            'expire' => 60,
        ],

        'staff' => [
            'provider' => 'staff',
            'table' => 'staff_password_resets',
            'expire' => 60,
        ],

        'pupils' => [
            'provider' => 'pupils',
            'table' => 'pupil_password_resets',
            'expire' => 60,
        ],

        'admins' => [
            'provider' => 'admins',
            'table' => 'admin_password_resets',
            'expire' => 60,
        ],

        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
        ],
        'admins' => [
            'provider' => 'admins',
            'table' => 'password_resets', 
            // the admin password expiration set to 15 mins, so that it gives attackers less time to guess
            'expire' => 15,
        ],
    ],

];
