<?php namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use Dingo\Api\Routing\Helpers;

use App\Models\Session;
use Lang;

class SessionTransformer extends TransformerAbstract
{
    use Helpers;
    /**
     * Turn this item object into a generic array
     *
     * @return array
     */

    public function __construct() {


    }

    public function transform(Session $session)
    {

        $data = [
          "session_id" => $session->session_id,
          "session_date" => $session->session_date,
          "session_time" => $session->session_time,
          "session_period" => $session->session_period,
          "session_status" => $session->session_status,
          "session_sp_paid" => $session->session_sp_paid,
          "session_notes" => $session->session_notes,
          "session_sp_review_score" => $session->session_sp_review_score,
          "session_sr_notes" => $session->session_sr_notes,
          "session_price" => $session->session_price,
          "session_payment_method" => $session->session_payment_method,
          "session_sa_paid" => $session->session_sa_paid,
          "session_cheque_num" => $session->session_cheque_num,
          "is_session_sp_paid" => $session->is_session_sp_paid,
          "is_session_sa_paid" => $session->is_session_sa_paid,
          "session_status" => $session->session_status,
          "fk_order_id" => $session->fk_order_id,
          "fk_sr_id" => $session->fk_sr_id,
          "fk_sp_id" => $session->fk_sp_id,
          'order' => $session->sessionOrder()->select('order_id', 'fk_assigned_to', 'order_order_summery', 'order_student_name')->first(),
          'service_requester' => $session->serviceRequester()->select('sr_id', 'sr_full_name')->first(),
          'service_provider' => $session->serviceProvider()->select('sp_id', 'sp_full_name')->first(),
        ];

        return $data;
    }

}
