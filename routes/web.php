<?php

use App\Http\Controllers\Admin\ComponentController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

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

// Account routes removed for base project

// Admin Web Routes (Blade views)
// Base project: Only dashboard and components showcase
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Components showcase is already defined above
});
