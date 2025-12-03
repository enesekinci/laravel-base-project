<?php

namespace App\Domains\Blog\Policies;

use App\Domains\Blog\Models\Post;
use App\Domains\Crm\Models\User;

class PostPolicy
{
    /**
     * Determine if the user can view any posts.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine if the user can view the post.
     */
    public function view(User $user, Post $post): bool
    {
        return true;
    }

    /**
     * Determine if the user can create posts.
     */
    public function create(User $user): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine if the user can update the post.
     */
    public function update(User $user, Post $post): bool
    {
        return $user->isAdmin() || $post->author_id === $user->id;
    }

    /**
     * Determine if the user can delete the post.
     */
    public function delete(User $user, Post $post): bool
    {
        return $user->isAdmin();
    }
}
