<?php

declare(strict_types=1);

namespace LeviLabs\LaravelFib\Contracts\Payments;

use LeviLabs\LaravelFib\Data\Payments\PaymentData;
use LeviLabs\LaravelFib\Data\Payments\PaymentStatusData;
use LeviLabs\LaravelFib\Data\Payments\RefundData;
use LeviLabs\LaravelFib\Enums\Payments\PaymentCategory;

interface FibPaymentServiceContract
{
    public function create(
        float $amount,
        ?string $description = null,
        ?string $callbackUrl = null,
        ?string $redirectUri = null,
        ?string $expiresIn = null,
        ?PaymentCategory $category = null,
        ?string $account = null,
    ): PaymentData;

    public function status(string $paymentId, ?string $account = null): PaymentStatusData;

    public function cancel(string $paymentId, ?string $account = null): bool;

    /**
     * Requests a refund for a paid payment.
     */
    public function refund(string $paymentId, ?string $account = null): RefundData;
}
