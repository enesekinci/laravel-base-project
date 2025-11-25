<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class LogRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Request logging aktif mi kontrol et
        if (! config('logging.enable_request_logging', true)) {
            return $next($request);
        }

        // Hangi route'lar loglanacak kontrol et
        $excludedPaths = config('logging.excluded_request_paths', ['/up', '/health']);
        if (in_array($request->path(), $excludedPaths)) {
            return $next($request);
        }

        $startTime = microtime(true);

        $response = $next($request);

        $duration = (microtime(true) - $startTime) * 1000; // milliseconds

        // Request bilgilerini logla
        $logData = [
            'method' => $request->method(),
            'url' => $request->fullUrl(),
            'path' => $request->path(),
            'ip' => $request->ip(),
            'user_id' => $request->user()?->id,
            'status_code' => $response->getStatusCode(),
            'response_time_ms' => round($duration, 2),
            'user_agent' => $request->userAgent(),
        ];

        // Requests log channel'a yaz
        Log::channel('requests')->info('HTTP Request', $logData);

        // Slow request kontrolü (500ms threshold)
        $slowRequestThreshold = config('logging.slow_request_threshold_ms', 500);
        if ($duration > $slowRequestThreshold) {
            // Slow request alert job'ını dispatch et
            \App\Jobs\SendSlowRequestAlertMail::dispatch(
                $request->method(),
                $request->fullUrl(),
                $duration,
                $response->getStatusCode(),
                $request->ip() ?? 'unknown',
                $request->user()?->id
            )->onQueue('emails');
        }

        return $response;
    }
}
