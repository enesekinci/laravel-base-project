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
use App\Http\Controllers\PortoTemplateController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;

Route::get('/', function () {
    return Inertia::render('welcome', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('home');

require __DIR__ . '/admin.php';

// Porto Template Sayfaları
Route::prefix('porto')->name('porto.')->group(function () {
    // Tüm sayfalar için wildcard route (index dahil)
    Route::get('{page?}', [PortoTemplateController::class, 'show'])
        ->where('page', '.*')
        ->defaults('page', 'index.html')
        ->name('page');
});

Route::get('demo1', function () {
    return response()->view('porto.demo1.index', [
        "demoCss" => "demo1",
        "mainClass" => "home",
        "bodyClass" => null,
        "bodyAttributes" => null,
    ]);
});

require __DIR__ . '/settings.php';
