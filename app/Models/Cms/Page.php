<?php

declare(strict_types=1);

namespace App\Models\Cms;

use App\Services\ContentImageService;
use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;

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
        'library',
        'is_active',
        'show_in_footer',
        'meta_title',
        'meta_description',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'bool',
            'show_in_footer' => 'bool',
            'library' => AsCollection::class,
        ];
    }

    /**
     * Boot the model.
     */
    protected static function boot(): void
    {
        parent::boot();

        // Page silindiğinde (soft delete veya force delete) tüm resimleri temizle
        static::deleting(function (Page $page): void {
            // Soft delete için de resimleri temizle
            $service = App::make(ContentImageService::class);
            $service->cleanupAllImages($page, 'cms');
        });

        // Page güncellendiğinde kullanılmayan resimleri temizle
        static::updating(function (Page $page): void {
            $originalAttributes = $page->getOriginal();
            $service = App::make(ContentImageService::class);
            $service->handleModelUpdate($page, 'cms', $originalAttributes);
        });
    }
}
