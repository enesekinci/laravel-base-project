<?php

declare(strict_types=1);

namespace App\Domains\Auth\Controllers;

use App\Domains\Auth\Services\AuthService;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct(
        protected AuthService $authService,
    ) {}

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

    public function logout(Request $request): JsonResponse
    {
        if ($request->user()) {
            $this->authService->revokeToken($request->user());
        }

        return response()->json(['message' => 'Logged out']);
    }
}
