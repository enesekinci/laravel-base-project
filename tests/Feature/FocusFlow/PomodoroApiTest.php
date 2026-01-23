<?php

declare(strict_types=1);

namespace Tests\Feature\FocusFlow;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PomodoroApiTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    public function test_user_can_get_pomodoro_settings()
    {
        $response = $this->actingAs($this->user)->getJson('/api/v1/pomodoro/settings');

        $response->assertStatus(200);
    }

    public function test_user_can_update_pomodoro_settings()
    {
        $data = [
            'work_duration' => 30,
            'short_break_duration' => 10,
        ];

        $response = $this->actingAs($this->user)->putJson('/api/v1/pomodoro/settings', $data);

        $response->assertStatus(200)
            ->assertJsonPath('work_duration', 30);
    }

    public function test_user_can_start_pomodoro_session()
    {
        $data = [
            'duration' => 25,
            'type' => 'work',
        ];

        $response = $this->actingAs($this->user)->postJson('/api/v1/pomodoro/sessions', $data);

        $response->assertStatus(201)
            ->assertJsonPath('type', 'work');
    }
}
