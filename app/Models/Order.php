<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'status',
        'payment_status',
        'payment_method',
        'transaction_ref',
        'currency',
        'subtotal',
        'discount_total',
        'tax_total',
        'shipping_total',
        'grand_total',
        'coupon_code',
        'coupon_discount',
        'billing_address',
        'shipping_address',
        'customer_email',
        'customer_name',
        'customer_phone',
        'placed_at',
    ];

    protected $casts = [
        'billing_address'  => 'array',
        'shipping_address' => 'array',
        'subtotal'         => 'float',
        'discount_total'   => 'float',
        'tax_total'        => 'float',
        'shipping_total'   => 'float',
        'grand_total'      => 'float',
        'coupon_discount'  => 'float',
        'placed_at'        => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
