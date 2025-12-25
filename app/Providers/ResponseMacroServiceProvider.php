<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class ResponseMacroServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void {}

    /**
     * Bootstrap services.
     *
     * API Response Macros - Uniform JSON response formatı
     * Tüm API endpoint'lerinde tutarlı response formatı sağlar.
     */
    public function boot(): void
    {
        // Başarılı response
        Response::macro('success', fn ($data = null, string $message = 'Success', int $statusCode = 200): JsonResponse => Response::json([
            'success' => true,
            'message' => $message,
            'data' => $data,
        ], $statusCode));

        // Hata response
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

        // 404 Not Found response
        Response::macro('notFound', fn (string $message = 'Resource not found'): JsonResponse => Response::json([
            'success' => false,
            'message' => $message,
        ], 404));

        // 401 Unauthorized response
        Response::macro('unauthorized', fn (string $message = 'Unauthorized'): JsonResponse => Response::json([
            'success' => false,
            'message' => $message,
        ], 401));

        // 403 Forbidden response
        Response::macro('forbidden', fn (string $message = 'Forbidden'): JsonResponse => Response::json([
            'success' => false,
            'message' => $message,
        ], 403));
    }
}
