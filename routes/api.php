<?php

use Illuminate\Support\Facades\Route;

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
        Route::post('/login', [\App\Controllers\Auth\LoginController::class, 'login']);
        Route::post('/register', [\App\Controllers\Auth\RegisterController::class, 'register']);
        Route::post('/logout', [\App\Controllers\Auth\LoginController::class, 'logout'])->middleware('auth:sanctum');
        Route::get('/me', [\App\Controllers\Auth\MeController::class, 'me'])->middleware('auth:sanctum');
    });
}

// Blog Module API Routes - API controller'lar henüz oluşturulmadı, yorum satırına alındı
// if (config('modules.enabled.blog', true)) {
//     Route::prefix('v1/blog')->middleware(['api'])->group(function (): void {
//         // Public routes
//         Route::get('/posts', [\App\Controllers\Blog\Api\PostController::class, 'index']);
//         Route::get('/posts/{post}', [\App\Controllers\Blog\Api\PostController::class, 'show']);
//
//         // Protected routes
//         Route::middleware('auth:sanctum')->group(function (): void {
//             Route::post('/posts', [\App\Controllers\Blog\Api\PostController::class, 'store']);
//             Route::put('/posts/{post}', [\App\Controllers\Blog\Api\PostController::class, 'update']);
//             Route::delete('/posts/{post}', [\App\Controllers\Blog\Api\PostController::class, 'destroy']);
//         });
//     });
// }

// CMS Module API Routes - API controller'lar henüz oluşturulmadı, yorum satırına alındı
// if (config('modules.enabled.cms', true)) {
//     Route::prefix('v1/cms')->middleware(['api'])->group(function (): void {
//         // Public routes
//         Route::get('/pages', [\App\Controllers\Cms\Api\PageController::class, 'index']);
//         Route::get('/pages/{page}', [\App\Controllers\Cms\Api\PageController::class, 'show']);
//         Route::get('/menus', [\App\Controllers\Cms\Api\MenuController::class, 'index']);
//         Route::get('/sliders', [\App\Controllers\Cms\Api\SliderController::class, 'index']);
//     });
// }

// CRM Module API Routes - API controller'lar henüz oluşturulmadı, yorum satırına alındı
// if (config('modules.enabled.crm', true)) {
//     Route::prefix('v1/crm')->middleware(['api', 'auth:sanctum'])->group(function (): void {
//         Route::get('/users', [\App\Controllers\Crm\Api\UserController::class, 'index']);
//         Route::get('/users/{user}', [\App\Controllers\Crm\Api\UserController::class, 'show']);
//     });
// }

// Media Module API Routes - API controller'lar henüz oluşturulmadı, yorum satırına alındı
// if (config('modules.enabled.media', true)) {
//     Route::prefix('v1/media')->middleware(['api', 'auth:sanctum'])->group(function (): void {
//         Route::get('/files', [\App\Controllers\Media\Api\MediaFileController::class, 'index']);
//         Route::post('/upload', [\App\Controllers\Media\Api\MediaFileController::class, 'upload']);
//         Route::delete('/files/{mediaFile}', [\App\Controllers\Media\Api\MediaFileController::class, 'destroy']);
//     });
// }

// Settings Module API Routes - API controller'lar henüz oluşturulmadı, yorum satırına alındı
// if (config('modules.enabled.settings', true)) {
//     Route::prefix('v1/settings')->middleware(['api'])->group(function (): void {
//         // Public routes (genel ayarlar)
//         Route::get('/', [\App\Controllers\Settings\Api\SettingController::class, 'index']);
//
//         // Protected routes
//         Route::middleware('auth:sanctum')->group(function (): void {
//             Route::post('/', [\App\Controllers\Settings\Api\SettingController::class, 'store']);
//             Route::put('/{setting}', [\App\Controllers\Settings\Api\SettingController::class, 'update']);
//         });
//     });
// }
