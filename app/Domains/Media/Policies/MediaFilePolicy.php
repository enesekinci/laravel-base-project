<?php

namespace App\Domains\Media\Policies;

use App\Domains\Crm\Models\User;
use App\Domains\Media\Models\MediaFile;

class MediaFilePolicy
{
    /**
     * Determine if the user can view any media files.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine if the user can view the media file.
     */
    public function view(User $user, MediaFile $mediaFile): bool
    {
        if (! $mediaFile->is_private) {
            return true;
        }

        return $user->isAdmin() || $mediaFile->user_id === $user->id;
    }

    /**
     * Determine if the user can create media files.
     */
    public function create(User $user): bool
    {
        return auth()->check();
    }

    /**
     * Determine if the user can update the media file.
     */
    public function update(User $user, MediaFile $mediaFile): bool
    {
        return $user->isAdmin() || $mediaFile->user_id === $user->id;
    }

    /**
     * Determine if the user can delete the media file.
     */
    public function delete(User $user, MediaFile $mediaFile): bool
    {
        return $user->isAdmin() || $mediaFile->user_id === $user->id;
    }
}
