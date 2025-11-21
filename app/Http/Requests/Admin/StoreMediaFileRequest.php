<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreMediaFileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'file' => ['required', 'file', 'max:5120'], // 5MB, istersen arttır
            // image için sınır istiyorsan: 'image' ya da 'mimes:jpg,jpeg,png,webp,avif'
            'collection' => ['nullable', 'string', 'max:255'],
            'alt'        => ['nullable', 'string', 'max:255'],
            'is_private' => ['nullable', 'boolean'],
        ];
    }
}
