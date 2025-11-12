<?php

namespace App\Models;

use App\Models\Concerns\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductOption extends Model
{
    use HasFactory, SoftDeletes, Translatable;

    /**
     * Çevrilecek alanlar
     * 
     * @var array<string>
     */
    public array $translatable = [
        'name',
        'description',
        'values.label',
    ];

    protected $fillable = [
        'name',
        'description',
        'type',
        'required',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    /**
     * Seçenek değerleri
     */
    public function values(): HasMany
    {
        return $this->hasMany(ProductOptionValue::class, 'product_option_id')
            ->orderBy('sort_order')
            ->orderBy('label');
    }

    /**
     * Aktif seçenekler
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Sıralı seçenekler
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('name');
    }
}
