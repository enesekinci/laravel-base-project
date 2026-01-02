<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ForceHttps
{
    public function handle(Request $request, \Closure $next): Response
    {
        if (! config('app.force_https', false)) {
            return $next($request);
        }

        if (config('app.env') === 'production' && ! $request->secure()) {
            return redirect()->secure($request->getRequestUri());
        }

        return $next($request);
    }
}
