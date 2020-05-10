<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use BaseModel;

    protected $table = 'orders';
    protected $primaryKey = 'order_id';
    // ------------------- [Casts] -------------------
    /**
    * The attributes that should be cast to native types.
    *
    * @var array
    */
     protected $casts = [
       'order_id' => 'integer',
       'order_status' => 'string',
       'package' => 'array',
       'fk_sr_id' => 'integer',
       'fk_package_id' => 'integer',
       'fk_assigned_to' => 'integer',
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
    public function assignedTo()
    {
       return $this->belongsTo(ServiceProvider::class, 'fk_assigned_to')->select('sp_id', 'sp_full_name', 'sp_email');
    }

    /**
    * Get languages
    */
    public function languages()
    {
       return $this->belongsToMany(Language::class, 'orders_languages', 'fk_order_id', 'fk_lang_id')->select('lang_id', 'lang_name');
    }

    /**
    * Get interests
    */
    public function interested()
    {
      return $this->belongsToMany(ServiceProvider::class, 'interests_orders', 'fk_order_id', 'fk_sp_id');
    }

     /**
    * Get topics
    */
    public function topics()
    {
       return $this->belongsToMany(Topic::class, 'orders_topics', 'fk_order_id', 'fk_topic_id')->select('topic_id', 'topic_name_ar as as_name');
    }

    // ------------------- [Scopes] -------------------
    // ------------------- [Functions] -------------------
    public function store(Request $request)
    {
        $package = Package::where('package_id', $request->fk_package_id)->select(['package_id', 'package_name', 'package_hourly_rate'])->first();

        $order = new Order();
        $order->package = $package->toArray();
        $order->order_preferred_payment_method = $request->order_preferred_payment_method ?? null;
        $order->order_sr_relation_to_the_student = $request->order_sr_relation_to_the_student ?? null;
        $order->order_student_name = $request->order_student_name ?? null;
        $order->order_student_gender = $request->order_student_gender ?? null;
        $order->order_student_class = $request->order_student_class ?? null;
        $order->order_order_summery = $request->order_order_summery ?? null;
        $order->order_other_topics = $request->order_other_topics ?? null;
        $order->order_other_languages = $request->order_other_languages ?? null;
        $order->order_session_location = $request->order_session_location ?? null;
        $order->order_status = 'pending';
        $order->order_notes = $request->order_notes ?? null;
        $order->order_targeted_gender = $request->order_targeted_gender ?? null;
        $order->order_initial_num_of_sessions = $request->order_initial_num_of_sessions ?? null;
        $order->fk_sr_id = $request->fk_service_requester_id??null;
        $order->fk_package_id = $request->fk_package_id??null;
        $order->save();

        if( ! empty($request->languages) ) {
          $order->languages()->sync($request->languages);
        }

        if( ! empty($request->topics) ) {
          $order->topics()->sync($request->topics);
        }

        return $order;
    }

    public function modify(Request $request)
    {
      $package = Package::where('package_id', $request->fk_package_id)->select(['package_id', 'package_name', 'package_hourly_rate'])->first();
      $this->package = $package->toArray()??$this->package;

      $this->order_preferred_payment_method = $request->order_preferred_payment_method ?? $this->order_preferred_payment_method;
      $this->order_sr_relation_to_the_student = $request->order_sr_relation_to_the_student ?? $this->order_sr_relation_to_the_student;
      $this->order_preferred_payment_method = $request->order_preferred_payment_method ?? $this->order_preferred_payment_method;
      $this->order_student_name = $request->order_student_name ?? $this->order_student_name;
      $this->order_student_gender = $request->order_student_gender ?? $this->order_student_gender;
      $this->order_student_class = $request->order_student_class ?? $this->order_student_class;
      $this->order_order_summery = $request->order_order_summery ?? $this->order_order_summery;
      $this->order_other_topics = $request->order_other_topics ?? $this->order_other_topics;
      $this->order_other_languages = $request->order_other_languages ?? $this->order_other_languages;
      $this->order_session_location = $request->order_session_location ?? $this->order_session_location;
      $this->order_notes = $request->order_notes ?? $this->order_notes;
      $this->order_targeted_gender = $request->order_targeted_gender ?? $this->order_targeted_gender;
      $this->order_initial_num_of_sessions = $request->order_initial_num_of_sessions ?? $this->order_initial_num_of_sessions;
      $this->fk_sr_id = $request->fk_sr_id??$this->fk_sr_id;
      $this->fk_package_id = $request->fk_package_id??$this->fk_package_id;
      $this->save();

      if( ! empty($request->languages) ) {
        $this->languages()->sync($request->languages);
      }

      if( ! empty($request->topics) ) {
        $this->topics()->sync($request->topics);
      }

      return $this;
    }

    // ------------------- [Scopes] -------------------

    // --- getter
    public function getIsInterestedAttribute(){
      return (bool) \DB::table('interests_orders')->where('fk_order_id', $this->order_id)->where('fk_sp_id', \Auth::user()->serviceProvider->sp_id)->count();
    }

}
