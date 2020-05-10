<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Redirect;
use App\Http\Controllers\Controller;
use Dingo\Api\Routing\Helpers;
use App\Helpers\Status;
use Illuminate\Validation\Rule;
use App\Models\ServiceAdmin;
use App\Transformers\ServiceAdminTransformer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Response;
use Lang;
// Models
use App\Models\User;
// Transformers
use App\Transformers\UserTransformer;

class ServiceAdminController extends BaseController
{

    use Helpers;

    protected $validationErrors;
    protected $serviceAdmin;
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
        $this->user = new User();

    }

    public function view()
    {
      return view('serviceAdmin');
    }

    public function index(Request $request)
    {
      $serviceAdmins = User::order($request)
                           ->where('user_type', 'sa')
                           ->search($request)
                           ->orderBy('created_at', 'desc')
                           ->paginate($request->get('pagination', parent::PAGINATE_COUNT));
      return $this->data($serviceAdmins, new UserTransformer, 'list_service_admins', Status::HESSA_SUCCESS);

    }

    public function show($id)
    {
      $user = User::find($id);

      if( ! $user || $user->user_type != 'sa' ) {
        return $this->error('item_not_found');
      }

      return $this->data($user, new UserTransformer, 'show_user', Status::HESSA_SUCCESS);

    }


    public function store(Request $request) {

      if($this->isValidStore($request)) {
        $user = $this->user->store($request);
        $result = array();
        $result["isTrue"] = true;
        $result["Message"] = Lang::get("Master.Success_Save");
          return Response::json($result);
        //return $this->data($user, new UserTransformer, 'create_user', Status::HESSA_SUCCESS);
      } else {
          $result = array();
          $result["isTrue"] = false;
          $result["Erorrs"] = $this->validationErrors;
          return Response::json($result);
      }
    }

    public function update(Request $request, $userId) {

      $this->user = User::find($userId);

      if( ! $this->user || $this->user->user_type != 'sa' ) {
        return $this->error('item_not_found');
      }

      if($this->isValidUpdate($request)) {

        $user = $this->user->modify($request);
        $result = array();
        $result["isTrue"] = true;
        $result["Message"] = Lang::get("Master.Success_Update");
        return Response::json($result);
        //return $this->data($user, new ServiceAdminTransformer, 'udpate_service_provider', Status::HESSA_SUCCESS);
      } else {
          $result = array();
          $result["isTrue"] = false;
          $result["Erorrs"] = $this->validationErrors;
          return Response::json($result);
        //return $this->error('invalid_verification', Status::HESSA_ERROR, $this->validationErrors);
      }
    }

    public function toggleActive(Request $request, $userId)
    {

      $this->user = User::find($userId);

      if( ! $this->user || $this->user->user_type != 'sa' ) {
        return $this->error('item_not_found');
      }

      $this->user->user_account_status = ($this->user->user_account_status=='active')?'inactive':'active';
      $this->user->save();

      return $this->success('profile_is_'.$this->user->user_account_status, Status::HESSA_SUCCESS);

    }

    // Validation

    protected function storeRules()
    {
      return [
        'user_name' => ['required'],
        'user_email' => ['required', 'email', 'unique:users,user_email'],
        'password' => ['required'],
        'fk_district_id' => ['exists:districts,district_id'],
      ];
    }

    protected function updateRules()
    {
      return [
        'user_name' => ['required'],
        'user_email' => ['required', 'email', Rule::unique('users','user_email')->ignore($this->user->user_id, 'user_id')],
     //   'password' => ['required', 'confirmed'],
        'fk_district_id' => ['exists:districts,district_id'],
      ];
    }

}
