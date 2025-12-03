<?php

use App\Http\Controllers\Admin\ComponentController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Auth routes (web guard) - Rate limited for brute force protection
// These routes are loaded from app/Domains/Auth/routes.php via ModuleServiceProvider
// Keeping them here for now to maintain compatibility
Route::get('/login', [\App\Domains\Auth\Controllers\WebAuthController::class, 'showLogin'])->name('login');
Route::post('/login', [\App\Domains\Auth\Controllers\WebAuthController::class, 'login'])->middleware('throttle:auth');
Route::get('/register', [\App\Domains\Auth\Controllers\WebAuthController::class, 'showRegister'])->name('register');
Route::post('/register', [\App\Domains\Auth\Controllers\WebAuthController::class, 'register'])->middleware('throttle:auth');
Route::get('/forgot-password', [\App\Domains\Auth\Controllers\WebAuthController::class, 'showForgotPassword'])->name('password.forgot');
Route::post('/forgot-password', [\App\Domains\Auth\Controllers\WebAuthController::class, 'sendPasswordReset'])->name('password.email')->middleware('throttle:password-reset');
Route::get('/reset-password/{token}', [\App\Domains\Auth\Controllers\WebAuthController::class, 'showResetPassword'])->name('password.reset');
Route::post('/reset-password', [\App\Domains\Auth\Controllers\WebAuthController::class, 'resetPassword'])->name('password.update')->middleware('throttle:password-reset');

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

// Blog Module Routes
if (config('modules.enabled.blog', true)) {
    Route::prefix('admin/blog')->middleware(['web', 'auth', 'admin'])->group(function () {
        Route::resource('posts', \App\Domains\Blog\Controllers\Admin\PostController::class);
        Route::resource('categories', \App\Domains\Blog\Controllers\Admin\PostCategoryController::class);
        Route::resource('tags', \App\Domains\Blog\Controllers\Admin\PostTagController::class);
    });
}

// CMS Module Routes
if (config('modules.enabled.cms', true)) {
    Route::prefix('admin/cms')->middleware(['web', 'auth', 'admin'])->group(function () {
        Route::resource('pages', \App\Domains\Cms\Controllers\Admin\PageController::class);
        Route::resource('menus', \App\Domains\Cms\Controllers\Admin\MenuController::class);
        Route::resource('menus.items', \App\Domains\Cms\Controllers\Admin\MenuItemController::class);
        Route::resource('sliders', \App\Domains\Cms\Controllers\Admin\SliderController::class);
        Route::resource('sliders.items', \App\Domains\Cms\Controllers\Admin\SliderItemController::class);
        Route::resource('content-blocks', \App\Domains\Cms\Controllers\Admin\ContentBlockController::class);
    });
}

// CRM Module Routes
if (config('modules.enabled.crm', true)) {
    Route::prefix('admin/crm')->middleware(['web', 'auth', 'admin'])->group(function () {
        Route::resource('users', \App\Domains\Crm\Controllers\Admin\UserController::class);
        Route::get('/admin-action-logs', [\App\Domains\Crm\Controllers\Admin\AdminActionLogController::class, 'index'])->name('admin-action-logs.index');
    });
}

// Media Module Routes
if (config('modules.enabled.media', true)) {
    Route::prefix('admin/media')->middleware(['web', 'auth', 'admin'])->group(function () {
        Route::resource('files', \App\Domains\Media\Controllers\Admin\MediaFileController::class);
        Route::post('/upload', [\App\Domains\Media\Controllers\Admin\MediaFileController::class, 'upload'])->name('media.upload');
    });
}

// Settings Module Routes
if (config('modules.enabled.settings', true)) {
    Route::prefix('admin/settings')->middleware(['web', 'auth', 'admin'])->group(function () {
        Route::get('/', [\App\Domains\Settings\Controllers\Admin\SettingController::class, 'index'])->name('settings.index');
        Route::post('/', [\App\Domains\Settings\Controllers\Admin\SettingController::class, 'store'])->name('settings.store');
        Route::put('/{setting}', [\App\Domains\Settings\Controllers\Admin\SettingController::class, 'update'])->name('settings.update');
    });
}
