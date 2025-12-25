<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class LogRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(Request): (Response)  $next
     */
    public function handle(Request $request, \Closure $next): Response
    {
        // Request logging aktif mi kontrol et
        if (! config('logging.enable_request_logging', true)) {
            return $next($request);
        }

        // Hangi route'lar loglanacak kontrol et
        $excludedPaths = config('logging.excluded_request_paths', ['/up', '/health']);
        if (\in_array($request->path(), $excludedPaths, true)) {
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
            'timezone' => $request->header('client-time-zone'),
            'urs_id' => $request->header('urs-id'),
            'urss_id' => $request->header('urss-id'),
        ];

        // Request body'yi logla (password alanları hariç)
        $requestData = $request->except(['password', 'new_pass', 'new_re_pass', 'password_confirmation']);
        if (! empty($requestData)) {
            $logData['request'] = $requestData;
        }

        // File upload'ları logla
        $fileNames = $this->extractFileNames($request);
        if (! empty($fileNames)) {
            $logData['files'] = $fileNames;
        }

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

    /**
     * Request'ten file name'leri çıkar.
     *
     * @return array<int, string>
     */
    protected function extractFileNames(Request $request): array
    {
        $fileNames = [];

        try {
            foreach ($request->all() as $item) {
                if (\is_array($item)) {
                    foreach ($item as $file) {
                        if (! \is_array($file) && ! empty($file) && is_file($file)) {
                            $fileNames[] = $file->getClientOriginalName();
                        }
                    }
                } elseif (! \is_array($item) && ! empty($item) && is_file($item)) {
                    $fileNames[] = $item->getClientOriginalName();
                }
            }
        } catch (\Exception $ex) {
            // File extraction hatası olursa sessizce devam et
            Log::error('File name extraction failed', [
                'error' => $ex->getMessage(),
                'request_path' => $request->path(),
            ]);
        }

        return $fileNames;
    }
}
