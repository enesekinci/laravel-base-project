<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class ModelTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'translatable_type',
        'translatable_id',
        'language_id',
        'translations',
    ];

    protected function casts(): array
    {
        return [
            'translations' => 'array',
        ];
    }

    /**
     * Çevrilecek model (polymorphic)
     */
    public function translatable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Dil ilişkisi
     */
    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }
}
