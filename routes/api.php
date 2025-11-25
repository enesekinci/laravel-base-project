<?php

use Illuminate\Support\Facades\Route;

// Base project: Only basic auth API routes
// Auth routes (customer) - Rate limited for brute force protection
Route::prefix('auth')->middleware('throttle:auth')->group(function () {
    Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'register']);
    Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'login']);
    Route::post('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->middleware('auth:sanctum');
    Route::get('/me', [\App\Http\Controllers\Auth\MeController::class, 'me'])->middleware('auth:sanctum');
});

// E-commerce API routes removed for base project
// Base project only includes basic authentication API
