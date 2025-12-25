<?php

declare(strict_types=1);

namespace App\Enums;

enum PageStatus: string
{
    case DRAFT = 'draft';
    case PUBLISHED = 'published';
    case ARCHIVED = 'archived';

    public function title(): string
    {
        return match ($this) {
            self::DRAFT => 'Taslak',
            self::PUBLISHED => 'Yayınlandı',
            self::ARCHIVED => 'Arşivlendi',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::DRAFT => 'warning',
            self::PUBLISHED => 'success',
            self::ARCHIVED => 'secondary',
        };
    }
}
