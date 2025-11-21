<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreCouponRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'code'   => ['required', 'string', 'max:255', 'unique:coupons,code'],
            'type'   => ['required', 'string', 'in:percent,fixed,free_shipping'],
            'value'  => ['required_if:type,percent,required_if:type,fixed', 'numeric', 'min:0'],

            'min_cart_total'       => ['nullable', 'numeric', 'min:0'],

            'usage_limit'          => ['nullable', 'integer', 'min:1'],
            'usage_limit_per_user' => ['nullable', 'integer', 'min:1'],

            'is_active'            => ['nullable', 'boolean'],

            'starts_at'            => ['nullable', 'date'],
            'ends_at'              => ['nullable', 'date', 'after_or_equal:starts_at'],
        ];
    }
}
