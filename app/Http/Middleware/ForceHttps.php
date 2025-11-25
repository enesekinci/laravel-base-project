<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ForceHttps
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // APP_FORCE_HTTPS env variable ile kontrol
        if (! config('app.force_https', env('APP_FORCE_HTTPS', false))) {
            return $next($request);
        }

        // Production'da ve HTTPS değilse redirect
        if (config('app.env') === 'production' && ! $request->secure()) {
            return redirect()->secure($request->getRequestUri());
        }

        return $next($request);
    }
}
