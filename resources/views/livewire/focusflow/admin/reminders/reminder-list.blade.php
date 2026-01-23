<div>
    <x-header title="Hatırlatıcılar" separator progress-indicator>
        <x-slot:actions>
            <x-button label="Yeni Hatırlatıcı" icon="o-plus" class="btn-primary" />
        </x-slot:actions>
    </x-header>

    <x-card>
        <x-input wire:model.live.debounce.300ms="search" icon="o-magnifying-glass" placeholder="Hatırlatıcı ara..." class="mb-4" />

        <x-table :headers="$this->headers" :rows="$reminders" with-pagination>
            @scope('cell_id', $reminder)
                {{ $reminder->id }}
            @endscope

            @scope('cell_title', $reminder)
                <div class="font-bold">{{ $reminder->title }}</div>
            @endscope

            @scope('cell_datetime', $reminder)
                {{ $reminder->datetime->format('d.m.Y H:i') }}
            @endscope

            @scope('cell_priority', $reminder)
                @if($reminder->priority === 'Kritik')
                    <span class="badge badge-error">Kritik</span>
                @elseif($reminder->priority === 'Yüksek')
                    <span class="badge badge-warning">Yüksek</span>
                @elseif($reminder->priority === 'Orta')
                    <span class="badge badge-info">Orta</span>
                @else
                    <span class="badge badge-success">Düşük</span>
                @endif
            @endscope

            @scope('cell_completed', $reminder)
                @if($reminder->completed)
                    <span class="badge badge-success">Tamamlandı</span>
                @else
                    <span class="badge badge-ghost">Beklemede</span>
                @endif
            @endscope

            @scope('cell_actions', $reminder)
                <div class="flex gap-2">
                    <x-button icon="o-pencil" class="btn-ghost btn-sm" />
                    <x-button 
                        icon="o-trash" 
                        class="btn-ghost btn-sm text-error" 
                        wire:click="delete({{ $reminder->id }})"
                        wire:confirm="Bu hatırlatıcıyı silmek istediğinize emin misiniz?"
                    />
                </div>
            @endscope
        </x-table>
    </x-card>
</div>
