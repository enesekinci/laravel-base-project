<?php

declare(strict_types=1);

namespace App\Livewire\FocusFlow\Admin\Statistics;

use App\Services\FocusFlow\StatisticsService;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class StatisticsOverview extends Component
{
    public string $period = 'week';

    public ?int $year = null;

    public ?int $month = null;

    public function mount(): void
    {
        $this->year = now()->year;
        $this->month = now()->month;
    }

    public function render(StatisticsService $statisticsService): View
    {
        $user = auth()->user();

        if ($this->period === 'week') {
            $startDate = Carbon::now()->startOfWeek();
            $stats = $statisticsService->getWeeklyStats($user, $startDate);
        } else {
            $stats = $statisticsService->getMonthlyStats($user, $this->year, $this->month);
        }

        return view('livewire.focusflow.admin.statistics.statistics-overview', [
            'stats' => $stats,
        ]);
    }
}
