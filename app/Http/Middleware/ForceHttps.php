<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ForceHttps
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(Request): (Response)  $next
     */
    public function handle(Request $request, \Closure $next): Response
    {
        // APP_FORCE_HTTPS config ile kontrol
        if (! config('app.force_https', false)) {
            return $next($request);
        }

        // Production'da ve HTTPS değilse redirect
        if (config('app.env') === 'production' && ! $request->secure()) {
            return redirect()->secure($request->getRequestUri());
        }

        return $next($request);
    }
}
