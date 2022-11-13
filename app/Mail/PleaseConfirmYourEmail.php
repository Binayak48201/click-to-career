<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PleaseConfirmYourEmail extends Mailable
{
    public $user = '';

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }


    public function build()
    {
        return $this->markdown('mail.confirm');
    }
}
