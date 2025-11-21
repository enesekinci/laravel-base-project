<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Transaction;
use App\Services\Order\OrderStateService;
use App\Services\Payment\PaymentGatewayManager;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class OrderRefundController extends Controller
{
    public function __construct(
        protected PaymentGatewayManager $gatewayManager,
        protected OrderStateService     $orderStateService,
    ) {}

    public function refund(Request $request, Order $order)
    {
        $data = $request->validate([
            'amount' => ['required', 'numeric', 'min:0.01'],
        ]);

        if ($order->payment_status !== 'paid') {
            throw ValidationException::withMessages(['order' => 'Order is not paid.']);
        }

        /** @var Transaction|null $paymentTransaction */
        $paymentTransaction = Transaction::where('order_id', $order->id)
            ->where('type', 'payment')
            ->where('status', 'success')
            ->latest('id')
            ->first();

        if (! $paymentTransaction) {
            throw ValidationException::withMessages(['transaction' => 'Payment transaction not found.']);
        }

        $paymentMethod = $order->paymentMethod;

        if (! $paymentMethod) {
            throw ValidationException::withMessages(['payment_method' => 'Payment method not found.']);
        }

        $gateway = $this->gatewayManager->resolve($paymentMethod);

        $result = $gateway->refund($paymentTransaction, $data['amount']);

        if (! $result->success) {
            throw ValidationException::withMessages(['refund' => $result->message ?? 'Refund failed.']);
        }

        // Refund transaction kaydı
        $refundTransaction = Transaction::create([
            'order_id'              => $order->id,
            'payment_method_id'     => $order->payment_method_id,
            'gateway'               => $paymentTransaction->gateway,
            'gateway_transaction_id' => $result->refundTransactionId,
            'type'                  => 'refund',
            'status'                => 'success',
            'amount'                => $data['amount'],
            'currency'              => $order->currency ?? 'TRY',
            'message'               => $result->message ?? 'Refund success',
            'processed_at'          => now(),
        ]);

        $this->orderStateService->markRefunded($order);

        // İstersen stok iadesi de burada (veya ayrı service)

        return response()->json([
            'data' => [
                'order_id'         => $order->id,
                'refund_transaction_id' => $refundTransaction->id,
            ],
        ]);
    }
}
