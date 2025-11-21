<?php

namespace App\Services\Payment\DTO;

class PaymentInitResult
{
    public function __construct(
        public bool $success,
        public ?string $redirectUrl = null,
        public ?string $htmlForm = null,
        public ?string $message = null,
    ) {}
}
