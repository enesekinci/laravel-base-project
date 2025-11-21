<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePaymentMethodRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        $id = $this->route('payment_method')?->id ?? null;

        return [
            'name'       => ['sometimes', 'required', 'string', 'max:255'],
            'code'       => [
                'sometimes',
                'required',
                'string',
                'max:255',
                Rule::unique('payment_methods', 'code')->ignore($id),
            ],
            'type'       => ['sometimes', 'required', 'string', 'in:online,offline'],
            'is_active'  => ['sometimes', 'boolean'],
            'sort_order' => ['sometimes', 'nullable', 'integer', 'min:0'],
            'config'     => ['sometimes', 'nullable', 'array'],
        ];
    }
}
