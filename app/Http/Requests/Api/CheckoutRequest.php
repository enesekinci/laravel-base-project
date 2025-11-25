<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'coupon_code' => ['nullable', 'string', 'max:255'],
            'payment_method' => ['nullable', 'string', 'in:cod,bank_transfer,credit_card'],
            'shipping_total' => ['nullable', 'numeric', 'min:0'],
            'billing_address' => ['nullable', 'array'],
            'shipping_address' => ['nullable', 'array'],
            'customer_phone' => ['nullable', 'string', 'max:50'],
        ];
    }
}
