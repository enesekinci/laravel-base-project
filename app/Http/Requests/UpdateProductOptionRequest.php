<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductOptionRequest extends FormRequest
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
            'description' => ['nullable', 'string'],
            'type' => ['required', 'string', Rule::in([
                'field',
                'textarea', // Text
                'dropdown',
                'checkbox',
                'checkbox_custom',
                'radio',
                'radio_custom',
                'multiple_select', // Select
                'date',
                'date_time',
                'time', // Date
            ])],
            'required' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
            'values' => ['nullable', 'array'],
            'values.*.label' => ['required', 'string', 'max:255'],
            'values.*.value' => ['nullable', 'string', 'max:255'],
            'values.*.price_adjustment' => ['nullable', 'numeric'],
            'values.*.price_type' => ['nullable', 'string', Rule::in(['fixed', 'percentage'])],
            'values.*.sort_order' => ['nullable', 'integer', 'min:0'],
        ];
    }
}
