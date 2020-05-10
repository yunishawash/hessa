<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{

    protected $table = 'universities';
    protected $primaryKey = 'univ_id';
    // ------------------- [Casts] -------------------
    /**
    * The attributes that should be cast to native types.
    *
    * @var array
    */
     protected $casts = [
       "univ_id" => "integer",
       "univ_name" => "string"
     ];

    // ------------------- [Relations] -------------------

    // ------------------- [Functions] -------------------

}
