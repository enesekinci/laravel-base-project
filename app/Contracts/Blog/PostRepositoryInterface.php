<?php

declare(strict_types=1);

namespace App\Contracts\Blog;

use App\Models\Blog\Post;
use Illuminate\Database\Eloquent\Collection;

interface PostRepositoryInterface
{
    public function getAll(): Collection;

    public function find(int $id): ?Post;

    public function create(array $data): Post;

    public function update(Post $post, array $data): bool;

    public function delete(Post $post): bool;
}
