<?php

namespace App\Models;

use App\Models\Concerns\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductOptionValue extends Model
{
    use HasFactory, Translatable;

    /**
     * Çevrilecek alanlar
     * 
     * @var array<string>
     */
    public array $translatable = [
        'label',
    ];

    protected $fillable = [
        'product_id',
        'option_id',
        'label',
        'value',
        'price_adjustment',
        'price_type',
        'sort_order',
    ];

    protected $casts = [
        'price_adjustment' => 'decimal:2',
        'sort_order' => 'integer',
    ];

    /**
     * Ürün
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    /**
     * Seçenek
     */
    public function option(): BelongsTo
    {
        return $this->belongsTo(Option::class, 'option_id');
    }
}
