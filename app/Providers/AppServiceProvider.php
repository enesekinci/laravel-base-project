<?php

namespace App\Providers;

use App\Events\ProductTranslated;
use App\Listeners\TranslateProduct;
use App\View\Composers\PortoViewComposer;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\View;

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
        // Porto template view'larına ortak verileri ekle
        View::composer('porto.*', PortoViewComposer::class);
        View::composer('pages.*', PortoViewComposer::class);
        View::composer('layouts.porto', PortoViewComposer::class);
        View::composer('components.porto.*', PortoViewComposer::class);
    }
}
