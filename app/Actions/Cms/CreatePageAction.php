<?php

declare(strict_types=1);

namespace App\Actions\Cms;

use App\Models\Cms\Page;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

final class CreatePageAction
{
    public function handle(array $data): Page
    {
        return DB::transaction(function () use ($data) {
            // Slug oluştur
            if (empty($data['slug']) && ! empty($data['title'])) {
                $data['slug'] = Str::slug($data['title']);
            }

            // Slug unique kontrolü
            $originalSlug = $data['slug'];
            $counter = 1;
            while (Page::where('slug', $data['slug'])->exists()) {
                $data['slug'] = $originalSlug.'-'.$counter;
                $counter++;
            }

            $page = Page::create($data);

            // TODO: Event fırlatılacak (PageCreated event)
            // event(new PageCreated($page));

            return $page;
        });
    }
}
