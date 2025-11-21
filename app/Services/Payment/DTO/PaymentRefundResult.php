<?php

namespace App\Services\Payment\DTO;

class PaymentRefundResult
{
    public function __construct(
        public bool $success,
        public ?string $refundTransactionId = null,
        public ?string $message = null,
    ) {}
}
