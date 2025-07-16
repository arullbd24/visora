<?php

return [
    'server_key' => env('MIDTRANS_SERVER_KEY'),
    'client_key' => env('MIDTRANS_CLIENT_KEY'),
    'is_production' => env('MIDTRANS_IS_PRODUCTION', false),
    'sanitized' => true,
    '3ds' => true,
    'curl_options' => [
        CURLOPT_SSL_VERIFYPEER => false,
    ],

];
