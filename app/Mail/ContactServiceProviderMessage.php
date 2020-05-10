<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactServiceProviderMessage extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($content, $serviceProvider)
    {
        $this->content = $content;
        $this->serviceProvider = $serviceProvider;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->from('info@hessa.net')
                    ->subject($this->serviceProvider->sp_full_name)
                    ->view('emails.ContactServiceProvider')
                    ->with(['fullname' => $this->serviceProvider->sp_full_name,'content'=> $this->content]);

    }
}
