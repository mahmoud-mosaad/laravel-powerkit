<?php

return [

    /*
    |--------------------------------------------------------------------------
    | PowerKit Feature Modules
    |--------------------------------------------------------------------------
    | Enable or disable package modules. When enabled, their service providers
    | under src/Features/<FeatureName>/ will automatically be loaded.
    */

    'features' => [
        'payments' => true,
        'notifications' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | PowerKit Log
    |--------------------------------------------------------------------------
    | Log Channel
    */

    'log_channel' => 'stack',

];
