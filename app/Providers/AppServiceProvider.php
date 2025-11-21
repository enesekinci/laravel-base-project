<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Cache\RateLimiting\Limit;

class AppServiceProvider extends ServiceProvider
{
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
        if ($this->app->environment('local', 'development', 'staging')) {
            Model::preventLazyLoading();
            Model::preventAccessingMissingAttributes();
        }

        Model::preventSilentlyDiscardingAttributes();

        DB::whenQueryingForLongerThan(500, function ($connection, $event) {
            logger()->warning('!!! SLOW QUERY DETECTED !!!', [
                'sql' => $event->sql,
                'time' => $event->time,
                'bindings' => $event->bindings,
            ]);

            // Kuyruğa mail job'ı ekle
            \App\Jobs\SendSlowQueryAlertMail::dispatch(
                $event->sql,
                $event->time,
                $event->bindings ?? []
            )->onQueue('emails');
        });

        // Rate Limiter tanımlamaları
        RateLimiter::for('api-public', function ($request) {
            // Public API endpoint'leri için: dakikada 60 istek
            return Limit::perMinute(60)->by($request->ip());
        });

        RateLimiter::for('api-search', function ($request) {
            // Arama endpoint'i için: dakikada 30 istek
            return Limit::perMinute(30)->by($request->ip());
        });

        RateLimiter::for('api-cart', function ($request) {
            // Sepet işlemleri için: dakikada 120 istek
            return Limit::perMinute(120)->by($request->user()?->id ?? $request->ip());
        });
    }
}
