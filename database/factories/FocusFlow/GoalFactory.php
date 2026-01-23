<?php

declare(strict_types=1);

namespace Database\Factories\FocusFlow;

use App\Models\FocusFlow\Goal;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FocusFlow\Goal>
 */
class GoalFactory extends Factory
{
    protected $model = Goal::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'type' => $this->faker->randomElement(['daily', 'weekly', 'monthly', 'yearly']),
            'progress' => $this->faker->numberBetween(0, 100),
            'start_date' => now(),
            'target_date' => now()->addMonth(),
            'completed' => false,
            'notes' => $this->faker->optional()->text(),
        ];
    }
}
