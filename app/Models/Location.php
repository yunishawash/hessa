<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{

    protected $table = 'locations';
    protected $primaryKey = 'location_id';
    // ------------------- [Casts] -------------------
    /**
    * The attributes that should be cast to native types.
    *
    * @var array
    */
     protected $casts = [
       "location_id" => "integer",
       "location_name" => "string"
     ];

    // ------------------- [Relations] -------------------


    /**
    * Get location locations
    */
    public function city()
    {
       return $this->belongsTo(District::class, 'fk_district_id');
    }

    // ------------------- [Functions] -------------------

}
