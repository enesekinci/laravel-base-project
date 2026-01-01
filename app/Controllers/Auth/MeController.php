<?php

declare(strict_types=1);

namespace App\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

class MeController extends Controller
{
    #[OA\Get(
        path: '/api/v1/auth/me',
        summary: 'Mevcut kullanıcı bilgilerini getir',
        tags: ['Auth'],
        security: [['sanctum' => []]],
        responses: [
            new OA\Response(
                response: 200,
                description: 'Kullanıcı bilgileri',
                content: new OA\JsonContent(
                    properties: [
                        new OA\Property(property: 'user', type: 'object'),
                    ]
                )
            ),
            new OA\Response(
                response: 401,
                description: 'Yetkilendirme hatası',
            ),
        ]
    )]
    public function me(Request $request): JsonResponse
    {
        return response()->json([
            'user' => $request->user(),
        ]);
    }
}
