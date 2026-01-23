<?php

declare(strict_types=1);

namespace Database\Factories\FocusFlow;

use App\Models\FocusFlow\Todo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FocusFlow\Todo>
 */
class TodoFactory extends Factory
{
    protected $model = Todo::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'category' => $this->faker->randomElement(['İş', 'Kişisel', 'Hobi', 'Sağlık']),
            'priority' => $this->faker->randomElement(['Düşük', 'Orta', 'Yüksek', 'Kritik']),
            'completed' => $this->faker->boolean(),
            'deadline' => $this->faker->optional()->dateTimeBetween('+1 day', '+1 month'),
            'order' => 0,
        ];
    }
}
