<?php

return [

	/*
    |--------------------------------------------------------------------------
    | API Credentials
    |--------------------------------------------------------------------------
    |
    | If you're seeting API credentials for the entire app, change these settings. Get your
    | credentials from https://sms.beem.africa/#!/dashboard/profile/authentication | 'Authentication Information'.
    |
    */

    'api_key'    => function_exists('env') ? env('BEEM_AFRICA_API_KEY', '') : '',
    'secret_key' => function_exists('env') ? env('BEEM_AFRICA_SECRET_KEY', '') : '',

    /*
    |--------------------------------------------------------------------------
    | Beem Africa SMS Sender Name
    |--------------------------------------------------------------------------
    |
    | Here we set a sender name that will be used to send the sms. Default
    | sender name is `INFO`. Please only use sender names that have been registered
    | or the sms will not be sent.
    |
    */

    'sender_name' => function_exists('env') ? env('BEEM_AFRICA_SENDER_NAME', '') : '',
];