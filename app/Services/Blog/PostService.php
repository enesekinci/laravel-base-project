<?php

declare(strict_types=1);

namespace App\Services\Blog;

use App\Contracts\Blog\PostRepositoryInterface;
use App\Models\Blog\Post;
use Illuminate\Database\Eloquent\Collection;

class PostService
{
    public function __construct(
        protected PostRepositoryInterface $repository,
    ) {}

    public function getPublished(): Collection
    {
        return Post::where('status', 'published')
            ->where('published_at', '<=', now())
            ->orderBy('published_at', 'desc')
            ->get();
    }

    public function create(array $data): Post
    {
        return $this->repository->create($data);
    }

    public function update(Post $post, array $data): bool
    {
        return $this->repository->update($post, $data);
    }

    public function delete(Post $post): bool
    {
        return $this->repository->delete($post);
    }
}
