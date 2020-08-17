<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendAppointmentNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $password;
    public $appointment;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($appointment, $password)
    {
        $this->password = $password;
        $this->appointment = $appointment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Your Booking is confirmed')->view('emails.customer.appointment_booking');
    }
}
