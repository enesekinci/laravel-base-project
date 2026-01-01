<?php

use App\Http\Controllers\Admin\ComponentController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Auth routes (web guard) - Rate limited for brute force protection
// Livewire component'ler kullanılıyor, POST route'ları kaldırıldı
Route::get('/login', [\App\Http\Controllers\Auth\WebAuthController::class, 'showLogin'])->name('login');
Route::get('/register', [\App\Http\Controllers\Auth\WebAuthController::class, 'showRegister'])->name('register');
Route::get('/forgot-password', [\App\Http\Controllers\Auth\WebAuthController::class, 'showForgotPassword'])->name('password.forgot');
Route::get('/reset-password/{token}', [\App\Http\Controllers\Auth\WebAuthController::class, 'showResetPassword'])->name('password.reset');

// Logout route for web guard
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/');
})->name('logout');

// Admin Component Showcase - Livewire component
Route::get('/admin/components', \App\Livewire\Admin\ComponentsShowcase::class)->name('admin.components')->middleware(['auth', 'admin']);

// Account routes removed for base project

// Admin Web Routes (Livewire components)
// Base project: Only dashboard and components showcase
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', \App\Livewire\Admin\Dashboard::class)->name('dashboard');
    Route::get('/profile', [\App\Livewire\Admin\Profile::class])->name('profile');
    // Components showcase is already defined above
});

// ============================================================================
// DOMAIN MODULE ROUTES
// ============================================================================
// Modül route'ları burada tanımlanır. Her modül için ayrı group kullanılır.

// Blog Module Routes - Livewire components
if (config('modules.enabled.blog', true)) {
    Route::prefix('admin/blog')->middleware(['web', 'auth', 'admin'])->name('admin.blog.')->group(function (): void {
        Route::get('/posts', function () {
            return view('admin.blog.posts.index');
        })->name('posts.index');
        Route::get('/posts/create', function () {
            return view('admin.blog.posts.create');
        })->name('posts.create');
        Route::get('/posts/{id}/edit', function ($id) {
            return view('admin.blog.posts.edit', ['id' => $id]);
        })->name('posts.edit');
        // Route::resource('categories', \App\Controllers\Blog\Admin\PostCategoryController::class);
        // Route::resource('tags', \App\Controllers\Blog\Admin\PostTagController::class);
    });
}

// CMS Module Routes - Livewire components
if (config('modules.enabled.cms', true)) {
    Route::prefix('admin/cms')->middleware(['web', 'auth', 'admin'])->name('admin.cms.')->group(function (): void {
        Route::get('/pages', function () {
            return view('admin.cms.pages.index');
        })->name('pages.index');
        Route::get('/pages/create', function () {
            return view('admin.cms.pages.create');
        })->name('pages.create');
        Route::get('/pages/{id}/edit', function ($id) {
            return view('admin.cms.pages.edit', ['id' => $id]);
        })->name('pages.edit');
        // Route::resource('menus', \App\Controllers\Cms\Admin\MenuController::class);
        // Route::resource('menus.items', \App\Controllers\Cms\Admin\MenuItemController::class);
        // Route::resource('sliders', \App\Controllers\Cms\Admin\SliderController::class);
        // Route::resource('sliders.items', \App\Controllers\Cms\Admin\SliderItemController::class);
        // Route::resource('content-blocks', \App\Controllers\Cms\Admin\ContentBlockController::class);
    });
}

// CRM Module Routes - Livewire components
if (config('modules.enabled.crm', true)) {
    Route::prefix('admin/crm')->middleware(['web', 'auth', 'admin'])->name('admin.crm.')->group(function (): void {
        Route::get('/users', function () {
            return view('admin.crm.users.index');
        })->name('users.index');
        Route::get('/users/create', function () {
            return view('admin.crm.users.create');
        })->name('users.create');
        Route::get('/users/{id}/edit', function ($id) {
            return view('admin.crm.users.edit', ['id' => $id]);
        })->name('users.edit');
        // Route::get('/admin-action-logs', [\App\Controllers\Crm\Admin\AdminActionLogController::class, 'index'])->name('admin-action-logs.index');
    });
}

// Media Module Routes - Admin controller'lar henüz oluşturulmadı, yorum satırına alındı
// if (config('modules.enabled.media', true)) {
//     Route::prefix('admin/media')->middleware(['web', 'auth', 'admin'])->group(function (): void {
//         Route::resource('files', \App\Controllers\Media\Admin\MediaFileController::class);
//         Route::post('/upload', [\App\Controllers\Media\Admin\MediaFileController::class, 'upload'])->name('media.upload');
//     });
// }

// Settings Module Routes - Livewire components
if (config('modules.enabled.settings', true)) {
    Route::prefix('admin/settings')->middleware(['web', 'auth', 'admin'])->name('admin.settings.')->group(function (): void {
        Route::get('/', function () {
            return view('admin.settings.index');
        })->name('index');
    });
}
