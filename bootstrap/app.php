<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        channels: __DIR__.'/../routes/channels.php',
        health: '/up',
        then: function () {
            Route::get('/health/detailed', [\App\Http\Controllers\HealthCheckController::class, 'detailed'])->name('health.detailed');
        },
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Auth middleware redirect path
        $middleware->redirectGuestsTo(fn () => route('login'));

        // Register admin middleware
        $middleware->alias([
            'admin' => \App\Http\Middleware\EnsureUserIsAdmin::class,
            'log-admin-action' => \App\Http\Middleware\LogAdminAction::class,
            'api.version' => \App\Http\Middleware\ApiVersion::class,
        ]);

        // Request logging middleware (global)
        $middleware->web(append: [
            \App\Http\Middleware\ResponseTimerMiddleware::class,
            \App\Http\Middleware\LogRequest::class,
            \App\Http\Middleware\SecurityHeaders::class,
            \App\Http\Middleware\ForceHttps::class,
        ]);

        $middleware->api(append: [
            \App\Http\Middleware\ResponseTimerMiddleware::class,
            \App\Http\Middleware\LogRequest::class,
            \App\Http\Middleware\SecurityHeaders::class,
            \App\Http\Middleware\SetLocale::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        // Beklenmedik exception'larda admin'e mail gönder
        $exceptions->report(function (Throwable $e) {
            // Test ve local ortamda mail gönderme
            if (app()->environment(['testing', 'local'])) {
                return;
            }

            // Validation ve HTTP exception'ları göz ardı et
            if ($e instanceof \Illuminate\Validation\ValidationException) {
                return;
            }

            // 5xx hataları için özel alert
            if ($e instanceof \Symfony\Component\HttpKernel\Exception\HttpException) {
                $statusCode = $e->getStatusCode();
                if ($statusCode >= 500 && $statusCode < 600) {
                    // 5xx error log channel'a yaz (sadece log, job dispatch yok)
                    \Illuminate\Support\Facades\Log::channel('5xx-errors')->error('5xx Error detected', [
                        'exception' => get_class($e),
                        'message' => $e->getMessage(),
                        'status_code' => $statusCode,
                        'url' => request()->fullUrl(),
                        'method' => request()->method(),
                        'ip' => request()->ip(),
                        'user_id' => Auth::id(),
                        'file' => $e->getFile(),
                        'line' => $e->getLine(),
                        'trace' => $e->getTraceAsString(),
                    ]);
                }

                return;
            }

            // 404 gibi normal HTTP hatalarını göz ardı et
            if ($e instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException) {
                return;
            }

            // Rate limit exception'larını göz ardı et
            if ($e instanceof \Illuminate\Http\Exceptions\ThrottleRequestsException) {
                return;
            }

            // Exception log channel'a yaz (sadece log, job dispatch yok)
            \Illuminate\Support\Facades\Log::channel('exceptions')->error('Exception detected', [
                'exception' => get_class($e),
                'message' => $e->getMessage(),
                'url' => request()->fullUrl(),
                'method' => request()->method(),
                'ip' => request()->ip(),
                'user_agent' => request()->userAgent(),
                'user_id' => Auth::id(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString(),
            ]);
        });
    })->create();
