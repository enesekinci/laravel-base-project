<?php

namespace App\Models;

use App\QueryBuilders\ProductQueryBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;
use Carbon\Carbon;

class Product extends Model
{
    use HasFactory, SoftDeletes, Searchable;

    protected $guarded = [];

    protected $casts = [
        'manage_stock' => 'boolean',
        'in_stock'     => 'boolean',
        'is_active'    => 'boolean',
        'new_from'     => 'date',
        'new_to'       => 'date',
        'special_price_start' => 'date',
        'special_price_end'   => 'date',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function taxClass()
    {
        return $this->belongsTo(TaxClass::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories')
            ->withTimestamps();
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tags')
            ->withTimestamps();
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function attributeValues()
    {
        return $this->hasMany(ProductAttributeValue::class);
    }

    public function baseImage()
    {
        return $this->images()->where('is_base', true)->first();
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeInStock($query)
    {
        return $query->where('in_stock', true);
    }

    public function getEffectivePrice(): float
    {
        $basePrice = (float) $this->price;

        if (!$this->special_price || !$this->special_price_type) {
            return $basePrice;
        }

        $now = Carbon::now();

        if ($this->special_price_start && $now->lt(Carbon::parse($this->special_price_start))) {
            return $basePrice;
        }

        if ($this->special_price_end && $now->gt(Carbon::parse($this->special_price_end))) {
            return $basePrice;
        }

        if ($this->special_price_type === 'fixed') {
            return (float) $this->special_price;
        }

        if ($this->special_price_type === 'percent') {
            // Örn: 10 => %10 indirim
            $discount = $basePrice * ((float) $this->special_price / 100);
            return round($basePrice - $discount, 2);
        }

        return $basePrice;
    }

    public function isInStock(): bool
    {
        if (!$this->manage_stock) {
            return (bool) $this->in_stock;
        }

        return $this->quantity > 0;
    }

    public function newEloquentBuilder($query): Builder
    {
        return new ProductQueryBuilder($query);
    }

    public function searchableAs(): string
    {
        return 'products';
    }

    /**
     * Test ortamında veya Meili çalışmıyorsa otomatik sync'i devre dışı bırak
     */
    public function shouldBeSearchable(): bool
    {
        return config('scout.driver') === 'meilisearch' && app()->environment() !== 'testing';
    }

    public function toSearchableArray(): array
    {
        $this->loadMissing([
            'brand',
            'categories',
            'variants.optionValues.option',
            'attributeValues.attribute',
        ]);

        $base = [
            'id'        => $this->id,
            'name'      => $this->name,
            'slug'      => $this->slug,
            'sku'       => $this->sku,
            'price'     => $this->getEffectivePrice(),
            'is_active' => (bool) $this->is_active,
            'in_stock'  => $this->isInStock(),
            'brand'     => $this->brand?->name,
            'category_ids'   => $this->categories->pluck('id')->values()->all(),
            'category_names' => $this->categories->pluck('name')->values()->all(),
        ];

        // Option'ları (renk, beden vs.) flatten edelim
        $colorIds = [];
        $sizeIds  = [];
        $colors   = [];
        $sizes    = [];

        foreach ($this->variants as $variant) {
            foreach ($variant->optionValues as $ov) {
                $optName = mb_strtolower($ov->option->name);

                if ($optName === 'renk') {
                    $colorIds[] = $ov->id;
                    $colors[]   = $ov->value;
                }

                if ($optName === 'beden') {
                    $sizeIds[] = $ov->id;
                    $sizes[]   = $ov->value;
                }
            }
        }

        $colorIds = array_values(array_unique($colorIds));
        $sizeIds  = array_values(array_unique($sizeIds));
        $colors   = array_values(array_unique($colors));
        $sizes    = array_values(array_unique($sizes));

        // Attribute'leri flatten et
        $attributes = [];
        foreach ($this->attributeValues as $av) {
            $code = $av->attribute->slug;
            $attributes[$code] = $av->typed_value;
        }

        return array_merge($base, [
            'colors'   => $colors,
            'color_ids' => $colorIds,
            'sizes'    => $sizes,
            'size_ids' => $sizeIds,
            'attributes' => $attributes,
            // direkt facet alanları
            'attribute_material'   => $attributes['material']   ?? null,
            'attribute_neck_type'  => $attributes['neck_type']  ?? null,
        ]);
    }
}
