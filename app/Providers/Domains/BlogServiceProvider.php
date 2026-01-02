<?php

declare(strict_types=1);

namespace App\Providers\Domains;

use App\Contracts\Blog\PostRepositoryInterface;
use App\Observers\Blog\PostObserver;
use App\Repositories\Blog\PostRepository;
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
            \App\Models\Blog\Post::class,
            \App\Policies\Blog\PostPolicy::class
        );

        // Register Observers
        \App\Models\Blog\Post::observe(PostObserver::class);

        // Register Event Listeners
        Event::listen(
            \App\Events\Blog\PostCreated::class,
            \App\Listeners\Blog\SendPostNotification::class
        );
    }
}
