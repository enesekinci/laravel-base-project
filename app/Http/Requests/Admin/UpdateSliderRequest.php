<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSliderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        $sliderId = $this->route('slider')?->id ?? null;

        return [
            'name'       => ['sometimes', 'required', 'string', 'max:255'],
            'code'       => ['sometimes', 'required', 'string', 'max:255', Rule::unique('sliders', 'code')->ignore($sliderId)],
            'is_active'  => ['sometimes', 'boolean'],
            'sort_order' => ['sometimes', 'integer', 'min:0'],
        ];
    }
}
