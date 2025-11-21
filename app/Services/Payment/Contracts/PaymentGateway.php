<?php

namespace App\Services\Payment\Contracts;

use App\Models\Order;
use App\Models\Transaction;
use App\Services\Payment\DTO\PaymentCallbackResult;
use App\Services\Payment\DTO\PaymentInitResult;
use App\Services\Payment\DTO\PaymentRefundResult;

interface PaymentGateway
{
    /**
     * Ödeme başlat: redirect URL veya form data dönebilir.
     */
    public function createPayment(Order $order, array $options = []): PaymentInitResult;

    /**
     * Gateway callback/webhook payload'ını işle.
     * Bu metot order & transaction update eder, result döner.
     */
    public function handleCallback(array $payload): PaymentCallbackResult;

    /**
     * Refund işlemi.
     */
    public function refund(Transaction $paymentTransaction, float $amount): PaymentRefundResult;

    public function getName(): string;
}
