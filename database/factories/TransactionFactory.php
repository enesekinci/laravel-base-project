<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\PaymentMethod;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    protected $model = Transaction::class;

    public function definition(): array
    {
        return [
            'order_id'              => Order::factory(),
            'payment_method_id'     => PaymentMethod::factory(),
            'gateway'               => 'paytr',
            'gateway_transaction_id'=> 'TRX-' . $this->faker->unique()->numerify('########'),
            'type'                  => 'payment',
            'status'                => 'success',
            'amount'                => 100,
            'currency'              => 'TRY',
            'message'               => 'Payment success',
            'processed_at'          => now(),
            'request_payload'       => null,
            'response_payload'      => null,
        ];
    }
}

