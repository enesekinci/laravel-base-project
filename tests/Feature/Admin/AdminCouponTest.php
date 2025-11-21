<?php

use App\Models\User;
use App\Models\Coupon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;

uses(RefreshDatabase::class);

if (!function_exists('adminUser')) {
    function adminUser(): User
    {
        $user = User::factory()->create();
        test()->actingAs($user, 'sanctum');
        return $user;
    }
}

it('lists coupons with filters for admin', function () {
    adminUser();

    $now = Carbon::now();

    $c1 = Coupon::factory()->create([
        'code'          => 'SAVE10',
        'type'          => 'percent',
        'value'         => 10,
        'min_cart_total' => 100,
        'is_active'     => true,
        'starts_at'     => $now->copy()->subDay(),
        'ends_at'       => $now->copy()->addDay(),
        'used_count'    => 5,
    ]);

    $c2 = Coupon::factory()->create([
        'code'          => 'FIX50',
        'type'          => 'fixed',
        'value'         => 50,
        'min_cart_total' => 200,
        'is_active'     => false,
        'starts_at'     => $now->copy()->subDays(10),
        'ends_at'       => $now->copy()->subDays(5),
        'used_count'    => 1,
    ]);

    // basic list
    $res = $this->getJson('/api/admin/coupons');

    $res->assertStatus(200)
        ->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'code',
                    'type',
                    'value',
                    'min_cart_total',
                    'usage_limit',
                    'usage_limit_per_user',
                    'used_count',
                    'is_active',
                    'starts_at',
                    'ends_at',
                ],
            ],
            'meta' => ['current_page', 'per_page', 'total'],
        ]);

    // search by code
    $res2 = $this->getJson('/api/admin/coupons?search=SAVE');
    $res2->assertStatus(200);
    $ids2 = collect($res2->json('data'))->pluck('id');

    expect($ids2)->toContain($c1->id);
    expect($ids2)->not()->toContain($c2->id);

    // filter by is_active
    $res3 = $this->getJson('/api/admin/coupons?is_active=0');
    $res3->assertStatus(200);
    $ids3 = collect($res3->json('data'))->pluck('id');

    expect($ids3)->toContain($c2->id);
    expect($ids3)->not()->toContain($c1->id);

    // filter by type
    $res4 = $this->getJson('/api/admin/coupons?type=fixed');
    $res4->assertStatus(200);
    $ids4 = collect($res4->json('data'))->pluck('id');

    expect($ids4)->toContain($c2->id);
    expect($ids4)->not()->toContain($c1->id);
});

it('shows a single coupon detail', function () {
    adminUser();

    $coupon = Coupon::factory()->create([
        'code'          => 'SAVE10',
        'type'          => 'percent',
        'value'         => 10,
        'min_cart_total' => 100,
        'usage_limit'   => 50,
        'usage_limit_per_user' => 5,
        'used_count'    => 10,
        'is_active'     => true,
    ]);

    $res = $this->getJson("/api/admin/coupons/{$coupon->id}");

    $res->assertStatus(200)
        ->assertJsonPath('data.id', $coupon->id)
        ->assertJsonPath('data.code', 'SAVE10')
        ->assertJsonPath('data.type', 'percent');

    $data = $res->json('data');
    expect((float) $data['value'])->toBe(10.0);
});

