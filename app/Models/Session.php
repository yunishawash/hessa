<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{

    use BaseModel;

    protected $table = 'sessions';
    protected $primaryKey = 'session_id';
    // ------------------- [Casts] -------------------
    /**
    * The attributes that should be cast to native types.
    *
    * @var array
    */
     protected $casts = [
        "session_id" => "integer",
        "session_date" => "string",
        "session_time" => "string",
        "session_period" => "string",
        "session_notes" => "string",
        "session_sp_review_score" => "float",
        "session_sr_notes" => "string",
        "session_price" => "float",
        "session_payment_method" => "string",
        "session_sa_paid" => "float",
        "session_cheque_num" => "string",
        "is_session_sp_paid" => "boolean",
        "fk_order_id" => "integer",
        "fk_sr_id" => "integer",
        "fk_sp_id" => "integer",
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
    public function sessionOrder()
    {
       return $this->belongsTo(Order::class, 'fk_order_id');
    }
    // ------------------- [Scopes] -------------------
    // ------------------- [Functions] -------------------
    public function store(Request $request)
    {

        $order = Order::find($request->fk_order_id);

        $session = new Session();
        $session->session_date = $request->session_date??null;
        $session->session_time = $request->session_time??null;
        $session->session_period = $request->session_period??null;
        $session->session_notes = $request->session_notes??null;
        $session->session_payment_method = $request->session_payment_method??null;
        $session->session_cheque_num = $request->session_cheque_num??null;
        $session->fk_order_id = $request->fk_order_id??null;
        $session->is_session_sa_paid = $request->is_session_sa_paid??false;
        $session->is_session_sp_paid = $request->is_session_sp_paid??false;
        $session->fk_sr_id = $request->fk_sr_id??null;
        $session->fk_sp_id = $order->fk_sp_id;
        $session->session_price = $order->package['package_hourly_rate'] * $request->session_period;
        $session->save();

        return $session;
    }

    public function modify(Request $request)
    {

        $this->session_date = $request->session_date??$this->session_date;
        $this->session_time = $request->session_time??$this->session_time;
        $this->session_period = $request->session_period??$this->session_period;
        $this->session_notes = $request->session_notes??$this->session_notes;
        $this->session_payment_method = $request->session_payment_method??$this->session_payment_method;
        $this->session_cheque_num = $request->session_cheque_num??$this->session_cheque_num;
        $this->session_price = $this->sessionOrder->package['package_hourly_rate'] * $request->session_period;
        $this->session_sp_review_score = $request->session_sp_review_score??$this->session_sp_review_score;
        $this->session_sr_notes = $request->session_sr_notes??$this->session_sr_notes;
        $this->is_session_sa_paid = (bool) $request->is_session_sa_paid??$this->is_session_sa_paid;
        $this->is_session_sp_paid = (bool) $request->is_session_sp_paid??$this->is_session_sp_paid;
        
        $this->save();

        return $this;
    }

    // ------------------- [Scopes] -------------------

}
