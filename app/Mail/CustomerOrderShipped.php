<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CustomerOrderShipped extends Mailable
{
    use Queueable, SerializesModels;
    public $customer;
    public $order;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order , $customer)
    {
        $this->customer = $customer;
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Order Shipped')
        ->view('emails.customer.ship-impression-kit');
    }
}
