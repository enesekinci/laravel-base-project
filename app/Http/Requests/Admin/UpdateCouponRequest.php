<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCouponRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        $couponId = $this->route('coupon')?->id ?? null;

        return [
            'code'   => [
                'sometimes',
                'required',
                'string',
                'max:255',
                Rule::unique('coupons', 'code')->ignore($couponId),
            ],
            'type'   => ['sometimes', 'required', 'string', 'in:percent,fixed,free_shipping'],
            'value'  => ['sometimes', 'required_if:type,percent,required_if:type,fixed', 'numeric', 'min:0'],

            'min_cart_total'       => ['sometimes', 'nullable', 'numeric', 'min:0'],

            'usage_limit'          => ['sometimes', 'nullable', 'integer', 'min:1'],
            'usage_limit_per_user' => ['sometimes', 'nullable', 'integer', 'min:1'],

            'is_active'            => ['sometimes', 'boolean'],

            'starts_at'            => ['sometimes', 'nullable', 'date'],
            'ends_at'              => ['sometimes', 'nullable', 'date', 'after_or_equal:starts_at'],
        ];
    }
}
