<?php

use App\Http\Controllers\Admin\ComponentController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Auth routes (web guard) - Rate limited for brute force protection
// These routes are loaded from app/Auth/routes.php via ModuleServiceProvider
// Keeping them here for now to maintain compatibility
Route::get('/login', [\App\Http\Controllers\Auth\WebAuthController::class, 'showLogin'])->name('login');
Route::post('/login', [\App\Http\Controllers\Auth\WebAuthController::class, 'login'])->middleware('throttle:auth');
Route::get('/register', [\App\Http\Controllers\Auth\WebAuthController::class, 'showRegister'])->name('register');
Route::post('/register', [\App\Http\Controllers\Auth\WebAuthController::class, 'register'])->middleware('throttle:auth');
Route::get('/forgot-password', [\App\Http\Controllers\Auth\WebAuthController::class, 'showForgotPassword'])->name('password.forgot');
Route::post('/forgot-password', [\App\Http\Controllers\Auth\WebAuthController::class, 'sendPasswordReset'])->name('password.email')->middleware('throttle:password-reset');
Route::get('/reset-password/{token}', [\App\Http\Controllers\Auth\WebAuthController::class, 'showResetPassword'])->name('password.reset');
Route::post('/reset-password', [\App\Http\Controllers\Auth\WebAuthController::class, 'resetPassword'])->name('password.update')->middleware('throttle:password-reset');

// Logout route for web guard
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/');
})->name('logout');

// Admin Component Showcase
Route::get('/admin/components', [ComponentController::class, 'index'])->name('admin.components')->middleware(['auth', 'admin']);

// Account routes removed for base project

// Admin Web Routes (Blade views)
// Base project: Only dashboard and components showcase
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Components showcase is already defined above
});

// ============================================================================
// DOMAIN MODULE ROUTES
// ============================================================================
// Modül route'ları burada tanımlanır. Her modül için ayrı group kullanılır.

// Blog Module Routes - Admin controller'lar henüz oluşturulmadı, yorum satırına alındı
// if (config('modules.enabled.blog', true)) {
//     Route::prefix('admin/blog')->middleware(['web', 'auth', 'admin'])->group(function (): void {
//         Route::resource('posts', \App\Controllers\Blog\Admin\PostController::class);
//         Route::resource('categories', \App\Controllers\Blog\Admin\PostCategoryController::class);
//         Route::resource('tags', \App\Controllers\Blog\Admin\PostTagController::class);
//     });
// }

// CMS Module Routes - Admin controller'lar henüz oluşturulmadı, yorum satırına alındı
// if (config('modules.enabled.cms', true)) {
//     Route::prefix('admin/cms')->middleware(['web', 'auth', 'admin'])->group(function (): void {
//         Route::resource('pages', \App\Controllers\Cms\Admin\PageController::class);
//         Route::resource('menus', \App\Controllers\Cms\Admin\MenuController::class);
//         Route::resource('menus.items', \App\Controllers\Cms\Admin\MenuItemController::class);
//         Route::resource('sliders', \App\Controllers\Cms\Admin\SliderController::class);
//         Route::resource('sliders.items', \App\Controllers\Cms\Admin\SliderItemController::class);
//         Route::resource('content-blocks', \App\Controllers\Cms\Admin\ContentBlockController::class);
//     });
// }

// CRM Module Routes - Admin controller'lar henüz oluşturulmadı, yorum satırına alındı
// if (config('modules.enabled.crm', true)) {
//     Route::prefix('admin/crm')->middleware(['web', 'auth', 'admin'])->group(function (): void {
//         Route::resource('users', \App\Controllers\Crm\Admin\UserController::class);
//         Route::get('/admin-action-logs', [\App\Controllers\Crm\Admin\AdminActionLogController::class, 'index'])->name('admin-action-logs.index');
//     });
// }

// Media Module Routes - Admin controller'lar henüz oluşturulmadı, yorum satırına alındı
// if (config('modules.enabled.media', true)) {
//     Route::prefix('admin/media')->middleware(['web', 'auth', 'admin'])->group(function (): void {
//         Route::resource('files', \App\Controllers\Media\Admin\MediaFileController::class);
//         Route::post('/upload', [\App\Controllers\Media\Admin\MediaFileController::class, 'upload'])->name('media.upload');
//     });
// }

// Settings Module Routes - Admin controller'lar henüz oluşturulmadı, yorum satırına alındı
// if (config('modules.enabled.settings', true)) {
//     Route::prefix('admin/settings')->middleware(['web', 'auth', 'admin'])->group(function (): void {
//         Route::get('/', [\App\Controllers\Settings\Admin\SettingController::class, 'index'])->name('settings.index');
//         Route::post('/', [\App\Controllers\Settings\Admin\SettingController::class, 'store'])->name('settings.store');
//         Route::put('/{setting}', [\App\Controllers\Settings\Admin\SettingController::class, 'update'])->name('settings.update');
//     });
// }
