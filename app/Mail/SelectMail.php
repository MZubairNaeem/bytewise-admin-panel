<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class SelectMail extends Mailable
{
    public function build()
    {
        return $this->view('emails.select')
            ->subject('Bytewise Fellowship Selection');
    }
}
