<?php

declare(strict_types=1);

namespace App\Actions\Cms;

use App\Domains\Cms\Models\Page;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

final class UpdatePageAction
{
    public function handle(Page $page, array $data): Page
    {
        return DB::transaction(function () use ($page, $data) {
            // Slug oluştur (eğer title değiştiyse)
            if (isset($data['title']) && $data['title'] !== $page->title) {
                if (empty($data['slug'])) {
                    $data['slug'] = Str::slug($data['title']);
                }

                // Slug unique kontrolü (mevcut page hariç)
                $originalSlug = $data['slug'];
                $counter = 1;
                while (Page::where('slug', $data['slug'])->where('id', '!=', $page->id)->exists()) {
                    $data['slug'] = $originalSlug.'-'.$counter;
                    $counter++;
                }
            }

            $page->update($data);

            // TODO: Event fırlatılacak (PageUpdated event)
            // event(new PageUpdated($page));

            return $page->fresh();
        });
    }
}
