<div>
    <x-header title="Pomodoro Zamanlayıcı" separator />

    <x-card>
        <div class="text-center">
            <div class="text-6xl font-bold mb-4">{{ floor($remainingSeconds / 60) }}:{{ str_pad($remainingSeconds % 60, 2, '0', STR_PAD_LEFT) }}</div>

            <div class="flex justify-center gap-2 mb-4">
                @if (! $isRunning && ! $currentSession)
                    <x-button label="Başlat" icon="o-play" class="btn-primary" wire:click="start" />
                @elseif ($isRunning)
                    <x-button label="Duraklat" icon="o-pause" wire:click="pause" />
                    <x-button label="Tamamla" icon="o-check" class="btn-success" wire:click="complete" />
                @else
                    <x-button label="Devam Et" icon="o-play" wire:click="resume" />
                    <x-button label="Sıfırla" icon="o-arrow-path" class="btn-ghost" wire:click="resetTimer" />
                @endif
            </div>

            <x-input wire:model="taskTitle" label="Görev Adı" placeholder="Hangi görev için çalışıyorsunuz?" />
        </div>
    </x-card>

    @script
        <script>
            setInterval(() => {
                $wire.tick()
            }, 1000)
        </script>
    @endscript
</div>
