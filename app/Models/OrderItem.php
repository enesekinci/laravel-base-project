<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
        'product_variant_id',
        'name',
        'sku',
        'unit_price',
        'quantity',
        'tax_class_id',
        'tax_rate',
        'subtotal',
        'discount_total',
        'tax_total',
        'total',
    ];

    protected $casts = [
        'unit_price' => 'float',
        'subtotal' => 'float',
        'discount_total' => 'float',
        'tax_total' => 'float',
        'total' => 'float',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function variant()
    {
        return $this->belongsTo(ProductVariant::class, 'product_variant_id');
    }
}
