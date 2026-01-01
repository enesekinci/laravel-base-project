<?php

declare(strict_types=1);

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Livewire\Component;
use Mary\Traits\Toast;

class ResetPasswordForm extends Component
{
    use Toast;

    public string $token = '';

    public string $email = '';

    public string $password = '';

    public string $password_confirmation = '';

    public function mount(?string $token = null, ?string $email = null): void
    {
        $this->token = $token ?? request()->query('token', '');
        $this->email = $email ?? request()->query('email', '');
    }

    protected array $rules = [
        'token' => ['required'],
        'email' => ['required', 'email'],
        'password' => ['required', 'string', 'min:6', 'confirmed'],
    ];

    protected array $messages = [
        'email.required' => 'E-posta adresi gereklidir.',
        'email.email' => 'Geçerli bir e-posta adresi giriniz.',
        'password.required' => 'Şifre gereklidir.',
        'password.min' => 'Şifre en az 6 karakter olmalıdır.',
        'password.confirmed' => 'Şifreler eşleşmiyor.',
    ];

    public function resetPassword(): void
    {
        $this->validate();

        $status = Password::reset(
            [
                'email' => $this->email,
                'password' => $this->password,
                'password_confirmation' => $this->password_confirmation,
                'token' => $this->token,
            ],
            function (User $user, string $password): void {
                $user->password = Hash::make($password);
                $user->save();
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            $this->success('Şifreniz başarıyla sıfırlandı. Giriş yapabilirsiniz.');
            $this->redirect(route('login'), navigate: true);
        } else {
            $this->error('Şifre sıfırlama işlemi başarısız oldu. Lütfen tekrar deneyin.');
        }
    }

    /**
     * MaryUI component'leri tarafından çağrılabilen toJSON method'u
     * Component state'ini JSON formatında döndürür
     */
    public function toJSON(): array
    {
        return [
            'email' => $this->email,
            'token' => $this->token ? '***' : '', // Token'ı güvenlik için gizle
        ];
    }

    public function render()
    {
        return view('livewire.auth.reset-password-form');
    }
}
