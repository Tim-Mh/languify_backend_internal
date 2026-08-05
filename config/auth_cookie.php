<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Auth Token Cookie
    |--------------------------------------------------------------------------
    |
    | The httpOnly cookie used to carry the Sanctum personal access token
    | between the frontend and this API. The token itself is validated by
    | Sanctum's own guard; this cookie is just its transport.
    |
    */

    'name' => env('AUTH_COOKIE_NAME', 'access_token'),

    'expire_minutes' => (int) env('AUTH_TOKEN_EXPIRE_MINUTES', 60 * 24 * 30),

    'secure' => (bool) env('AUTH_COOKIE_SECURE', env('APP_ENV', 'production') !== 'local'),

    'same_site' => env('AUTH_COOKIE_SAME_SITE', 'lax'),

];
