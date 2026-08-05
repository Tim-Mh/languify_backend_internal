<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'key' => env('POSTMARK_API_KEY'),
    ],

    'resend' => [
        'key' => env('RESEND_API_KEY'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    // Push for the Expo builds goes out through Expo's relay, which holds the
    // FCM service account key and the APNs key (uploaded once with
    // `eas credentials`). The access token is only needed if "enhanced
    // security for push notifications" is enabled for the Expo project; unset
    // is the normal case and sends work without it.
    'expo' => [
        'access_token' => env('EXPO_ACCESS_TOKEN'),
    ],

    // Push for the bare React Native build goes straight through FCM's HTTP v1
    // API. The credential is a Firebase service account key file (Firebase
    // console → project settings → service accounts → generate new private
    // key). It ships at the project root as firebase-credentials.json — the
    // repo is private and only public/ is web-served — so a deploy needs no
    // env change; FIREBASE_CREDENTIALS overrides the path where that isn't
    // true. If the file is missing, FCM sends are skipped with a log line and
    // Expo sends still work.
    'fcm' => [
        'credentials' => env('FIREBASE_CREDENTIALS') ?: base_path('firebase-credentials.json'),
    ],

    'stripe' => [
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
        'webhook_secret' => env('STRIPE_WEBHOOK_SECRET'),
    ],

    'google' => [
        'client_id' => env('GOOGLE_CLIENT_ID'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET'),
        'redirect' => env('GOOGLE_REDIRECT_URI'),

        // The mobile app's native Google SDK signs in against a platform client
        // of its own, so the id_token it produces carries that client's ID in
        // `aud` rather than the web one. Both are listed here because
        // NativeSocialAuthController checks the audience against this list —
        // that check is what stops a token minted for somebody else's app being
        // accepted as one of ours, so an unset value here is a closed door
        // rather than an open one.
        'android_client_id' => env('GOOGLE_ANDROID_CLIENT_ID'),
        'ios_client_id' => env('GOOGLE_IOS_CLIENT_ID'),
    ],

    // client_secret is intentionally left unset — SocialiteProviders\Apple
    // generates it on the fly from team_id/key_id/private_key (a signed JWT,
    // since Apple doesn't issue a static secret the way Google does).
    'apple' => [
        'client_id' => env('APPLE_CLIENT_ID'),
        'client_secret' => env('APPLE_CLIENT_SECRET'),
        'redirect' => env('APPLE_REDIRECT_URI'),
        'team_id' => env('APPLE_TEAM_ID'),
        'key_id' => env('APPLE_KEY_ID'),
        // Either the raw multi-line .p8 contents (quoted in .env) or an
        // absolute file path — SocialiteProviders\Apple\Provider accepts both.
        'private_key' => env('APPLE_PRIVATE_KEY'),

        // The iOS app's native Sign in with Apple sheet mints its identity
        // token against the app's BUNDLE ID, not the web Services ID above.
        // NativeSocialAuthController accepts either audience; unset closes
        // the native door without affecting the web flow.
        'native_client_id' => env('APPLE_NATIVE_CLIENT_ID', 'us.languify.app'),
    ],

];
