<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicSpecialization extends Model
{

    protected $table = 'academic_specializations';
    protected $primaryKey = 'as_id';
    // ------------------- [Casts] -------------------
    /**
    * The attributes that should be cast to native types.
    *
    * @var array
    */
     protected $casts = [
       "as_id" => "integer",
       "as_name_ar" => "string",
       "as_name_en" => "string",
     ];

    // ------------------- [Relations] -------------------

    // ------------------- [Functions] -------------------

}
