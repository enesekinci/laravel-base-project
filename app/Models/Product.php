<?php

namespace App\Models;

use App\Models\Concerns\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes, Translatable;

    /**
     * Çevrilecek alanlar
     * 
     * Nested ilişkiler için: 'relation.field' formatı kullanılır
     * Alt seviye ilişkiler (örn: 'options.values.label') için
     * related model'in (ProductOption) translatable property'si kullanılır
     * 
     * @var array<string>
     */
    public array $translatable = [
        'name',
        'description',
        'short_description',
        'meta_title',
        'meta_description',
        'variations.name', // ProductVariation'ın name alanı
        'options.name',    // ProductOption'ın name alanı (ProductOption'un translatable property'si de çalışır)
    ];

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
     * Varyasyonlar (variant kombinasyonları)
     */
    public function variations(): HasMany
    {
        return $this->hasMany(ProductVariation::class)
            ->orderBy('sort_order');
    }

    /**
     * Ürün varyasyon şablonları (hangi variation template'lerinin aktif olduğu)
     */
    public function variationTemplates(): HasMany
    {
        return $this->hasMany(ProductVariationTemplate::class)
            ->orderBy('sort_order');
    }

    /**
     * Seçenekler
     */
    public function options(): BelongsToMany
    {
        return $this->belongsToMany(Option::class, 'product_option_values', 'product_id', 'option_id')
            ->withPivot('label', 'value', 'price_adjustment', 'price_type', 'sort_order')
            ->withTimestamps();
    }

    /**
     * Ürün seçenek değerleri (ara tablo)
     */
    public function optionValues(): HasMany
    {
        return $this->hasMany(ProductOptionValue::class);
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
     * Çeviriler
     */
    public function translations(): MorphMany
    {
        return $this->morphMany(ModelTranslation::class, 'translatable');
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

    /**
     * Featured ürünler (Showcase'den gelecek)
     */
    public function scopeFeatured($query)
    {
        // Showcase'den featured ürün ID'lerini al
        $showcase = \App\Models\Showcase::where('slug', 'featured-products')
            ->where('is_active', true)
            ->first();
        
        if ($showcase && !empty($showcase->content)) {
            $productIds = is_array($showcase->content) ? $showcase->content : json_decode($showcase->content, true);
            if (is_array($productIds) && count($productIds) > 0) {
                return $query->whereIn('id', $productIds);
            }
        }
        
        // Fallback: En yeni ürünler
        return $query->orderBy('created_at', 'desc')->limit(8);
    }

    /**
     * Top Rated ürünler (Showcase'den gelecek)
     */
    public function scopeTopRated($query)
    {
        $showcase = \App\Models\Showcase::where('slug', 'top-rated-products')
            ->where('is_active', true)
            ->first();
        
        if ($showcase && !empty($showcase->content)) {
            $productIds = is_array($showcase->content) ? $showcase->content : json_decode($showcase->content, true);
            if (is_array($productIds) && count($productIds) > 0) {
                return $query->whereIn('id', $productIds);
            }
        }
        
        // Fallback: En yeni ürünler
        return $query->orderBy('created_at', 'desc')->limit(3);
    }

    /**
     * Best Selling ürünler (Showcase'den gelecek)
     */
    public function scopeBestSelling($query)
    {
        $showcase = \App\Models\Showcase::where('slug', 'best-selling-products')
            ->where('is_active', true)
            ->first();
        
        if ($showcase && !empty($showcase->content)) {
            $productIds = is_array($showcase->content) ? $showcase->content : json_decode($showcase->content, true);
            if (is_array($productIds) && count($productIds) > 0) {
                return $query->whereIn('id', $productIds);
            }
        }
        
        // Fallback: En yeni ürünler
        return $query->orderBy('created_at', 'desc')->limit(3);
    }

    /**
     * Latest ürünler (Showcase'den gelecek)
     */
    public function scopeLatest($query)
    {
        $showcase = \App\Models\Showcase::where('slug', 'latest-products')
            ->where('is_active', true)
            ->first();
        
        if ($showcase && !empty($showcase->content)) {
            $productIds = is_array($showcase->content) ? $showcase->content : json_decode($showcase->content, true);
            if (is_array($productIds) && count($productIds) > 0) {
                return $query->whereIn('id', $productIds);
            }
        }
        
        // Fallback: En yeni ürünler
        return $query->orderBy('created_at', 'desc')->limit(3);
    }
}
