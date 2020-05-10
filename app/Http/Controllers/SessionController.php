<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Redirect;
use App\Http\Controllers\Controller;
use Dingo\Api\Routing\Helpers;
use App\Helpers\Status;
use Illuminate\Validation\Rule;
use App\Models\Session;
use App\Models\ServiceProvider;
use App\Models\ServiceRequester;
use App\Models\Order;
use App\Transformers\SessionTransformer;
use App\Transformers\OrderTransformer;
use Carbon\Carbon;

use Validator;
use Response;
use Lang;

class SessionController extends BaseController
{

    use Helpers;

    protected $validationErrors;
    protected $session;
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
        $this->session = new Session();

    }

    public function todaySessionsView()
    {
      return view('today_Sessions_View');
    }

    public function view($id)
    {
      $order = Order::find($id);

      if( ! $order) {
        return $this->error('item_not_found');
      }

      return view('session')->with('order', $order);
    }

    public function mySession($id)
    {
      $order = Order::find($id);
      if( ! $order) {
        return $this->error('item_not_found');
      }
      return view('mySession')->with('order', $order );
    }

    public function index(Request $request, $orderId)
    {
      $sessions = Session::order($request)->where('fk_order_id', $orderId)->paginate($request->get('pagination', parent::PAGINATE_COUNT));
      return $this->data($sessions, new SessionTransformer, 'list_sessions', Status::HESSA_SUCCESS);
    }

    public function store(Request $request) {

      if($this->isValidStore($request)) {
        $session = $this->session->store($request);
        $result = array();
        $result["isTrue"] = true;
        $result["Message"] = Lang::get("Master.Success_Save");
        return Response::json($result);
       // return $this->data($session, new SessionTransformer, 'create_session', Status::HESSA_SUCCESS);
      } else {
        $result = array();
        $result["isTrue"] = false;
        $result["Erorrs"] = $this->validationErrors;
        return Response::json($result);
       // return $this->error('invalid_verification', Status::HESSA_ERROR, $this->validationErrors);
      }
    }

    public function update(Request $request, $orderId, $sessionId) {

      $this->session  = Session::find($sessionId);

      if( ! $this->session) {
        return $this->error('item_not_found');
      }

      if($this->isValidUpdate($request)) {
        $session = $this->session->modify($request);
        $result = array();
        $result["isTrue"] = true;
        $result["Message"] = Lang::get("Master.Success_Update");
        return Response::json($result);
       //return $this->data($session, new SessionTransformer, 'udpate_session', Status::HESSA_SUCCESS);
      } else {
        $result = array();
        $result["isTrue"] = false;
        $result["Erorrs"] = $this->validationErrors;
        return Response::json($result);
        // return $this->error('invalid_verification', Status::HESSA_ERROR, $this->validationErrors);
      }
    }

    public function show(Request $request, $orderId, $sessionId) {

      $session  = Session::find($sessionId);

      if( ! $session) {
        return $this->error('item_not_found');
      }

      return $this->data($session, new SessionTransformer, 'show_session', Status::HESSA_SUCCESS);


    }

    public function destroy(Request $request, $sessionId) {

      $session  = Session::find($sessionId);

      if( ! $session) {
        return $this->error('item_not_found');
      }

      $session->delete();

      return $this->success('delete_session', Status::HESSA_SUCCESS);

    }

    public function todaySessions(Request $request)
    {
      $sessions = Session::order($request)->where('session_date', Carbon::now()->format('Y-m-d'))->paginate($request->get('pagination', parent::PAGINATE_COUNT));
      return $this->data($sessions, new SessionTransformer, 'list_today_sessions', Status::HESSA_SUCCESS);

    }

    public function toggleDone(Request $request, $orderId, $sessionId) {

      $session  = Session::find($sessionId);

      if( ! $session) {
        return $this->error('item_not_found');
      }

      if ($session->session_status == 'done') {
        $session->session_status = 'not_done';
      } else {
        $session->session_status = 'done';
      }
      $session->save();

      return $this->success('udpate_session', Status::HESSA_SUCCESS);


    }

    // Validation

    protected function storeRules()
    {
      return [
        "session_date" => ["required", 'date_format:Y-m-d'],
        "session_time" => ["required"],
        "session_period" => ["required"],
        "fk_order_id" => ["required", 'exists:orders,order_id'],
        "fk_sr_id" => ['required', 'exists:service_requesters,sr_id'],
      ];
    }

    protected function updateRules()
    {
      return [
        "session_date" => ["filled", 'date_format:Y-m-d'],
        "session_time" => ["filled"],
        "session_period" => ["filled"],
        "fk_order_id" => ["filled", 'exists:orders,order_id'],
        "fk_sr_id" => ['filled', 'exists:service_requesters,sr_id'],
      ];
    }

}
