<?php

namespace App\Domains\Auth\Services;

use App\Domains\Crm\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    /**
     * Kullanıcı girişi yap
     */
    public function login(string $email, string $password): ?User
    {
        $user = User::where('email', $email)->first();

        if (! $user || ! Hash::check($password, $user->password)) {
            return null;
        }

        return $user;
    }

    /**
     * Yeni kullanıcı kaydı oluştur
     */
    public function register(array $data): User
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
            'password' => Hash::make($data['password']),
            'is_admin' => false,
        ]);
    }

    /**
     * Token oluştur
     */
    public function createToken(User $user, string $name = 'customer'): string
    {
        return $user->createToken($name)->plainTextToken;
    }

    /**
     * Token'ı sil (logout)
     */
    public function revokeToken(User $user): void
    {
        $token = $user->currentAccessToken();
        if ($token) {
            $token->delete();
        }
    }
}