it('creates a coupon', function () {
    adminUser();

    $startsAt = now()->addDay();
    $endsAt   = now()->addDays(10);

    $payload = [
        'code'                  => 'NEW10',
        'type'                  => 'percent',
        'value'                 => 10,
        'min_cart_total'        => 100,
        'usage_limit'           => 100,
        'usage_limit_per_user'  => 3,
        'is_active'             => true,
        'starts_at'             => $startsAt->toIso8601String(),
        'ends_at'               => $endsAt->toIso8601String(),
    ];

    $res = $this->postJson('/api/admin/coupons', $payload);

    $res->assertStatus(201)
        ->assertJsonPath('data.code', 'NEW10')
        ->assertJsonPath('data.type', 'percent')
        ->assertJsonPath('data.usage_limit', 100)
        ->assertJsonPath('data.usage_limit_per_user', 3)
        ->assertJsonPath('data.is_active', true);

    $data = $res->json('data');
    expect((float) $data['value'])->toBe(10.0);
    expect((float) $data['min_cart_total'])->toBe(100.0);

    $this->assertDatabaseHas('coupons', [
        'code'           => 'NEW10',
        'type'           => 'percent',
        'value'          => 10,
        'min_cart_total' => 100,
        'usage_limit'    => 100,
        'is_active'      => true,
    ]);
});

it('validates coupon create payload', function () {
    adminUser();

    $res = $this->postJson('/api/admin/coupons', [
        'code' => '',
        'type' => 'invalid',
        'value' => -10,
    ]);

    $res->assertStatus(422)
        ->assertJsonValidationErrors(['code', 'type', 'value']);
});

it('updates a coupon', function () {
    adminUser();

    $coupon = Coupon::factory()->create([
        'code'          => 'SAVE10',
        'type'          => 'percent',
        'value'         => 10,
        'min_cart_total' => 100,
        'usage_limit'   => 50,
        'is_active'     => true,
    ]);

    $payload = [
        'code'          => 'SAVE20',
        'type'          => 'fixed',
        'value'         => 20,
        'min_cart_total' => 200,
        'usage_limit'   => 200,
        'usage_limit_per_user' => 10,
        'is_active'     => false,
    ];

    $res = $this->putJson("/api/admin/coupons/{$coupon->id}", $payload);

    $res->assertStatus(200)
        ->assertJsonPath('data.code', 'SAVE20')
        ->assertJsonPath('data.type', 'fixed')
        ->assertJsonPath('data.usage_limit', 200)
        ->assertJsonPath('data.usage_limit_per_user', 10)
        ->assertJsonPath('data.is_active', false);

    $data = $res->json('data');
    expect((float) $data['value'])->toBe(20.0);
    expect((float) $data['min_cart_total'])->toBe(200.0);

    $this->assertDatabaseHas('coupons', [
        'id'             => $coupon->id,
        'code'           => 'SAVE20',
        'type'           => 'fixed',
        'value'          => 20,
        'min_cart_total' => 200,
        'usage_limit'    => 200,
        'usage_limit_per_user' => 10,
        'is_active'      => false,
    ]);
});

it('soft deletes and restores a coupon', function () {
    adminUser();

    $coupon = Coupon::factory()->create([
        'code' => 'SAVE10',
    ]);

    $res = $this->deleteJson("/api/admin/coupons/{$coupon->id}");
    $res->assertStatus(204);

    $this->assertSoftDeleted('coupons', [
        'id' => $coupon->id,
    ]);

    $res2 = $this->postJson("/api/admin/coupons/{$coupon->id}/restore");

    $res2->assertStatus(200)
        ->assertJsonPath('data.id', $coupon->id);

    $this->assertDatabaseHas('coupons', [
        'id'         => $coupon->id,
        'deleted_at' => null,
    ]);
});

it('toggles coupon active status', function () {
    adminUser();

    $coupon = Coupon::factory()->create([
        'code'      => 'SAVE10',
        'is_active' => true,
    ]);

    $res = $this->postJson("/api/admin/coupons/{$coupon->id}/toggle-active");
    $res->assertStatus(200)
        ->assertJsonPath('data.is_active', false);

    $coupon->refresh();
    expect($coupon->is_active)->toBeFalse();

    $res2 = $this->postJson("/api/admin/coupons/{$coupon->id}/toggle-active");
    $res2->assertStatus(200)
        ->assertJsonPath('data.is_active', true);

    $coupon->refresh();
    expect($coupon->is_active)->toBeTrue();
});
