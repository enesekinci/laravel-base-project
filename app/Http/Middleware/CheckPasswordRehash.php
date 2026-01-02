<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class CheckPasswordRehash
{
    public function handle(Request $request, \Closure $next): Response
    {
        $response = $next($request);

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
