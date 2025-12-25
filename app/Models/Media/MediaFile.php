<?php

declare(strict_types=1);

namespace App\Models\Media;

use App\Models\Crm\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

/**
 * @method static \Database\Factories\Media\MediaFileFactory factory()
 */
class MediaFile extends Model
{
    /** @use HasFactory<\Database\Factories\Media\MediaFileFactory> */
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'disk',
        'path',
        'filename',
        'mime_type',
        'size',
        'width',
        'height',
        'collection',
        'alt',
        'is_private',
    ];

    protected $casts = [
        'size' => 'integer',
        'width' => 'integer',
        'height' => 'integer',
        'is_private' => 'boolean',
    ];

    protected $appends = [
        'url',
    ];

    public function getUrlAttribute(): ?string
    {
        if (! $this->path) {
            return null;
        }

        return Storage::disk($this->disk)->url($this->path);
    }

    /**
     * @return BelongsTo<User, MediaFile>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
