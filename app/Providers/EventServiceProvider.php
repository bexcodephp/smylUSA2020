<?php

namespace App\Providers;

use App\Events\AddNotification;
use Illuminate\Support\Facades\Event;
use App\Listeners\AddNotificationEventListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\OrderCreateEvent' => [
            'App\Listeners\OrderCreateEventListener',
        ],
        AddNotification::class => [
            AddNotificationEventListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
