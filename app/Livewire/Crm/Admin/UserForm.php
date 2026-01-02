<?php

declare(strict_types=1);

namespace App\Livewire\Crm\Admin;

use App\Models\User;
use App\Services\Crm\UserService;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Mary\Traits\Toast;

class UserForm extends Component
{
    use Toast;

    public ?int $userId = null;

    public string $name = '';

    public string $email = '';

    public ?string $phone = null;

    public string $password = '';

    public string $password_confirmation = '';

    public bool $is_admin = false;

    protected array $rules = [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'max:255', 'unique:users,email'],
        'phone' => ['nullable', 'string', 'max:30'],
        'password' => ['required', 'string', 'min:6', 'confirmed'],
        'is_admin' => ['boolean'],
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

    public function mount(?int $id = null): void
    {
        $this->userId = $id;

        if ($this->userId) {
            $user = User::findOrFail($this->userId);
            $this->name = $user->name;
            $this->email = $user->email;
            $this->phone = $user->phone;
            $this->is_admin = $user->is_admin ?? false;
        }
    }

    public function updated(string $propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    public function save(UserService $userService): void
    {
        $rules = $this->rules;

        // Edit modunda email unique kontrolü
        if ($this->userId) {
            $rules['email'] = ['required', 'email', 'max:255', 'unique:users,email,'.$this->userId];
            $rules['password'] = ['nullable', 'string', 'min:6', 'confirmed'];
        }

        $this->validate($rules, $this->messages);

        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'is_admin' => $this->is_admin,
        ];

        if ($this->password) {
            $data['password'] = Hash::make($this->password);
        }

        if ($this->userId) {
            $user = $userService->find($this->userId);
            if ($user) {
                $userService->update($user, $data);
                $this->success('Kullanıcı başarıyla güncellendi.');
            }
        } else {
            if (! isset($data['password'])) {
                $this->addError('password', 'Şifre gereklidir.');

                return;
            }
            $userService->create($data);
            $this->success('Kullanıcı başarıyla oluşturuldu.');
        }

        $this->redirect(route('admin.crm.users.index'), navigate: true);
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('livewire.crm.admin.user-form');
    }
}
