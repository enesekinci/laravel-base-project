<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductVariant extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'manage_stock' => 'boolean',
        'in_stock' => 'boolean',
        'is_active' => 'boolean',
        'special_price_start' => 'date',
        'special_price_end' => 'date',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function optionValues()
    {
        return $this->belongsToMany(OptionValue::class, 'variant_option_values', 'variant_id', 'option_value_id')
            ->withPivot('option_id')
            ->withTimestamps();
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
        // Variant'ta özel fiyat varsa onu kullan, yoksa product'tan devral
        $productPrice = $this->product?->getEffectivePrice() ?? 0.0;

        $basePrice = $this->price !== null ? (float) $this->price : $productPrice;

        if (! $this->special_price || ! $this->special_price_type) {
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
            $discount = $basePrice * ((float) $this->special_price / 100);

            return round($basePrice - $discount, 2);
        }

        return $basePrice;
    }

    public function isInStock(): bool
    {
        if (! $this->manage_stock) {
            return (bool) $this->in_stock;
        }

        return $this->quantity > 0;
    }
}
