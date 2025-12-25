<?php

declare(strict_types=1);

namespace App\Domains\Blog\Repositories;

use App\Domains\Blog\Contracts\PostRepositoryInterface;
use App\Domains\Blog\Models\Post;
use Illuminate\Database\Eloquent\Collection;

class PostRepository implements PostRepositoryInterface
{
    public function getAll(): Collection
    {
        return Post::all();
    }

    public function find(int $id): ?Post
    {
        return Post::find($id);
    }

    public function create(array $data): Post
    {
        return Post::create($data);
    }

    public function update(Post $post, array $data): bool
    {
        return $post->update($data);
    }

    public function delete(Post $post): bool
    {
        return $post->delete();
    }
}
