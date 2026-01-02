<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class SliderItem extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'slider_id',
        'media_file_id',
        'title',
        'subtitle',
        'button_text',
        'button_url',
        'link_url',
        'sort_order',
        'is_active',
        'meta',
    ];

    protected $casts = [
        'sort_order' => 'int',
        'is_active' => 'bool',
        'meta' => 'array',
    ];

    public function slider(): BelongsTo
    {
        return $this->belongsTo(Slider::class);
    }

    public function media(): BelongsTo
    {
        return $this->belongsTo(MediaFile::class, 'media_file_id');
    }
}
