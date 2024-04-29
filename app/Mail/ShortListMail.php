<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class ShortListMail extends Mailable
{
    public function build()
    {
        return $this->view('emails.shortlist')
            ->subject('Bytewise Fellowship Shortlist');
    }
}
