<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOptionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'required', 'string', 'max:255'],
            'type' => ['sometimes', 'required', 'string', 'in:select,radio,checkbox,text'],
            'values' => ['sometimes', 'array'],
            'values.*.id' => ['nullable', 'integer', 'exists:option_values,id'],
            'values.*.value' => ['required_with:values', 'string', 'max:255'],
            'values.*.sort_order' => ['nullable', 'integer', 'min:0'],
        ];
    }
}
