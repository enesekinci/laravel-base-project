<?php

declare(strict_types=1);

namespace App\Repositories\Blog;

use App\Contracts\Repositories\Blog\PostCategoryRepositoryInterface;
use App\DTO\Blog\PostCategoryData;
use App\Models\Blog\PostCategory;
use Illuminate\Database\Eloquent\Collection;

class PostCategoryRepository implements PostCategoryRepositoryInterface
{
    public function find(int $id): ?PostCategory
    {
        return PostCategory::find($id);
    }

    public function all(): Collection
    {
        return PostCategory::all();
    }

    public function create(PostCategoryData $data): PostCategory
    {
        return PostCategory::create($data->toArray());
    }

    public function update(int $id, PostCategoryData $data): PostCategory
    {
        $category = PostCategory::findOrFail($id);

        $category->update($data->toArray());

        return $category;
    }

    public function delete(int $id): bool
    {
        $category = PostCategory::findOrFail($id);

        return $category->delete();
    }
}
