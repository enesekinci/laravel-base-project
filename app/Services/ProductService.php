<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductService
{
    /**
     * Ürünleri listele
     */
    public function list(array $filters = []): LengthAwarePaginator
    {
        $query = Product::query()
            ->with(['brand', 'taxClass', 'categories'])
            ->ordered();

        if (isset($filters['search'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('name', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('sku', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('slug', 'like', '%' . $filters['search'] . '%');
            });
        }

        if (isset($filters['status'])) {
            $query->where('status', $filters['status']);
        }

        if (isset($filters['brand_id'])) {
            $query->where('brand_id', $filters['brand_id']);
        }

        return $query->paginate($filters['per_page'] ?? 15);
    }

    /**
     * Ürün oluştur
     */
    public function create(array $data): Product
    {
        $categories = $data['categories'] ?? [];
        $tags = $data['tags'] ?? [];
        $attributes = $data['attributes'] ?? [];
        $options = $data['options'] ?? [];
        $variations = $data['variations'] ?? [];
        $media = $data['media'] ?? [];
        $links = $data['links'] ?? [];

        unset(
            $data['categories'],
            $data['tags'],
            $data['attributes'],
            $data['options'],
            $data['variations'],
            $data['media'],
            $data['links']
        );

        $product = Product::create($data);

        if (!empty($categories)) {
            $product->categories()->attach($categories);
        }

        if (!empty($tags)) {
            $product->tags()->attach($tags);
        }

        if (!empty($attributes)) {
            foreach ($attributes as $attribute) {
                $product->attributes()->attach($attribute['attribute_id'], [
                    'value' => $attribute['value'] ?? null,
                    'attribute_value_id' => $attribute['attribute_value_id'] ?? null,
                ]);
            }
        }

        if (!empty($options)) {
            $product->options()->attach($options);
        }

        if (!empty($variations)) {
            foreach ($variations as $variationData) {
                $variation = $product->variations()->create($variationData);
                if (isset($variationData['values'])) {
                    $variation->values()->attach($variationData['values']);
                }
            }
        }

        if (!empty($media)) {
            $product->media()->createMany($media);
        }

        if (!empty($links)) {
            $product->links()->createMany($links);
        }

        return $product->load([
            'brand',
            'taxClass',
            'categories',
            'tags',
            'attributes',
            'variations',
            'options',
            'media',
            'links',
        ]);
    }

    /**
     * Ürün güncelle
     */
    public function update(Product $product, array $data): Product
    {
        $categories = $data['categories'] ?? [];
        $tags = $data['tags'] ?? [];
        $attributes = $data['attributes'] ?? [];
        $options = $data['options'] ?? [];
        $variations = $data['variations'] ?? [];
        $media = $data['media'] ?? [];
        $links = $data['links'] ?? [];

        unset(
            $data['categories'],
            $data['tags'],
            $data['attributes'],
            $data['options'],
            $data['variations'],
            $data['media'],
            $data['links']
        );

        $product->update($data);

        if (isset($categories)) {
            $product->categories()->sync($categories);
        }

        if (isset($tags)) {
            $product->tags()->sync($tags);
        }

        if (isset($attributes)) {
            $product->attributes()->detach();
            foreach ($attributes as $attribute) {
                $product->attributes()->attach($attribute['attribute_id'], [
                    'value' => $attribute['value'] ?? null,
                    'attribute_value_id' => $attribute['attribute_value_id'] ?? null,
                ]);
            }
        }

        if (isset($options)) {
            $product->options()->sync($options);
        }

        if (isset($variations)) {
            $product->variations()->delete();
            foreach ($variations as $variationData) {
                $variation = $product->variations()->create($variationData);
                if (isset($variationData['values'])) {
                    $variation->values()->attach($variationData['values']);
                }
            }
        }

        if (isset($media)) {
            $product->media()->delete();
            $product->media()->createMany($media);
        }

        if (isset($links)) {
            $product->links()->delete();
            $product->links()->createMany($links);
        }

        return $product->fresh([
            'brand',
            'taxClass',
            'categories',
            'tags',
            'attributes',
            'variations',
            'options',
            'media',
            'links',
        ]);
    }

    /**
     * Ürün sil
     */
    public function delete(Product $product): bool
    {
        return $product->delete();
    }
}
