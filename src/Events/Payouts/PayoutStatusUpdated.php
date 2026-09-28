<?php

declare(strict_types=1);

namespace LeviLabs\LaravelFib\Events\Payouts;

use Illuminate\Foundation\Events\Dispatchable;
use LeviLabs\LaravelFib\Data\Payouts\PayoutStatusData;

final class PayoutStatusUpdated
{
    use Dispatchable;

    public function __construct(
        public readonly PayoutStatusData $status,
        public readonly string $account,
    ) {}
}
