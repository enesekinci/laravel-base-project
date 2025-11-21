<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;

// Public API
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/search', \App\Http\Controllers\Api\ProductSearchController::class);
Route::get('/products/{product:slug}', [ProductController::class, 'show']);

// Cart API (auth required)
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/cart', [CartController::class, 'show']);
    Route::post('/cart/items', [CartController::class, 'storeItem']);
    Route::put('/cart/items/{cartItem}', [CartController::class, 'updateItem']);
    Route::delete('/cart/items/{cartItem}', [CartController::class, 'destroyItem']);

    // Checkout & Orders
    Route::post('/checkout', [\App\Http\Controllers\Api\CheckoutController::class, 'store'])
        ->name('checkout.store');
    Route::get('/orders', [\App\Http\Controllers\Api\OrderController::class, 'index'])
        ->name('orders.index');
    Route::get('/orders/{order}', [\App\Http\Controllers\Api\OrderController::class, 'show'])
        ->name('orders.show');
});

// Admin API
Route::middleware('auth:sanctum')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        // Products
        Route::get('/products', [AdminProductController::class, 'index'])->name('products.index');
        Route::get('/products/{product}', [AdminProductController::class, 'show'])->name('products.show');
        Route::post('/products', [AdminProductController::class, 'store'])->name('products.store');
        Route::put('/products/{product}', [AdminProductController::class, 'update'])->name('products.update');
        Route::delete('/products/{product}', [AdminProductController::class, 'destroy'])->name('products.destroy');
        Route::post('/products/{id}/restore', [AdminProductController::class, 'restore'])->name('products.restore');
        Route::post('/products/{product}/toggle-active', [AdminProductController::class, 'toggleActive'])->name('products.toggle-active');

        // Variants
        Route::get('/products/{product}/variants', [\App\Http\Controllers\Admin\ProductVariantController::class, 'index'])
            ->name('products.variants.index');
        Route::put('/products/{product}/variants/{variant}', [\App\Http\Controllers\Admin\ProductVariantController::class, 'update'])
            ->name('products.variants.update');
        Route::delete('/products/{product}/variants/{variant}', [\App\Http\Controllers\Admin\ProductVariantController::class, 'destroy'])
            ->name('products.variants.destroy');
        Route::post('/products/{product}/variants/generate', [\App\Http\Controllers\Admin\ProductVariantController::class, 'generate'])
            ->name('products.variants.generate');

        // Categories
        Route::get('/categories', [\App\Http\Controllers\Admin\CategoryController::class, 'index'])
            ->name('categories.index');
        Route::get('/categories/tree', [\App\Http\Controllers\Admin\CategoryController::class, 'tree'])
            ->name('categories.tree');
        Route::get('/categories/{category}', [\App\Http\Controllers\Admin\CategoryController::class, 'show'])
            ->name('categories.show');
        Route::post('/categories', [\App\Http\Controllers\Admin\CategoryController::class, 'store'])
            ->name('categories.store');
        Route::put('/categories/{category}', [\App\Http\Controllers\Admin\CategoryController::class, 'update'])
            ->name('categories.update');
        Route::delete('/categories/{category}', [\App\Http\Controllers\Admin\CategoryController::class, 'destroy'])
            ->name('categories.destroy');
        Route::post('/categories/{id}/restore', [\App\Http\Controllers\Admin\CategoryController::class, 'restore'])
            ->name('categories.restore');
        Route::post('/categories/{category}/toggle-active', [\App\Http\Controllers\Admin\CategoryController::class, 'toggleActive'])
            ->name('categories.toggle-active');

        // Options
        Route::get('/options', [\App\Http\Controllers\Admin\OptionController::class, 'index'])
            ->name('options.index');
        Route::get('/options/{option}', [\App\Http\Controllers\Admin\OptionController::class, 'show'])
            ->name('options.show');
        Route::post('/options', [\App\Http\Controllers\Admin\OptionController::class, 'store'])
            ->name('options.store');
        Route::put('/options/{option}', [\App\Http\Controllers\Admin\OptionController::class, 'update'])
            ->name('options.update');
        Route::delete('/options/{option}', [\App\Http\Controllers\Admin\OptionController::class, 'destroy'])
            ->name('options.destroy');

        // Brands
        Route::get('/brands', [\App\Http\Controllers\Admin\BrandController::class, 'index'])
            ->name('brands.index');
        Route::get('/brands/{brand}', [\App\Http\Controllers\Admin\BrandController::class, 'show'])
            ->name('brands.show');
        Route::post('/brands', [\App\Http\Controllers\Admin\BrandController::class, 'store'])
            ->name('brands.store');
        Route::put('/brands/{brand}', [\App\Http\Controllers\Admin\BrandController::class, 'update'])
            ->name('brands.update');
        Route::delete('/brands/{brand}', [\App\Http\Controllers\Admin\BrandController::class, 'destroy'])
            ->name('brands.destroy');
        Route::post('/brands/{id}/restore', [\App\Http\Controllers\Admin\BrandController::class, 'restore'])
            ->name('brands.restore');
        Route::post('/brands/{brand}/toggle-active', [\App\Http\Controllers\Admin\BrandController::class, 'toggleActive'])
            ->name('brands.toggle-active');

        // Attributes
        Route::get('/attributes', [\App\Http\Controllers\Admin\AttributeController::class, 'index'])
            ->name('attributes.index');
        Route::get('/attributes/{attribute}', [\App\Http\Controllers\Admin\AttributeController::class, 'show'])
            ->name('attributes.show');
        Route::post('/attributes', [\App\Http\Controllers\Admin\AttributeController::class, 'store'])
            ->name('attributes.store');
        Route::put('/attributes/{attribute}', [\App\Http\Controllers\Admin\AttributeController::class, 'update'])
            ->name('attributes.update');
        Route::delete('/attributes/{attribute}', [\App\Http\Controllers\Admin\AttributeController::class, 'destroy'])
            ->name('attributes.destroy');

        // Orders
        Route::get('/orders', [\App\Http\Controllers\Admin\OrderController::class, 'index'])
            ->name('orders.index');
        Route::get('/orders/{order}', [\App\Http\Controllers\Admin\OrderController::class, 'show'])
            ->name('orders.show');
        Route::put('/orders/{order}/status', [\App\Http\Controllers\Admin\OrderController::class, 'updateStatus'])
            ->name('orders.update-status');

        // Coupons
        Route::get('/coupons', [\App\Http\Controllers\Admin\CouponController::class, 'index'])
            ->name('coupons.index');
        Route::get('/coupons/{coupon}', [\App\Http\Controllers\Admin\CouponController::class, 'show'])
            ->name('coupons.show');
        Route::post('/coupons', [\App\Http\Controllers\Admin\CouponController::class, 'store'])
            ->name('coupons.store');
        Route::put('/coupons/{coupon}', [\App\Http\Controllers\Admin\CouponController::class, 'update'])
            ->name('coupons.update');
        Route::delete('/coupons/{coupon}', [\App\Http\Controllers\Admin\CouponController::class, 'destroy'])
            ->name('coupons.destroy');
        Route::post('/coupons/{id}/restore', [\App\Http\Controllers\Admin\CouponController::class, 'restore'])
            ->name('coupons.restore');
        Route::post('/coupons/{coupon}/toggle-active', [\App\Http\Controllers\Admin\CouponController::class, 'toggleActive'])
            ->name('coupons.toggle-active');

        // Shipping Methods
        Route::get('/shipping-methods', [\App\Http\Controllers\Admin\ShippingMethodController::class, 'index'])
            ->name('shipping-methods.index');
        Route::get('/shipping-methods/{shipping_method}', [\App\Http\Controllers\Admin\ShippingMethodController::class, 'show'])
            ->name('shipping-methods.show');
        Route::post('/shipping-methods', [\App\Http\Controllers\Admin\ShippingMethodController::class, 'store'])
            ->name('shipping-methods.store');
        Route::put('/shipping-methods/{shipping_method}', [\App\Http\Controllers\Admin\ShippingMethodController::class, 'update'])
            ->name('shipping-methods.update');
        Route::delete('/shipping-methods/{shipping_method}', [\App\Http\Controllers\Admin\ShippingMethodController::class, 'destroy'])
            ->name('shipping-methods.destroy');
        Route::post('/shipping-methods/{id}/restore', [\App\Http\Controllers\Admin\ShippingMethodController::class, 'restore'])
            ->name('shipping-methods.restore');
        Route::post('/shipping-methods/{shipping_method}/toggle-active', [\App\Http\Controllers\Admin\ShippingMethodController::class, 'toggleActive'])
            ->name('shipping-methods.toggle-active');

        // Payment Methods
        Route::get('/payment-methods', [\App\Http\Controllers\Admin\PaymentMethodController::class, 'index'])
            ->name('payment-methods.index');
        Route::get('/payment-methods/{payment_method}', [\App\Http\Controllers\Admin\PaymentMethodController::class, 'show'])
            ->name('payment-methods.show');
        Route::post('/payment-methods', [\App\Http\Controllers\Admin\PaymentMethodController::class, 'store'])
            ->name('payment-methods.store');
        Route::put('/payment-methods/{payment_method}', [\App\Http\Controllers\Admin\PaymentMethodController::class, 'update'])
            ->name('payment-methods.update');
        Route::delete('/payment-methods/{payment_method}', [\App\Http\Controllers\Admin\PaymentMethodController::class, 'destroy'])
            ->name('payment-methods.destroy');
        Route::post('/payment-methods/{id}/restore', [\App\Http\Controllers\Admin\PaymentMethodController::class, 'restore'])
            ->name('payment-methods.restore');
        Route::post('/payment-methods/{payment_method}/toggle-active', [\App\Http\Controllers\Admin\PaymentMethodController::class, 'toggleActive'])
            ->name('payment-methods.toggle-active');

        // Tax Classes
        Route::get('/tax-classes', [\App\Http\Controllers\Admin\TaxClassController::class, 'index'])
            ->name('tax-classes.index');
        Route::get('/tax-classes/{tax_class}', [\App\Http\Controllers\Admin\TaxClassController::class, 'show'])
            ->name('tax-classes.show');
        Route::post('/tax-classes', [\App\Http\Controllers\Admin\TaxClassController::class, 'store'])
            ->name('tax-classes.store');
        Route::put('/tax-classes/{tax_class}', [\App\Http\Controllers\Admin\TaxClassController::class, 'update'])
            ->name('tax-classes.update');
        Route::delete('/tax-classes/{tax_class}', [\App\Http\Controllers\Admin\TaxClassController::class, 'destroy'])
            ->name('tax-classes.destroy');

        // Transactions
        Route::get('/transactions', [\App\Http\Controllers\Admin\TransactionController::class, 'index'])
            ->name('transactions.index');
        Route::get('/transactions/{transaction}', [\App\Http\Controllers\Admin\TransactionController::class, 'show'])
            ->name('transactions.show');
        Route::post('/transactions', [\App\Http\Controllers\Admin\TransactionController::class, 'store'])
            ->name('transactions.store');
        Route::put('/transactions/{transaction}', [\App\Http\Controllers\Admin\TransactionController::class, 'update'])
            ->name('transactions.update');
        Route::delete('/transactions/{transaction}', [\App\Http\Controllers\Admin\TransactionController::class, 'destroy'])
            ->name('transactions.destroy');
    });
