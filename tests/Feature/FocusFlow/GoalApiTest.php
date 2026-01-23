<?php

declare(strict_types=1);

namespace Tests\Feature\FocusFlow;

use App\Models\FocusFlow\Goal;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GoalApiTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    public function test_user_can_list_goals()
    {
        Goal::factory()->count(2)->create(['user_id' => $this->user->id]);

        $response = $this->actingAs($this->user)->getJson('/api/v1/goals');

        $response->assertStatus(200)
            ->assertJsonCount(2);
    }

    public function test_user_can_create_goal()
    {
        $data = [
            'title' => 'Test Goal',
            'type' => 'monthly',
            'start_date' => now()->format('Y-m-d'),
            'target_date' => now()->addMonth()->format('Y-m-d'),
        ];

        $response = $this->actingAs($this->user)->postJson('/api/v1/goals', $data);

        $response->assertStatus(201)
            ->assertJsonPath('title', 'Test Goal');
    }
}
