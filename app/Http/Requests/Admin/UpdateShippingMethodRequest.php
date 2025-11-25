<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateShippingMethodRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        $id = $this->route('shipping_method')?->id ?? null;

        return [
            'name' => ['sometimes', 'required', 'string', 'max:255'],
            'code' => [
                'sometimes',
                'required',
                'string',
                'max:255',
                Rule::unique('shipping_methods', 'code')->ignore($id),
            ],
            'type' => ['sometimes', 'required', 'string', 'in:flat_rate,free_shipping,local_pickup,custom'],
            'price' => ['sometimes', 'nullable', 'numeric', 'min:0'],
            'min_cart_total' => ['sometimes', 'nullable', 'numeric', 'min:0'],
            'is_active' => ['sometimes', 'boolean'],
            'sort_order' => ['sometimes', 'nullable', 'integer', 'min:0'],
            'config' => ['sometimes', 'nullable', 'array'],
        ];
    }
}
