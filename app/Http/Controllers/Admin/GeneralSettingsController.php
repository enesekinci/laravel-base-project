<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateGeneralSettingsRequest;
use App\Models\Currency;
use App\Services\StoreSettingService;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class GeneralSettingsController extends Controller
{
    public function __construct(
        private StoreSettingService $storeSettingService
    ) {}

    public function edit(): Response
    {
        $currencies = Currency::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        // Boolean değerleri düzgün cast et
        $getBoolean = function (string $key, bool $default = false): bool {
            $value = $this->storeSettingService->get($key);
            if ($value === null) {
                return $default;
            }
            if (is_bool($value)) {
                return $value;
            }
            if (is_string($value)) {
                return in_array(strtolower($value), ['1', 'true', 'yes', 'on'], true);
            }
            return (bool) $value;
        };

        $settings = [
            'default_currency_id' => (int) $this->storeSettingService->get('default_currency_id', $currencies->where('is_default', true)->first()?->id),
            'product_price_includes_tax' => $getBoolean('product_price_includes_tax', true),
            'stock_status_enabled' => $getBoolean('stock_status_enabled', true),
            'stock_quantity_enabled' => $getBoolean('stock_quantity_enabled', false),
            'sms_package_enabled' => $getBoolean('sms_package_enabled', false),
            'cart_reminder_enabled' => $getBoolean('cart_reminder_enabled', true),
            'production_request_enabled' => $getBoolean('production_request_enabled', false),
            'product_customization_enabled' => $getBoolean('product_customization_enabled', false),
            'similar_products_type' => $this->storeSettingService->get('similar_products_type', 'category'),
            'excluded_countries' => json_decode($this->storeSettingService->get('excluded_countries', '[]'), true) ?: [],
            'currency_shipping_fees' => json_decode($this->storeSettingService->get('currency_shipping_fees', '[]'), true) ?: [],
            'auto_currency_update_enabled' => $getBoolean('auto_currency_update_enabled', false),
        ];

        $countries = get_countries_list();

        return Inertia::render('Admin/GeneralSettings/Edit', [
            'settings' => $settings,
            'currencies' => $currencies,
            'countries' => $countries,
        ]);
    }

    public function update(UpdateGeneralSettingsRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        // Basit ayarları kaydet (boolean değerleri 1/0 olarak kaydet)
        $this->storeSettingService->set('default_currency_id', (string) $validated['default_currency_id'], 'general');
        $this->storeSettingService->set('product_price_includes_tax', ($validated['product_price_includes_tax'] ?? false) ? '1' : '0', 'general');
        $this->storeSettingService->set('stock_status_enabled', ($validated['stock_status_enabled'] ?? false) ? '1' : '0', 'general');
        $this->storeSettingService->set('stock_quantity_enabled', ($validated['stock_quantity_enabled'] ?? false) ? '1' : '0', 'general');
        $this->storeSettingService->set('sms_package_enabled', ($validated['sms_package_enabled'] ?? false) ? '1' : '0', 'general');
        $this->storeSettingService->set('cart_reminder_enabled', ($validated['cart_reminder_enabled'] ?? false) ? '1' : '0', 'general');
        $this->storeSettingService->set('production_request_enabled', ($validated['production_request_enabled'] ?? false) ? '1' : '0', 'general');
        $this->storeSettingService->set('product_customization_enabled', ($validated['product_customization_enabled'] ?? false) ? '1' : '0', 'general');
        $this->storeSettingService->set('similar_products_type', $validated['similar_products_type'] ?? 'category', 'general');
        $this->storeSettingService->set('auto_currency_update_enabled', ($validated['auto_currency_update_enabled'] ?? false) ? '1' : '0', 'general');

        // Array ayarları JSON olarak kaydet
        $this->storeSettingService->set('excluded_countries', json_encode($validated['excluded_countries'] ?? []), 'general');
        $this->storeSettingService->set('currency_shipping_fees', json_encode($validated['currency_shipping_fees'] ?? []), 'general');

        return redirect()
            ->route('admin.general-settings.edit')
            ->with('success', 'Genel ayarlar başarıyla güncellendi.');
    }
}
