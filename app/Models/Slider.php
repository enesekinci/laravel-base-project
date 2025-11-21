<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'subtitle',
        'heading',
        'description',
        'image',
        'link',
        'price',
        'price_em',
        'button_text',
        'button_url',
        'background_color',
        'animation_name',
        'text_uppercase',
        'location',
        'sort_order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'text_uppercase' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    /**
     * Aktif slider'lar
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Location'a göre filtrele
     */
    public function scopeByLocation($query, string $location)
    {
        return $query->where('location', $location);
    }

    /**
     * Sıralı slider'lar
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('created_at', 'desc');
    }
}

