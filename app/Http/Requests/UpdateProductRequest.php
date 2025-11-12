<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class UpdateProductRequest extends BaseFormRequest
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
        $productId = $this->route('product')->id ?? null;

        return [
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', Rule::unique('products', 'slug')->ignore($productId)],
            'sku' => ['required', 'string', 'max:255', Rule::unique('products', 'sku')->ignore($productId)],
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
            'options.*.option_id' => ['required', 'exists:options,id'],
            'options.*.values' => ['required', 'array'],
            'options.*.values.*.label' => ['required', 'string', 'max:255'],
            'options.*.values.*.value' => ['nullable', 'string', 'max:255'],
            'options.*.values.*.price_adjustment' => ['required', 'numeric', 'min:0'],
            'options.*.values.*.price_type' => ['required', 'string', Rule::in(['fixed', 'percentage'])],
            'options.*.values.*.sort_order' => ['nullable', 'integer', 'min:0'],
            'variations' => ['nullable', 'array'],
            'variations.*.variation_id' => ['required', 'integer', 'exists:variation_templates,id'],
            'variations.*.sort_order' => ['nullable', 'integer', 'min:0'],
            'variants' => ['nullable', 'array'],
            'variants.*.name' => ['required', 'string', 'max:255'],
            'variants.*.sku' => ['required', 'string', 'max:255'],
            'variants.*.barcode' => ['nullable', 'string', 'max:255'],
            'variants.*.price' => ['required', 'numeric', 'min:0'],
            'variants.*.stock' => ['required', 'integer', 'min:0'],
            'variants.*.is_active' => ['nullable', 'boolean'],
            'variants.*.image' => ['nullable', 'image', 'mimes:jpeg,jpg,png,gif,webp', 'max:2048'],
            'variants.*.variation_values' => ['required', 'array', 'min:1'],
            'variants.*.variation_values.*.variation_id' => ['required', 'integer', 'exists:variation_templates,id'],
            'variants.*.variation_values.*.variation_value_id' => ['required', 'integer', 'exists:variation_template_values,id'],
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
