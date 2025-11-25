<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class LogPaymentCallback
{
    /**
     * Sensitive fields that should be masked in logs
     */
    private array $sensitiveFields = [
        'card_number',
        'cvv',
        'password',
        'token',
        'secret',
        'api_key',
        'private_key',
        'hash',
        'signature',
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $startTime = microtime(true);

        // Request'i logla (sensitive data masked)
        $requestData = $this->maskSensitiveData($request->all());
        Log::channel('security')->info('Payment callback received', [
            'url' => $request->fullUrl(),
            'method' => $request->method(),
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'request_data' => $requestData,
            'headers' => $this->maskSensitiveData($request->headers->all()),
        ]);

        $response = $next($request);

        $duration = (microtime(true) - $startTime) * 1000;

        // Response'u logla
        $responseData = $this->maskSensitiveData(
            json_decode($response->getContent(), true) ?? []
        );

        Log::channel('security')->info('Payment callback response', [
            'url' => $request->fullUrl(),
            'status_code' => $response->getStatusCode(),
            'response_time_ms' => round($duration, 2),
            'response_data' => $responseData,
        ]);

        return $response;
    }

    /**
     * Mask sensitive data in array
     */
    private function maskSensitiveData(array $data): array
    {
        $masked = [];

        foreach ($data as $key => $value) {
            $lowerKey = strtolower($key);

            // Check if key contains sensitive field name
            $isSensitive = false;
            foreach ($this->sensitiveFields as $sensitiveField) {
                if (str_contains($lowerKey, $sensitiveField)) {
                    $isSensitive = true;
                    break;
                }
            }

            if ($isSensitive) {
                $masked[$key] = '***MASKED***';
            } elseif (is_array($value)) {
                $masked[$key] = $this->maskSensitiveData($value);
            } else {
                $masked[$key] = $value;
            }
        }

        return $masked;
    }
}
