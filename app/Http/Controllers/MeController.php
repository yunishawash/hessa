<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Redirect;
use App\Http\Controllers\Controller;
use Dingo\Api\Routing\Helpers;
use App\Helpers\Status;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Input;

use App\Models\ServiceProvider;
use App\Models\User;
use App\Transformers\ServiceProviderTransformer;
use App\Transformers\UserTransformer;

use Lang;
use Response;
use Validator;

class MeController extends BaseController
{

    use Helpers;

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

    }

    public function profile(Request $request)
    {
      if(auth()->user()->user_type == 'sa') {
        return view('me.sa');
      } else {
        return view('me.sp');
      }
    }

    public function me(Request $request)
    {
      if(auth()->user()->user_type == 'sa') {
        $id = auth()->user()->user_id;
        $User = User::find($id);
        return $this->data($user, new UserTransformer, 'show_user', Status::HESSA_SUCCESS);
      } else {
        $id = auth()->user()->serviceProvider->sp_id; 
        $serviceProvider = ServiceProvider::find($id);
        return $this->data($serviceProvider, new ServiceProviderTransformer, 'show_service_providers', Status::HESSA_SUCCESS);
      }
    }

}
