<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Modül Yapılandırması
    |--------------------------------------------------------------------------
    |
    | Bu dosya, projedeki modüllerin aktif/pasif durumunu ve yapılandırmasını
    | kontrol eder. Her modül bağımsızdır ve fork edildiğinde gereksiz modüller
    | buradan pasif edilebilir veya kodları silinebilir.
    |
    */

    'enabled' => [
        'auth' => env('MODULE_AUTH_ENABLED', true),
        'blog' => env('MODULE_BLOG_ENABLED', true),
        'cms' => env('MODULE_CMS_ENABLED', true),
        'crm' => env('MODULE_CRM_ENABLED', true),
        'media' => env('MODULE_MEDIA_ENABLED', true),
        'settings' => env('MODULE_SETTINGS_ENABLED', true),
        'ecommerce' => env('MODULE_ECOMMERCE_ENABLED', false), // Gelecekte eklenecek
        'focusflow' => env('MODULE_FOCUSFLOW_ENABLED', true),
    ],

    /*
    |--------------------------------------------------------------------------
    | Modül Namespace'leri
    |--------------------------------------------------------------------------
    |
    | Her modülün namespace'i burada tanımlanır. Bu sayede modüller arası
    | bağımlılık kontrolü yapılabilir.
    |
    */

    'namespaces' => [
        'auth' => 'App\Controllers\Auth',
        'blog' => 'App\Controllers\Blog',
        'cms' => 'App\Controllers\Cms',
        'crm' => 'App\Models\Crm',
        'media' => 'App\Models\Media',
        'settings' => 'App\Models\Settings',
        'ecommerce' => 'App\Controllers\Ecommerce',
        'focusflow' => 'App\Controllers\FocusFlow',
    ],

    /*
    |--------------------------------------------------------------------------
    | Modül Route Prefix'leri
    |--------------------------------------------------------------------------
    |
    | Her modülün route prefix'i burada tanımlanır. API versioning ile
    | birlikte kullanılır.
    |
    */

    'route_prefixes' => [
        'auth' => 'auth',
        'blog' => 'blog',
        'cms' => 'cms',
        'crm' => 'crm',
        'media' => 'media',
        'settings' => 'settings',
        'ecommerce' => 'ecommerce',
        'focusflow' => 'focusflow',
    ],

    /*
    |--------------------------------------------------------------------------
    | Modül Migration Klasörleri
    |--------------------------------------------------------------------------
    |
    | Her modülün migration dosyaları bu klasörlerde saklanır.
    |
    */

    'migration_paths' => [
        'auth' => database_path('migrations/auth'),
        'blog' => database_path('migrations/blog'),
        'cms' => database_path('migrations/cms'),
        'crm' => database_path('migrations/crm'),
        'media' => database_path('migrations/media'),
        'settings' => database_path('migrations/settings'),
        'ecommerce' => database_path('migrations/ecommerce'),
        'focusflow' => database_path('migrations/focusflow'),
    ],
];
