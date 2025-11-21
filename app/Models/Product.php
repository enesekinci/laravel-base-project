<?php

namespace App\Models;

use App\QueryBuilders\ProductQueryBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Product extends Model
{
    use HasFactory, SoftDeletes;

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
}
