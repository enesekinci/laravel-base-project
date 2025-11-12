<?php

namespace App\Providers;

use App\Events\ProductTranslated;
use App\Listeners\TranslateProduct;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        ProductTranslated::class => [
            TranslateProduct::class,
        ],
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
