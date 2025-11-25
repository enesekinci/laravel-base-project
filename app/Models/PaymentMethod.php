<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentMethod extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'code',
        'type',
        'is_active',
        'sort_order',
        'config',
    ];

    protected $casts = [
        'is_active' => 'bool',
        'sort_order' => 'int',
        'config' => 'array',
    ];
}
