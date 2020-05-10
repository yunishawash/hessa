<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\User;

class SendProfileSubmittedSuccessfully extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email)
    {
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      $user = User::where('user_email', $this->email)->first();

      return $this->from('info@hessa.net')
                  ->subject(__('Master.profile_submitted_successfully'))
                  ->view('emails.SendProfileSubmittedSuccessfully')
                  ->with(['fullname' => $user->user_name, 'content'=> __('Master.profile_submitted_message')]);
    }
}
