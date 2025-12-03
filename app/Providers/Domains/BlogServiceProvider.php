<?php

namespace App\Providers\Domains;

use App\Domains\Blog\Contracts\PostRepositoryInterface;
use App\Domains\Blog\Repositories\PostRepository;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class BlogServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Register Repository bindings
        $this->app->bind(
            PostRepositoryInterface::class,
            PostRepository::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Register Policies
        Gate::policy(
            \App\Domains\Blog\Models\Post::class,
            \App\Domains\Blog\Policies\PostPolicy::class
        );

        // Register Event Listeners
        Event::listen(
            \App\Domains\Blog\Events\PostCreated::class,
            \App\Domains\Blog\Listeners\SendPostNotification::class
        );
    }
}
