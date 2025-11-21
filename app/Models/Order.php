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
        'shipping_status',
        'payment_method',
        'payment_method_id',
        'shipping_method_id',
        'shipping_address_id',
        'billing_address_id',
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
        'notes',
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

    public function shippingAddress()
    {
        return $this->belongsTo(Address::class, 'shipping_address_id');
    }

    public function billingAddress()
    {
        return $this->belongsTo(Address::class, 'billing_address_id');
    }

    public function shippingMethod()
    {
        return $this->belongsTo(ShippingMethod::class);
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }
}
