<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OfferClaimStatusAdmin extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $status, $details, $user_name;
    public function __construct($status, $details, $user_name)
    {
        $this->status = $status;
        $this->details = $details;
        $this->user_name = $user_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Dell Cashback Offer Claim Status')->view('emails.offerClaimResponseAdmin');
    }
}
