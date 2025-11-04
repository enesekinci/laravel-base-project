<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'sku',
        'description',
        'short_description',
        'brand_id',
        'tax_class_id',
        'status',
        'is_virtual',
        'seo_url',
        'meta_title',
        'meta_description',
        'new_from',
        'new_to',
        'sort_order',
    ];

    protected $casts = [
        'is_virtual' => 'boolean',
        'sort_order' => 'integer',
        'new_from' => 'date',
        'new_to' => 'date',
    ];

    /**
     * Marka
     */
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * Vergi sınıfı
     */
    public function taxClass(): BelongsTo
    {
        return $this->belongsTo(TaxClass::class);
    }

    /**
     * Kategoriler
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'product_categories')
            ->withTimestamps();
    }

    /**
     * Etiketler
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'product_tags')
            ->withTimestamps();
    }

    /**
     * Özellikler
     */
    public function attributes(): BelongsToMany
    {
        return $this->belongsToMany(Attribute::class, 'product_attributes')
            ->withPivot('value', 'attribute_value_id')
            ->withTimestamps();
    }

    /**
     * Varyasyonlar
     */
    public function variations(): HasMany
    {
        return $this->hasMany(ProductVariation::class)
            ->orderBy('sort_order');
    }

    /**
     * Seçenekler
     */
    public function options(): BelongsToMany
    {
        return $this->belongsToMany(ProductOption::class, 'product_option_product')
            ->withTimestamps();
    }

    /**
     * Medya
     */
    public function media(): HasMany
    {
        return $this->hasMany(ProductMedia::class)
            ->orderBy('sort_order');
    }

    /**
     * Bağlantılar (Up-Sell, Cross-Sell, Related)
     */
    public function links(): HasMany
    {
        return $this->hasMany(ProductLink::class);
    }

    /**
     * Yayınlanmış ürünler
     */
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    /**
     * Sıralı ürünler
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('name');
    }
}
