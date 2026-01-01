<?php

declare(strict_types=1);

namespace App\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\Auth\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

class LoginController extends Controller
{
    public function __construct(
        protected AuthService $authService,
    ) {}

    #[OA\Post(
        path: '/api/v1/auth/login',
        summary: 'Kullanıcı girişi',
        tags: ['Auth'],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                required: ['email', 'password'],
                properties: [
                    new OA\Property(property: 'email', type: 'string', format: 'email', example: 'user@example.com'),
                    new OA\Property(property: 'password', type: 'string', format: 'password', example: 'password123'),
                ]
            )
        ),
        responses: [
            new OA\Response(
                response: 200,
                description: 'Başarılı giriş',
                content: new OA\JsonContent(
                    properties: [
                        new OA\Property(property: 'token', type: 'string', example: '1|abcdef123456'),
                        new OA\Property(property: 'user', type: 'object'),
                    ]
                )
            ),
            new OA\Response(
                response: 422,
                description: 'Geçersiz kimlik bilgileri',
                content: new OA\JsonContent(
                    properties: [
                        new OA\Property(property: 'message', type: 'string', example: 'Invalid credentials'),
                    ]
                )
            ),
        ]
    )]
    public function login(Request $request): JsonResponse
    {
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $user = $this->authService->login($data['email'], $data['password']);

        if (! $user) {
            return response()->json([
                'message' => 'Invalid credentials',
            ], 422);
        }

        $token = $this->authService->createToken($user);

        return response()->json([
            'token' => $token,
            'user' => $user,
        ]);
    }

    #[OA\Post(
        path: '/api/v1/auth/logout',
        summary: 'Kullanıcı çıkışı',
        tags: ['Auth'],
        security: [['sanctum' => []]],
        responses: [
            new OA\Response(
                response: 200,
                description: 'Başarılı çıkış',
                content: new OA\JsonContent(
                    properties: [
                        new OA\Property(property: 'message', type: 'string', example: 'Logged out'),
                    ]
                )
            ),
        ]
    )]
    public function logout(Request $request): JsonResponse
    {
        if ($request->user()) {
            $this->authService->revokeToken($request->user());
        }

        return response()->json(['message' => 'Logged out']);
    }
}
