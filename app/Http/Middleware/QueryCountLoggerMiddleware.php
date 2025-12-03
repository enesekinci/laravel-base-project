<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class QueryCountLoggerMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Sadece production dışı ortamlarda aktif olsun
        if (app()->environment('production')) {
            return $next($request);
        }

        // Query sayacını sıfırla
        $queryCount = 0;

        // Query event listener'ı ekle
        DB::listen(function (QueryExecuted $query) use (&$queryCount) {
            $queryCount++;
        });

        // Request attribute'a başlangıç değeri set et
        $request->attributes->set('query_count', 0);

        /** @var Response $response */
        $response = $next($request);

        // Query sayısını request attribute'dan al (eğer başka bir middleware set ettiyse)
        $finalQueryCount = (int) $request->attributes->get('query_count', $queryCount);

        // Aşırı log şişmesini engellemek için düşük sayıları atlayabiliriz
        $threshold = (int) config('logging.query_count_threshold', 20);

        if ($finalQueryCount >= $threshold) {
            Log::warning('[HTTP][queries] Yüksek query sayısı tespit edildi', [
                'method' => $request->getMethod(),
                'path' => $request->path(),
                'url' => $request->fullUrl(),
                'query_count' => $finalQueryCount,
                'user_id' => $request->user()?->id,
                'ip' => $request->ip(),
            ]);
        }

        // İsteğe bağlı: header olarak da geri döndür (development için)
        if (config('logging.include_query_count_header', false)) {
            $response->headers->set('X-SQL-Count', (string) $finalQueryCount);
        }

        return $response;
    }
}
