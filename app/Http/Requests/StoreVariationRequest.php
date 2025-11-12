<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreVariationRequest extends FormRequest
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
            'type' => ['required', 'string', Rule::in(['text', 'color', 'image'])],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
            'values' => ['nullable', 'array'],
            'values.*.label' => ['required', 'string', 'max:255'],
            'values.*.value' => ['nullable', 'string', 'max:255'],
            'values.*.color' => ['nullable', 'string', 'max:7'],
            'values.*.image' => ['nullable', 'string'],
            'values.*.sort_order' => ['nullable', 'integer', 'min:0'],
        ];
    }
}
