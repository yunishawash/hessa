<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\User;

class SendOrderAssignedToEmailNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

      return $this->from('info@hessa.net')
                  ->subject(__('Master.order_assigned_to_you'))
                  ->view('emails.SendOrderAssignedToEmailNotification')
                  ->with(['fullname' => $this->order->assignedTo->sp_full_name, 'content'=> __('Master.order_had_been_assigned_to_you').':'.$this->order->serviceRequester->sr_full_name]);
    }
}
