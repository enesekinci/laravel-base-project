<?php

declare(strict_types=1);

namespace App\Contracts\Repositories\Blog;

use App\DTO\Blog\PostCategoryData;
use App\Models\Blog\PostCategory;
use Illuminate\Database\Eloquent\Collection;

interface PostCategoryRepositoryInterface
{
    public function find(int $id): ?PostCategory;

    /**
     * @return Collection<int, PostCategory>
     */
    public function all(): Collection;

    public function create(PostCategoryData $data): PostCategory;

    public function update(int $id, PostCategoryData $data): PostCategory;

    public function delete(int $id): bool;
}
