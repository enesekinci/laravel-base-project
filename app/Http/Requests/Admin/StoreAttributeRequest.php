<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreAttributeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'attribute_set_id' => ['nullable', 'integer', 'exists:attribute_sets,id'],
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:attributes,slug'],
            'type' => ['required', 'string', 'in:text,textarea,select,radio,checkbox'],
            'is_filterable' => ['nullable', 'boolean'],

            'values' => ['nullable', 'array'],
            'values.*.value' => ['required_with:values', 'string', 'max:255'],
            'values.*.sort_order' => ['nullable', 'integer', 'min:0'],
        ];
    }
}
