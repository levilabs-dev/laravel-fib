<?php

declare(strict_types=1);

namespace LeviLabs\LaravelFib\Data\Payouts;

final readonly class PayoutData
{
    public function __construct(
        public string $payoutId,
    ) {}

    /**
     * @param  array<string, mixed>  $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            payoutId: $data['payoutId'],
        );
    }
}
