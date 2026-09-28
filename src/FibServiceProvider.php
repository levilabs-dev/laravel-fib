<?php

declare(strict_types=1);

namespace LeviLabs\LaravelFib;

use Illuminate\Support\Facades\Event;
use LeviLabs\LaravelFib\Console\Commands\SyncFibStatuses;
use LeviLabs\LaravelFib\Contracts\FibAuthServiceContract;
use LeviLabs\LaravelFib\Contracts\Payments\FibPaymentServiceContract;
use LeviLabs\LaravelFib\Contracts\Payouts\FibPayoutServiceContract;
use LeviLabs\LaravelFib\Events\Payments\PaymentCreated;
use LeviLabs\LaravelFib\Events\Payments\PaymentRefundRequested;
use LeviLabs\LaravelFib\Events\Payments\PaymentStatusUpdated;
use LeviLabs\LaravelFib\Events\Payouts\PayoutCreated;
use LeviLabs\LaravelFib\Events\Payouts\PayoutStatusUpdated;
use LeviLabs\LaravelFib\Listeners\PersistPaymentListener;
use LeviLabs\LaravelFib\Listeners\PersistPayoutListener;
use LeviLabs\LaravelFib\Services\FibAuthService;
use LeviLabs\LaravelFib\Services\Payments\FibPaymentService;
use LeviLabs\LaravelFib\Services\Payouts\FibPayoutService;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FibServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('fib')
            ->hasConfigFile('fib')
            ->hasMigrations('create_fib_payments_table', 'create_fib_payouts_table', 'create_fib_refunds_table')
            ->runsMigrations()
            ->hasCommand(SyncFibStatuses::class);
    }

    public function registeringPackage(): void
    {
        $this->app->singleton(FibAuthServiceContract::class, FibAuthService::class);
        $this->app->singleton(FibPaymentServiceContract::class, FibPaymentService::class);
        $this->app->singleton(FibPayoutServiceContract::class, FibPayoutService::class);
    }

    public function packageBooted(): void
    {
        Event::listen(PaymentCreated::class, [PersistPaymentListener::class, 'onCreated']);
        Event::listen(PaymentStatusUpdated::class, [PersistPaymentListener::class, 'onStatusUpdated']);
        Event::listen(PaymentRefundRequested::class, [PersistPaymentListener::class, 'onRefundRequested']);
        Event::listen(PayoutCreated::class, [PersistPayoutListener::class, 'onCreated']);
        Event::listen(PayoutStatusUpdated::class, [PersistPayoutListener::class, 'onStatusUpdated']);
    }
}
