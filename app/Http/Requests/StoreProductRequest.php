<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:products,slug'],
            'sku' => ['required', 'string', 'max:255', 'unique:products,sku'],
            'description' => ['nullable', 'string'],
            'short_description' => ['nullable', 'string', 'max:500'],
            'brand_id' => ['nullable', 'exists:brands,id'],
            'tax_class_id' => ['nullable', 'exists:tax_classes,id'],
            'status' => ['required', 'string', Rule::in(['draft', 'published'])],
            'is_virtual' => ['nullable', 'boolean'],
            'seo_url' => ['nullable', 'string', 'max:255'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
            'new_from' => ['nullable', 'date'],
            'new_to' => ['nullable', 'date', 'after_or_equal:new_from'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'categories' => ['nullable', 'array'],
            'categories.*' => ['exists:categories,id'],
            'tags' => ['nullable', 'array'],
            'tags.*' => ['exists:tags,id'],
            'attributes' => ['nullable', 'array'],
            'attributes.*.attribute_id' => ['required', 'exists:attributes,id'],
            'attributes.*.value' => ['nullable', 'string'],
            'attributes.*.attribute_value_id' => ['nullable', 'exists:attribute_values,id'],
            'options' => ['nullable', 'array'],
            'options.*' => ['exists:product_options,id'],
            'variation_ids' => ['nullable', 'array'],
            'variation_ids.*.variation_id' => ['required', 'exists:variations,id'],
            'variation_ids.*.variation_value_ids' => ['nullable', 'array'],
            'variation_ids.*.variation_value_ids.*' => ['exists:variation_values,id'],
            'variants' => ['nullable', 'array'],
            'variants.*.name' => ['required', 'string', 'max:255'],
            'variants.*.sku' => ['nullable', 'string', 'max:255'],
            'variants.*.price' => ['nullable', 'numeric', 'min:0'],
            'variants.*.stock' => ['nullable', 'integer', 'min:0'],
            'variants.*.variation_values' => ['required', 'array'],
            'variants.*.variation_values.*.variation_id' => ['required', 'exists:variations,id'],
            'variants.*.variation_values.*.variation_value_id' => ['required', 'exists:variation_values,id'],
            'media' => ['nullable', 'array'],
            'media.*.type' => ['required', 'string', Rule::in(['image', 'video'])],
            'media.*.path' => ['required', 'string'],
            'media.*.alt' => ['nullable', 'string', 'max:255'],
            'media.*.sort_order' => ['nullable', 'integer', 'min:0'],
            'links' => ['nullable', 'array'],
            'links.*.linked_product_id' => ['required', 'exists:products,id'],
            'links.*.type' => ['required', 'string', Rule::in(['up_sell', 'cross_sell', 'related'])],
        ];
    }
}
