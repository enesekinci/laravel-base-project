<div>
    <x-header title="Kullanıcı Yönetimi" separator progress-indicator>
        <x-slot:actions>
            <x-button label="Yeni Kullanıcı" icon="o-plus" class="btn-primary" link="{{ route('admin.crm.users.create') }}" />
        </x-slot>
    </x-header>

    <x-card>
        <x-input wire:model.live.debounce.300ms="search" icon="o-magnifying-glass" placeholder="Kullanıcı ara..." class="mb-4" />

        <x-table :headers="$this->headers" :rows="$users" with-pagination>
            @scope('cell_id', $user)
                {{ $user->id }}
            @endscope

            @scope('cell_name', $user)
                <div class="flex items-center gap-3">
                    <div class="avatar placeholder">
                        <div class="bg-neutral text-neutral-content rounded-full w-12">
                            <span>{{ strtoupper(substr($user->name, 0, 2)) }}</span>
                        </div>
                    </div>
                    <div>
                        <div class="font-bold">{{ $user->name }}</div>
                        <div class="text-sm opacity-50">{{ $user->email }}</div>
                    </div>
                </div>
            @endscope

            @scope('cell_phone', $user)
                {{ $user->phone ?? '-' }}
            @endscope

            @scope('cell_is_admin', $user)
                @if ($user->is_admin)
                    <span class="badge badge-success">Admin</span>
                @else
                    <span class="badge badge-ghost">Kullanıcı</span>
                @endif
            @endscope

            @scope('cell_created_at', $user)
                {{ $user->created_at->format('d.m.Y H:i') }}
            @endscope

            @scope('cell_actions', $user)
                <div class="flex gap-2">
                    <x-button icon="o-pencil" class="btn-ghost btn-sm" link="{{ route('admin.crm.users.edit', $user->id) }}" />
                    <x-button icon="o-trash" class="btn-ghost btn-sm text-error" wire:click="delete({{ $user->id }})" wire:confirm="Bu kullanıcıyı silmek istediğinize emin misiniz?" />
                </div>
            @endscope
        </x-table>
    </x-card>
</div>
