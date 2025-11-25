<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContentBlock extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'key',
        'name',
        'type',
        'value',
        'is_active',
    ];

    protected $casts = [
        'value' => 'array',
        'is_active' => 'bool',
    ];
}
