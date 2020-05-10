<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{

    protected $table = 'languages';
    protected $primaryKey = 'lang_id';
    // ------------------- [Casts] -------------------
    /**
    * The attributes that should be cast to native types.
    *
    * @var array
    */
     protected $casts = [
       "lang_id" => "integer",
       "lang_name" => "string"
     ];

    // ------------------- [Relations] -------------------
   /**
    * Get location locations
    */
    public function serviceProviders()
    {
       return $this->belongsToMany(serviceProvider::class, 'service_providers_languages', 'fk_lang_id', 'fk_sp_id');
    }
    // ------------------- [Functions] -------------------

}
