<?php

declare(strict_types=1);

namespace App\Providers\Domains;

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
            \App\Domains\Cms\Models\Page::class,
            \App\Domains\Cms\Policies\PagePolicy::class
        );
    }
}
