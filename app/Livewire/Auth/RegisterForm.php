<?php

declare(strict_types=1);

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Mary\Traits\Toast;

class RegisterForm extends Component
{
    use Toast;

    public string $name = '';

    public string $email = '';

    public ?string $phone = null;

    public string $password = '';

    public string $password_confirmation = '';

    protected array $rules = [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'max:255', 'unique:users,email'],
        'phone' => ['nullable', 'string', 'max:30'],
        'password' => ['required', 'string', 'min:6', 'confirmed'],
    ];

    protected array $messages = [
        'name.required' => 'Ad soyad gereklidir.',
        'email.required' => 'E-posta adresi gereklidir.',
        'email.email' => 'Geçerli bir e-posta adresi giriniz.',
        'email.unique' => 'Bu e-posta adresi zaten kullanılıyor.',
        'password.required' => 'Şifre gereklidir.',
        'password.min' => 'Şifre en az 6 karakter olmalıdır.',
        'password.confirmed' => 'Şifreler eşleşmiyor.',
    ];

    public function register(): void
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => Hash::make($this->password),
            'is_admin' => false,
        ]);

        Auth::login($user);

        $this->success('Hesabınız başarıyla oluşturuldu.');
        $this->redirect(route('home'), navigate: true);
    }

    /**
     * MaryUI component'leri tarafından çağrılabilen toJSON method'u
     * Component state'ini JSON formatında döndürür
     */
    public function toJSON(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
        ];
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('livewire.auth.register-form');
    }
}
