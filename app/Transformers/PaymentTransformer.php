<?php namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use Dingo\Api\Routing\Helpers;

use App\Models\Payment;
use Lang;

class PaymentTransformer extends TransformerAbstract
{
    use Helpers;
    /**
     * Turn this item object into a generic array
     *
     * @return array
     */

    public function __construct() {


    }

    public function transform(Payment $payment)
    {

        $data = [
          "payment_id" => $payment->payment_id,
          "payment_amount" => $payment->payment_amount,
          "created_at" => $payment->created_at->format('H:i Y-m-d'),
          "fk_order_id" => $payment->fk_order_id,
          "fk_session_id" => $payment->fk_order_id,
          "fk_sr_id" => $payment->fk_sr_id,
          "fk_sa_id" => $payment->fk_sa_id,
          "fk_sp_id" => $payment->fk_sp_id
        ];

        if(isset($payment->paymentOrder)) {
          $data['order'] = $payment->paymentOrder()->select('order_id', 'order_order_summery', 'order_student_name')->first();
        }

        if(isset($payment->session)) {
          $data['session'] = $payment->session()->select('session_id', 'session_date', 'session_time')->first();
        }

        if(isset($payment->serviceRequester)) {
          $data['service_requester'] = $payment->serviceRequester()->select('sr_id', 'sr_full_name')->first();
        }

        if(isset($payment->serviceProvider)) {
          $data['service_provider'] = $payment->serviceProvider()->select('sp_id', 'sp_full_name')->first();
        }

        if(isset($payment->serviceAdmin)) {
          $data['service_admin'] = $payment->serviceAdmin()->select('user_id', 'user_name')->first();
        }

        return $data;
    }

}
