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

class PaytrGateway implements PaymentGateway
{
    public function __construct(
        protected OrderStateService $orderStateService,
    ) {}

    public function getName(): string
    {
        return 'PayTR';
    }

    public function createPayment(Order $order, array $options = []): PaymentInitResult
    {
        // 1. PayTR için gerekli parametreleri hazırla
        // 2. imza hesapla
        // 3. PayTR API'ye isteği at
        // 4. "token" al ve redirect URL üret

        // Örnek (pseudo):
        // $token = $this->client->initPayment([...]);

        $redirectUrl = 'https://www.paytr.com/odeme/guvenli/' . 'TOKEN_HERE';

        // Transaction kaydı
        Transaction::create([
            'order_id'              => $order->id,
            'payment_method_id'     => $order->payment_method_id,
            'gateway'               => 'paytr',
            'gateway_transaction_id' => null, // token veya sonra gelecek id
            'type'                  => 'payment',
            'status'                => 'pending',
            'amount'                => $order->grand_total,
            'currency'              => $order->currency ?? 'TRY',
            'message'               => 'PayTR payment initiated',
        ]);

        return new PaymentInitResult(
            success: true,
            redirectUrl: $redirectUrl,
        );
    }

    public function handleCallback(array $payload): PaymentCallbackResult
    {
        // 1. imza doğrula
        // 2. order_number / merchant_oid gibi alanlardan order'ı bul
        // 3. success/fail durumuna göre transaction & order update et

        Log::info('PayTR callback payload', $payload);

        $orderId = (int)($payload['order_id'] ?? 0);
        $success = ($payload['status'] ?? '') === 'success';

        $transactionId = $payload['transaction_id'] ?? null;

        $order = Order::findOrFail($orderId);

        $transaction = Transaction::where('order_id', $order->id)
            ->where('gateway', 'paytr')
            ->latest('id')
            ->first();

        if ($success) {
            $transaction?->update([
                'status'                => 'success',
                'gateway_transaction_id' => $transactionId,
                'message'               => 'Payment success',
                'processed_at'          => now(),
            ]);

            $this->orderStateService->markAsPaid($order);
        } else {
            $transaction?->update([
                'status'       => 'failed',
                'message'      => $payload['failed_reason'] ?? 'Payment failed',
                'processed_at' => now(),
            ]);

            $this->orderStateService->markPaymentFailed($order);
        }

        return new PaymentCallbackResult(
            success: $success,
            orderReference: (string)$order->id,
            transactionId: $transactionId,
            message: $success ? 'Success' : 'Failed',
        );
    }

    public function refund(Transaction $paymentTransaction, float $amount): PaymentRefundResult
    {
        // Burada PayTR refund API çağrısı yapılır
        Log::info('PayTR refund requested', [
            'transaction_id' => $paymentTransaction->gateway_transaction_id,
            'amount'         => $amount,
        ]);

        // pseudo: $refundId = $this->client->refund(...);

        $refundId = 'PAYTR_REFUND_' . uniqid();

        return new PaymentRefundResult(
            success: true,
            refundTransactionId: $refundId,
            message: 'Refund success (simulated)',
        );
    }
}
