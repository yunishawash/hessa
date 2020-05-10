<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactServiceRequesterMessage extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($content, $serviceRequester)
    {
        $this->content = $content;
        $this->serviceRequester = $serviceRequester;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->from('info@hessa.net')
                    ->subject($this->serviceRequester->sr_full_name)
                    ->view('emails.ContactServiceRequester')
                    ->with(['fullname' => $this->serviceRequester->sr_full_name,'content'=> $this->content]);

    }
}
