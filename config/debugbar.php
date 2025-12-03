<?php

return [

    /*
     |--------------------------------------------------------------------------
     | Debugbar Settings
     |--------------------------------------------------------------------------
     |
     | Debugbar is enabled by default, when debug is set to true in app.php.
     | You can override the value by setting enable to true or false instead of null.
     |
     | You can provide an array of URI's that must be ignored (eg. 'api/*')
     |
     */

    // Debugbar sadece development ortamında aktif olmalı
    // null = APP_DEBUG değerine göre otomatik (önerilen)
    // true/false = manuel kontrol
    // Production'da mutlaka false olmalı (güvenlik)
    'enabled' => env('DEBUGBAR_ENABLED', null),
    'hide_empty_tabs' => env('DEBUGBAR_HIDE_EMPTY_TABS', true), // Hide tabs until they have content
    'except' => [
        'telescope*',
        'horizon*',
        '_boost/browser-logs',
        // 'api/*', // API endpoint'lerinde Debugbar'ı gizle (opsiyonel)
        // Not: API route'larında Debugbar HTML inject etmez (JSON response'u bozmamak için)
        // Ancak request'leri storage'a kaydeder ve web arayüzünden görüntülenebilir
    ],

    /*
     |--------------------------------------------------------------------------
     | Storage settings
     |--------------------------------------------------------------------------
     |
     | Debugbar stores data for session/ajax requests.
     | You can disable this, so the debugbar stores data in headers/session,
     | but this can cause problems with large data collectors.
     | By default, file storage (in the storage folder) is used. Redis and PDO
     | can also be used. For PDO, run the package migrations first.
     |
     | Warning: Enabling storage.open will allow everyone to access previous
     | request, do not enable open storage in publicly available environments!
     | Specify a callback if you want to limit based on IP or authentication.
     | Leaving it to null will allow localhost only.
     */
    'storage' => [
        'enabled' => env('DEBUGBAR_STORAGE_ENABLED', true),
        // Production'da storage.open mutlaka false olmalı (güvenlik)
        // null = otomatik olarak production'da false, development'ta true
        'open' => env('DEBUGBAR_OPEN_STORAGE', null), // bool/callback.
        'driver' => env('DEBUGBAR_STORAGE_DRIVER', 'file'), // redis, file, pdo, socket, custom
        'path' => env('DEBUGBAR_STORAGE_PATH', storage_path('debugbar')), // For file driver
        'connection' => env('DEBUGBAR_STORAGE_CONNECTION', null), // Leave null for default connection (Redis/PDO)
        'provider' => env('DEBUGBAR_STORAGE_PROVIDER', ''), // Instance of StorageInterface for custom driver
        'hostname' => env('DEBUGBAR_STORAGE_HOSTNAME', '127.0.0.1'), // Hostname to use with the "socket" driver
        'port' => env('DEBUGBAR_STORAGE_PORT', 2304), // Port to use with the "socket" driver
    ],

    /*
    |--------------------------------------------------------------------------
    | Editor
    |--------------------------------------------------------------------------
    |
    | Choose your preferred editor to use when clicking file name.
    |
    | Supported: "phpstorm", "vscode", "vscode-insiders", "vscode-remote",
    |            "vscode-insiders-remote", "vscodium", "textmate", "emacs",
    |            "sublime", "atom", "nova", "macvim", "idea", "netbeans",
    |            "xdebug", "espresso"
    |
    */

    'editor' => env('DEBUGBAR_EDITOR') ?: env('IGNITION_EDITOR', 'phpstorm'),

    /*
    |--------------------------------------------------------------------------
    | Remote Path Mapping
    |--------------------------------------------------------------------------
    |
    | If you are using a remote dev server, like Laravel Homestead, Docker, or
    | even a remote VPS, it will be necessary to specify your path mapping.
    |
    | Leaving one, or both of these, empty or null will not trigger the remote
    | URL changes and Debugbar will treat your editor links as local files.
    |
    | "remote_sites_path" is an absolute base path for your sites or projects
    | in Homestead, Vagrant, Docker, or another remote development server.
    |
    | Example value: "/home/vagrant/Code"
    |
    | "local_sites_path" is an absolute base path for your sites or projects
    | on your local computer where your IDE or code editor is running on.
    |
    | Example values: "/Users/<name>/Code", "C:\Users\<name>\Documents\Code"
    |
    */

    'remote_sites_path' => env('DEBUGBAR_REMOTE_SITES_PATH'),
    'local_sites_path' => env('DEBUGBAR_LOCAL_SITES_PATH', env('IGNITION_LOCAL_SITES_PATH')),

    /*
     |--------------------------------------------------------------------------
     | Vendors
     |--------------------------------------------------------------------------
     |
     | Vendor files are included by default, but can be set to false.
     | This can also be set to 'js' or 'css', to only include javascript or css vendor files.
     | Vendor files are for css: font-awesome (including fonts) and highlight.js (css files)
     | and for js: jquery and highlight.js
     | So if you want syntax highlighting, set it to true.
     | jQuery is set to not conflict with existing jQuery scripts.
     |
     */

    'include_vendors' => true,

    /*
     |--------------------------------------------------------------------------
     | Capture Ajax Requests
     |--------------------------------------------------------------------------
     |
     | The Debugbar can capture Ajax requests and display them. If you don't want this (ie. because of errors),
     | you can use this option to disable sending the data through the headers.
     |
     | Optionally, you can also send ServerTiming headers on ajax requests for the Chrome DevTools.
     |
     | Note for your request to be identified as ajax requests they must either send the header
     | X-Requested-With with the value XMLHttpRequest (most JS libraries send this), or have application/json as a Accept header.
     |
     | By default `ajax_handler_auto_show` is set to true allowing ajax requests to be shown automatically in the Debugbar.
     | Changing `ajax_handler_auto_show` to false will prevent the Debugbar from reloading.
     |
     | You can defer loading the dataset, so it will be loaded with ajax after the request is done. (Experimental)
     */

    'capture_ajax' => true,
    'add_ajax_timing' => false,
    'ajax_handler_auto_show' => true,
    'ajax_handler_enable_tab' => true,
    'defer_datasets' => false,
    /*
     |--------------------------------------------------------------------------
     | Custom Error Handler for Deprecated warnings
     |--------------------------------------------------------------------------
     |
     | When enabled, the Debugbar shows deprecated warnings for Symfony components
     | in the Messages tab.
     |
     */
    'error_handler' => false,

    /*
     |--------------------------------------------------------------------------
     | Clockwork integration
     |--------------------------------------------------------------------------
     |
     | The Debugbar can emulate the Clockwork headers, so you can use the Chrome
     | Extension, without the server-side code. It uses Debugbar collectors instead.
     |
     */
    'clockwork' => false,

    /*
     |--------------------------------------------------------------------------
     | DataCollectors
     |--------------------------------------------------------------------------
     |
     | Enable/disable DataCollectors
     |
     */

    'collectors' => [
        // Temel collectors - çoğu zaman yeterli
        'messages' => true,         // Messages
        'time' => true,             // Time Datalogger
        'memory' => true,           // Memory usage
        'exceptions' => true,       // Exception displayer
        'log' => true,              // Logs from Monolog
        'db' => true,               // Show database queries
        'views' => true,            // Views with their data
        'symfony_request' => true,   // Request information
        'mail' => true,             // Catch mail messages
        'laravel' => true,          // Laravel version and environment
        'models' => true,           // Display models
        'gate' => true,             // Display Laravel Gate checks

        // Opsiyonel collectors - gerektiğinde aktif edilebilir
        'phpinfo' => false,
        'route' => false,
        'auth' => false,
        'session' => false,
        'events' => false,
        'default_request' => false,
        'logs' => false,
        'files' => false,
        'config' => false,
        'cache' => false,
        'livewire' => false,
        'jobs' => false,
        'pennant' => false,
    ],

    /*
     |--------------------------------------------------------------------------
     | Extra options
     |--------------------------------------------------------------------------
     |
     | Configure some DataCollectors
     |
     */

    'options' => [
        'messages' => [
            'trace' => true,  // Trace the origin of the debug message
        ],
        'db' => [
            'with_params' => true,   // Render SQL with the parameters substituted
            'backtrace' => true,     // Use a backtrace to find the origin of the query
            'show_copy' => true,     // Show copy button next to the query
            'only_slow_queries' => true, // Only track slow queries
            'slow_threshold' => false,   // Max query execution time (ms)
            'soft_limit' => 100,     // After the soft limit, no parameters/backtrace are captured
            'hard_limit' => 500,      // After the hard limit, queries are ignored
        ],
        'mail' => [
            'timeline' => true,      // Add mails to the timeline
            'show_body' => true,
        ],
        'views' => [
            'timeline' => true,      // Add the views to the timeline
            'data' => false,          // False for no parameters
            'inertia_pages' => 'js/Pages',  // Path for Inertia views
            'exclude_paths' => [
                'vendor/filament',   // Exclude Filament components by default
            ],
        ],
        'symfony_request' => [
            'label' => true,         // Show route on bar
            'hiddens' => [],         // Hides sensitive values
        ],
    ],

    /*
     |--------------------------------------------------------------------------
     | Inject Debugbar in Response
     |--------------------------------------------------------------------------
     |
     | Usually, the debugbar is added just before </body>, by listening to the
     | Response after the App is done. If you disable this, you have to add them
     | in your template yourself. See http://phpdebugbar.com/docs/rendering.html
     |
     */

    'inject' => env('DEBUGBAR_INJECT', true),

    /*
     |--------------------------------------------------------------------------
     | Debugbar route prefix
     |--------------------------------------------------------------------------
     |
     | Sometimes you want to set route prefix to be used by Debugbar to load
     | its resources from. Usually the need comes from misconfigured web server or
     | from trying to overcome bugs like this: http://trac.nginx.org/nginx/ticket/97
     |
     */
    'route_prefix' => env('DEBUGBAR_ROUTE_PREFIX', '_debugbar'),

    /*
     |--------------------------------------------------------------------------
     | Debugbar route middleware
     |--------------------------------------------------------------------------
     |
     | Additional middleware to run on the Debugbar routes
     */
    'route_middleware' => [],

    /*
     |--------------------------------------------------------------------------
     | Debugbar route domain
     |--------------------------------------------------------------------------
     |
     | By default Debugbar route served from the same domain that request served.
     | To override default domain, specify it as a non-empty value.
     */
    'route_domain' => env('DEBUGBAR_ROUTE_DOMAIN', null),

    /*
     |--------------------------------------------------------------------------
     | Debugbar theme
     |--------------------------------------------------------------------------
     |
     | Switches between light and dark theme. If set to auto it will respect system preferences
     | Possible values: auto, light, dark
     */
    'theme' => env('DEBUGBAR_THEME', 'auto'),

    /*
     |--------------------------------------------------------------------------
     | Backtrace stack limit
     |--------------------------------------------------------------------------
     |
     | By default, the Debugbar limits the number of frames returned by the 'debug_backtrace()' function.
     | If you need larger stacktraces, you can increase this number. Setting it to 0 will result in no limit.
     */
    'debug_backtrace_limit' => 50,
];
