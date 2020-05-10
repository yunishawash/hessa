<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{

    use BaseModel;

    protected $table = 'payments';
    protected $primaryKey = 'payment_id';
    // ------------------- [Casts] -------------------
    /**
    * The attributes that should be cast to native types.
    *
    * @var array
    */
     protected $casts = [
       'payment_id' => 'integer',
       'payment_status' => 'string',
       'package' => 'array',
       'fk_sr_id' => 'integer',
       'fk_package_id' => 'integer',
       'fk_assigned_to' => 'integer',
     ];
    // ------------------- [Rules] -------------------
    // ------------------- [Relations] -------------------
    /**
    * Get location locations
    */
    public function serviceRequester()
    {
       return $this->belongsTo(ServiceRequester::class, 'fk_sr_id');
    }


    public function serviceAdmin()
    {
       return $this->belongsTo(User::class, 'fk_sa_id');
    }

    /**
    * Get languages
    */
    public function serviceProvider()
    {
       return $this->belongsTo(ServiceProvider::class, 'fk_sp_id');
    }

    /**
    * Get languages
    */
    public function paymentOrder()
    {
       return $this->belongsTo(Order::class, 'fk_order_id');
    }

    /**
    * Get languages
    */
    public function session()
    {
       return $this->belongsTo(Session::class, 'fk_session_id');
    }

    // ------------------- [Scopes] -------------------
    // ------------------- [Functions] -------------------
    public function store(Request $request)
    {

        $payment = new Payment();
        $payment->payment_amount = $request->payment_amount??null;
        $payment->fk_session_id = $request->fk_session_id??null;
        $payment->fk_order_id = $request->fk_order_id??null;
        $payment->fk_sr_id = $request->fk_sr_id??null;
        $payment->fk_sp_id = $request->fk_sp_id??null;
        $payment->fk_sa_id = \Auth::user()->user_id;


        if($request->fk_session_id) {
          $session = Session::find($request->fk_session_id);
          if($session) {
            $payment->fk_order_id = $session->paymentOrder->order_id??null;
          }
        }

        $payment->save();

        return $payment;
    }

    public function modify(Request $request)
    {

      $this->payment_amount = $request->payment_amount??null;
      $this->fk_session_id = $request->fk_session_id??null;
      $this->fk_order_id = $request->fk_order_id??null;
      $this->fk_sr_id = $request->fk_sr_id??null;
      $this->fk_sp_id = $request->fk_sp_id??null;

      if($request->fk_session_id) {
        $session = Session::find($request->fk_session_id);
        if($session) {
          $this->fk_order_id = $session->paymentOrder->order_id??null;
        }
      }

      $this->save();

      return $this;

    }

    // ------------------- [Scopes] -------------------

}
