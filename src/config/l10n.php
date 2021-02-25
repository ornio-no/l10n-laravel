<?php

return [
    /*
    |--------------------------------------------------------------------------
    | L10N Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console command to send GET request to
    | the L10N app and fetch translations for the app. You should set
    | this on your application so that it is used when running Artisan tasks.
    |
    */
    'url' => 'https://api.l10n.app/project/',

    /*
    |--------------------------------------------------------------------------
    | L10N Project Token
    |--------------------------------------------------------------------------
    |
    | This token is used by the console command to send GET request to
    | the L10N app and fetch translations for the app.
    | It is unique for each project
    |
    */
    'token' => env('L10N_TOKEN'),

    /*
    |--------------------------------------------------------------------------
    | Application Languages
    |--------------------------------------------------------------------------
    |
    | The application languages stores languages that will be used
    | by the translation service provider. You should check which
    | languages are added to the L10N app and add them here
    |
    */
    'languages' => [
        'en',
    ]
];
