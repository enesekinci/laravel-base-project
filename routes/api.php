<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;

// Public API
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{product:slug}', [ProductController::class, 'show']);

// Admin API
Route::prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::post('/products', [AdminProductController::class, 'store'])->name('products.store');
        Route::put('/products/{product}', [AdminProductController::class, 'update'])->name('products.update');
        Route::delete('/products/{product}', [AdminProductController::class, 'destroy'])->name('products.destroy');
        Route::post('/products/{product}/variants/generate', [\App\Http\Controllers\Admin\ProductVariantController::class, 'generate'])
            ->name('products.variants.generate');
    });
