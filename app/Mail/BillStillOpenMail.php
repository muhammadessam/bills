<?php

namespace App\Mail;

use App\Models\Bill;
use Illuminate\Mail\Mailable;

class BillStillOpenMail extends Mailable
{
    public Bill $bill;

    public function __construct(Bill $bill)
    {
        $this->bill = $bill;
    }

    public function build()
    {
        return $this->view('emails.bill-still-open');
    }
}
