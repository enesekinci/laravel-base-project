<?php

namespace App\Services\Payment\Gateways;

use App\Models\Order;
use App\Models\Transaction;
use App\Services\Order\OrderStateService;
use App\Services\Payment\Contracts\PaymentGateway;
use App\Services\Payment\DTO\PaymentCallbackResult;
use App\Services\Payment\DTO\PaymentInitResult;
use App\Services\Payment\DTO\PaymentRefundResult;
use Illuminate\Support\Facades\Log;

class IyzicoGateway implements PaymentGateway
{
    public function __construct(
        protected OrderStateService $orderStateService,
    ) {}

    public function getName(): string
    {
        return 'Iyzico';
    }

    public function createPayment(Order $order, array $options = []): PaymentInitResult
    {
        // 1. Iyzico API request hazırla
        // 2. checkout form content al
        // 3. front'a htmlForm dönebilirsin

        $htmlForm = '<form>...iyzico checkout form...</form>';

        Transaction::create([
            'order_id' => $order->id,
            'payment_method_id' => $order->payment_method_id,
            'gateway' => 'iyzico',
            'type' => 'payment',
            'status' => 'pending',
            'amount' => $order->grand_total,
            'currency' => $order->currency ?? 'TRY',
            'message' => 'Iyzico payment initiated',
        ]);

        return new PaymentInitResult(
            success: true,
            htmlForm: $htmlForm,
        );
    }

    public function handleCallback(array $payload): PaymentCallbackResult
    {
        // Iyzico callback parse + status sorgu
        Log::info('Iyzico callback payload', $payload);

        $orderId = (int) ($payload['order_id'] ?? 0);
        $success = ($payload['status'] ?? '') === 'success';

        $iyzicoPaymentId = $payload['paymentId'] ?? null;

        $order = Order::findOrFail($orderId);

        $transaction = Transaction::where('order_id', $order->id)
            ->where('gateway', 'iyzico')
            ->latest('id')
            ->first();

        if ($success) {
            $transaction?->update([
                'status' => 'success',
                'gateway_transaction_id' => $iyzicoPaymentId,
                'message' => 'Payment success',
                'processed_at' => now(),
            ]);

            $this->orderStateService->markAsPaid($order);
        } else {
            $transaction?->update([
                'status' => 'failed',
                'message' => $payload['errorMessage'] ?? 'Payment failed',
                'processed_at' => now(),
            ]);

            $this->orderStateService->markPaymentFailed($order);
        }

        return new PaymentCallbackResult(
            success: $success,
            orderReference: (string) $order->id,
            transactionId: $iyzicoPaymentId,
            message: $success ? 'Success' : 'Failed',
        );
    }

    public function refund(Transaction $paymentTransaction, float $amount): PaymentRefundResult
    {
        Log::info('Iyzico refund requested', [
            'payment_id' => $paymentTransaction->gateway_transaction_id,
            'amount' => $amount,
        ]);

        // pseudo: $refund = $iyzicoClient->refund(...);

        $refundId = 'IYZICO_REFUND_'.uniqid();

        return new PaymentRefundResult(
            success: true,
            refundTransactionId: $refundId,
            message: 'Refund success (simulated)',
        );
    }
}
