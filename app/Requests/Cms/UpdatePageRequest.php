<?php

declare(strict_types=1);

namespace App\Requests\Cms;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePageRequest extends FormRequest
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
        /** @var \App\Models\Cms\Page|null $page */
        $page = $this->route('page');
        $pageId = $page?->id;

        return [
            'title' => ['sometimes', 'required', 'string', 'max:255'],
            'slug' => ['sometimes', 'required', 'string', 'max:255', Rule::unique('pages', 'slug')->ignore($pageId)],
            'content' => ['nullable', 'string'],
            'is_active' => ['sometimes', 'boolean'],
            'show_in_footer' => ['sometimes', 'boolean'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
        ];
    }
}
