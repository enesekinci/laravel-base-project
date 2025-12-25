<?php

declare(strict_types=1);

namespace App\Domains\Cms\Services;

use App\Domains\Cms\Models\Page;
use Illuminate\Database\Eloquent\Collection;

class PageService
{
    /**
     * Get all active pages.
     */
    public function getActive(): Collection
    {
        return Page::where('is_active', true)
            ->orderBy('title')
            ->get();
    }

    /**
     * Create a new page.
     */
    public function create(array $data): Page
    {
        return Page::create($data);
    }

    /**
     * Update a page.
     */
    public function update(Page $page, array $data): bool
    {
        return $page->update($data);
    }

    /**
     * Delete a page.
     */
    public function delete(Page $page): bool
    {
        return $page->delete();
    }
}
