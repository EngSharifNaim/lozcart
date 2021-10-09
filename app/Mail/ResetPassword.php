<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPassword extends Mailable
{
    use Queueable, SerializesModels;

    public $market;
    public $code;
    public function __construct($market,$code)
    {
        $this->market=$market;
        $this->code=$code;
    }
    public function build()
    {
        return $this->markdown('emails.resetPassword');
    }
}
