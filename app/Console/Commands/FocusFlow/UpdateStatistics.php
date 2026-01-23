<?php

declare(strict_types=1);

namespace App\Console\Commands\FocusFlow;

use App\Models\User;
use App\Services\FocusFlow\StatisticsService;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UpdateStatistics extends Command
{
    protected $signature = 'focusflow:update-statistics {--date=}';

    protected $description = 'Update statistics for all users';

    public function __construct(
        protected StatisticsService $statisticsService
    ) {
        parent::__construct();
    }

    public function handle(): int
    {
        $date = $this->option('date')
            ? Carbon::parse($this->option('date'))
            : now()->subDay(); // Dünün istatistiklerini güncelle

        $this->info("Updating statistics for date: {$date->format('Y-m-d')}");

        $users = User::all();
        $updated = 0;

        foreach ($users as $user) {
            $this->statisticsService->updateDaily($user, $date);
            $updated++;
        }

        $this->info("Updated statistics for {$updated} users.");

        return Command::SUCCESS;
    }
}
