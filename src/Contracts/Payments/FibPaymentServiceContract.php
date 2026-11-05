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

    /**
     * Polls FIB's Check Payment Status endpoint using FIB's recommended pattern:
     * an initial wait, then repeated status checks until the payment is paid,
     * declined, refunded, expired, or max attempts are reached.
     *
     * Use on a checkout "waiting" screen when the callback may be delayed.
     * Prefer the callback + {@see status()} for fulfillment; schedule
     * `fib:sync-statuses` as a backstop.
     */
    public function pollForStatus(
        string $paymentId,
        ?int $initialWaitSeconds = null,
        ?int $pollIntervalSeconds = null,
        ?int $maxAttempts = null,
        ?string $account = null,
    ): PaymentStatusData;
}
