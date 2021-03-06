<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | API Keys
    |--------------------------------------------------------------------------
    |
    | You can find your API keys via the SendPulse dashboard at https://login.sendpulse.com/settings/#api
    |
    */

    'apiUserId' => env('API_USER_ID'),

    'apiSecret' => env('API_SECRET'),

    /*
    |--------------------------------------------------------------------------
    | Application Settings
    |--------------------------------------------------------------------------
    |
    */

    // Where to save the generated SendPulse API bearer token
    'tokenStorage' => 'file', //session, memcache or file
);