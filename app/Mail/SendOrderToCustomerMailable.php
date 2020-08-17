<?php

namespace App\Mail;

use App\Shop\Addresses\Transformations\AddressTransformable;
use App\Shop\Orders\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendOrderToCustomerMailable extends Mailable
{
    use Queueable, SerializesModels, AddressTransformable;

    public $order;
    public $password;

    /**
     * Create a new message instance.
     *
     * @param Order $order
     */
    public function __construct(Order $order, $password = null)
    {
        $this->order = $order;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = [
            'order' => $this->order,
            'detail' => $this->order->detail,
            'products' => $this->order->products,
            'customer' => $this->order->customer,
            'courier' => $this->order->courier,
            'address' => $this->order->address,
            'status' => $this->order->orderStatus,
            'payment' => $this->order->paymentMethod,
            'password' => $this->password
        ];

        return $this->view('emails.customer.sendOrderDetailsToCustomer', $data)->subject('Order Confirmation');
    }
}
