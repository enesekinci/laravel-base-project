<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\MannequinController;
use App\Http\Controllers\Admin\AttributeSetController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\VariationController;
use App\Http\Controllers\Admin\VariationTemplateController;
use App\Http\Controllers\Admin\ProductOptionController;
use App\Http\Controllers\Admin\TaxClassController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserGroupController;
use App\Http\Controllers\Admin\ActivityLogController;

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

    // Özellik Setleri
    Route::resource('attribute-sets', AttributeSetController::class);

    // Özellikler
    Route::resource('attributes', AttributeController::class);

    // Varyasyonlar
    Route::resource('variations', VariationController::class);
    Route::post('variations/upload-image', [VariationController::class, 'uploadImage'])->name('variations.upload-image');

    // Varyasyon Şablonları
    Route::resource('variation-templates', VariationTemplateController::class);

    // Ürün Seçenekleri
    Route::resource('options', ProductOptionController::class);

    // Vergi Sınıfları
    Route::resource('tax-classes', TaxClassController::class);

    // Ürünler
    Route::resource('products', ProductController::class);

    // Kullanıcı Yönetimi
    Route::resource('users', UserController::class);
    Route::resource('user-groups', UserGroupController::class);
    Route::get('users/activity-logs', [ActivityLogController::class, 'index'])->name('users.activity-logs');

    // Üye Yönetimi
    Route::resource('customers', \App\Http\Controllers\Admin\CustomerController::class);
    Route::resource('customer-groups', \App\Http\Controllers\Admin\CustomerGroupController::class);
    Route::resource('customer-representatives', \App\Http\Controllers\Admin\CustomerRepresentativeController::class);

    // Bildirim Yönetimi
    Route::get('notifications/history', [\App\Http\Controllers\Admin\NotificationHistoryController::class, 'index'])->name('notifications.history');
    Route::resource('email-templates', \App\Http\Controllers\Admin\EmailTemplateController::class);
    Route::resource('sms-templates', \App\Http\Controllers\Admin\SmsTemplateController::class);

    // Form Yönetimi
    Route::resource('contact-forms', \App\Http\Controllers\Admin\ContactFormController::class)->only(['index', 'show', 'update', 'destroy']);
    Route::resource('payment-notifications', \App\Http\Controllers\Admin\PaymentNotificationController::class)->only(['index', 'show', 'update', 'destroy']);
    Route::resource('newsletters', \App\Http\Controllers\Admin\NewsletterController::class)->only(['index', 'show', 'update', 'destroy']);

    // İçerik Yönetimi
    Route::resource('sliders', \App\Http\Controllers\Admin\SliderController::class);
    Route::resource('banners', \App\Http\Controllers\Admin\BannerController::class);
    Route::resource('popups', \App\Http\Controllers\Admin\PopupController::class);
    Route::get('store-settings/top-notice/edit', [\App\Http\Controllers\Admin\StoreSettingController::class, 'editTopNotice'])->name('store-settings.top-notice.edit');
    Route::put('store-settings/top-notice', [\App\Http\Controllers\Admin\StoreSettingController::class, 'updateTopNotice'])->name('store-settings.top-notice.update');
    Route::resource('faqs', \App\Http\Controllers\Admin\FaqController::class);
    Route::resource('showcases', \App\Http\Controllers\Admin\ShowcaseController::class);
    Route::resource('blogs', \App\Http\Controllers\Admin\BlogController::class);
    Route::resource('pages', \App\Http\Controllers\Admin\PageController::class);
    Route::resource('translations', \App\Http\Controllers\Admin\TranslationController::class);
    Route::resource('languages', \App\Http\Controllers\Admin\LanguageController::class);

    // Ülke ve Eyalet Yönetimi
    Route::resource('countries', \App\Http\Controllers\Admin\CountryController::class);
    Route::resource('states', \App\Http\Controllers\Admin\StateController::class);

    // Genel Ayarlar
    Route::resource('menus', \App\Http\Controllers\Admin\MenuController::class);
    Route::get('store-settings', [\App\Http\Controllers\Admin\StoreSettingController::class, 'index'])->name('store-settings.index');
    Route::put('store-settings', [\App\Http\Controllers\Admin\StoreSettingController::class, 'update'])->name('store-settings.update');
    Route::get('general-settings/edit', [\App\Http\Controllers\Admin\GeneralSettingsController::class, 'edit'])->name('general-settings.edit');
    Route::put('general-settings', [\App\Http\Controllers\Admin\GeneralSettingsController::class, 'update'])->name('general-settings.update');
    Route::get('footer-settings/edit', [\App\Http\Controllers\Admin\FooterController::class, 'edit'])->name('footer-settings.edit');
    Route::put('footer-settings', [\App\Http\Controllers\Admin\FooterController::class, 'update'])->name('footer-settings.update');
    Route::resource('payment-methods', \App\Http\Controllers\Admin\PaymentMethodController::class);
    Route::resource('currencies', \App\Http\Controllers\Admin\CurrencyController::class);
    Route::resource('integrations', \App\Http\Controllers\Admin\IntegrationController::class);
    Route::resource('shipping-methods', \App\Http\Controllers\Admin\ShippingMethodController::class);
    Route::resource('bank-accounts', \App\Http\Controllers\Admin\BankAccountController::class);

    // Araçlar
    Route::resource('redirects', \App\Http\Controllers\Admin\RedirectController::class);
    Route::resource('analytics', \App\Http\Controllers\Admin\AnalyticController::class);
    Route::resource('custom-codes', \App\Http\Controllers\Admin\CustomCodeController::class);

    // Destek Talepleri
    Route::resource('support-tickets', \App\Http\Controllers\Admin\SupportTicketController::class)->only(['index', 'show', 'update', 'destroy']);
});
