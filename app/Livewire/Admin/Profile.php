<?php

declare(strict_types=1);

namespace App\Livewire\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Mary\Traits\Toast;

class Profile extends Component
{
    use Toast;

    public string $name = '';

    public string $email = '';

    public ?string $phone = null;

    public string $current_password = '';

    public string $password = '';

    public string $password_confirmation = '';

    public function mount(): void
    {
        $user = Auth::user();
        if ($user) {
            $this->name = $user->name;
            $this->email = $user->email;
            $this->phone = $user->phone;
        }
    }

    protected array $rules = [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'max:255'],
        'phone' => ['nullable', 'string', 'max:30'],
        'current_password' => ['required_with:password'],
        'password' => ['nullable', 'string', 'min:6', 'confirmed'],
    ];

    protected array $messages = [
        'name.required' => 'Ad soyad gereklidir.',
        'email.required' => 'E-posta adresi gereklidir.',
        'email.email' => 'Geçerli bir e-posta adresi giriniz.',
        'current_password.required_with' => 'Mevcut şifre gereklidir.',
        'password.min' => 'Şifre en az 6 karakter olmalıdır.',
        'password.confirmed' => 'Şifreler eşleşmiyor.',
    ];

    public function updateProfile(): void
    {
        $this->validate();

        $user = Auth::user();
        if (! $user) {
            $this->error('Kullanıcı bulunamadı.');

            return;
        }

        // Şifre değişikliği kontrolü
        if ($this->password) {
            if (! Hash::check($this->current_password, $user->password)) {
                $this->addError('current_password', 'Mevcut şifre yanlış.');

                return;
            }
        }

        // Email değişikliği kontrolü
        if ($this->email !== $user->email) {
            $this->validate([
                'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            ]);
        }

        $user->name = $this->name;
        $user->email = $this->email;
        $user->phone = $this->phone;

        if ($this->password) {
            $user->password = Hash::make($this->password);
        }

        $user->save();

        $this->reset('current_password', 'password', 'password_confirmation');
        $this->success('Profil bilgileriniz başarıyla güncellendi.');
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('livewire.admin.profile');
    }
}
