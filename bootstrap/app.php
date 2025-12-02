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
        ]);

        // Request logging middleware (global)
        $middleware->web(append: [
            \App\Http\Middleware\LogRequest::class,
            \App\Http\Middleware\SecurityHeaders::class,
            \App\Http\Middleware\ForceHttps::class,
        ]);

        $middleware->api(append: [
            \App\Http\Middleware\LogRequest::class,
            \App\Http\Middleware\SecurityHeaders::class,
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
                    try {
                        \App\Jobs\Send5xxErrorAlertMail::dispatch(
                            $e,
                            request()->fullUrl(),
                            request()->method(),
                            request()->ip(),
                            Auth::id()
                        );
                    } catch (Throwable $dispatchException) {
                        logger()->error('Failed to dispatch 5xx error alert email', [
                            'original_exception' => $e->getMessage(),
                            'dispatch_exception' => $dispatchException->getMessage(),
                        ]);
                    }
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

            try {
                \App\Jobs\SendExceptionAlertMail::dispatch(
                    $e,
                    request()->fullUrl(),
                    [
                        'method' => request()->method(),
                        'ip' => request()->ip(),
                        'user_agent' => request()->userAgent(),
                        'user_id' => Auth::id(),
                    ]
                );
            } catch (Throwable $dispatchException) {
                // Mail gönderme hatası olursa sadece log'a yaz
                logger()->error('Failed to dispatch exception alert email', [
                    'original_exception' => $e->getMessage(),
                    'dispatch_exception' => $dispatchException->getMessage(),
                ]);
            }
        });
    })->create();
