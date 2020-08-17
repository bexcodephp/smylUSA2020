<?php

namespace App\Events;

use App\Shop\Orders\Order;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class OrderCreateEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $order;
    public $password;

    /**
     * Create a new event instance.
     *
     * @param Order $order
     */
    public function __construct(Order $order, $password = null)
    {
        $this->order = $order;
        $this->password = $password;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     * @codeCoverageIgnore
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
