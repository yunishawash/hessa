<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use BaseModel;

    protected $primaryKey = 'user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_name' => 'string',
        'user_email' => 'string',
        'user_type' => 'string',
        'fk_district_id' => 'integer',
        'email_verified_at' => 'datetime',
    ];

    // ------------------- [Relations] -------------------
    /**
    * Get location locations
    */
    public function serviceProvider()
    {
       return $this->hasOne(ServiceProvider::class, 'fk_user_id');
    }

    /**
    * Get location locations
    */
    public function district()
    {
       return $this->belongsTo(District::class, 'fk_district_id');
    }

    // ------------------- [Functions] -------------------
    public function store(Request $request)
    {

        $user = new User();
        $user->user_name = $request->user_name;
        $user->user_email =  $request->user_email;
        $user->user_type = 'sa';
        $user->user_account_status = 'inactive';
        $user->password = \Hash::make($request->user_email);
        $user->fk_district_id = $request->fk_district_id;
        $user->save();

       return $user;
    }

    public function modify(Request $request)
    {

        $this->user_name = $request->user_name??$this->user_name;
        $this->user_email =  $request->user_email??$this->user_email;
        $this->fk_district_id = $request->fk_district_id??$this->fk_district_id;
        if($request->has('password') &&  ! empty($request->get('password')) ) {
          $this->password = \Hash::make($request->password);
        }
        $this->save();

       return $this;
    }

    // ------------------- [Scopes] -------------------

    public function scopeSearch($query, $request, $val = null)
    {

        if($val == null ) {
          $val = $request->get('search')['value'];
        }

        if($request->get('columns')[0]['search']['value'] != null) {
          $query =  $query->where('user_name', 'like', '%'.$request->get('columns')[0]['search']['value'].'%');
        }


        if($request->get('columns')[1]['search']['value'] != null) {
          $query = $query->where('user_email', 'like', '%'.$request->get('columns')[1]['search']['value'].'%');
        }

        if($request->get('columns')[2]['search']['value'] != null) {
          $query = $query->where('fk_district_id', $request->get('columns')[2]['search']['value']);
        }

    }


}
