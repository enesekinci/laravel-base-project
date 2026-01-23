<div>
    <x-header title="İstatistikler" separator />

    <x-card>
        <x-select wire:model.live="period" label="Dönem" :options="['week' => 'Haftalık', 'month' => 'Aylık']" class="mb-4" />

        @if($period === 'month')
            <div class="grid grid-cols-2 gap-4 mb-4">
                <x-input wire:model="year" type="number" label="Yıl" />
                <x-input wire:model="month" type="number" label="Ay" min="1" max="12" />
            </div>
        @endif

        <div class="space-y-4">
            @if($period === 'week')
                @foreach($stats as $stat)
                    <div class="border p-4 rounded">
                        <div class="font-bold">{{ $stat['date'] }}</div>
                        <div>Tamamlanan Görevler: {{ $stat['completed_todos'] }}</div>
                        <div>Pomodoro: {{ $stat['pomodoro_count'] }}</div>
                        <div>Odaklanma Süresi: {{ $stat['focus_duration'] }} dk</div>
                    </div>
                @endforeach
            @else
                <div class="border p-4 rounded">
                    <div class="font-bold">Toplam İstatistikler</div>
                    <div>Toplam Tamamlanan Görevler: {{ $stats['total_completed_todos'] }}</div>
                    <div>Toplam Pomodoro: {{ $stats['total_pomodoros'] }}</div>
                    <div>Toplam Odaklanma Süresi: {{ $stats['total_focus_duration'] }} dk</div>
                    <div>Ortalama Günlük Görevler: {{ $stats['average_daily_todos'] }}</div>
                    <div>Ortalama Günlük Pomodoro: {{ $stats['average_daily_pomodoros'] }}</div>
                </div>
            @endif
        </div>
    </x-card>
</div>
