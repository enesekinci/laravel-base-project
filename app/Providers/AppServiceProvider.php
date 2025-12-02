<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Log;

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
        // Locale ayarını yap (validation mesajları için)
        App::setLocale(config('app.locale', 'tr'));

        // preventLazyLoading: Production'da da aktif (sadece warning, exception değil)
        if (config('app.prevent_lazy_loading', true)) {
            Model::preventLazyLoading(
                ! app()->isProduction() // Production'da exception değil, sadece warning
            );
        }

        // preventAccessingMissingAttributes: Sadece development'ta aktif
        // Production'da bu tür hatalar zaten test edilmiş olmalı
        if (!app()->isProduction()) {
            Model::preventAccessingMissingAttributes();
        }

        // preventSilentlyDiscardingAttributes: Her zaman aktif (güvenlik açısından kritik)
        // Mass assignment sırasında $fillable/$guarded dışındaki attribute'ların
        // sessizce atılmasını engeller - bu bir güvenlik açığı olabilir
        Model::preventSilentlyDiscardingAttributes();

        // Slow SQL threshold (configurable via env)
        $slowQueryThreshold = config('database.slow_query_threshold_ms', 500);

        DB::whenQueryingForLongerThan($slowQueryThreshold, function ($connection, $event) {
            // Slow SQL log channel'a yaz
            Log::channel('slow-sql')->warning('Slow query detected', [
                'sql' => $event->sql,
                'time' => $event->time,
                'bindings' => $event->bindings,
                'connection' => $connection->getName(),
            ]);

            // Kuyruğa mail job'ı ekle
            \App\Jobs\SendSlowQueryAlertMail::dispatch(
                $event->sql,
                $event->time,
                $event->bindings
            )->onQueue('emails');
        });

        // Rate Limiter tanımlamaları
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

        // API Response Macros - Uniform JSON response formatı
        Response::macro('success', function ($data = null, string $message = 'Success', int $statusCode = 200): JsonResponse {
            return Response::json([
                'success' => true,
                'message' => $message,
                'data' => $data,
            ], $statusCode);
        });

        Response::macro('error', function (string $message = 'Error', int $statusCode = 400, array $errors = []): JsonResponse {
            $response = [
                'success' => false,
                'message' => $message,
            ];

            if (! empty($errors)) {
                $response['errors'] = $errors;
            }

            return Response::json($response, $statusCode);
        });

        Response::macro('notFound', function (string $message = 'Resource not found'): JsonResponse {
            return Response::json([
                'success' => false,
                'message' => $message,
            ], 404);
        });

        Response::macro('unauthorized', function (string $message = 'Unauthorized'): JsonResponse {
            return Response::json([
                'success' => false,
                'message' => $message,
            ], 401);
        });

        Response::macro('forbidden', function (string $message = 'Forbidden'): JsonResponse {
            return Response::json([
                'success' => false,
                'message' => $message,
            ], 403);
        });
    }
}
