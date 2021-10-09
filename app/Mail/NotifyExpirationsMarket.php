<?php

namespace App\Mail;

use App\Models\Admin\Market;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyExpirationsMarket extends Mailable
{
    public $market;
    public function __construct($market)
    {
        $this->market=$market;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.notifyExpirations');
    }
}
