<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProductVariationValue extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_variation_id',
        'variation_template_id',
        'variation_template_value_id',
    ];

    public function productVariation(): BelongsTo
    {
        return $this->belongsTo(ProductVariation::class, 'product_variation_id', 'id');
    }

    /**
     * Varyasyon şablonu
     */
    public function variationTemplate(): BelongsTo
    {
        return $this->belongsTo(VariationTemplate::class, 'variation_template_id', 'id');
    }

    /**
     * Varyasyon şablon değeri
     */
    public function variationTemplateValue(): BelongsTo
    {
        return $this->belongsTo(VariationTemplateValue::class, 'variation_template_value_id', 'id');
    }
}
