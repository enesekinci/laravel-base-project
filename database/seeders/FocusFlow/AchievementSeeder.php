<?php

declare(strict_types=1);

namespace Database\Seeders\FocusFlow;

use App\Models\FocusFlow\Achievement;
use Illuminate\Database\Seeder;

class AchievementSeeder extends Seeder
{
    public function run(): void
    {
        $achievements = [
            [
                'name' => 'İlk 10 Görev',
                'description' => '10 görev tamamla',
                'icon' => 'trophy',
                'condition_type' => 'completed_todos',
                'condition_value' => 10,
            ],
            [
                'name' => 'Pomodoro Ustası',
                'description' => '50 pomodoro tamamla',
                'icon' => 'clock',
                'condition_type' => 'completed_pomodoros',
                'condition_value' => 50,
            ],
            [
                'name' => '7 Günlük Streak',
                'description' => '7 gün üst üste görev tamamla',
                'icon' => 'fire',
                'condition_type' => 'streak_days',
                'condition_value' => 7,
            ],
            [
                'name' => 'Hedef Avcısı',
                'description' => '5 hedef tamamla',
                'icon' => 'target',
                'condition_type' => 'completed_goals',
                'condition_value' => 5,
            ],
        ];

        foreach ($achievements as $achievement) {
            Achievement::firstOrCreate(
                ['name' => $achievement['name']],
                $achievement
            );
        }
    }
}
