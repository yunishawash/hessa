<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Redirect;
use App\Http\Controllers\Controller;
use Dingo\Api\Routing\Helpers;
use App\Helpers\Status;
use Illuminate\Validation\Rule;
use App\Models\Payment;
use App\Transformers\PaymentTransformer;

use Validator;
use Response;
use Lang;

class PaymentController extends BaseController
{

    use Helpers;

    protected $validationErrors;
    protected $payment;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
        $this->payment = new Payment();

    }

    public function view()
    {
      return view('payment');
    }

    public function index(Request $request, $sessionId = null)
    {
      $payments = Payment::order($request);

      if($sessionId) {
        $payments =  $payments->where('fk_session_id', $sessionId);
      }

      $payments =  $payments->paginate($request->get('pagination', parent::PAGINATE_COUNT));

      return $this->data($payments, new PaymentTransformer, 'list_payments', Status::HESSA_SUCCESS);

    }

    public function store(Request $request) {

      if($this->isValidStore($request)) {
        $payment = $this->payment->store($request);
        $result = array();
        $result["isTrue"] = true;
        $result["Message"] = Lang::get("Master.Success_add_payment");
        return Response::json($result);
        //return $this->data($payment, new PaymentTransformer, 'create_payment', Status::HESSA_SUCCESS);
      } else {
          $result = array();
          $result["isTrue"] = false;
          $result["Erorrs"] = $this->validationErrors;
          return Response::json($result);
        //return $this->error('invalid_verification', Status::HESSA_ERROR, $this->validationErrors);
      }
    }

    public function update(Request $request, $paymentId) {

      $this->payment  = Payment::find($paymentId);

      if( ! $this->payment) {
        return $this->error('item_not_found');
      }

      if($this->isValidUpdate($request)) {
        $payment = $this->payment->modify($request);
        $result = array();
        $result["isTrue"] = true;
        $result["Message"] = Lang::get("Master.Success_Update");
        return Response::json($result);
       // return $this->data($payment, new PaymentTransformer, 'udpate_payment', Status::HESSA_SUCCESS);
      } else {
          $result = array();
          $result["isTrue"] = false;
          $result["Erorrs"] = $this->validationErrors;
          return Response::json($result);
       // return $this->error('invalid_verification', Status::HESSA_ERROR, $this->validationErrors);
      }
    }

    public function show(Request $request, $paymentId) {

      $payment  = Payment::find($paymentId);

      if( ! $payment) {
        return $this->error('item_not_found');
      }
      return $this->data($payment, new PaymentTransformer, 'show_payment', Status::HESSA_SUCCESS);

    }

    public function destroy(Request $request, $paymentId) {

      $payment  = Payment::find($paymentId);

      if( ! $payment) {
        return $this->error('item_not_found');
      }

      $payment->delete();

      return $this->success('delete_payment', Status::HESSA_SUCCESS);

    }

    // Validation

    protected function storeRules()
    {
      return [
        'payment_amount' => ['required'],
        'fk_session_id' => ['exists:sessions,session_id'],
        'fk_order_id' => ['exists:orders,order_id'],
        'fk_sr_id' => ['exists:service_requesters,sr_id'],
      ];
    }

    protected function updateRules()
    {
      return [
        'payment_amount' => ['filled'],
        'fk_session_id' => ['exists:sessions,session_id'],
        'fk_order_id' => ['exists:orders,order_id'],
        'fk_sr_id' => ['exists:service_requesters,sr_id'],
      ];
    }

}
