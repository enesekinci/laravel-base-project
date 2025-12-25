<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static \Database\Factories\PostCategoryFactory factory()
 */
class PostCategory extends Model
{
    /** @use HasFactory<\Database\Factories\PostCategoryFactory> */
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
    ];

    /**
     * @return BelongsToMany<Post, PostCategory>
     */
    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'post_post_category');
    }
}
