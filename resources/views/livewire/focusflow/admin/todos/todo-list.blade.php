<div>
    <x-header title="Görev Yönetimi" separator progress-indicator>
        <x-slot:actions>
            <x-button label="Yeni Görev" icon="o-plus" class="btn-primary" link="{{ route('admin.focusflow.todos.create') }}" />
        </x-slot:actions>
    </x-header>

    <x-card>
        <x-input wire:model.live.debounce.300ms="search" icon="o-magnifying-glass" placeholder="Görev ara..." class="mb-4" />

        <x-table :headers="$this->headers" :rows="$todos" with-pagination>
            @scope('cell_id', $todo)
                {{ $todo->id }}
            @endscope

            @scope('cell_title', $todo)
                <div class="font-bold">{{ $todo->title }}</div>
            @endscope

            @scope('cell_category', $todo)
                <span class="badge">{{ $todo->category }}</span>
            @endscope

            @scope('cell_priority', $todo)
                @if($todo->priority === 'Kritik')
                    <span class="badge badge-error">Kritik</span>
                @elseif($todo->priority === 'Yüksek')
                    <span class="badge badge-warning">Yüksek</span>
                @elseif($todo->priority === 'Orta')
                    <span class="badge badge-info">Orta</span>
                @else
                    <span class="badge badge-success">Düşük</span>
                @endif
            @endscope

            @scope('cell_deadline', $todo)
                {{ $todo->deadline?->format('d.m.Y H:i') ?? '-' }}
            @endscope

            @scope('cell_completed', $todo)
                @if($todo->completed)
                    <span class="badge badge-success">Tamamlandı</span>
                @else
                    <span class="badge badge-ghost">Beklemede</span>
                @endif
            @endscope

            @scope('cell_actions', $todo)
                <div class="flex gap-2">
                    <x-button 
                        icon="{{ $todo->completed ? 'o-x-mark' : 'o-check' }}" 
                        class="btn-ghost btn-sm" 
                        wire:click="toggleComplete({{ $todo->id }})"
                    />
                    <x-button icon="o-pencil" class="btn-ghost btn-sm" link="{{ route('admin.focusflow.todos.edit', $todo->id) }}" />
                    <x-button 
                        icon="o-trash" 
                        class="btn-ghost btn-sm text-error" 
                        wire:click="delete({{ $todo->id }})"
                        wire:confirm="Bu görevi silmek istediğinize emin misiniz?"
                    />
                </div>
            @endscope
        </x-table>
    </x-card>
</div>
