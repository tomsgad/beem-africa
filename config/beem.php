<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Beem SMS API Credentials
    |--------------------------------------------------------------------------
    |
    | Here we set api key and secret key that will be used to send the sms. Get your
    | credentials from https://sms.beem.africa/#!/dashboard/profile/authentication
    |
    */

    'sms_api_key'    => function_exists('env') ? env('BEEM_SMS_API_KEY', '') : '',
    'sms_secret_key' => function_exists('env') ? env('BEEM_SMS_SECRET_KEY', '') : '',

    /*
    |--------------------------------------------------------------------------
    | Beem SMS Sender Name
    |--------------------------------------------------------------------------
    |
    | Here we set a sender name that will be used to send the sms. Default
    | sender name is `INFO`. Please only use sender names that have been registered
    | or the sms will not be sent.
    |
    */

    'sms_sender_name' => function_exists('env') ? env('BEEM_SMS_SENDER_NAME', '') : '',

    /*
    |--------------------------------------------------------------------------
    | Beem OTP API Credentials
    |--------------------------------------------------------------------------
    |
    | Here we set api key and secret key that will be used to send the otp. Get your
    | credentials from https://otp.beem.africa/#!/dashboard/profile/authentication
    |
    */

    'otp_api_key'    => function_exists('env') ? env('BEEM_OTP_API_KEY', '') : '',
    'otp_secret_key' => function_exists('env') ? env('BEEM_OTP_SECRET_KEY', '') : '',

    /*
    |--------------------------------------------------------------------------
    | Beem OTP Application ID
    |--------------------------------------------------------------------------
    |
    | Here we set a application id which the otp will be requested for. Please
    | only use application id that have been registered with the platform
    |
    */

    'otp_app_id' => function_exists('env') ? env('BEEM_OTP_APP_ID', '') : '',
];
