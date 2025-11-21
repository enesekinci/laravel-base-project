<?php

namespace App\Services;

use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class ProductVariantGenerator
{
    /**
     * @param Product $product
     * @param array $options [
     *   ['option_id' => 1, 'value_ids' => [10, 11]],
     *   ['option_id' => 2, 'value_ids' => [20, 21, 22]],
     * ]
     * @param array $baseData
     * @return Collection<ProductVariant>
     */
    public function generate(Product $product, array $options, array $baseData = []): Collection
    {
        // 1) Tüm kombinasyonları çıkar (option_id + option_value_id setleri)
        $combinations = $this->cartesianProduct($options);

        if (empty($combinations)) {
            return collect();
        }

        // 2) Mevcut varyant kombinasyonlarını hashleyerek çek
        $product->loadMissing('variants.optionValues');

        $existingHashes = $product->variants->mapWithKeys(function (ProductVariant $variant) {
            $ids = $variant->optionValues->pluck('id')->sort()->values()->all();
            $hash = $this->buildCombinationHash($ids);
            return [$hash => $variant->id];
        });

        $created = collect();

        foreach ($combinations as $combo) {
            $valueIds = collect($combo)->pluck('value_id')->sort()->values()->all();
            $hash = $this->buildCombinationHash($valueIds);

            if ($existingHashes->has($hash)) {
                continue;
            }

            // 3) Variant oluştur
            $variant = $this->createVariant($product, $baseData);

            // 4) Pivot kayıtları oluştur
            foreach ($combo as $pair) {
                $variant->optionValues()->attach($pair['value_id'], [
                    'option_id' => $pair['option_id'],
                ]);
            }

            $created->push($variant);
        }

        return $created;
    }

    protected function cartesianProduct(array $options): array
    {
        if (empty($options)) {
            return [];
        }

        $result = [[]];

        foreach ($options as $opt) {
            $tmp = [];

            foreach ($result as $partial) {
                foreach ($opt['value_ids'] as $valueId) {
                    $tmp[] = array_merge($partial, [[
                        'option_id' => $opt['option_id'],
                        'value_id'  => $valueId,
                    ]]);
                }
            }

            $result = $tmp;
        }

        return $result;
    }

    protected function buildCombinationHash(array $valueIds): string
    {
        return implode('-', $valueIds);
    }

    protected function createVariant(Product $product, array $baseData): ProductVariant
    {
        $data = array_merge([
            'product_id'   => $product->id,
            'sku'          => $this->generateSku($product),
            'price'        => $product->price,
            'manage_stock' => $product->manage_stock,
            'quantity'     => 0,
            'in_stock'     => true,
            'is_active'    => true,
        ], $baseData);

        return ProductVariant::create($data);
    }

    protected function generateSku(Product $product): string
    {
        $base = $product->sku ?: Str::upper(Str::slug($product->name));
        return $base . '-' . Str::upper(Str::random(4));
    }
}
