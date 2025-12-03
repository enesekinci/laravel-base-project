<?php

namespace App\Domains\Blog\Contracts;

use App\Domains\Blog\Models\Post;
use Illuminate\Database\Eloquent\Collection;

interface PostRepositoryInterface
{
    public function getAll(): Collection;

    public function find(int $id): ?Post;

    public function create(array $data): Post;

    public function update(Post $post, array $data): bool;

    public function delete(Post $post): bool;
}
