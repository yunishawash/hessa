<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{

    protected $table = 'packages';
    protected $primaryKey = 'package_id';
    // ------------------- [Casts] -------------------
    /**
    * The attributes that should be cast to native types.
    *
    * @var array
    */
     protected $casts = [
        'package_id' => 'integer',
        'package_name' => 'string',
        'package_price' => 'float',
        'package_hourly_rate' => 'float',
        'fk_district_id' => 'integer',
     ];
    // ------------------- [Rules] -------------------
    // ------------------- [Relations] -------------------
    // ------------------- [Scopes] -------------------
    // ------------------- [Functions] -------------------
    // ------------------- [Scopes] -------------------


}
