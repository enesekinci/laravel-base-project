<?php

declare(strict_types=1);

namespace App\Domains\Blog\Services;

use App\Domains\Blog\Contracts\PostRepositoryInterface;
use App\Domains\Blog\Models\Post;
use Illuminate\Database\Eloquent\Collection;

class PostService
{
    public function __construct(
        protected PostRepositoryInterface $repository,
    ) {}

    /**
     * Get all published posts.
     */
    public function getPublished(): Collection
    {
        return Post::where('status', 'published')
            ->where('published_at', '<=', now())
            ->orderBy('published_at', 'desc')
            ->get();
    }

    /**
     * Create a new post.
     */
    public function create(array $data): Post
    {
        return $this->repository->create($data);
    }

    /**
     * Update a post.
     */
    public function update(Post $post, array $data): bool
    {
        return $this->repository->update($post, $data);
    }

    /**
     * Delete a post.
     */
    public function delete(Post $post): bool
    {
        return $this->repository->delete($post);
    }
}
