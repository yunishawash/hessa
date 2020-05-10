<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Redirect;
use App\Http\Controllers\Controller;
use Dingo\Api\Routing\Helpers;
use App\Helpers\Status;
use Illuminate\Validation\Rule;
use App\Models\Order;
use App\Models\ServiceProvider;
use App\Models\ServiceRequester;
use App\Transformers\OrderTransformer;
use App\Transformers\ServiceProviderTransformer;

use App\Mail\SendOrderAssignedToEmailNotification;


use Validator;
use Response;
use Lang;

class OrderController extends BaseController
{

    use Helpers;

    protected $validationErrors;
    protected $order;
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
        $this->order = new Order();

    }


    public function view()
    {
      if(\Auth::user()->user_type == 'sp') {
        if(\Auth::user()->serviceProvider->sp_profiling_stage != 'Complete' || \Auth::user()->serviceProvider->sp_status != 'active') {
          return redirect()->to('/me/profile');
        }
      }

      return view('order');
    }

    public function new(Request $request)
    {

      $orders = Order::order($request)->with(['interested']);

      if(\Auth::user()->user_type == 'sp') {
        
        if($request->get('order_type') != null &&  $request->get('order_type') != 'all') {
          if($request->get('order_type') == 'assigned_to_me') {
            $orders = $orders->where('fk_assigned_to', \Auth::user()->serviceProvider->sp_id);
          } else if ($request->get('order_type') == 'interested_in') {
            $orders = $orders->whereIn('order_id', \Auth::user()->serviceProvider->interests()->pluck('order_id'))
                             ->whereNull('fk_assigned_to');
          }
        }

        $districtId  = \Auth::user()->serviceProvider->fk_district_id;

        $orders = $orders->whereHas('serviceRequester', function($q) use ($districtId){
          $q = $q->where('fk_district_id', $districtId);
        });

      }
      
      // filters
      if($request->get('columns')[2]['search']['value'] != null) {
        $orders = $orders->where('order_student_name', 'like', '%'.$request->get('columns')[2]['search']['value'].'%');
      }

      if($request->get('columns')[3]['search']['value'] != null) {
        $orders = $orders->where('order_student_gender', $request->get('columns')[3]['search']['value']);
      }

      if($request->get('columns')[4]['search']['value'] != null) {
        $orders = $orders->where('order_student_class', $request->get('columns')[4]['search']['value']);
      }

      if($request->get('columns')[5]['search']['value'] != null) {
        $orders = $orders->where('order_targeted_gender', $request->get('columns')[5]['search']['value']);
      }

      $orders = $orders->paginate($request->get('pagination', parent::PAGINATE_COUNT));
   
      return view('order-new')->with(['orders' => $orders]);
    }

    public function interestedServiceProvidersView($id)
    {
      $order = Order::find($id);
      if( ! $order) {
        return $this->error('item_not_found');
      }

      return view('interested_Service_Providers')->with('order', $order );
    }

    public function spOrdersView($id)
    {
      $serviceProvider = ServiceProvider::find($id);
      
      if( ! $serviceProvider) {
        return $this->error('item_not_found');
      }

      return view('spOrdersView')->with('sp', $serviceProvider );
    }

    public function srOrdersView($id)
    {
      $serviceRequester = ServiceRequester::find($id);
      if( ! $serviceRequester) {
        return $this->error('item_not_found');
      }
      return view('srOrdersView')->with('sr', $serviceRequester );
    }

    public function index(Request $request)
    {
      $orders = Order::order($request);


      if(\Auth::user()->user_type == 'sp') {
        
        if($request->get('order_type') != null &&  $request->get('order_type') != 'all') {
          if($request->get('order_type') == 'assigned_to_me') {
            $orders = $orders->where('fk_assigned_to', \Auth::user()->serviceProvider->sp_id);
          } else if ($request->get('order_type') == 'interested_in') {
            $orders = $orders->whereIn('order_id', \Auth::user()->serviceProvider->interests()->pluck('order_id'))
                             ->whereNull('fk_assigned_to');
          }
        }

        $districtId  = \Auth::user()->serviceProvider->fk_district_id;

        $orders = $orders->whereHas('serviceRequester', function($q) use ($districtId){
          $q = $q->where('fk_district_id', $districtId);
        });

      }
      
      // filters
      if($request->get('columns')[2]['search']['value'] != null) {
        $orders = $orders->where('order_student_name', 'like', '%'.$request->get('columns')[2]['search']['value'].'%');
      }

      if($request->get('columns')[3]['search']['value'] != null) {
        $orders = $orders->where('order_student_gender', $request->get('columns')[3]['search']['value']);
      }

      if($request->get('columns')[4]['search']['value'] != null) {
        $orders = $orders->where('order_student_class', $request->get('columns')[4]['search']['value']);
      }

      if($request->get('columns')[5]['search']['value'] != null) {
        $orders = $orders->where('order_targeted_gender', $request->get('columns')[5]['search']['value']);
      }

      $orders = $orders->paginate($request->get('pagination', parent::PAGINATE_COUNT));

      return $this->data($orders, new OrderTransformer, 'list_orders', Status::HESSA_SUCCESS);

    }



    public function spOrders(Request $request, $spId, $status = null)
    {

      $serviceProvider = ServiceProvider::find($spId);

      if( ! $serviceProvider) {
        return $this->error('item_not_found');
      }

      $serviceProviderOrders =  Order::order($request)->where('fk_assigned_to', $spId);

      if($status != null) {
        $serviceProviderOrders = $serviceProviderOrders->where('order_status', $status);
      }

      return $this->data($serviceProviderOrders->paginate($request->get('pagination', parent::PAGINATE_COUNT)), new OrderTransformer, 'list_sp_orders', Status::HESSA_SUCCESS);

    }

    public function srOrders(Request $request, $srId, $status = null)
    {

      $serviceRequester = ServiceRequester::find($srId);

      if( ! $serviceRequester) {
        return $this->error('item_not_found');
      }

      $serviceRequesterOrders =  Order::order($request)->where('fk_sr_id', $srId);

      if($status != null) {
        $serviceRequesterOrders = $serviceRequesterOrders->where('order_status', $status);
      }

      return $this->data($serviceRequesterOrders->paginate($request->get('pagination', parent::PAGINATE_COUNT)), new OrderTransformer, 'list_sr_orders', Status::HESSA_SUCCESS);


    }

    public function store(Request $request) {

      if($this->isValidStore($request)) {
        $order = $this->order->store($request);
        $result = array();
        $result["isTrue"] = true;
        $result["Message"] = Lang::get("Master.Success_Update");
        return Response::json($result);
      } else {
        $result = array();
        $result["isTrue"] = false;
        $result["Erorrs"] = $this->validationErrors;
        return Response::json($result);
      }
    }

    public function update(Request $request, $orderId) {

      $this->order  = Order::find($orderId);

      if( ! $this->order) {
        return $this->error('item_not_found');
      }

      if($this->isValidUpdate($request)) {
        $order = $this->order->modify($request);
        $result = array();
        $result["isTrue"] = true;
        $result["Message"] = Lang::get("Master.Success_Update");
        return Response::json($result);
        //return $this->data($order, new OrderTransformer, 'udpate_order', Status::HESSA_SUCCESS);
      } else {
        $result = array();
        $result["isTrue"] = false;
        $result["Erorrs"] = $this->validationErrors;
        return Response::json($result);
      //  return $this->error('invalid_verification', Status::HESSA_ERROR, $this->validationErrors);
      }
    }

    public function toggleInterest(Request $request, $orderId) {

      $order  = Order::find($orderId);

      if( ! $order) {
        return $this->error('item_not_found');
      }

      if (\Auth::user()->user_type != 'sp') {
        return $this->error('you_can_not_interest_in_orders');
      }
      if(\DB::table('interests_orders')->where('fk_order_id', $orderId)->where('fk_sp_id', \Auth::user()->serviceProvider->sp_id)->count()) {

        \DB::table('interests_orders')
          ->where('fk_order_id', $orderId)
          ->where('fk_sp_id', \Auth::user()->serviceProvider->sp_id)
          ->delete();

        return $this->success('removed_from_interests_table', Status::HESSA_SUCCESS);
      } else {

        \DB::table('interests_orders')->insert([
          'fk_order_id' => $orderId,
          'fk_sp_id' => \Auth::user()->serviceProvider->sp_id,
        ]);

        return $this->success('added_to_interests_table', Status::HESSA_SUCCESS);
      }

    }


    public function toggleAssignTo(Request $request, $orderId, $serviceProviderId)
    {
      $order  = Order::find($orderId);

      if( ! $order) {
        return $this->error('item_not_found');
      }

      if (\Auth::user()->user_type == 'sp') {
        return $this->error('you_can_not_assigne_orders');
      }

      if ($order->fk_assigned_to == $serviceProviderId) {
        $order->fk_assigned_to = null;
        $order->order_status = 'pending';
        $order->save();
      } else {
        $order->fk_assigned_to = $serviceProviderId;
        $order->order_status = 'assigned';
        $order->save();
        \Mail::to($order->assignedTo->sp_email)->send(new SendOrderAssignedToEmailNotification($order));
      }



      return $this->success('order_assigned', Status::HESSA_SUCCESS);

    }

    public function interestedServiceProviders(Request $request, $orderId)
    {
      $order  = Order::find($orderId);

      if( ! $order) {
        return $this->error('item_not_found');
      }

      if (\Auth::user()->user_type == 'sp') {
        return $this->error('you_can_see_the_interested_of_an_order');
      }

      $serviceProviders = $order->interested()->paginate($request->get('pagination', parent::PAGINATE_COUNT));

      return $this->data($serviceProviders, new ServiceProviderTransformer('interested_list', $order), 'order_interested_service_providers', Status::HESSA_SUCCESS);


    }

    public function show(Request $request, $orderId) {

      $order  = Order::find($orderId);

      if( ! $order) {
        return $this->error('item_not_found');
      }

      return $this->data($order, new OrderTransformer, 'show_order', Status::HESSA_SUCCESS);


    }

    public function destroy(Request $request, $orderId) {

      $order  = Order::find($orderId);

      if( ! $order) {
        return $this->error('item_not_found');
      }

      $order->delete();

      return $this->success('delete_order', Status::HESSA_SUCCESS);

    }

    // Validation

    protected function storeRules()
    {
      return [
        'order_sr_relation_to_the_student' => ['required'],
        'order_student_name' => ['required'],
        'order_student_gender' => ['required', 'in:male,female'],
        'order_student_class' => ['required'],
        'order_targeted_gender' => ['required', 'in:male,female,both'],
        'order_initial_num_of_sessions' => ['required'],
        'fk_service_requester_id' => ['required', 'exists:service_requesters,sr_id'],
        'fk_package_id' => ['required', 'exists:packages,package_id'],
      ];
    }

    protected function updateRules()
    {
      return [
        'order_sr_relation_to_the_student' => ['filled'],
        'order_student_name' => ['filled'],
        'order_student_gender' => ['filled', 'in:male,female'],
        'order_student_class' => ['filled'],
        'order_targeted_gender' => ['filled', 'in:male,female,both'],
        'order_initial_num_of_sessions' => ['filled'],
        'fk_service_requester_id' => ['filled', 'exists:service_requesters,sr_id'],
        'fk_package_id' => ['filled', 'exists:packages,package_id'],
      ];
    }

}
