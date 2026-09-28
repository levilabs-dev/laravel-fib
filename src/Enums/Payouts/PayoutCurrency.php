<?php

declare(strict_types=1);

namespace LeviLabs\LaravelFib\Enums\Payouts;

enum PayoutCurrency: string
{
    case IQD = 'IQD';
    case USD = 'USD';
    case EUR = 'EUR';
}
