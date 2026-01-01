<?php

declare(strict_types=1);

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Password;
use Livewire\Component;
use Mary\Traits\Toast;

class ForgotPasswordForm extends Component
{
    use Toast;

    public string $email = '';

    protected array $rules = [
        'email' => ['required', 'email'],
    ];

    protected array $messages = [
        'email.required' => 'E-posta adresi gereklidir.',
        'email.email' => 'Geçerli bir e-posta adresi giriniz.',
    ];

    public function sendResetLink(): void
    {
        $this->validate();

        $status = Password::sendResetLink(
            ['email' => $this->email]
        );

        if ($status === Password::RESET_LINK_SENT) {
            $this->success('Şifre sıfırlama bağlantısı e-posta adresinize gönderildi.');
            $this->reset('email');
        } else {
            $this->error('Bu e-posta adresi ile kayıtlı bir kullanıcı bulunamadı.');
        }
    }

    public function render()
    {
        return view('livewire.auth.forgot-password-form');
    }
}
