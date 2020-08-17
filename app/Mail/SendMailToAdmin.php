<?php

namespace App\Mail;

use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailToAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $subject;
    public $msg;
    /**
     * Create a new msg instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->name = $request->name;
        $this->subject = $request->subject;
        $this->msg = $request->message;
    }

    /**
     * Build the msg.
     *
     * @return $this
     */
    public function build()
    {

        return $this->view('emails.admin_email')->subject('User has sent you a query.');
    }
}
