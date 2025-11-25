<?php

use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Support\Facades\Route;

// Auth routes (customer) - Rate limited for brute force protection
Route::prefix('auth')->middleware('throttle:auth')->group(function () {
    Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'register']);
    Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'login']);
    Route::post('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->middleware('auth:sanctum');
    Route::get('/me', [\App\Http\Controllers\Auth\MeController::class, 'me'])->middleware('auth:sanctum');
});

// Public API (Rate limited)
Route::middleware('throttle:api-public')->group(function () {
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/products/{product:slug}', [ProductController::class, 'show']);
});

// Search endpoint (daha sıkı rate limit)
Route::middleware('throttle:api-search')->group(function () {
    Route::get('/products/search', \App\Http\Controllers\Api\ProductSearchController::class);
});

// Cart API (auth required + rate limited)
Route::middleware(['auth:sanctum', 'throttle:api-cart'])->group(function () {
    Route::get('/cart', [CartController::class, 'show']);
    Route::post('/cart/items', [CartController::class, 'storeItem']);
    Route::put('/cart/items/{cartItem}', [CartController::class, 'updateItem']);
    Route::delete('/cart/items/{cartItem}', [CartController::class, 'destroyItem']);

    // Checkout & Orders - Fraud prevention rate limiting
    Route::post('/checkout', [\App\Http\Controllers\Api\CheckoutController::class, 'checkout'])
        ->name('checkout.store')
        ->middleware('throttle:checkout');
    Route::get('/orders', [\App\Http\Controllers\Api\OrderController::class, 'index'])
        ->name('orders.index');
    Route::get('/orders/{order}', [\App\Http\Controllers\Api\OrderController::class, 'show'])
        ->name('orders.show');
});

// Account routes (customer account management)
Route::middleware('auth:sanctum')->prefix('account')->group(function () {
    Route::get('/addresses', [\App\Http\Controllers\Api\Account\AddressController::class, 'index']);
    Route::post('/addresses', [\App\Http\Controllers\Api\Account\AddressController::class, 'store']);
    Route::put('/addresses/{address}', [\App\Http\Controllers\Api\Account\AddressController::class, 'update']);
    Route::delete('/addresses/{address}', [\App\Http\Controllers\Api\Account\AddressController::class, 'destroy']);

    Route::get('/orders', [\App\Http\Controllers\Api\Account\OrderController::class, 'index']);
    Route::get('/orders/{order}', [\App\Http\Controllers\Api\Account\OrderController::class, 'show']);
});

// Payment callbacks (public, no auth) - Detailed logging with sensitive data masking
Route::middleware('log-payment-callback')->group(function () {
    Route::post('/payment/paytr/callback', [\App\Http\Controllers\Api\Payment\PaytrCallbackController::class, 'handle']);
    Route::post('/payment/iyzico/callback', [\App\Http\Controllers\Api\Payment\IyzicoCallbackController::class, 'handle']);
});

// Admin API removed for base project
// Base project only includes dashboard and components showcase
