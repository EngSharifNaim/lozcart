<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class NewStaff extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public function __construct($data)
    {
        {
            $this->data=$data;
        }
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.staff')->subject(Auth::user()->market_name);
    }
}
