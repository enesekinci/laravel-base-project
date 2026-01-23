<?php

declare(strict_types=1);

namespace Tests\Feature\FocusFlow;

use App\Models\FocusFlow\Reminder;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReminderApiTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    public function test_user_can_list_reminders()
    {
        Reminder::factory()->count(2)->create(['user_id' => $this->user->id]);

        $response = $this->actingAs($this->user)->getJson('/api/v1/reminders');

        $response->assertStatus(200)
            ->assertJsonCount(2);
    }

    public function test_user_can_create_reminder()
    {
        $data = [
            'title' => 'Test Reminder',
            'datetime' => now()->addDay()->toIso8601String(),
        ];

        $response = $this->actingAs($this->user)->postJson('/api/v1/reminders', $data);

        $response->assertStatus(201)
            ->assertJsonPath('title', 'Test Reminder');
    }

    public function test_user_can_snooze_reminder()
    {
        $reminder = Reminder::factory()->create(['user_id' => $this->user->id]);

        $response = $this->actingAs($this->user)->postJson("/api/v1/reminders/{$reminder->id}/snooze", [
            'minutes' => 10,
        ]);

        $response->assertStatus(200);
        $this->assertNotNull($reminder->fresh()->snoozed_until);
    }
}
