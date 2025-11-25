<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class AdminProductResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'sku' => $this->sku,
            'price' => (float) $this->price,
            'special_price' => $this->special_price !== null ? (float) $this->special_price : null,
            'is_active' => (bool) $this->is_active,
            'in_stock' => (bool) $this->in_stock,
            'manage_stock' => (bool) $this->manage_stock,
            'quantity' => (int) $this->quantity,
            'description' => $this->description,
            'short_description' => $this->short_description,

            'brand' => $this->whenLoaded('brand', function () {
                return [
                    'id' => $this->brand?->id,
                    'name' => $this->brand?->name,
                ];
            }),

            'categories' => $this->whenLoaded('categories', function () {
                return $this->categories->map(fn ($cat) => [
                    'id' => $cat->id,
                    'name' => $cat->name,
                    'slug' => $cat->slug,
                ]);
            }),

            'images' => $this->whenLoaded('images', function () {
                return $this->images->map(fn ($img) => [
                    'id' => $img->id,
                    'path' => $img->path,
                    'is_base' => (bool) $img->is_base,
                    'sort_order' => (int) $img->sort_order,
                ]);
            }),

            'attributes' => $this->whenLoaded('attributes', function () {
                return $this->attributes->map(fn ($attr) => [
                    'id' => $attr->id,
                    'name' => $attr->name,
                    'slug' => $attr->slug,
                ]);
            }),

            'variants' => $this->whenLoaded('variants', function () {
                return $this->variants->map(fn ($variant) => [
                    'id' => $variant->id,
                    'sku' => $variant->sku,
                    'price' => (float) $variant->price,
                    'quantity' => (int) $variant->quantity,
                    'is_active' => (bool) $variant->is_active,
                    'option_values' => $variant->optionValues->map(fn ($ov) => [
                        'id' => $ov->id,
                        'value' => $ov->value,
                        'option' => [
                            'id' => $ov->option->id,
                            'name' => $ov->option->name,
                        ],
                    ]),
                ]);
            }),

            'options' => $this->whenLoaded('options', function () {
                return $this->options->map(fn ($opt) => [
                    'id' => $opt->id,
                    'name' => $opt->name,
                    'slug' => $opt->slug,
                ]);
            }),
        ];
    }
}
