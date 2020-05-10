<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\User;

class SendResetPasswordEmail extends Mailable
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
      $verificationCode = mt_rand(10000000, 99999999);
      $user->password = \Hash::make($verificationCode);
      $user->save();

      return $this->from('info@hessa.net')
                  ->subject(__('Master.hessa_reset_password'))
                  ->view('emails.ResetPassword')
                  ->with(['password'=> $verificationCode]);
    }
}
