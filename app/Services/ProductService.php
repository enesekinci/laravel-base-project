<?php

namespace App\Services;

use App\Events\ProductTranslated;
use App\Models\Product;
use App\Models\ProductVariation;
use App\Models\ProductVariationValue;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;

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
        $variants = $data['variants'] ?? [];
        $media = $data['media'] ?? [];
        $links = $data['links'] ?? [];

        // dd('variants', $variants);

        $product = Product::create([
            'name' => $data['name'],
            'slug' => $data['slug'],
            'sku' => $data['sku'],
            'description' => $data['description'],
            'short_description' => $data['short_description'],
            'brand_id' => $data['brand_id'],
            'tax_class_id' => $data['tax_class_id'],
            'status' => $data['status'],
            'is_virtual' => $data['is_virtual'],
            'seo_url' => $data['seo_url'],
            'meta_title' => $data['meta_title'],
            'meta_description' => $data['meta_description'],
            'new_from' => $data['new_from'],
            'new_to' => $data['new_to'],
            'sort_order' => $data['sort_order'],
        ]);


        if (!empty($categories)) {
            $product->categories()->attach($categories);
        }

        // dd(__LINE__, Product::all()->toArray());


        if (!empty($tags)) {
            $product->tags()->attach($tags);
        }

        // dd(__LINE__, Product::all()->toArray());


        if (!empty($attributes)) {
            foreach ($attributes as $attribute) {
                $product->attributes()->attach($attribute['attribute_id'], [
                    'value' => $attribute['value'] ?? null,
                    'attribute_value_id' => $attribute['attribute_value_id'] ?? null,
                ]);
            }
        }

        // dd(__LINE__, Product::all()->toArray());

        // Product Options - product_option_values tablosuna kaydedilir
        if (!empty($options)) {
            foreach ($options as $optionData) {
                $optionId = $optionData['option_id'] ?? $optionData['id'] ?? null;
                if (!$optionId) {
                    continue;
                }

                $values = $optionData['values'] ?? [];
                foreach ($values as $value) {
                    \App\Models\ProductOptionValue::create([
                        'product_id' => $product->id,
                        'option_id' => $optionId,
                        'label' => $value['label'] ?? '',
                        'value' => $value['value'] ?? null,
                        'price_adjustment' => $value['price_adjustment'] ?? 0,
                        'price_type' => $value['price_type'] ?? 'fixed',
                        'sort_order' => $value['sort_order'] ?? 0,
                    ]);
                }
            }
        }

        // Product Variation Templates - product_variation_templates tablosuna kaydedilir
        if (!empty($variations)) {
            foreach ($variations as $index => $variationData) {
                $variationTemplateId = $variationData['variation_id'] ?? null;
                if (!$variationTemplateId || $variationTemplateId === 0) {
                    continue;
                }

                \App\Models\ProductVariationTemplate::create([
                    'product_id' => $product->id,
                    'variation_template_id' => $variationTemplateId,
                    'sort_order' => $variationData['sort_order'] ?? $index,
                ]);
            }
        } else {
            // Eğer variations boşsa ama variants varsa, variants'tan variation template'leri çıkar
            if (!empty($variants)) {
                $uniqueTemplateIds = [];
                foreach ($variants as $variant) {
                    if (isset($variant['variation_values']) && is_array($variant['variation_values'])) {
                        foreach ($variant['variation_values'] as $vv) {
                            $templateId = $vv['variation_id'] ?? null;
                            if ($templateId && !in_array($templateId, $uniqueTemplateIds)) {
                                $uniqueTemplateIds[] = $templateId;
                            }
                        }
                    }
                }

                // Unique template ID'lerini product_variation_templates tablosuna ekle
                foreach ($uniqueTemplateIds as $index => $templateId) {
                    \App\Models\ProductVariationTemplate::create([
                        'product_id' => $product->id,
                        'variation_template_id' => $templateId,
                        'sort_order' => $index,
                    ]);
                }
            }
        }

        // Product Variants (kombinasyonlar) - ProductVariation tablosuna kaydedilir

        // dd($variants[0]);

        foreach ($variants ?? [] as $variant) {

            $imagePath = null;

            if (isset($variant['image']) && $variant['image'] instanceof \Illuminate\Http\UploadedFile) {
                $imagePath = $variant['image']->store('product-variations', 'public');
            } elseif (isset($variant['image']) && is_string($variant['image'])) {
                $imagePath = $variant['image'];
            }

            $variation = ProductVariation::create([
                'product_id' => $product->id,
                'name' => $variant['name'],
                'sku' => $variant['sku'],
                'price' => $variant['price'],
                'stock' => $variant['stock'],
                'barcode' => $variant['barcode'],
                'image' => $imagePath,
                'is_active' => $variant['is_active'] ?? true,
            ]);

            foreach ($variant['variation_values'] as $variationValue) {
                /* dd([
                    'data' => [
                        'product_variation_id' => $variation->id,
                        'variation_template_id' => $variationValue['variation_id'],
                        'variation_template_value_id' => $variationValue['variation_value_id'],
                    ],
                    'variation_template' => Variation::find($variationValue['variation_id'])?->toArray(),
                    'variation_template_value' => VariationValue::find($variationValue['variation_value_id'])?->toArray(),
                ]); */
                ProductVariationValue::create([
                    'product_variation_id' => $variation->id,
                    'variation_template_id' => $variationValue['variation_id'],
                    'variation_template_value_id' => $variationValue['variation_value_id'],
                ]);
            }

            // dd(['values' => ProductVariationValue::all()->toArray()]);
        }

        $mediaData = [];
        foreach ($media ?? [] as $index => $item) {
            $path = null;
            $type = 'image';

            // Inertia.js ile gelen file'ları request'ten al
            // Inertia.js nested array'lerde file'ları 'media.0.file' formatında gönderir
            $file = request()->file("media.{$index}.file");

            // Eğer file varsa upload et
            if ($file && $file->isValid()) {
                $path = $file->store('product-media', 'public');
                $mimeType = $file->getMimeType();
                $type = $mimeType && str_starts_with($mimeType, 'image/') ? 'image' : 'video';
            } elseif (isset($item['path']) && is_string($item['path']) && !empty($item['path'])) {
                // Eğer path string olarak geliyorsa (mevcut media)
                $path = $item['path'];
                $type = $item['type'] ?? 'image';
            }

            if ($path) {
                $mediaData[] = [
                    'type' => $type,
                    'path' => $path,
                    'alt' => $item['alt'] ?? null,
                    'sort_order' => $item['sort_order'] ?? $index,
                ];
            }
        }

        if (!empty($mediaData)) {
            $product->media()->createMany($mediaData);
        }

        // dd(__LINE__, Product::all()->toArray());

        if (!empty($links)) {
            $product->links()->createMany($links);
        }

        // dd(__LINE__, Product::all()->toArray());

        $product->load([
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

        // dd(__LINE__, Product::all()->toArray());

        // Çeviri eventini tetikle
        event(new ProductTranslated($product));

        // dd(
        //     Product::all()->toArray()
        // );

        return $product;
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
        $variationIds = $data['variation_ids'] ?? [];
        $variants = $data['variants'] ?? [];
        $media = $data['media'] ?? [];
        $links = $data['links'] ?? [];

        unset(
            $data['categories'],
            $data['tags'],
            $data['attributes'],
            $data['options'],
            $data['variations'],
            $data['variation_ids'],
            $data['variants'],
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

        // Product Options - product_option_values tablosuna kaydedilir
        if (isset($options)) {
            // Önce mevcut option values'ları sil
            $product->optionValues()->delete();

            // Yeni option values'ları ekle
            foreach ($options as $optionData) {
                $optionId = $optionData['option_id'] ?? $optionData['id'] ?? null;
                if (!$optionId) {
                    continue;
                }

                $values = $optionData['values'] ?? [];
                foreach ($values as $value) {
                    \App\Models\ProductOptionValue::create([
                        'product_id' => $product->id,
                        'option_id' => $optionId,
                        'label' => $value['label'] ?? '',
                        'value' => $value['value'] ?? null,
                        'price_adjustment' => $value['price_adjustment'] ?? 0,
                        'price_type' => $value['price_type'] ?? 'fixed',
                        'sort_order' => $value['sort_order'] ?? 0,
                    ]);
                }
            }
        }

        // Product Variation Templates - product_variation_templates tablosuna kaydedilir
        // Debug: variations kontrolü
        Log::info('ProductService::update - variations:', ['variations' => $variations, 'variations_count' => is_array($variations) ? count($variations) : 0]);

        if (isset($variations) && !empty($variations)) {
            // Önce mevcut variation templates'leri sil
            $product->variationTemplates()->delete();

            // Yeni variation templates'leri ekle
            foreach ($variations as $index => $variationData) {
                $variationTemplateId = $variationData['variation_id'] ?? null;
                Log::info('ProductService::update - processing variation:', [
                    'index' => $index,
                    'variationData' => $variationData,
                    'variationTemplateId' => $variationTemplateId,
                ]);

                if (!$variationTemplateId || $variationTemplateId === 0) {
                    Log::warning('ProductService::update - skipping variation (invalid ID):', ['variationData' => $variationData]);
                    continue;
                }

                \App\Models\ProductVariationTemplate::create([
                    'product_id' => $product->id,
                    'variation_template_id' => $variationTemplateId,
                    'sort_order' => $variationData['sort_order'] ?? $index,
                ]);
                Log::info('ProductService::update - created ProductVariationTemplate:', [
                    'product_id' => $product->id,
                    'variation_template_id' => $variationTemplateId,
                    'sort_order' => $variationData['sort_order'] ?? $index,
                ]);
            }
        } elseif (isset($variants) && !empty($variants)) {
            // Eğer variations boşsa ama variants varsa, variants'tan variation template'leri çıkar
            $uniqueTemplateIds = [];
            foreach ($variants as $variant) {
                if (isset($variant['variation_values']) && is_array($variant['variation_values'])) {
                    foreach ($variant['variation_values'] as $vv) {
                        $templateId = $vv['variation_id'] ?? null;
                        if ($templateId && !in_array($templateId, $uniqueTemplateIds)) {
                            $uniqueTemplateIds[] = $templateId;
                        }
                    }
                }
            }

            // Eğer unique template ID'leri varsa, variation templates'leri güncelle
            if (!empty($uniqueTemplateIds)) {
                // Önce mevcut variation templates'leri sil
                $product->variationTemplates()->delete();

                // Unique template ID'lerini product_variation_templates tablosuna ekle
                foreach ($uniqueTemplateIds as $index => $templateId) {
                    \App\Models\ProductVariationTemplate::create([
                        'product_id' => $product->id,
                        'variation_template_id' => $templateId,
                        'sort_order' => $index,
                    ]);
                }
            }
        }

        // Product Variants (kombinasyonlar) - ProductVariation tablosuna kaydedilir
        // SKU koruma mantığı: Mevcut variant'ları SKU ile eşleştir, varsa güncelle, yoksa oluştur
        if (isset($variants) && !empty($variants)) {
            // Mevcut variant'ları SKU'ya göre index'le
            $existingVariantsBySku = [];
            foreach ($product->variations as $existingVariant) {
                if ($existingVariant->sku) {
                    $existingVariantsBySku[$existingVariant->sku] = $existingVariant;
                }
            }

            // Kullanılmayan variant'ları soft delete yapmak için kullanılan SKU'ları topla
            $usedSkus = [];

            foreach ($variants as $variantData) {
                $variationValues = $variantData['variation_values'] ?? [];
                $sku = $variantData['sku'] ?? null;
                unset($variantData['variation_values']);

                // SKU ile mevcut variant'ı bul
                $existingVariant = null;
                if ($sku && isset($existingVariantsBySku[$sku])) {
                    $existingVariant = $existingVariantsBySku[$sku];
                    $usedSkus[] = $sku;
                }

                if ($existingVariant) {
                    // Mevcut variant'ı güncelle (SKU, fiyat, stok vb. korunur)
                    $existingVariant->update($variantData);

                    // Variation values'ları güncelle - önce mevcut olanları sil
                    $existingVariant->values()->delete();

                    // Yeni variation values'ları ekle
                    if (!empty($variationValues)) {
                        foreach ($variationValues as $vv) {
                            $variationTemplateValueId = $vv['variation_value_id'] ?? null;
                            $variationTemplateId = $vv['variation_id'] ?? null;

                            if ($variationTemplateValueId && $variationTemplateId) {
                                ProductVariationValue::create([
                                    'product_variation_id' => $existingVariant->id,
                                    'variation_template_id' => $variationTemplateId,
                                    'variation_template_value_id' => $variationTemplateValueId,
                                ]);
                            }
                        }
                    }
                } else {
                    // Yeni variant oluştur
                    $variant = $product->variations()->create($variantData);
                    if ($sku) {
                        $usedSkus[] = $sku;
                    }

                    // Variation values'ları ProductVariationValue tablosuna ekle
                    if (!empty($variationValues)) {
                        foreach ($variationValues as $vv) {
                            $variationTemplateValueId = $vv['variation_value_id'] ?? null;
                            $variationTemplateId = $vv['variation_id'] ?? null;

                            if ($variationTemplateValueId && $variationTemplateId) {
                                ProductVariationValue::create([
                                    'product_variation_id' => $variant->id,
                                    'variation_template_id' => $variationTemplateId,
                                    'variation_template_value_id' => $variationTemplateValueId,
                                ]);
                            }
                        }
                    }
                }
            }

            // Kullanılmayan variant'ları sil (SKU'su kullanılan variant'larda yoksa)
            // Not: SKU'su olmayan eski variant'ları da silmek gerekebilir, ama şimdilik sadece SKU'su olanları kontrol ediyoruz
            if (!empty($usedSkus)) {
                $product->variations()
                    ->whereNotNull('sku')
                    ->whereNotIn('sku', $usedSkus)
                    ->delete();
            } else {
                // Eğer hiç SKU yoksa, tüm variant'ları sil (eski davranış)
                $product->variations()->delete();
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
