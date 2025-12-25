<?php

declare(strict_types=1);

namespace App\Policies\Cms;

use App\Models\Cms\Page;
use App\Models\Crm\User;

class PagePolicy
{
    /**
     * Determine if the user can view any pages.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine if the user can view the page.
     */
    public function view(User $user, Page $page): bool
    {
        return true;
    }

    /**
     * Determine if the user can create pages.
     */
    public function create(User $user): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine if the user can update the page.
     */
    public function update(User $user, Page $page): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine if the user can delete the page.
     */
    public function delete(User $user, Page $page): bool
    {
        return $user->isAdmin();
    }
}
