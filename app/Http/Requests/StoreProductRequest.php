<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class StoreProductRequest extends BaseFormRequest
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
            'description' => ['required', 'string'],
            'short_description' => ['required', 'string', 'max:500'],
            'brand_id' => ['required', 'exists:brands,id'],
            'tax_class_id' => ['required', 'exists:tax_classes,id'],
            'status' => ['required', 'string', Rule::in(['draft', 'published'])],
            'is_virtual' => ['nullable', 'boolean'],
            'seo_url' => ['nullable', 'string', 'max:255'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
            'new_from' => ['nullable', 'date'],
            'new_to' => ['nullable', 'date', 'after_or_equal:new_from'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'categories' => ['required', 'array', 'min:1'],
            'categories.*' => ['required', 'exists:categories,id'],
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
            'variations' => ['required', 'array', 'min:1'],
            'variations.*.variation_id' => ['required', 'integer', 'exists:variation_templates,id'],
            'variations.*.sort_order' => ['nullable', 'integer', 'min:0'],
            'variants' => ['required', 'array', 'min:1'],
            'variants.*.name' => ['required', 'string', 'max:255'],
            'variants.*.sku' => ['required', 'string', 'max:255'],
            'variants.*.barcode' => ['required', 'string', 'max:255'],
            'variants.*.price' => ['required', 'numeric', 'min:0'],
            'variants.*.stock' => ['required', 'integer', 'min:0'],
            'variants.*.image' => ['nullable', 'image', 'mimes:jpeg,jpg,png,gif,webp', 'max:2048'],
            'variants.*.variation_values' => ['required', 'array', 'min:1'],
            'variants.*.variation_values.*.variation_id' => ['required', 'integer', 'exists:variation_templates,id'],
            'variants.*.variation_values.*.variation_value_id' => ['required', 'integer', 'exists:variation_template_values,id'],
            'media' => ['nullable', 'array'],
            'media.*.file' => ['nullable', 'file', 'mimes:jpeg,jpg,png,gif,webp,mp4,avi,mov', 'max:10240'],
            'media.*.type' => ['nullable', 'string', Rule::in(['image', 'video'])],
            'media.*.path' => ['nullable', 'string'],
            'media.*.alt' => ['nullable', 'string', 'max:255'],
            'media.*.sort_order' => ['nullable', 'integer', 'min:0'],
            'links' => ['nullable', 'array'],
            'links.*.linked_product_id' => ['required', 'exists:products,id'],
            'links.*.type' => ['required', 'string', Rule::in(['up_sell', 'cross_sell', 'related'])],
        ];
    }

    /**
     * Get the Inertia component name
     */
    protected function getInertiaComponent(): ?string
    {
        return 'Admin/Products/Create';
    }

    /**
     * Get the props for the Inertia component
     */
    protected function getInertiaProps(): array
    {
        // Create sayfası için gerekli props'ları döndür
        // ProductController::create() metodundaki props'ları buraya kopyalıyoruz
        $brands = \App\Models\Brand::query()
            ->where('is_active', true)
            ->ordered()
            ->get(['id', 'name']);

        $categories = app(\App\Services\CategoryService::class)->allTree();

        $tags = \App\Models\Tag::query()
            ->where('is_active', true)
            ->orderBy('name')
            ->get(['id', 'name']);

        $taxClasses = \App\Models\TaxClass::query()
            ->where('is_active', true)
            ->orderBy('name')
            ->get(['id', 'name', 'rate']);

        $attributes = \App\Models\Attribute::query()
            ->with([
                'values' => function ($query) {
                    $query->orderBy('sort_order')->orderBy('value');
                },
                'attributeSet:id,name',
            ])
            ->active()
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get(['id', 'name', 'attribute_set_id']);

        $variations = \App\Models\VariationTemplate::query()
            ->with(['values' => function ($query) {
                $query->orderBy('sort_order')->orderBy('label');
            }])
            ->where('is_active', true)
            ->ordered()
            ->get(['id', 'name', 'type']);

        $productOptions = \App\Models\Option::query()
            ->with(['values' => function ($query) {
                $query->orderBy('sort_order')->orderBy('label');
            }])
            ->active()
            ->ordered()
            ->get(['id', 'name', 'type', 'required']);

        $variationTemplates = \App\Models\VariationTemplate::query()
            ->with(['values' => function ($query) {
                $query->orderBy('sort_order')->orderBy('label');
            }])
            ->where('is_active', true)
            ->ordered()
            ->get(['id', 'name', 'type']);

        return [
            'brands' => $brands,
            'categories' => $categories,
            'tags' => $tags,
            'taxClasses' => $taxClasses,
            'attributes' => $attributes,
            'variations' => $variations,
            'productOptions' => $productOptions,
            'variationTemplates' => $variationTemplates,
        ];
    }
}
