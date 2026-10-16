<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class ContactRequestMail extends Mailable
{
    public array $contact;

    public function __construct(array $contact)
    {
        $this->contact = $contact;
    }
    public function build()
    {
        $replyTo = !empty($this->contact['email']) ? $this->contact['email'] : config('mail.from.address');

        return $this->from(config('mail.from.address'), config('mail.from.name', 'M Riverside'))
            ->subject('M Riverside — Yêu cầu liên hệ')
            ->replyTo($replyTo)
            ->view('emails.contact-request');
    }
}
