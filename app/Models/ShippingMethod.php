<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShippingMethod extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'code',
        'type',
        'price',
        'min_cart_total',
        'is_active',
        'sort_order',
        'config',
    ];

    protected $casts = [
        'price'          => 'float',
        'min_cart_total' => 'float',
        'is_active'      => 'bool',
        'sort_order'     => 'int',
        'config'         => 'array',
    ];
}
