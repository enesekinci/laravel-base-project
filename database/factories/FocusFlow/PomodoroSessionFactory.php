<?php

declare(strict_types=1);

namespace Database\Factories\FocusFlow;

use App\Models\FocusFlow\PomodoroSession;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FocusFlow\PomodoroSession>
 */
class PomodoroSessionFactory extends Factory
{
    protected $model = PomodoroSession::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'duration' => 25,
            'type' => 'work',
            'start_time' => now(),
            'end_time' => now()->addMinutes(25),
            'completed' => true,
        ];
    }
}
