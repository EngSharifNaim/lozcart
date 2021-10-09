<?php
return [

    'sandbox_client_id' => env('PAYPAL_SANDBOX_CLIENT_ID'),
    'sandbox_secret' => env('PAYPAL_SANDBOX_SECRET'),

    'live_client_id' => env('PAYPAL_CLIENT_ID'),
    'live_secret' => env('PAYPAL_SECRET'),
    'settings' => array(
        'mode' => env('PAYPAL_MODE'),
        'http.ConnectionTimeOut' => 3000,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path() . '/logs/paypal.log',
        'log.LogLevel' => 'DEBUG'
    ),
];
