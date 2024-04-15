<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
<<<<<<< HEAD
    | This option controls the default authentication "guard" and password
    | reset options for your application. You may change these defaults
=======
    | This option defines the default authentication "guard" and password
    | reset "broker" for your application. You may change these values
>>>>>>> e0e52116a513c334aa5bf04915070437adae30de
    | as required, but they're a perfect start for most applications.
    |
    */

    'defaults' => [
<<<<<<< HEAD
        'guard' => 'web',
        'passwords' => 'users',
=======
        'guard' => env('AUTH_GUARD', 'web'),
        'passwords' => env('AUTH_PASSWORD_BROKER', 'users'),
>>>>>>> e0e52116a513c334aa5bf04915070437adae30de
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Next, you may define every authentication guard for your application.
    | Of course, a great default configuration has been defined for you
<<<<<<< HEAD
    | here which uses session storage and the Eloquent user provider.
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
=======
    | which utilizes session storage plus the Eloquent user provider.
    |
    | All authentication guards have a user provider, which defines how the
    | users are actually retrieved out of your database or other storage
    | system used by the application. Typically, Eloquent is utilized.
>>>>>>> e0e52116a513c334aa5bf04915070437adae30de
    |
    | Supported: "session"
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
<<<<<<< HEAD
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | If you have multiple user tables or models you may configure multiple
    | sources which represent each model / table. These sources may then
=======
    | All authentication guards have a user provider, which defines how the
    | users are actually retrieved out of your database or other storage
    | system used by the application. Typically, Eloquent is utilized.
    |
    | If you have multiple user tables or models you may configure multiple
    | providers to represent the model / table. These providers may then
>>>>>>> e0e52116a513c334aa5bf04915070437adae30de
    | be assigned to any extra authentication guards you have defined.
    |
    | Supported: "database", "eloquent"
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
<<<<<<< HEAD
            'model' => App\Models\User::class,
=======
            'model' => env('AUTH_MODEL', App\Models\User::class),
>>>>>>> e0e52116a513c334aa5bf04915070437adae30de
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
<<<<<<< HEAD
    | You may specify multiple password reset configurations if you have more
    | than one user table or model in the application and you want to have
    | separate password reset settings based on the specific user types.
    |
    | The expire time is the number of minutes that each reset token will be
    | considered valid. This security feature keeps tokens short-lived so
    | they have less time to be guessed. You may change this as needed.
    |
=======
    | These configuration options specify the behavior of Laravel's password
    | reset functionality, including the table utilized for token storage
    | and the user provider that is invoked to actually retrieve users.
    |
    | The expiry time is the number of minutes that each reset token will be
    | considered valid. This security feature keeps tokens short-lived so
    | they have less time to be guessed. You may change this as needed.
    |
    | The throttle setting is the number of seconds a user must wait before
    | generating more password reset tokens. This prevents the user from
    | quickly generating a very large amount of password reset tokens.
    |
>>>>>>> e0e52116a513c334aa5bf04915070437adae30de
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
<<<<<<< HEAD
            'table' => 'password_resets',
=======
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
>>>>>>> e0e52116a513c334aa5bf04915070437adae30de
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    |
    | Here you may define the amount of seconds before a password confirmation
<<<<<<< HEAD
    | times out and the user is prompted to re-enter their password via the
=======
    | window expires and users are asked to re-enter their password via the
>>>>>>> e0e52116a513c334aa5bf04915070437adae30de
    | confirmation screen. By default, the timeout lasts for three hours.
    |
    */

<<<<<<< HEAD
    'password_timeout' => 10800,
=======
    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),
>>>>>>> e0e52116a513c334aa5bf04915070437adae30de

];
