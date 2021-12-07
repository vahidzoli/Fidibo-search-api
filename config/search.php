<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Search services config
    |--------------------------------------------------------------------------
    |
    | This file is for storing config of services required for search
    |
    */

    'provider' => env('SEARCH_PROVIDER', 'fidiboSearchAPI'),

    'services' => [
        'fidiboSearchAPI' => [
            'class' => App\Services\Search\FidiboSearchService::class
        ]
    ],

];