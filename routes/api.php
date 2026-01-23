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

// FocusFlow Module API Routes
if (config('modules.enabled.focusflow', true)) {
    Route::prefix('v1')->middleware(['api', 'auth:sanctum'])->group(function (): void {
        // Todos
        Route::get('/todos', [\App\Http\Controllers\FocusFlow\Api\TodoController::class, 'index']);
        Route::post('/todos', [\App\Http\Controllers\FocusFlow\Api\TodoController::class, 'store']);
        Route::get('/todos/{todo}', [\App\Http\Controllers\FocusFlow\Api\TodoController::class, 'show']);
        Route::put('/todos/{todo}', [\App\Http\Controllers\FocusFlow\Api\TodoController::class, 'update']);
        Route::delete('/todos/{todo}', [\App\Http\Controllers\FocusFlow\Api\TodoController::class, 'destroy']);
        Route::post('/todos/{todo}/complete', [\App\Http\Controllers\FocusFlow\Api\TodoController::class, 'complete']);
        Route::post('/todos/reorder', [\App\Http\Controllers\FocusFlow\Api\TodoController::class, 'reorder']);

        // Pomodoro
        Route::get('/pomodoro/sessions', [\App\Http\Controllers\FocusFlow\Api\PomodoroController::class, 'sessions']);
        Route::post('/pomodoro/sessions', [\App\Http\Controllers\FocusFlow\Api\PomodoroController::class, 'startSession']);
        Route::post('/pomodoro/sessions/{session}/complete', [\App\Http\Controllers\FocusFlow\Api\PomodoroController::class, 'completeSession']);
        Route::get('/pomodoro/settings', [\App\Http\Controllers\FocusFlow\Api\PomodoroController::class, 'settings']);
        Route::put('/pomodoro/settings', [\App\Http\Controllers\FocusFlow\Api\PomodoroController::class, 'updateSettings']);
        Route::get('/pomodoro/today-count', [\App\Http\Controllers\FocusFlow\Api\PomodoroController::class, 'todayCount']);

        // Reminders
        Route::get('/reminders', [\App\Http\Controllers\FocusFlow\Api\ReminderController::class, 'index']);
        Route::post('/reminders', [\App\Http\Controllers\FocusFlow\Api\ReminderController::class, 'store']);
        Route::get('/reminders/{reminder}', [\App\Http\Controllers\FocusFlow\Api\ReminderController::class, 'show']);
        Route::put('/reminders/{reminder}', [\App\Http\Controllers\FocusFlow\Api\ReminderController::class, 'update']);
        Route::delete('/reminders/{reminder}', [\App\Http\Controllers\FocusFlow\Api\ReminderController::class, 'destroy']);
        Route::post('/reminders/{reminder}/complete', [\App\Http\Controllers\FocusFlow\Api\ReminderController::class, 'complete']);
        Route::post('/reminders/{reminder}/snooze', [\App\Http\Controllers\FocusFlow\Api\ReminderController::class, 'snooze']);
        Route::get('/reminders/upcoming', [\App\Http\Controllers\FocusFlow\Api\ReminderController::class, 'upcoming']);

        // Goals
        Route::get('/goals', [\App\Http\Controllers\FocusFlow\Api\GoalController::class, 'index']);
        Route::post('/goals', [\App\Http\Controllers\FocusFlow\Api\GoalController::class, 'store']);
        Route::get('/goals/{goal}', [\App\Http\Controllers\FocusFlow\Api\GoalController::class, 'show']);
        Route::put('/goals/{goal}', [\App\Http\Controllers\FocusFlow\Api\GoalController::class, 'update']);
        Route::delete('/goals/{goal}', [\App\Http\Controllers\FocusFlow\Api\GoalController::class, 'destroy']);
        Route::post('/goals/{goal}/complete', [\App\Http\Controllers\FocusFlow\Api\GoalController::class, 'complete']);

        // Dashboard
        Route::get('/dashboard', [\App\Http\Controllers\FocusFlow\Api\DashboardController::class, 'index']);

        // Statistics
        Route::get('/statistics', [\App\Http\Controllers\FocusFlow\Api\StatisticsController::class, 'index']);
        Route::get('/statistics/daily', [\App\Http\Controllers\FocusFlow\Api\StatisticsController::class, 'daily']);

        // Achievements
        Route::get('/achievements', [\App\Http\Controllers\FocusFlow\Api\AchievementController::class, 'index']);
        Route::get('/achievements/{achievement}', [\App\Http\Controllers\FocusFlow\Api\AchievementController::class, 'show']);
    });
}
