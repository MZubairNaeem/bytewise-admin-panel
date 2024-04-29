<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class ApplyMail extends Mailable
{

    public function build()
    {
        return $this->view('emails.apply')
            ->subject('Bytewise Fellowship Application');
    }
}
