<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreSliderItemRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'media_file_id' => ['nullable', 'exists:media_files,id'],
            'title'         => ['nullable', 'string', 'max:255'],
            'subtitle'      => ['nullable', 'string', 'max:255'],
            'button_text'   => ['nullable', 'string', 'max:255'],
            'button_url'    => ['nullable', 'string', 'max:255'],
            'link_url'      => ['nullable', 'string', 'max:255'],
            'sort_order'    => ['nullable', 'integer', 'min:0'],
            'is_active'     => ['nullable', 'boolean'],
            'meta'          => ['nullable', 'array'],
        ];
    }
}
