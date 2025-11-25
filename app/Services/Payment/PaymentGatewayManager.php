<?php

namespace App\Services\Payment;

use App\Models\PaymentMethod;
use App\Services\Payment\Contracts\PaymentGateway;
use App\Services\Payment\Gateways\IyzicoGateway;
use App\Services\Payment\Gateways\PaytrGateway;
use InvalidArgumentException;

class PaymentGatewayManager
{
    public function __construct(
        protected PaytrGateway $paytr,
        protected IyzicoGateway $iyzico,
    ) {}

    public function resolve(PaymentMethod $method): PaymentGateway
    {
        return match ($method->code) {
            'paytr' => $this->paytr,
            'iyzico' => $this->iyzico,
            default => throw new InvalidArgumentException("Unsupported payment method: {$method->code}"),
        };
    }
}
