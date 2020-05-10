<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Redirect;
use App\Http\Controllers\Controller;
use Dingo\Api\Routing\Helpers;
use App\Helpers\Status;
use Illuminate\Validation\Rule;
use App\Models\ServiceProvider;
use App\Transformers\ServiceProviderTransformer;
use App\Transformers\PaymentTransformer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Response;
use Lang;
use App\Rules\ID;

use App\Mail\ContactServiceProviderMessage;
use App\Mail\SendProfileSubmittedSuccessfully;
// Models
use App\Models\Order;
use App\Models\Payment;
// Transformers
use App\Transformers\OrderTransformer;
use File;

class ServiceProviderController extends BaseController
{

    use Helpers;

    protected $validationErrors;
    protected $serviceProvider;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
        $this->serviceProvider = new ServiceProvider();

    }

    public function view()
    {
      return view('serviceProvider');
    }

    public function paymentsList($id = 0)
    {
      if(auth()->user()->user_type == 'sp') {
        $id = auth()->user()->serviceProvider->sp_id;
        $serviceProvider = ServiceProvider::find($id);
        if( ! $serviceProvider) {
          return $this->error('item_not_found');
        }
        return view('paymentsList')->with('sp', $serviceProvider );
      }else{
        $serviceProvider = ServiceProvider::find($id);
        if( ! $serviceProvider) {
          return $this->error('item_not_found');
        }
        return view('paymentsList')->with('sp', $serviceProvider );
      }
    }

    public function myOrders()
    {
      return view('myorders');
    }

    public function myInterestOrders()
    {
      return view('myInterestOrders');
    }

    public function index(Request $request)
    {
      $serviceProviders = ServiceProvider::order($request)->search($request)->paginate($request->get('pagination', parent::PAGINATE_COUNT));
      return $this->data($serviceProviders, new ServiceProviderTransformer, 'list_service_providers', Status::HESSA_SUCCESS);

    }

    public function show($id)
    {
      $serviceProvider = ServiceProvider::find($id);

      if( ! $serviceProvider) {
        return $this->error('item_not_found');
      }

      return $this->data($serviceProvider, new ServiceProviderTransformer, 'show_service_providers', Status::HESSA_SUCCESS);
    }


    public function store(Request $request) {

      if($this->isValidStore($request)) {

        if($request->sp_ability_to_teach_at_home == 'no') {
          $apologyBody = ــ('Master.message_to_not_teaching_at_home');
          \Mail::to($request->email)->send(new ContactServiceProviderMessage($apologyBody, $serviceProvider));
        }
        
        
          $serviceProvider = $this->serviceProvider->store($request);
          \Mail::to($serviceProvider->sp_email)->send(new SendProfileSubmittedSuccessfully($serviceProvider->sp_email));

          $result = array();
          $result["isTrue"] = true;
          $result["Message"] = Lang::get("Master.Success_Save");
          return Response::json($result);

      } else {
          $result = array();
          $result["isTrue"] = false;
          $result["Erorrs"] = $this->validationErrors;
          return Response::json($result);
      }
    }

    public function update(Request $request, $serviceProviderId) {

      $this->serviceProvider  = ServiceProvider::find($serviceProviderId);

      if( ! $this->serviceProvider) {
        return $this->error('item_not_found');
      }

      if($this->isValidUpdate($request)) {
        $serviceProvider = $this->serviceProvider->modify($request);

        $result = array();
        $result["isTrue"] = true;
        $result["Message"] = Lang::get("Master.Success_Update");
        return Response::json($result);
        //return $this->data($serviceProvider, new ServiceProviderTransformer, 'udpate_service_provider', Status::HESSA_SUCCESS);
      } else {
          $result = array();
          $result["isTrue"] = false;
          $result["Erorrs"] = $this->validationErrors;
          return Response::json($result);
        //return $this->error('invalid_verification', Status::HESSA_ERROR, $this->validationErrors);
      }
    }


    public function contact(Request $request, $serviceProviderId)
    {

      $serviceProvider = ServiceProvider::find($serviceProviderId);

      if( ! $serviceProvider) {
        return $this->error('item_not_found');
      }

      $messages = Lang::get("Login_Validator");

      $rules = array(
        'content' => 'required'
      );

      $validator = Validator::make(Input::all(), $rules, $messages);
      if($validator->passes()) {

          try {
            
            \Mail::to($serviceProvider->sp_email)->send(new ContactServiceProviderMessage($request->content, $serviceProvider));
          } catch (\Throwable $th) {
            
          }

          $result = array();
          $result["isTrue"] = true;
          $result["Message"] = Lang::get("Master.Success_ContactEmailSent");
          return Response::json($result);
      } else {
          $result = array();
          $result["isTrue"] = false;
          $result["Erorrs"] = $validator->errors();
          return Response::json($result);
      }
    }

    public function toggleActive(Request $request)
    {

      if (\Auth::user()->user_type != 'sp') {
        return $this->error('invalid_operation');
      }

      \Auth::user()->serviceProvider->sp_status = (\Auth::user()->serviceProvider->sp_status=='active')?'inactive':'active';
      \Auth::user()->serviceProvider->save();

      return $this->success('profile_is_'.\Auth::user()->serviceProvider->sp_status, Status::HESSA_SUCCESS);

    }

    public function orders(Request $request, $status = 'taken') {

      if (\Auth::user()->user_type != 'sp') {
        return $this->error('invalid_operation');
      }

      if($status == 'taken') {
        $orders = Order::order($request)->where('fk_assigned_to', \Auth::user()->serviceProvider->sp_id);
      } else if($status == 'interests') {
        $interestedInOrdersIds = \DB::table('interests_orders')->where('fk_sp_id', \Auth::user()->serviceProvider->sp_id)->pluck('fk_order_id');
        $orders = Order::order($request)->whereIn('order_id', $interestedInOrdersIds)->orderBy('created_at', 'desc');
      } else {
        return $this->error('invalid_operation');
      }

      if($request->get('columns')[0]['search']['value'] != null) {
        $orders = $orders->where('order_student_name', 'like', '%'.$request->get('columns')[0]['search']['value'].'%');
      }

      if($request->get('columns')[1]['search']['value'] != null) {
        $orders = $orders->where('order_student_gender', $request->get('columns')[1]['search']['value']);
      }

      if($request->get('columns')[2]['search']['value'] != null) {
        $orders = $orders->where('order_student_class', $request->get('columns')[2]['search']['value']);
      }


      $orders = $orders->paginate($request->get('pagination', parent::PAGINATE_COUNT));

      return $this->data($orders, new OrderTransformer, 'my_orders_list', Status::HESSA_SUCCESS);

    }

    public function payments(Request $request, $serviceProviderId)
    {
      $serviceProvider = ServiceProvider::find($serviceProviderId);

      if( ! $serviceProvider) {
        return $this->error('item_not_found');
      }

      if (\Auth::user()->user_type == 'sp' && \Auth::user()->serviceProvider->sp_id != $serviceProviderId) {
        return $this->error('you_can_see_the_payments_of_service_provider');
      }

      $payments = Payment::order($request)->where('fk_sp_id', $serviceProviderId)->paginate($request->get('pagination', parent::PAGINATE_COUNT));

      return $this->data($payments, new PaymentTransformer, 'list_sp_payments', Status::HESSA_SUCCESS);
    }
    // Validation

    protected function storeRules()
    {
      return [
        'sp_full_name' => ['required'],
        'sp_mobile' => ['required'],
        'sp_facebook_id' => ['required'],
        'sp_email' => ['required', 'email', 'unique:service_providers,sp_email', 'unique:users,user_email'],
        'sp_gender' => ['required', 'in:male,female'],
        'sp_community' => ['required'],
        'sp_personal_passport_img_url'=> ['required'],
        'sp_emergency_number' => ['required'],
        'sp_emergency_contact_name' => ['required'],
        'sp_id_number' => ['required', 'unique:service_providers,sp_id_number', 'size:9', new ID],
        'sp_working_status' => ['in:not_working,part_time,full_time'],
        'sp_high_school_branch' => ['in:science,literary,commercial,hotel,sharia,technology,industrial,professional'],
        'sp_high_school_average' => ['required'],
        'sp_gpa' => ['required'],
        // 'sp_study_year' => ['required_without:sp_graduation_date'],
        'sp_ability_to_teach_at_home' => ['required', 'in:yes,no'],
        'sp_ability_to_teach_levels' => ['required'],
        'sp_ability_to_teach_days' => ['required'],
        'sp_targeted_gender_to_teach' => ['required', 'in:yes,no'],
        'fk_district_id' => ['required', 'exists:districts,district_id'],
        'fk_location_id' => ['required', 'exists:locations,location_id'],
        'fk_univ_id' => ['required', 'exists:universities,univ_id'],
        'fk_sa_id' => ['exists:users,user_id'],
        'fk_as_id' => ['required', 'exists:academic_specializations,as_id'],
      ];
    }

    protected function updateRules()
    {
      return [
        'sp_full_name' => ['filled'],
        'sp_mobile' => ['filled'],
        'sp_facebook_id' => ['filled'],
        'sp_email' => ['filled', 'email',
                       Rule::unique('service_providers','sp_email')->ignore($this->serviceProvider->sp_id, 'sp_id'),
                       Rule::unique('users','user_email')->ignore($this->serviceProvider->user->user_id, 'user_id')
                      ],
        'sp_gender' => ['filled', 'in:male,female'],
        'sp_community' => ['filled'],
        'sp_emergency_number' => ['filled'],
        'sp_emergency_contact_name' => ['filled'],
        'sp_id_number' => ['required', 'size:9', Rule::unique('service_providers','sp_id_number')->ignore($this->serviceProvider->sp_id, 'sp_id'), new ID],
        'sp_working_status' => ['in:not_working,part_time,full_time'],
        'sp_high_school_branch' => ['in:science,literary,tradiontal,commercial,hotel,sharia,technology,industrial,professional'],
        'sp_high_school_average' => ['filled'],
        'sp_gpa' => ['filled'],
        // 'sp_study_year' => ['required_without:sp_graduation_date'],
        'sp_ability_to_teach_at_home' => ['filled', 'in:yes,no'],
        'sp_ability_to_teach_levels' => ['filled'],
        'sp_ability_to_teach_days' => ['filled'],
        'sp_targeted_gender_to_teach' => ['filled', 'in:yes,no'],
        'fk_district_id' => ['filled', 'exists:districts,district_id'],
        'fk_location_id' => ['filled', 'exists:locations,location_id'],
        'fk_univ_id' => ['filled', 'exists:universities,univ_id'],
        'fk_sa_id' => ['exists:users,user_id'],
        'fk_as_id' => ['filled', 'exists:academic_specializations,as_id'],
      ];
    }

}
