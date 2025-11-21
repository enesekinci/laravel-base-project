<?php

namespace App\Services\Payment\DTO;

class PaymentCallbackResult
{
    public function __construct(
        public bool $success,
        public string $orderReference,  // order number veya id
        public ?string $transactionId = null,
        public ?string $message = null,
    ) {}
}
