<?php

declare(strict_types=1);

namespace LeviLabs\LaravelFib\Enums\Payments;

enum RefundStatus: string
{
    case Pending = 'PENDING';
    case Success = 'SUCCESS';
    case Failed = 'FAILED';
}
