<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Feature Flags
    |--------------------------------------------------------------------------
    |
    | Feature flags allow you to enable or disable features based on
    | environment variables or configuration. This is useful for:
    | - Gradual feature rollouts
    | - A/B testing
    | - Emergency feature disabling
    | - Environment-specific features
    |
    */

    'enable_new_checkout' => env('FEATURE_NEW_CHECKOUT', false),

    'enable_payment_gateway_v2' => env('FEATURE_PAYMENT_GATEWAY_V2', false),

    'enable_advanced_search' => env('FEATURE_ADVANCED_SEARCH', true),

    'enable_product_reviews' => env('FEATURE_PRODUCT_REVIEWS', false),

    'enable_wishlist' => env('FEATURE_WISHLIST', true),

    'enable_live_chat' => env('FEATURE_LIVE_CHAT', false),

    'enable_notifications' => env('FEATURE_NOTIFICATIONS', true),

    'enable_analytics' => env('FEATURE_ANALYTICS', true),

];
