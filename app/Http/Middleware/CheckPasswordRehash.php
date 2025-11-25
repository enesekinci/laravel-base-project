<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class CheckPasswordRehash
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Sadece authenticated kullanıcılar için
        if (! $request->user()) {
            return $response;
        }

        $user = $request->user();

        // Eski hash algoritması kontrolü (bcrypt dışında)
        // Laravel'in varsayılan hash algoritması bcrypt'tir
        // Eğer password hash'i eski algoritma ile yapılmışsa rehash et
        if (Hash::needsRehash($user->password)) {
            // Bu middleware sadece kontrol eder, rehash işlemi login controller'da yapılmalı
            // Burada sadece log'a yazabiliriz
            logger()->channel('security')->warning('User password needs rehash', [
                'user_id' => $user->id,
            ]);
        }

        return $response;
    }
}
