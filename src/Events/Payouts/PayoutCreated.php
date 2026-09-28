<?php

declare(strict_types=1);

namespace LeviLabs\LaravelFib\Events\Payouts;

use Illuminate\Foundation\Events\Dispatchable;
use LeviLabs\LaravelFib\Data\Payouts\PayoutData;

final class PayoutCreated
{
    use Dispatchable;

    public function __construct(
        public readonly PayoutData $payout,
        public readonly string $account,
        public readonly float $amount,
        public readonly string $targetAccountIban,
        public readonly ?string $description,
        public readonly string $currency,
    ) {}
}
