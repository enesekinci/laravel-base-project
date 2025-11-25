<?php

use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('lists orders for admin with filters', function () {
    adminUser();

    $o1 = Order::factory()->create([
        'status' => 'pending',
        'payment_status' => 'pending',
        'customer_email' => 'a@example.com',
        'placed_at' => now()->subDay(),
    ]);

    $o2 = Order::factory()->create([
        'status' => 'paid',
        'payment_status' => 'paid',
        'customer_email' => 'b@example.com',
        'placed_at' => now(),
    ]);

    $res = $this->getJson('/api/admin/orders?status=paid');

    $res->assertStatus(200)
        ->assertJsonStructure([
            'data' => [
                '*' => ['id', 'status', 'payment_status', 'grand_total'],
            ],
            'meta' => ['current_page', 'per_page', 'total'],
        ]);

    $ids = collect($res->json('data'))->pluck('id');

    expect($ids)->toContain($o2->id);
    expect($ids)->not()->toContain($o1->id);
});

it('updates order status and payment_status', function () {
    adminUser();

    $order = Order::factory()->create([
        'status' => 'pending',
        'payment_status' => 'pending',
    ]);

    $res = $this->putJson("/api/admin/orders/{$order->id}/status", [
        'status' => 'paid',
        'payment_status' => 'paid',
    ]);

    $res->assertStatus(200)
        ->assertJsonPath('data.status', 'paid')
        ->assertJsonPath('data.payment_status', 'paid');

    $this->assertDatabaseHas('orders', [
        'id' => $order->id,
        'status' => 'paid',
        'payment_status' => 'paid',
    ]);
});
