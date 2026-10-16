<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class BookingRequestMail extends Mailable
{
    public array $booking;

    public function __construct(array $booking)
    {
        $this->booking = $booking;
    }

    public function build()
    {
        return $this->from(config('mail.from.address'), config('mail.from.name', 'M Riverside'))
            ->subject('M Riverside — Yêu cầu tải bảng giá & thông tin dự án')
            ->view('emails.booking-request');
    }
}
