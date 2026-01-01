<?php

declare(strict_types=1);

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Mary\Traits\Toast;

class LoginForm extends Component
{
    use Toast;

    public string $email = '';

    public string $password = '';

    public bool $remember = false;

    protected array $rules = [
        'email' => ['required', 'email'],
        'password' => ['required'],
    ];

    protected array $messages = [
        'email.required' => 'E-posta adresi gereklidir.',
        'email.email' => 'Geçerli bir e-posta adresi giriniz.',
        'password.required' => 'Şifre gereklidir.',
    ];

    public function login(): void
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            session()->regenerate();
            $isAdmin = Auth::user()?->isAdmin() ?? false;

            $this->success('Başarıyla giriş yaptınız.');
            $this->redirect(route($isAdmin ? 'admin.dashboard' : 'home'), navigate: true);
        } else {
            $this->error('Girdiğiniz bilgiler kayıtlarımızla eşleşmiyor.');
        }
    }

    public function render()
    {
        return view('livewire.auth.login-form');
    }
}
