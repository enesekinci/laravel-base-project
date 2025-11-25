<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class GenerateProductVariantsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'options' => ['required', 'array', 'min:1'],
            'options.*.option_id' => ['required', 'integer', 'exists:options,id'],
            'options.*.value_ids' => ['required', 'array', 'min:1'],
            'options.*.value_ids.*' => ['required', 'integer', 'exists:option_values,id'],

            'base' => ['nullable', 'array'],
            'base.price' => ['nullable', 'numeric', 'min:0'],
            'base.manage_stock' => ['nullable', 'boolean'],
            'base.quantity' => ['nullable', 'integer', 'min:0'],
        ];
    }
}
