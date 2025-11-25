<?php

use App\Models\Order;
use App\Models\PaymentMethod;
use App\Models\Transaction;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('lists transactions with filters', function () {
    adminUser();

    $order = Order::factory()->create([
        'grand_total' => 250,
    ]);

    $pm = PaymentMethod::factory()->create([
        'code' => 'paytr',
    ]);

    $t1 = Transaction::factory()->create([
        'order_id' => $order->id,
        'payment_method_id' => $pm->id,
        'gateway' => 'paytr',
        'status' => 'success',
        'type' => 'payment',
        'amount' => 250,
    ]);

    $t2 = Transaction::factory()->create([
        'status' => 'failed',
        'type' => 'payment',
    ]);

    $res = $this->getJson('/api/admin/transactions');
    $res->assertStatus(200)
        ->assertJsonStructure([
            'data' => [
                '*' => [
                    'id', 'order_id', 'payment_method_id', 'gateway', 'status', 'amount',
                ],
            ],
            'meta' => ['current_page', 'per_page', 'total'],
        ]);

    $res2 = $this->getJson('/api/admin/transactions?status=success');
    $ids2 = collect($res2->json('data'))->pluck('id');
    expect($ids2)->toContain($t1->id);
    expect($ids2)->not()->toContain($t2->id);

    $res3 = $this->getJson('/api/admin/transactions?order_id='.$order->id);
    $ids3 = collect($res3->json('data'))->pluck('id');
    expect($ids3)->toContain($t1->id);
});

it('shows transaction detail with relations', function () {
    adminUser();

    $order = Order::factory()->create([
        'grand_total' => 150,
        'customer_email' => 'test@example.com',
    ]);

    $pm = PaymentMethod::factory()->create([
        'name' => 'PayTR',
        'code' => 'paytr',
    ]);

    $t = Transaction::factory()->create([
        'order_id' => $order->id,
        'payment_method_id' => $pm->id,
        'amount' => 150,
    ]);

    $res = $this->getJson("/api/admin/transactions/{$t->id}");

    $res->assertStatus(200)
        ->assertJsonPath('data.id', $t->id)
        ->assertJsonPath('data.order.id', $order->id)
        ->assertJsonPath('data.payment_method.code', 'paytr');
});

it('creates a transaction', function () {
    adminUser();

    $order = Order::factory()->create([
        'grand_total' => 300,
    ]);

    $pm = PaymentMethod::factory()->create([
        'code' => 'paytr',
    ]);

    $payload = [
        'order_id' => $order->id,
        'payment_method_id' => $pm->id,
        'gateway' => 'paytr',
        'gateway_transaction_id' => 'TRX-123',
        'type' => 'payment',
        'status' => 'success',
        'amount' => 300,
        'currency' => 'TRY',
        'message' => 'Payment success',
    ];

    $res = $this->postJson('/api/admin/transactions', $payload);

    $res->assertStatus(201)
        ->assertJsonPath('data.order.id', $order->id)
        ->assertJsonPath('data.payment_method.code', 'paytr')
        ->assertJsonPath('data.status', 'success');

    $data = $res->json('data');
    expect((float) $data['amount'])->toBe(300.0);

    $this->assertDatabaseHas('transactions', [
        'order_id' => $order->id,
        'amount' => 300,
        'status' => 'success',
    ]);
});

it('validates transaction create payload', function () {
    adminUser();

    $res = $this->postJson('/api/admin/transactions', [
        'type' => 'invalid',
        'status' => 'invalid',
        'amount' => -10,
    ]);

    $res->assertStatus(422)
        ->assertJsonValidationErrors(['type', 'status', 'amount']);
});

it('updates a transaction', function () {
    adminUser();

    $t = Transaction::factory()->create([
        'status' => 'pending',
        'amount' => 100,
    ]);

    $payload = [
        'status' => 'success',
        'amount' => 120,
        'message' => 'Manual updated',
    ];

    $res = $this->putJson("/api/admin/transactions/{$t->id}", $payload);

    $res->assertStatus(200)
        ->assertJsonPath('data.status', 'success')
        ->assertJsonPath('data.message', 'Manual updated');

    $data = $res->json('data');
    expect((float) $data['amount'])->toBe(120.0);

    $this->assertDatabaseHas('transactions', [
        'id' => $t->id,
        'status' => 'success',
        'amount' => 120,
        'message' => 'Manual updated',
    ]);
});

it('deletes a transaction', function () {
    adminUser();

    $t = Transaction::factory()->create();

    $res = $this->deleteJson("/api/admin/transactions/{$t->id}");
    $res->assertStatus(204);

    $this->assertDatabaseMissing('transactions', [
        'id' => $t->id,
    ]);
});
