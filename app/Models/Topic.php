<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use BaseModel;

    protected $table = 'topics';
    protected $primaryKey = 'topic_id';
    // ------------------- [Casts] -------------------
    /**
    * The attributes that should be cast to native types.
    *
    * @var array
    */
     protected $casts = [
       "topic_id" => "integer",
       "topic_name_ar" => "string",
       "topic_name_en" => "string",
     ];

    // ------------------- [Relations] -------------------

    // ------------------- [Functions] -------------------

}
