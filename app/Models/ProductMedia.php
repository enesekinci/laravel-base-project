<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductMedia extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'type',
        'path',
        'alt',
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
}
