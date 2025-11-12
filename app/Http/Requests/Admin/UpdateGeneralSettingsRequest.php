<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGeneralSettingsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'default_currency_id' => ['required', 'exists:currencies,id'],
            'product_price_includes_tax' => ['nullable', 'boolean'],
            'stock_status_enabled' => ['nullable', 'boolean'],
            'stock_quantity_enabled' => ['nullable', 'boolean'],
            'sms_package_enabled' => ['nullable', 'boolean'],
            'cart_reminder_enabled' => ['nullable', 'boolean'],
            'production_request_enabled' => ['nullable', 'boolean'],
            'product_customization_enabled' => ['nullable', 'boolean'],
            'similar_products_type' => ['nullable', 'string', 'in:category,manual'],
            'excluded_countries' => ['nullable', 'array'],
            'excluded_countries.*' => ['string'],
            'currency_shipping_fees' => ['nullable', 'array'],
            'currency_shipping_fees.*.currency_id' => ['required', 'exists:currencies,id'],
            'currency_shipping_fees.*.fee' => ['required', 'numeric', 'min:0'],
            'auto_currency_update_enabled' => ['nullable', 'boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'default_currency_id.required' => 'Varsayılan para birimi seçilmelidir.',
            'default_currency_id.exists' => 'Seçilen para birimi geçersiz.',
            'similar_products_type.in' => 'Benzer ürün türü geçersiz.',
            'currency_shipping_fees.*.currency_id.required' => 'Para birimi seçilmelidir.',
            'currency_shipping_fees.*.currency_id.exists' => 'Para birimi geçersiz.',
            'currency_shipping_fees.*.fee.required' => 'Kargo ücreti gereklidir.',
            'currency_shipping_fees.*.fee.numeric' => 'Kargo ücreti sayısal olmalıdır.',
            'currency_shipping_fees.*.fee.min' => 'Kargo ücreti 0 veya daha büyük olmalıdır.',
        ];
    }
}
