<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{

    protected $table = 'districts';
    protected $primaryKey = 'district_id';
    // ------------------- [Casts] -------------------
    /**
    * The attributes that should be cast to native types.
    *
    * @var array
    */
     protected $casts = [
       "district_id" => "integer",
       "district_name" => "string"
     ];

    // ------------------- [Relations] -------------------


    /**
    * Get city locations
    */
    public function locations()
    {
       return $this->hasMany(Location::class, 'fk_district_id');
    }

    // ------------------- [Functions] -------------------

}
