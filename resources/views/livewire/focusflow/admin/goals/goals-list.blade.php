<div>
    <x-header title="Hedefler" separator progress-indicator>
        <x-slot:actions>
            <x-button label="Yeni Hedef" icon="o-plus" class="btn-primary" />
        </x-slot:actions>
    </x-header>

    <x-card>
        <x-input wire:model.live.debounce.300ms="search" icon="o-magnifying-glass" placeholder="Hedef ara..." class="mb-4" />

        <x-table :headers="$this->headers" :rows="$goals" with-pagination>
            @scope('cell_id', $goal)
                {{ $goal->id }}
            @endscope

            @scope('cell_title', $goal)
                <div class="font-bold">{{ $goal->title }}</div>
            @endscope

            @scope('cell_type', $goal)
                @if($goal->type === 'daily')
                    <span class="badge">Günlük</span>
                @elseif($goal->type === 'weekly')
                    <span class="badge badge-info">Haftalık</span>
                @elseif($goal->type === 'monthly')
                    <span class="badge badge-warning">Aylık</span>
                @else
                    <span class="badge badge-error">Yıllık</span>
                @endif
            @endscope

            @scope('cell_progress', $goal)
                <x-progress :value="$goal->progress" class="w-32" />
                <span class="text-sm ml-2">{{ $goal->progress }}%</span>
            @endscope

            @scope('cell_target_date', $goal)
                {{ $goal->target_date?->format('d.m.Y') ?? '-' }}
            @endscope

            @scope('cell_completed', $goal)
                @if($goal->completed)
                    <span class="badge badge-success">Tamamlandı</span>
                @else
                    <span class="badge badge-ghost">Devam Ediyor</span>
                @endif
            @endscope

            @scope('cell_actions', $goal)
                <div class="flex gap-2">
                    <x-button icon="o-pencil" class="btn-ghost btn-sm" />
                    <x-button 
                        icon="o-trash" 
                        class="btn-ghost btn-sm text-error" 
                        wire:click="delete({{ $goal->id }})"
                        wire:confirm="Bu hedefi silmek istediğinize emin misiniz?"
                    />
                </div>
            @endscope
        </x-table>
    </x-card>
</div>
