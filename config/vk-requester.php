<?php

return [

    /*
    |--------------------------------------------------------------------------
    | API Version
    |--------------------------------------------------------------------------
    |
    | Version Vkontakte API, which must be used in request.
    |
    */

    'version' => '5.53',

    /*
    |--------------------------------------------------------------------------
    | Scope
    |--------------------------------------------------------------------------
    |
    | To receive necessary permissions during authorization, fill scope
    | parameter containing names of the required permissions as array items.
    |
    | See more at: https://vk.com/dev/permissions
    |
    */

    'scope' => [
        'offline',
    ],

    /*
    |--------------------------------------------------------------------------
    | Table name
    |--------------------------------------------------------------------------
    |
    | The name of the table for temporary storage requests.
    |
    */

    'table' => 'vk_requests',

    /*
    |--------------------------------------------------------------------------
    | Delay before request
    |--------------------------------------------------------------------------
    |
    | The delay before sending the request in milliseconds.
    |
    */

    'delay' => 350,

    /*
    |--------------------------------------------------------------------------
    | Pass errors
    |--------------------------------------------------------------------------
    |
    | Pass API errors without throwing exception.
    | If false - throw VkException when an API errors occurs.
    |
    */

    'pass_error' => true,

    /*
    |--------------------------------------------------------------------------
    | Auto dispatch
    |--------------------------------------------------------------------------
    |
    | Auto dispatch of job for sending batch requests.
    |
    | When "auto_dispatch" option is false, you can manually define
    | VkRequesterGeneratorCommand command in task scheduler. Or you may pass
    | array of VkRequests to the SendBatch job and manually dispatch it.
    |
    */

    'auto_dispatch' => true,

    'connect' =>  [
        'client_id' => env('VKONTAKTE_KEY', '5523560'),
        'secret_key' => env('VKONTAKTE_SECRET', 'ALxOJTdE08wDrqas36Pt'),
        'service_key' => env('VKONTAKTE_SERVICE_KEY', '557ce824557ce824557ce824555528a04c5557c557ce8240c03ef0ac198342351fb5698'),
        'redirect_uri' => env('VKONTAKTE_REDIRECT_URI', 'http://theoreo.local/vk'),
        'code' => env('VKONTAKTE_CODE', '86622b37e4148918fd'),
    ],
];
