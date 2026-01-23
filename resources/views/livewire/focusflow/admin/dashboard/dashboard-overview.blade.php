<div>
    <x-header title="Dashboard" separator />

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <x-card>
            <div class="text-2xl font-bold">{{ $todayTodos->count() }}</div>
            <div class="text-sm text-gray-500">Bugünkü Görevler</div>
        </x-card>

        <x-card>
            <div class="text-2xl font-bold">{{ $todayPomodoroCount }}</div>
            <div class="text-sm text-gray-500">Bugünkü Pomodoro</div>
        </x-card>

        <x-card>
            <div class="text-2xl font-bold">{{ $todayStats->focus_duration_minutes }}</div>
            <div class="text-sm text-gray-500">Odaklanma Süresi (dk)</div>
        </x-card>

        <x-card>
            <div class="text-2xl font-bold">{{ $todayStats->streak_days }}</div>
            <div class="text-sm text-gray-500">Streak (Gün)</div>
        </x-card>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
        <x-card>
            <x-header title="Yaklaşan Hatırlatıcılar" />
            <ul class="list-disc list-inside">
                @foreach($upcomingReminders as $reminder)
                    <li>{{ $reminder->title }} - {{ $reminder->datetime->format('d.m.Y H:i') }}</li>
                @endforeach
            </ul>
        </x-card>

        <x-card>
            <x-header title="Aktif Hedefler" />
            <ul class="list-disc list-inside">
                @foreach($activeGoals as $goal)
                    <li>{{ $goal->title }} ({{ $goal->progress }}%)</li>
                @endforeach
            </ul>
        </x-card>
    </div>
</div>
