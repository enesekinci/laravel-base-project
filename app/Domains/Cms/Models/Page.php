<?php

declare(strict_types=1);

namespace App\Domains\Cms\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static \Database\Factories\PageFactory factory()
 */
class Page extends Model
{
    /** @use HasFactory<\Database\Factories\PageFactory> */
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'is_active',
        'show_in_footer',
        'meta_title',
        'meta_description',
    ];

    protected $casts = [
        'is_active' => 'bool',
        'show_in_footer' => 'bool',
    ];
}
