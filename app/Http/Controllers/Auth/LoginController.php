<?php

namespace App\Http\Controllers\Auth;


use Illuminate\Http\Request;
use Illuminate\Http\Redirect;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Response;
use Lang;
use App\Mail\SendResetPasswordEmail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\BaseController;

use App\Rules\ActiveUser;
class LoginController extends BaseController
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/orders/view';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('auth')->except(['home', 'viewLogin', 'doLogin', 'forgetPassword']);
    }

    public function redirectPath()
    {
      return '/auth/login';
    }

    public function home()
    {
        return view('index_home_order');
    }

    public function viewLogin()
    {
        if(\Auth::check()) {
          return redirect()->route('home');
        } else {
          return view('login');
        }
    }

    public function doLogin(Request $request)
    {

      \App::setLocale('ar');

      $messages = Lang::get("Login_Validator");

      $rules = array(
            'email' => ['required', 'exists:users,user_email', new ActiveUser],
            'password' => 'required|min:8|string',
        );

      $validator = Validator::make(Input::all(), $rules, $messages);

      if($validator->passes()) {
        $credentials = $request->only('email', 'password');
        if (\Auth::attempt(['user_email' => $credentials['email'], 'password' => $credentials['password']], (bool) $request->get('remember_me'))) {
          $result = array();
          $result["isTrue"] = true;
          $result["Message"] = Lang::get("Master.Success_Login");
          $result["Redirect"] = route('home');
          return Response::json($result);
        } else {

          $validator->getMessageBag()->add('password', trans('messages.password_wrong'));
          $result = array();
          $result["isTrue"] = false;
          $result["Erorrs"] = $validator->errors();

          return Response::json($result);
        }
      } else {
          $result = array();
          $result["isTrue"] = false;
          $result["Erorrs"] = $validator->errors();
          return Response::json($result);
      }
    }

    /*
    *
    * Check if the user is logged in then logout and redireect to login page, else (if already logged out redirect to login page)
    *
    */
    public function logout(Request $request)
    {
      if(\Auth::check()) {
        \Auth::logout();
      }

      return redirect()->route('login');
    }

    public function changePassword()
    {
      return view('changePassword');
    }

    public function changePasswordSave(Request $request)
    {
      $messages = Lang::get("Login_Validator");

      $rules = array(
            'old_password' => 'required|min:8|string',
            'password' => 'required|min:8|string|same:rpassword',
      );

      $validator = Validator::make(Input::all(), $rules, $messages);

      if($validator->passes()) {
        if (\Auth::attempt(['user_email' => \Auth::user()->user_email, 'password' => $request['old_password']], (bool) $request->get('remember_me'))) {

          $user = \Auth::user();
          $user->password = \Hash::make($request->get('password'));
          $user->save();

          $result = array();
          $result["isTrue"] = true;
          $result["Message"] = Lang::get("Master.Success_changePassword");
          return Response::json($result);

        } else {

          $validator->errors()->add('old_password', trans('validation.old_password_mismatch'));

          $result = array();
          $result["isTrue"] = false;
          $result["Erorrs"] = $validator->errors();
          return Response::json($result);
        }

      } else {
          $result = array();
          $result["isTrue"] = false;
          $result["Erorrs"] = $validator->errors();
          return Response::json($result);
      }
    }


    public function forgetPassword(Request $request)
    {

      $messages = Lang::get("Login_Validator");

      $rules = array(
        'email' => 'required|string|exists:users,user_email',
      );

      $validator = Validator::make(Input::all(), $rules, $messages);

      if($validator->passes()) {
          \Mail::to($request->email)->send(new SendResetPasswordEmail($request->email));
          $result = array();
          $result["isTrue"] = true;
          $result["Message"] = Lang::get("Master.Success_resetPasswordEmailSent");
          return Response::json($result);
      } else {
          $result = array();
          $result["isTrue"] = false;
          $result["Erorrs"] = $validator->errors();
          return Response::json($result);
      }
    }

}
