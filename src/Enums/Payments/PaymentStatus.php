<?php

declare(strict_types=1);

namespace LeviLabs\LaravelFib\Enums\Payments;

enum PaymentStatus: string
{
    case Paid = 'PAID';
    case Unpaid = 'UNPAID';
    case Declined = 'DECLINED';
    case RefundRequested = 'REFUND_REQUESTED';
    case Refunded = 'REFUNDED';

    /**
     * Terminal outcomes while waiting for a customer to complete checkout.
     */
    public function isCheckoutTerminal(): bool
    {
        return match ($this) {
            self::Paid, self::Declined, self::Refunded => true,
            default => false,
        };
    }
}
