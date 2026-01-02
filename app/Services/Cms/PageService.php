<?php

declare(strict_types=1);

namespace App\Services\Cms;

use App\Models\Cms\Page;
use Illuminate\Database\Eloquent\Collection;

class PageService
{
    public function getActive(): Collection
    {
        return Page::where('is_active', true)
            ->orderBy('title')
            ->get();
    }

    public function create(array $data): Page
    {
        return Page::create($data);
    }

    public function update(Page $page, array $data): bool
    {
        return (bool) $page->update($data);
    }

    public function delete(Page $page): bool
    {
        return (bool) $page->delete();
    }
}
