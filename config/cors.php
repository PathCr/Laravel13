<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    'paths' => ['api/*', 'sanctum/csrf-cookie'], // CORS-заголовки применяются ко всем путям

    'allowed_methods' => ['*'], // Разрешены все HTTP методы

    'allowed_origins' => ['*'], // Разрешены запросы с любого домена

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'], // Разрешены любые заголовки в запросе

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,

];
