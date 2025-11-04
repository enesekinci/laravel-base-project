<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProductVariation extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'variation_template_id',
        'name',
        'sku',
        'price',
        'compare_price',
        'stock',
        'barcode',
        'image',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'compare_price' => 'decimal:2',
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
    public function values(): BelongsToMany
    {
        return $this->belongsToMany(
            VariationTemplateValue::class,
            'product_variation_values',
            'product_variation_id',
            'variation_template_value_id'
        )
            ->withPivot('variation_template_id')
            ->withTimestamps();
    }
}
