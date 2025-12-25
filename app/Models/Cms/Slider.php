<?php

declare(strict_types=1);

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static \Database\Factories\SliderFactory factory()
 */
class Slider extends Model
{
    /** @use HasFactory<\Database\Factories\SliderFactory> */
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'name',
        'code',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'bool',
        'sort_order' => 'int',
    ];

    /**
     * @return HasMany<SliderItem, Slider>
     */
    public function items(): HasMany
    {
        return $this->hasMany(SliderItem::class)->orderBy('sort_order');
    }
}
