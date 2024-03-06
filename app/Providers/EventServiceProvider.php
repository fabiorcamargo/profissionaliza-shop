<?php

namespace App\Providers;

use App\Models\AsaasCustomer;
use App\Models\User;
use App\Models\UserOrder;
use App\Observers\AsaasCustomerObserver;
use App\Observers\UserObserver;
use App\Observers\UserOrderObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        AsaasCustomer::observe(AsaasCustomerObserver::class);
        User::observe(UserObserver::class);
        UserOrder::observe(UserOrderObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
