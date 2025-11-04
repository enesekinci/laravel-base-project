<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Variation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'type',
    ];

    protected $casts = [
        'type' => 'string',
    ];

    /**
     * Varyasyon değerleri
     */
    public function values(): HasMany
    {
        return $this->hasMany(VariationValue::class, 'variation_id')
            ->orderBy('sort_order')
            ->orderBy('label');
    }

    /**
     * Sıralı varyasyonlar
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('name');
    }
}
