<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAttributeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'attribute_set_id' => ['nullable', 'exists:attribute_sets,id'],
            'category_ids' => ['nullable', 'array'],
            'category_ids.*' => ['exists:categories,id'],
            'is_filterable' => ['nullable', 'boolean'],
            'values' => ['nullable', 'array'],
            'values.*.value' => ['required', 'string', 'max:255'],
            'values.*.slug' => ['nullable', 'string', 'max:255'],
            'values.*.color' => ['nullable', 'string', 'max:7'],
            'values.*.image' => ['nullable', 'string'],
            'values.*.sort_order' => ['nullable', 'integer', 'min:0'],
        ];
    }
}
