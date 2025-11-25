<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreMediaFileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return [
            'file' => ['required_without:files', 'file', 'max:51200'], // 50MB, tek dosya için
            'files' => ['required_without:file', 'array'],
            'files.*' => ['required', 'file', 'max:51200'], // 50MB per file, multiple files için
            // image için sınır istiyorsan: 'image' ya da 'mimes:jpg,jpeg,png,webp,avif'
            'collection' => ['nullable', 'string', 'max:255'],
            'alt' => ['nullable', 'string', 'max:255'],
            'is_private' => ['nullable', 'boolean'],
        ];
    }
}
