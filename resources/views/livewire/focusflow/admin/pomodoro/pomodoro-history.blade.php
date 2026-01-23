<div>
    <x-header title="Pomodoro Geçmişi" separator />

    <x-card>
        <x-input wire:model.live="date" type="date" label="Tarih" class="mb-4" />

        <x-table :headers="$this->headers" :rows="$sessions" with-pagination>
            @scope('cell_id', $session)
                {{ $session->id }}
            @endscope

            @scope('cell_task_title', $session)
                {{ $session->task_title ?? '-' }}
            @endscope

            @scope('cell_start_time', $session)
                {{ $session->start_time->format('d.m.Y H:i') }}
            @endscope

            @scope('cell_duration', $session)
                {{ $session->duration }} dk
            @endscope

            @scope('cell_type', $session)
                @if($session->type === 'work')
                    <span class="badge badge-primary">Çalışma</span>
                @elseif($session->type === 'short-break')
                    <span class="badge badge-info">Kısa Mola</span>
                @else
                    <span class="badge badge-success">Uzun Mola</span>
                @endif
            @endscope

            @scope('cell_completed', $session)
                @if($session->completed)
                    <span class="badge badge-success">Tamamlandı</span>
                @else
                    <span class="badge badge-ghost">Devam Ediyor</span>
                @endif
            @endscope
        </x-table>
    </x-card>
</div>
