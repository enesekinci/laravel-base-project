<?php

declare(strict_types=1);

namespace App\Domains\Auth\Controllers;

use App\Domains\Auth\Services\AuthService;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function __construct(
        protected AuthService $authService,
    ) {}

    public function register(Request $request): JsonResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'phone' => ['nullable', 'string', 'max:30'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        $user = $this->authService->register($data);
        $token = $this->authService->createToken($user);

        return response()->json([
            'token' => $token,
            'user' => $user,
        ], 201);
    }
}
