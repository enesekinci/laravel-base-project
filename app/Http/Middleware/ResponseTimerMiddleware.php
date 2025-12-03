<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class ResponseTimerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * Response süresini ölçer ve X-Response-Time header'ı ekler.
     * 500ms üstü request'leri loglar.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $startTime = microtime(true);

        $response = $next($request);

        $duration = (microtime(true) - $startTime) * 1000; // milliseconds

        // X-Response-Time header'ını ekle
        $response->headers->set('X-Response-Time', round($duration, 2).'ms');

        // Slow request kontrolü (500ms threshold)
        $slowRequestThreshold = config('logging.slow_request_threshold_ms', 500);
        if ($duration > $slowRequestThreshold) {
            Log::warning('Slow request detected', [
                'method' => $request->method(),
                'url' => $request->fullUrl(),
                'path' => $request->path(),
                'response_time_ms' => round($duration, 2),
                'status_code' => $response->getStatusCode(),
                'ip' => $request->ip(),
                'user_id' => $request->user()?->id,
            ]);
        }

        return $response;
    }
}
