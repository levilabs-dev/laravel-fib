<?php

declare(strict_types=1);

namespace LeviLabs\LaravelFib\Enums\Payouts;

enum PayoutStatus: string
{
    case Created = 'CREATED';
    case Authorized = 'AUTHORIZED';
    case Failed = 'FAILED';
}
