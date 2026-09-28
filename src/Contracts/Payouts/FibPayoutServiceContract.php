<?php

declare(strict_types=1);

namespace LeviLabs\LaravelFib\Contracts\Payouts;

use LeviLabs\LaravelFib\Data\Payouts\PayoutData;
use LeviLabs\LaravelFib\Data\Payouts\PayoutStatusData;

interface FibPayoutServiceContract
{
    public function create(
        float $amount,
        string $targetAccountIban,
        ?string $description = null,
        ?string $currency = null,
        ?string $account = null,
    ): PayoutData;

    public function authorize(string $payoutId, ?string $account = null): bool;

    public function details(string $payoutId, ?string $account = null): PayoutStatusData;
}
