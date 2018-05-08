<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id' => '225360231552787',
        'client_secret' => '6d0c957b32e6a5ef9789ac4c1900c20e',
        'redirect' => 'http://localhost:8000/auth/facebook/callback',
    ],
    'google' => [
       'client_id'     => '1011989300699-lbcql3a8f2retfd6u2ahf8iilc68j210.apps.googleusercontent.com', 
       'client_secret' => 'TG1JBVpgX_qFUGPTsNuhcnJk',
       'redirect'      => 'http://localhost:8000/social/handle/google',
    ],


];
