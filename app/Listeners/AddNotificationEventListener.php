<?php

namespace App\Listeners;

use App\Models\Notification;
use App\Events\AddNotification;
use App\Events\OrderCreateEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Shop\Orders\Repositories\OrderRepository;

class AddNotificationEventListener
{
    /**
     * Create the event listener.
     *
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OrderCreateEvent  $event
     * @return void
     */
    public function handle(AddNotification $event)
    {
        Notification::create([
            'user_type' => $event->user_type,
            'user_id' => $event->user_id,
            'message' => $event->message,
        ]);        
    }
}
