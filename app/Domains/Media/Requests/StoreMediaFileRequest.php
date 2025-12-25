<?php

declare(strict_types=1);

namespace App\Domains\Media\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMediaFileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * @return array<string, array<int, string>>
     */
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
