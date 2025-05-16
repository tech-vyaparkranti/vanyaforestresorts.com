<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnquiryQuoteMail extends Mailable
{
    use SerializesModels;

    public $enquiryData;

    public function __construct($enquiryData)
    {
        $this->enquiryData = $enquiryData;
    }

    public function build()
    {
        return $this->subject('New Enquiry Quote Submitted')
                    ->view('email.enquiry_quote') // This will be your email view
                    ->with('enquiryData', $this->enquiryData);
    }
}
