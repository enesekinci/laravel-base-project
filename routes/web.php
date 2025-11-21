<?php

use App\Http\Controllers\Admin\ActivityLogController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\AttributeSetController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MannequinController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserGroupController;
use App\Http\Controllers\Admin\VariationController;
use App\Http\Controllers\Admin\VariationTemplateController;
use App\Http\Controllers\Admin\ProductOptionController;
use App\Http\Controllers\Admin\TaxClassController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;

require __DIR__ . '/admin.php';

// Ana sayfa ve tüm template sayfaları
Route::get('{page?}', [StoreController::class, 'show'])
    ->where('page', '.*')
    ->defaults('page', 'index')
    ->name('page');

// Cart Routes (AJAX)
Route::prefix('cart')->name('cart.')->group(function () {
    Route::get('/', [App\Http\Controllers\CartController::class, 'index'])->name('index');
    Route::post('/add', [App\Http\Controllers\CartController::class, 'add'])->name('add');
    Route::post('/update', [App\Http\Controllers\CartController::class, 'update'])->name('update');
    Route::post('/remove', [App\Http\Controllers\CartController::class, 'remove'])->name('remove');
});

require __DIR__ . '/settings.php';
