<?php

declare(strict_types=1);

namespace App\Providers\Domains;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class FocusFlowServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Repository bindings buraya eklenecek
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Policies buraya eklenecek
        // Gate::policy(\App\Models\FocusFlow\Todo::class, \App\Policies\FocusFlow\TodoPolicy::class);

        // Observers buraya eklenecek
        // \App\Models\FocusFlow\Todo::observe(\App\Observers\FocusFlow\TodoObserver::class);

        // Event Listeners buraya eklenecek
    }
}
