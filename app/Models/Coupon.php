<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code',
        'type',
        'value',
        'min_cart_total',
        'usage_limit',
        'usage_limit_per_user',
        'used_count',
        'is_active',
        'starts_at',
        'ends_at',
    ];

    protected $casts = [
        'value'             => 'float',
        'min_cart_total'    => 'float',
        'usage_limit'       => 'int',
        'usage_limit_per_user' => 'int',
        'used_count'        => 'int',
        'is_active'         => 'bool',
        'starts_at'         => 'datetime',
        'ends_at'           => 'datetime',
    ];
}
