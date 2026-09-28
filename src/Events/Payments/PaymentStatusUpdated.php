<?php

declare(strict_types=1);

namespace LeviLabs\LaravelFib\Events\Payments;

use Illuminate\Foundation\Events\Dispatchable;
use LeviLabs\LaravelFib\Data\Payments\PaymentStatusData;

final class PaymentStatusUpdated
{
    use Dispatchable;

    public function __construct(
        public readonly PaymentStatusData $status,
        public readonly string $account,
    ) {}
}
