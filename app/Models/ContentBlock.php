<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static \Database\Factories\ContentBlockFactory factory()
 */
class ContentBlock extends Model
{
    /** @use HasFactory<\Database\Factories\ContentBlockFactory> */
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
