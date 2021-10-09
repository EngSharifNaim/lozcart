<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LozCart extends Mailable
{
    use Queueable, SerializesModels;

    public $market;
    public function __construct($market)
    {
        $this->market=$market;
    }
    public function build()
    {
        return $this->markdown('emails.register');
    }
}
