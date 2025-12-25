<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiVersion
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(Request): (Response)  $next
     */
    public function handle(Request $request, \Closure $next, string $version = 'v1'): Response
    {
        // API version'ı request'e ekle
        $request->attributes->set('api_version', $version);

        return $next($request);
    }
}
