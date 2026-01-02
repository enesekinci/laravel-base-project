<?php

declare(strict_types=1);

namespace App\Models\Blog;

use App\Models\Crm\User;
use App\Models\Media\MediaFile;
use App\Services\Blog\PostContentImageService;
use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;

/**
 * @method static \Database\Factories\Blog\PostFactory factory()
 */
class Post extends Model
{
    /** @use HasFactory<\Database\Factories\Blog\PostFactory> */
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'author_id',
        'media_file_id',
        'library',
        'title',
        'slug',
        'excerpt',
        'content',
        'status',
        'published_at',
        'meta_title',
        'meta_description',
    ];

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
            'library' => AsCollection::class,
        ];
    }

    /**
     * @return BelongsTo<User, Post>
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * @return BelongsTo<MediaFile, Post>
     */
    public function media(): BelongsTo
    {
        return $this->belongsTo(MediaFile::class, 'media_file_id');
    }

    /**
     * @return BelongsToMany<PostCategory, Post>
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(PostCategory::class, 'post_post_category');
    }

    /**
     * @return BelongsToMany<PostTag, Post>
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(PostTag::class, 'post_post_tag');
    }

    /**
     * Boot the model.
     */
    protected static function boot(): void
    {
        parent::boot();

        // Post silindiğinde (soft delete veya force delete) tüm resimleri temizle
        static::deleting(function (Post $post): void {
            // Soft delete için de resimleri temizle
            $service = App::make(PostContentImageService::class);
            $service->cleanupAllImages($post);
        });

        // Post güncellendiğinde kullanılmayan resimleri temizle
        static::updating(function (Post $post): void {
            $originalAttributes = $post->getOriginal();
            $service = App::make(PostContentImageService::class);
            $service->handlePostUpdate($post, $originalAttributes);
        });
    }
}
