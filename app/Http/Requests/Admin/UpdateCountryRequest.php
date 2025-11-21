<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCountryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $countryId = $this->route('country');

        return [
            'name' => ['required', 'string', 'max:255'],
            'code' => ['required', 'string', 'size:3', Rule::unique('countries', 'code')->ignore($countryId)],
            'iso_code' => ['nullable', 'string', 'size:2', Rule::unique('countries', 'iso_code')->ignore($countryId)],
            'is_active' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ];
    }
}
