<?php

declare(strict_types=1);

namespace App\Requests\Media;

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
            'file' => ['required_without:files', 'file', 'max:51200'], // 50MB
            'files' => ['required_without:file', 'array'],
            'files.*' => ['required', 'file', 'max:51200'], // 50MB per file
            'collection' => ['nullable', 'string', 'max:255'],
            'alt' => ['nullable', 'string', 'max:255'],
            'is_private' => ['nullable', 'boolean'],
        ];
    }
}
