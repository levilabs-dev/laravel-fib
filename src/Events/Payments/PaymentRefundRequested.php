<?php

declare(strict_types=1);

namespace LeviLabs\LaravelFib\Events\Payments;

use Illuminate\Foundation\Events\Dispatchable;
use LeviLabs\LaravelFib\Data\Payments\RefundData;

final class PaymentRefundRequested
{
    use Dispatchable;

    public function __construct(
        public readonly RefundData $refund,
        public readonly string $account,
    ) {}
}
