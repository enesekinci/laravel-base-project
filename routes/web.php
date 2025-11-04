<?php

use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MannequinController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\VariationController;
use App\Http\Controllers\Admin\VariationTemplateController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;

Route::get('/', function () {
    return Inertia::render('welcome', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('home');

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');

    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard.alias');

    // Kategoriler
    Route::resource('categories', CategoryController::class);

    // Markalar
    Route::resource('brands', BrandController::class);

    // Etiketler
    Route::resource('tags', TagController::class);

    // Tedarikçiler
    Route::resource('suppliers', SupplierController::class);

    // Mankenler
    Route::resource('mannequins', MannequinController::class);

    // Özellikler
    Route::resource('attributes', AttributeController::class);

    // Varyasyonlar
    Route::resource('variations', VariationController::class);

    // Varyasyon Şablonları
    Route::resource('variation-templates', VariationTemplateController::class);
});

require __DIR__.'/settings.php';
