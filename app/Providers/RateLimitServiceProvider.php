<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;

class RateLimitServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * Rate Limiter tanımlamaları - API ve auth endpoint'leri için
     * brute force saldırılarına karşı koruma sağlar.
     */
    public function boot(): void
    {
        // Public API endpoint'leri için rate limiting
        RateLimiter::for('api-public', function ($request) {
            // Public API endpoint'leri için: dakikada 60 istek
            return Limit::perMinute(60)->by($request->ip());
        });

        // Auth routes için rate limiting (brute force koruması)
        RateLimiter::for('auth', function ($request) {
            // Login ve register için: dakikada 5 istek
            return Limit::perMinute(5)->by($request->ip());
        });

        // Password reset için daha sıkı rate limiting
        RateLimiter::for('password-reset', function ($request) {
            // Password reset için: saatte 3 istek
            return Limit::perHour(3)->by($request->ip());
        });
    }
}
