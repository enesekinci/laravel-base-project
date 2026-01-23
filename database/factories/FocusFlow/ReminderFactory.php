<?php

declare(strict_types=1);

namespace Database\Factories\FocusFlow;

use App\Models\FocusFlow\Reminder;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FocusFlow\Reminder>
 */
class ReminderFactory extends Factory
{
    protected $model = Reminder::class;

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
            'datetime' => $this->faker->dateTimeBetween('now', '+1 week'),
            'priority' => $this->faker->randomElement(['Düşük', 'Orta', 'Yüksek', 'Kritik']),
            'category' => $this->faker->randomElement(['Kişisel', 'İş', 'Sağlık']),
            'completed' => false,
        ];
    }
}
