<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductLink extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'linked_product_id',
        'type',
    ];

    /**
     * Ürün
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Bağlı ürün
     */
    public function linkedProduct(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'linked_product_id');
    }
}
