<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DentistAccountApproved extends Mailable
{
    use Queueable, SerializesModels;

    public $employee;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($employee)
    {
        $this->employee = $employee;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Congrats '.$this->employee->name.', your account has been approved!')
        ->view('emails.customer.dentist_approved_account');
    }
}
