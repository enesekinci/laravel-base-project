<?php

declare(strict_types=1);

namespace App\Providers\Domains;

use App\Observers\Cms\PageObserver;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class CmsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void {}

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Register Policies
        Gate::policy(
            \App\Models\Cms\Page::class,
            \App\Policies\Cms\PagePolicy::class
        );

        // Register Observers
        \App\Models\Cms\Page::observe(PageObserver::class);
    }
}
