<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductVariationTemplate extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'variation_template_id',
        'sort_order',
    ];

    protected $casts = [
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
        return $this->belongsTo(VariationTemplate::class, 'variation_template_id');
    }
}
