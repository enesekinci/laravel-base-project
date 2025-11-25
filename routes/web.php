<?php

use App\Http\Controllers\Admin\ComponentController;
use App\Http\Controllers\Admin\ProductViewController;
use App\Http\Controllers\Admin\ViewController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\Store\HomeController::class, 'index'])->name('home');

// Auth routes (web guard) - Rate limited for brute force protection
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

Route::middleware(['auth'])->prefix('account')->name('account.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// Admin Web Routes (Blade views)
// Note: Using 'view.' prefix to avoid conflict with API routes
Route::middleware(['auth', 'admin', 'log-admin-action'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Products
    Route::get('/products', [ProductViewController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductViewController::class, 'create'])->name('products.create');
    Route::get('/products/{id}/edit', [ProductViewController::class, 'edit'])->name('products.edit');

    // Categories
    Route::get('/categories', fn () => (new ViewController)->index('categories'))->name('categories.index');
    Route::get('/categories/create', fn () => (new ViewController)->create('categories'))->name('categories.create');
    Route::get('/categories/{id}/edit', fn ($id) => (new ViewController)->edit('categories', $id))->name('categories.edit');

    // Brands
    Route::get('/brands', fn () => (new ViewController)->index('brands'))->name('brands.index');
    Route::get('/brands/create', fn () => (new ViewController)->create('brands'))->name('brands.create');
    Route::get('/brands/{id}/edit', fn ($id) => (new ViewController)->edit('brands', $id))->name('brands.edit');

    // Tags
    Route::get('/tags', fn () => (new ViewController)->index('tags'))->name('tags.index');
    Route::get('/tags/create', fn () => (new ViewController)->create('tags'))->name('tags.create');
    Route::get('/tags/{id}/edit', fn ($id) => (new ViewController)->edit('tags', $id))->name('tags.edit');

    // Attributes
    Route::get('/attributes', fn () => (new ViewController)->index('attributes'))->name('attributes.index');
    Route::get('/attributes/create', fn () => (new ViewController)->create('attributes'))->name('attributes.create');
    Route::get('/attributes/{id}/edit', fn ($id) => (new ViewController)->edit('attributes', $id))->name('attributes.edit');

    // Options
    Route::get('/options', fn () => (new ViewController)->index('options'))->name('options.index');
    Route::get('/options/create', fn () => (new ViewController)->create('options'))->name('options.create');
    Route::get('/options/{id}/edit', fn ($id) => (new ViewController)->edit('options', $id))->name('options.edit');

    // Orders
    Route::get('/orders', fn () => (new ViewController)->index('orders'))->name('orders.index');
    Route::get('/orders/{id}', fn ($id) => (new ViewController)->show('orders', $id))->name('orders.show');

    // Coupons
    Route::get('/coupons', fn () => (new ViewController)->index('coupons'))->name('coupons.index');
    Route::get('/coupons/create', fn () => (new ViewController)->create('coupons'))->name('coupons.create');
    Route::get('/coupons/{id}/edit', fn ($id) => (new ViewController)->edit('coupons', $id))->name('coupons.edit');

    // Customers
    Route::get('/customers', fn () => (new ViewController)->index('customers'))->name('customers.index');
    Route::get('/customers/{id}', fn ($id) => (new ViewController)->show('customers', $id))->name('customers.show');

    // Transactions
    Route::get('/transactions', fn () => (new ViewController)->index('transactions'))->name('transactions.index');

    // Media Library
    Route::get('/media', fn () => (new ViewController)->index('media'))->name('media.index');

    // Pages
    Route::get('/pages', fn () => (new ViewController)->index('pages'))->name('pages.index');
    Route::get('/pages/create', fn () => (new ViewController)->create('pages'))->name('pages.create');
    Route::get('/pages/{id}/edit', fn ($id) => (new ViewController)->edit('pages', $id))->name('pages.edit');

    // Blog Posts
    Route::get('/posts', fn () => (new ViewController)->index('posts'))->name('posts.index');
    Route::get('/posts/create', fn () => (new ViewController)->create('posts'))->name('posts.create');
    Route::get('/posts/{id}/edit', fn ($id) => (new ViewController)->edit('posts', $id))->name('posts.edit');

    // Blog Categories
    Route::get('/post-categories', fn () => (new ViewController)->index('post-categories'))->name('post-categories.index');
    Route::get('/post-categories/create', fn () => (new ViewController)->create('post-categories'))->name('post-categories.create');
    Route::get('/post-categories/{id}/edit', fn ($id) => (new ViewController)->edit('post-categories', $id))->name('post-categories.edit');

    // Blog Tags
    Route::get('/post-tags', fn () => (new ViewController)->index('post-tags'))->name('post-tags.index');
    Route::get('/post-tags/create', fn () => (new ViewController)->create('post-tags'))->name('post-tags.create');
    Route::get('/post-tags/{id}/edit', fn ($id) => (new ViewController)->edit('post-tags', $id))->name('post-tags.edit');

    // Menus
    Route::get('/menus', fn () => (new ViewController)->index('menus'))->name('menus.index');
    Route::get('/menus/create', fn () => (new ViewController)->create('menus'))->name('menus.create');
    Route::get('/menus/{id}', fn ($id) => (new ViewController)->show('menus', $id))->name('menus.show');

    // Sliders
    Route::get('/sliders', fn () => (new ViewController)->index('sliders'))->name('sliders.index');
    Route::get('/sliders/create', fn () => (new ViewController)->create('sliders'))->name('sliders.create');
    Route::get('/sliders/{id}', fn ($id) => (new ViewController)->show('sliders', $id))->name('sliders.show');

    // Content Blocks
    Route::get('/content-blocks', fn () => (new ViewController)->index('content-blocks'))->name('content-blocks.index');
    Route::get('/content-blocks/create', fn () => (new ViewController)->create('content-blocks'))->name('content-blocks.create');
    Route::get('/content-blocks/{id}/edit', fn ($id) => (new ViewController)->edit('content-blocks', $id))->name('content-blocks.edit');

    // Tax Classes
    Route::get('/tax-classes', fn () => (new ViewController)->index('tax-classes'))->name('tax-classes.index');
    Route::get('/tax-classes/create', fn () => (new ViewController)->create('tax-classes'))->name('tax-classes.create');
    Route::get('/tax-classes/{id}/edit', fn ($id) => (new ViewController)->edit('tax-classes', $id))->name('tax-classes.edit');

    // Shipping Methods
    Route::get('/shipping-methods', fn () => (new ViewController)->index('shipping-methods'))->name('shipping-methods.index');
    Route::get('/shipping-methods/create', fn () => (new ViewController)->create('shipping-methods'))->name('shipping-methods.create');
    Route::get('/shipping-methods/{id}/edit', fn ($id) => (new ViewController)->edit('shipping-methods', $id))->name('shipping-methods.edit');

    // Payment Methods
    Route::get('/payment-methods', fn () => (new ViewController)->index('payment-methods'))->name('payment-methods.index');
    Route::get('/payment-methods/create', fn () => (new ViewController)->create('payment-methods'))->name('payment-methods.create');
    Route::get('/payment-methods/{id}/edit', fn ($id) => (new ViewController)->edit('payment-methods', $id))->name('payment-methods.edit');

    // Settings
    Route::get('/settings', fn () => (new ViewController)->index('settings'))->name('settings.index');
});
