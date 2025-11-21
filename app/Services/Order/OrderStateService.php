<?php

namespace App\Services\Order;

use App\Models\Order;
use Illuminate\Validation\ValidationException;

class OrderStateService
{
    public function markAsPaid(Order $order): Order
    {
        if ($order->payment_status === 'paid') {
            return $order;
        }

        if ($order->payment_status === 'refunded') {
            throw ValidationException::withMessages(['payment_status' => 'Order already refunded.']);
        }

        $order->payment_status = 'paid';
        if ($order->status === 'pending') {
            $order->status = 'processing';
        }

        $order->save();

        return $order;
    }

    public function markPaymentFailed(Order $order): Order
    {
        if ($order->payment_status === 'paid') {
            throw ValidationException::withMessages(['payment_status' => 'Order already paid.']);
        }

        $order->payment_status = 'failed';
        $order->status = 'pending';
        $order->save();

        return $order;
    }

    public function ship(Order $order): Order
    {
        if ($order->payment_status !== 'paid') {
            throw ValidationException::withMessages(['shipping_status' => 'Order not paid.']);
        }

        $order->shipping_status = 'shipped';
        $order->status = 'processing';
        $order->save();

        return $order;
    }

    public function deliver(Order $order): Order
    {
        if ($order->shipping_status !== 'shipped') {
            throw ValidationException::withMessages(['shipping_status' => 'Order not shipped.']);
        }

        $order->shipping_status = 'delivered';
        $order->status = 'completed';
        $order->save();

        return $order;
    }

    public function cancel(Order $order): Order
    {
        if (in_array($order->status, ['completed', 'cancelled'], true)) {
            return $order;
        }

        $order->status = 'cancelled';
        $order->save();

        return $order;
    }

    public function markRefunded(Order $order): Order
    {
        $order->payment_status = 'refunded';
        $order->status = 'cancelled';
        $order->save();

        return $order;
    }
}
