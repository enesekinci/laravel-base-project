<?php

namespace App\Models;

use App\Models\Concerns\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductVariation extends Model
{
    use HasFactory, Translatable;

    /**
     * Çevrilecek alanlar
     * 
     * @var array<string>
     */
    public array $translatable = [
        'name',
    ];

    protected $fillable = [
        'product_id',
        'variation_template_id',
        'name',
        'sku',
        'barcode',
        'price',
        'stock',
        'image',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'stock' => 'integer',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    /**
     * Ürün
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Varyasyon şablonu
     */
    public function variationTemplate(): BelongsTo
    {
        return $this->belongsTo(VariationTemplate::class);
    }

    /**
     * Varyasyon değerleri
     */
    public function values(): HasMany
    {
        return $this->hasMany(ProductVariationValue::class, 'product_variation_id', 'id');
    }
}
