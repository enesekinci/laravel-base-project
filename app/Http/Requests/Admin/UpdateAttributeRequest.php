<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAttributeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        $attributeId = $this->route('attribute')?->id ?? null;

        return [
            'attribute_set_id' => ['sometimes', 'nullable', 'integer', 'exists:attribute_sets,id'],
            'name'             => ['sometimes', 'required', 'string', 'max:255'],
            'slug'             => [
                'sometimes',
                'required',
                'string',
                'max:255',
                Rule::unique('attributes', 'slug')->ignore($attributeId),
            ],
            'type'             => ['sometimes', 'required', 'string', 'in:text,textarea,select,radio,checkbox'],
            'is_filterable'    => ['sometimes', 'boolean'],

            'values'               => ['sometimes', 'array'],
            'values.*.id'          => ['nullable', 'integer', 'exists:attribute_values,id'],
            'values.*.value'       => ['required_with:values', 'string', 'max:255'],
            'values.*.sort_order'  => ['nullable', 'integer', 'min:0'],
        ];
    }
}
