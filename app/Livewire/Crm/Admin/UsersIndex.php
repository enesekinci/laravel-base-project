<?php

declare(strict_types=1);

namespace App\Livewire\Crm\Admin;

use App\Models\User;
use App\Services\Crm\UserService;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class UsersIndex extends Component
{
    use WithPagination;

    public string $search = '';

    public function mount(): void
    {
        //
    }

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function getHeadersProperty(): array
    {
        return [
            ['key' => 'id', 'label' => 'ID', 'class' => 'w-16'],
            ['key' => 'name', 'label' => 'Kullanıcı'],
            ['key' => 'phone', 'label' => 'Telefon'],
            ['key' => 'is_admin', 'label' => 'Rol'],
            ['key' => 'created_at', 'label' => 'Oluşturulma'],
            ['key' => 'actions', 'label' => 'İşlemler', 'class' => 'w-24'],
        ];
    }

    public function render(UserService $userService): View
    {
        $users = User::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%'.$this->search.'%')
                    ->orWhere('email', 'like', '%'.$this->search.'%')
                    ->orWhere('phone', 'like', '%'.$this->search.'%');
            })
            ->orderBy('name')
            ->paginate(15);

        return view('livewire.crm.admin.users-index', [
            'users' => $users,
        ]);
    }

    public function delete(int $userId): void
    {
        $user = User::findOrFail($userId);

        if ($user->id === Auth::id()) {
            $this->dispatch('toast', message: 'Kendi hesabınızı silemezsiniz.', type: 'error');

            return;
        }

        $user->delete();

        $this->dispatch('toast', message: 'Kullanıcı başarıyla silindi.', type: 'success');
    }
}
