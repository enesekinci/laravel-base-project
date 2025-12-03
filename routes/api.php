<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Base project: Only basic auth API routes
| Module routes are loaded here with API versioning
|
| API Versioning:
| - /api/v1/* - Version 1 API routes
| - Future: /api/v2/* - Version 2 API routes
|
*/

// ============================================================================
// DOMAIN MODULE API ROUTES
// ============================================================================
// Modül API route'ları burada tanımlanır. Her modül için ayrı group kullanılır.

// Auth Module API Routes
if (config('modules.enabled.auth', true)) {
    Route::prefix('v1/auth')->middleware(['api'])->group(function () {
        Route::post('/login', [\App\Domains\Auth\Controllers\LoginController::class, 'login']);
        Route::post('/register', [\App\Domains\Auth\Controllers\RegisterController::class, 'register']);
        Route::post('/logout', [\App\Domains\Auth\Controllers\LoginController::class, 'logout'])->middleware('auth:sanctum');
        Route::get('/me', [\App\Domains\Auth\Controllers\MeController::class, 'me'])->middleware('auth:sanctum');
    });
}

// Blog Module API Routes
if (config('modules.enabled.blog', true)) {
    Route::prefix('v1/blog')->middleware(['api'])->group(function () {
        // Public routes
        Route::get('/posts', [\App\Domains\Blog\Controllers\Api\PostController::class, 'index']);
        Route::get('/posts/{post}', [\App\Domains\Blog\Controllers\Api\PostController::class, 'show']);

        // Protected routes
        Route::middleware('auth:sanctum')->group(function () {
            Route::post('/posts', [\App\Domains\Blog\Controllers\Api\PostController::class, 'store']);
            Route::put('/posts/{post}', [\App\Domains\Blog\Controllers\Api\PostController::class, 'update']);
            Route::delete('/posts/{post}', [\App\Domains\Blog\Controllers\Api\PostController::class, 'destroy']);
        });
    });
}

// CMS Module API Routes
if (config('modules.enabled.cms', true)) {
    Route::prefix('v1/cms')->middleware(['api'])->group(function () {
        // Public routes
        Route::get('/pages', [\App\Domains\Cms\Controllers\Api\PageController::class, 'index']);
        Route::get('/pages/{page}', [\App\Domains\Cms\Controllers\Api\PageController::class, 'show']);
        Route::get('/menus', [\App\Domains\Cms\Controllers\Api\MenuController::class, 'index']);
        Route::get('/sliders', [\App\Domains\Cms\Controllers\Api\SliderController::class, 'index']);
    });
}

// CRM Module API Routes
if (config('modules.enabled.crm', true)) {
    Route::prefix('v1/crm')->middleware(['api', 'auth:sanctum'])->group(function () {
        Route::get('/users', [\App\Domains\Crm\Controllers\Api\UserController::class, 'index']);
        Route::get('/users/{user}', [\App\Domains\Crm\Controllers\Api\UserController::class, 'show']);
    });
}

// Media Module API Routes
if (config('modules.enabled.media', true)) {
    Route::prefix('v1/media')->middleware(['api', 'auth:sanctum'])->group(function () {
        Route::get('/files', [\App\Domains\Media\Controllers\Api\MediaFileController::class, 'index']);
        Route::post('/upload', [\App\Domains\Media\Controllers\Api\MediaFileController::class, 'upload']);
        Route::delete('/files/{mediaFile}', [\App\Domains\Media\Controllers\Api\MediaFileController::class, 'destroy']);
    });
}

// Settings Module API Routes
if (config('modules.enabled.settings', true)) {
    Route::prefix('v1/settings')->middleware(['api'])->group(function () {
        // Public routes (genel ayarlar)
        Route::get('/', [\App\Domains\Settings\Controllers\Api\SettingController::class, 'index']);

        // Protected routes
        Route::middleware('auth:sanctum')->group(function () {
            Route::post('/', [\App\Domains\Settings\Controllers\Api\SettingController::class, 'store']);
            Route::put('/{setting}', [\App\Domains\Settings\Controllers\Api\SettingController::class, 'update']);
        });
    });
}
