<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class ServiceRequester extends Model
{
    use BaseModel;

    protected $table = 'service_requesters';
    protected $primaryKey = 'sr_id';
    // ------------------- [Casts] -------------------
    /**
    * The attributes that should be cast to native types.
    *
    * @var array
    */
     protected $casts = [
        'sr_id' => 'integer',
        'sr_full_name' => 'string',
        'sr_mobile' => 'string',
        'sr_email' => 'string',
        'sr_facebook_id' => 'string',
        'sr_gender' => 'string',
        'sr_community' => 'string',
        'sr_address_1' => 'string',
        'sr_address_2' => 'string',
        'sr_street' => 'string',
        'sr_preferred_payment_method' => 'string',
        'sr_join_date' => 'date',
        'fk_district_id' => 'string',
        'fk_location_id' => 'string',
        'fk_inserted_by' => 'string',
        'fk_sa_id' => 'string',
     ];
    // ------------------- [Rules] -------------------
    // ------------------- [Relations] -------------------
        /**
    * Get location locations
    */
    public function district()
    {
       return $this->belongsTo(District::class, 'fk_district_id')->select('district_id', 'district_name');
    }
    /**
    * Get location locations
    */
    public function location()
    {
       return $this->belongsTo(Location::class, 'fk_location_id')->select('location_id', 'location_name');
    }
    /**
    * Get location locations
    */
    public function insertedBy()
    {
       return $this->belongsTo(User::class, 'fk_inserted_by')->select('user_id', 'user_name');
    }
    /**
    * Get location locations
    */
    public function serviceAdmin()
    {
       return $this->belongsTo(User::class, 'fk_sa_id')->select('user_id', 'user_name');
    }

    /**
    * Get languages
    */
    public function languages()
    {
       return $this->belongsToMany(Language::class, 'service_requesters_languages', 'fk_sr_id', 'fk_lang_id')->select('lang_id', 'lang_name');
    }

    /**
    * Get languages
    */
    public function orders()
    {
       return $this->hasMany(Order::class, 'fk_sr_id');
    }

     /**
    * Get topcis
    */
    public function topcis()
    {
       return $this->belongsToMany(AcademicTopics::class, 'service_requesters_academic_topics', 'fk_sr_id', 'fk_as_id')->select('as_id', 'as_name_ar as as_name');
    }
    // ------------------- [Scopes] -------------------
    // ------------------- [Functions] -------------------
    public function store(Request $request)
    {



        $serviceRequester = new ServiceRequester();
        $serviceRequester->sr_full_name = $request->sr_full_name ?? null;
        $serviceRequester->sr_mobile = $request->sr_mobile ?? null;
        $serviceRequester->sr_email = $request->sr_email ?? null;
        $serviceRequester->sr_facebook_id = $request->sr_facebook_id ?? null;
        $serviceRequester->sr_gender = $request->sr_gender ?? null;
        $serviceRequester->sr_community = $request->sr_community ?? null;
        $serviceRequester->sr_address_1 = $request->sr_address_1 ?? null;
        $serviceRequester->sr_address_2 = $request->sr_address_2 ?? null;
        $serviceRequester->sr_street = $request->sr_street ?? null;
        $serviceRequester->sr_join_date = date('Y-m-d');
        $serviceRequester->fk_district_id = $request->fk_district_id ?? null;
        $serviceRequester->fk_location_id = $request->fk_location_id ?? null;
        $serviceRequester->fk_inserted_by = \Auth::user()->user_id;
        $serviceRequester->fk_sa_id = \Auth::user()->user_id;
         if($request->get('sr_email') != null) {
            $user = new User();
            $user->user_name = $request->sr_full_name;
            $user->user_email =  $request->sr_email;
            $user->user_type = 'sr';
            $user->password = \Hash::make($request->password);
            $user->save();
            $serviceRequester->fk_user_id = $user->user_id;
         }
        $serviceRequester->save();

       return $serviceRequester;
    }

    public function modify(Request $request)
    {
        $this->sr_full_name = $request->sr_full_name ?? $this->sr_full_name;
        $this->sr_mobile = $request->sr_mobile ?? $this->sr_mobile;
        $this->sr_email = $request->sr_email;
        $this->sr_facebook_id = $request->sr_facebook_id ?? $this->sr_facebook_id;
        $this->sr_gender = $request->sr_gender ?? $this->sr_gender;
        $this->sr_community = $request->sr_community ?? $this->sr_community;
        $this->sr_address_1 = $request->sr_address_1 ?? $this->sr_address_1;
        $this->sr_address_2 = $request->sr_address_2 ?? $this->sr_address_2;
        $this->sr_street = $request->sr_street ?? $this->sr_street;
        $this->fk_district_id = $request->fk_district_id ?? $this->fk_district_id;
        $this->fk_location_id = $request->fk_location_id ?? $this->fk_location_id;
        $this->save();

       return $this;
    }

    // ------------------- [Scopes] -------------------

    public function scopeSearch($query, $request, $val = null)
    {

        if($request->get('columns')[0]['search']['value'] != null) {
          $query = $query->where('fk_district_id', $request->get('columns')[0]['search']['value']);
        }

        if($request->get('columns')[1]['search']['value'] != null) {
          $query = $query->where('sr_full_name', 'like', '%'.$request->get('columns')[1]['search']['value'].'%');
        }

        if($request->get('columns')[2]['search']['value'] != null) {
          $query = $query->where('sr_mobile', 'like', '%'.$request->get('columns')[2]['search']['value'].'%');
        }

        if($request->get('columns')[3]['search']['value'] != null) {
          $query = $query->where('sr_email', 'like', '%'.$request->get('columns')[3]['search']['value'].'%');
        }


    }

}
