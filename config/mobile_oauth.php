<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Mobile OAuth Redirect
    |--------------------------------------------------------------------------
    |
    | The React Native app cannot read the httpOnly auth cookie the SPA relies
    | on, so it asks the Google/Apple callback to redirect back into the app
    | carrying the Sanctum token instead. The app supplies that redirect target
    | itself, which means it is attacker-controllable input and MUST be
    | validated: without a whitelist this is a textbook open redirect that hands
    | a valid session token to whoever crafted the URL.
    |
    | Only these URI schemes are ever redirected to. `languify` is the app's own
    | scheme (see `scheme` in the mobile app.json). The Expo schemes are what
    | Expo Go uses during development, where the app has no custom scheme of its
    | own yet, so they are only permitted outside production.
    |
    */

    'allowed_schemes' => array_values(array_filter(array_merge(
        ['languify'],
        env('APP_ENV') === 'production' ? [] : ['exp', 'exp+languify'],
    ))),

];
