<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Redirect;
use App\Http\Controllers\Controller;
use Dingo\Api\Routing\Helpers;
use App\Helpers\Status;
use Illuminate\Validation\Rule;
use App\Models\ServiceRequester;
use App\Transformers\ServiceRequesterTransformer;
use App\Mail\ContactServiceRequesterMessage;

use Illuminate\Support\Facades\Input;
use Lang;
use Response;
use Validator;

class ServiceRequesterController extends BaseController
{

    use Helpers;

    protected $validationErrors;
    protected $serviceRequester;
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
        $this->serviceRequester = new ServiceRequester();

    }

    public function view()
    {
      return view('serviceRequester');
    }

    public function index(Request $request)
    {
      $serviceRequesters = ServiceRequester::order($request)->search($request)->paginate($request->get('pagination', parent::PAGINATE_COUNT));
      return $this->data($serviceRequesters, new ServiceRequesterTransformer, 'list_service_requesters', Status::HESSA_SUCCESS);

    }


    public function show(Request $request, $srId)
    {
      $serviceRequester = ServiceRequester::find($srId);

      if( ! $serviceRequester) {
        return $this->error('item_not_found');
      }

      return $this->data($serviceRequester, new ServiceRequesterTransformer, 'show_service_requester', Status::HESSA_SUCCESS);

    }

    public function store(Request $request) {

      if($this->isValidStore($request)) {

        $serviceRequester = $this->serviceRequester->store($request);
        $result = array();
        $result["isTrue"] = true;
        $result["Message"] = Lang::get("Master.Success_Save");
        return Response::json($result);

        //return $this->data($serviceRequester, new ServiceRequesterTransformer, 'create_service_requester', Status::HESSA_SUCCESS);
      } else {
        $result = array();
        $result["isTrue"] = false;
        $result["Erorrs"] = $this->validationErrors;
        return Response::json($result);
        //return $this->error('invalid_verification', Status::HESSA_ERROR, $this->validationErrors);
      }

    }

    public function update(Request $request, $serviceRequesterId) {

      $this->serviceRequester  = ServiceRequester::find($serviceRequesterId);

      if( ! $this->serviceRequester) {
        return $this->error('item_not_found');
      }

      if($this->isValidUpdate($request)) {
        $serviceRequester = $this->serviceRequester->modify($request);
        $result = array();
        $result["isTrue"] = true;
        $result["Message"] = Lang::get("Master.Success_Update");
        return Response::json($result);
      //  return $this->data($serviceRequester, new ServiceRequesterTransformer, 'udpate_service_requester', Status::HESSA_SUCCESS);
      } else {
        $result = array();
        $result["isTrue"] = false;
        $result["Erorrs"] = $this->validationErrors;
        return Response::json($result);
        //return $this->error('invalid_verification', Status::HESSA_ERROR, $this->validationErrors);
      }
    }


    public function contact(Request $request, $srId)
    {

      $serviceRequester  = ServiceRequester::find($srId);

      if( ! $serviceRequester) {
        return $this->error('item_not_found');
      }

      if($serviceRequester->sr_email == null) {
        return $this->error(_('Mster.sp_has_no_email'));
      }

      $messages = Lang::get("Login_Validator");

      $rules = array(
        'content' => 'required'
      );

      $validator = Validator::make(Input::all(), $rules, $messages);

      if($validator->passes()) {
          \Mail::to($serviceRequester->sr_email)->send(new ContactServiceRequesterMessage($request->content, $serviceRequester));
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

    // Validation

    // Validation

    protected function storeRules()
    {
      return [
        'sr_full_name' => ['required'],
        'sr_mobile' => ['required'],
        'sr_email' => ['nullable','email',Rule::unique('service_requesters','sr_email')->where(function($q){
          $q->whereNotNull('sr_email');
        }), 'unique:users,user_email'],
        'sr_address_1' => ['required'],
        //'sr_street' => ['required'],
        'fk_district_id' => ['required', 'exists:districts,district_id'],
        'fk_location_id' => ['required', 'exists:locations,location_id']
      ];
    }

    protected function updateRules()
    {
      return [
        'sr_full_name' => ['filled'],
        'sr_mobile' => ['filled'],
        'sr_email' => ['nullable','email',Rule::unique('service_requesters','sr_email')->where(function($q){
          $q->whereNotNull('sr_email');
        })->ignore($this->serviceRequester->sr_id, 'sr_id')],
        'sr_address_1' => ['filled'],
        'fk_district_id' => ['filled', 'exists:districts,district_id'],
        'fk_location_id' => ['filled', 'exists:locations,location_id']
      ];
    }


}
