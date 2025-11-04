<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mannequin extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'code',
        'description',
        'images',
        'measurements',
        'is_active',
    ];

    protected $casts = [
        'images' => 'array',
        'measurements' => 'array',
        'is_active' => 'boolean',
    ];

    /**
     * Aktif mankenler
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
