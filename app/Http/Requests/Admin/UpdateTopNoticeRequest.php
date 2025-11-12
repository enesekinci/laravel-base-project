<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTopNoticeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'text' => ['required', 'string', 'max:500'],
            'links' => ['nullable', 'array'],
            'links.*.label' => ['required_with:links', 'string', 'max:100'],
            'links.*.url' => ['required_with:links', 'string', 'max:255'],
            'footer_text' => ['nullable', 'string', 'max:200'],
            'is_active' => ['nullable', 'boolean'],
            'background_color' => ['nullable', 'string', 'max:50'],
            'text_color' => ['nullable', 'string', 'max:50'],
        ];
    }

    public function messages(): array
    {
        return [
            'text.required' => 'Ana metin gereklidir.',
            'text.max' => 'Ana metin en fazla 500 karakter olabilir.',
            'links.*.label.required_with' => 'Link etiketi gereklidir.',
            'links.*.label.max' => 'Link etiketi en fazla 100 karakter olabilir.',
            'links.*.url.required_with' => 'Link URL gereklidir.',
            'links.*.url.max' => 'Link URL en fazla 255 karakter olabilir.',
            'footer_text.max' => 'Alt metin en fazla 200 karakter olabilir.',
        ];
    }
}

