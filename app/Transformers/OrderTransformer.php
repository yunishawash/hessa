<?php namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use Dingo\Api\Routing\Helpers;

use App\Models\Order;
use Lang;

class OrderTransformer extends TransformerAbstract
{
    use Helpers;
    /**
     * Turn this item object into a generic array
     *
     * @return array
     */

    public function __construct() {


    }

    public function transform(Order $order)
    {

        $data = [
          'order_id' => $order->order_id,
          'order_status' => Lang::get("Master.order_status_".$order->order_status),
          'preferred_payment_method' => Lang::get("Master.payment_method_".$order->order_preferred_payment_method),
          'relation_to_the_student' => Lang::get("Master.Relation_".$order->order_sr_relation_to_the_student),
          'order_sr_relation_to_the_student' =>$order->order_sr_relation_to_the_student,
          'order_preferred_payment_method' => $order->order_preferred_payment_method,
          'order_student_name' => $order->order_student_name,
          'student_gender' => Lang::get("Master.gender_".ucfirst ($order->order_student_gender)),
          'order_student_gender' => $order->order_student_gender,
          'order_student_class' => $order->order_student_class,
          'order_student_high_school_branch' => $order->order_student_high_school_branch,
          'student_class' => Lang::get("Master.class_".$order->order_student_class),
          'order_order_summery' => $order->order_order_summery,
          'order_other_topics' => $order->order_other_topics,
          'order_other_languages' => $order->order_other_languages,
          'order_session_location' => $order->order_session_location,
          'order_notes' => $order->order_notes,
          'targeted_gender' => Lang::get("Master.gender_".ucfirst ($order->order_targeted_gender)),
          'order_targeted_gender' => $order->order_targeted_gender,
          'order_initial_num_of_sessions' => $order->order_initial_num_of_sessions,
          'service_requester' => $order->serviceRequester->sr_full_name,
          'service_requester_location' => $order->serviceRequester->location->location_name,
          'assigned_to' => isset($order->assignedTo)?$order->assignedTo->sp_full_name:null,
          'fk_assigned_to' => $order->fk_assigned_to,
          'serviceRequester' => $order->serviceRequester,
          'district' => $order->serviceRequester->district->district_name,
          'package' => ['id'=>$order->package['package_id'], 'name' => $order->package['package_name'], 'hourly_rate' => $order->package['package_hourly_rate']],
          'languages' => $order->languages()->selectRaw("lang_id as id, lang_name as name")->orderBy('name')->get(),
          'topics' => $order->topics()->selectRaw("topic_id as id, topic_name_ar as name")->orderBy('name')->get(),
          'created_at' => $order->created_at->format('Y-m-d'),
          'fk_sr_id' => $order->fk_sr_id,
          'fk_service_requester_id' => ['id' => $order->serviceRequester->sr_id, 'name' => $order->serviceRequester->sr_full_name],
          'is_able_to' => $this->fit($order)
        ];


        if(\Auth::user()->user_type == 'sp') {
          $data['is_interested'] = (bool) \DB::table('interests_orders')->where('fk_order_id', $order->order_id)->where('fk_sp_id', \Auth::user()->serviceProvider->sp_id)->count();
        }

        return $data;
    }

    private function fit(Order $order)
    {
      
      if(\Auth::user()->user_type == 'sp') {

        
        $status1 = true;

        if(\Auth::user()->serviceProvider->sp_targeted_gender_to_teach == 'yes') {
          $status1 = $order->order_student_gender == \Auth::user()->serviceProvider->sp_gender;
        }

        $spTopics = \Auth::user()->serviceProvider->topics()->pluck('topic_id')->toArray();
        $orderTopics = $order->topics->pluck('topic_id')->toArray();
        $interSectTopics = array_intersect($spTopics, $orderTopics);
        
        $status2 = count($orderTopics) == count($interSectTopics);


        $status3 = in_array($order->order_student_class, \Auth::user()->serviceProvider->abilityToTeachLevels);

        if($order->order_targeted_gender == 'both') {
          $status4 = true;
        } else {
          $status4 = $order->order_targeted_gender == \Auth::user()->serviceProvider->sp_gender;
        }

        
        return ($status1 && $status2 && $status3 && $status4);

      } else {
        return true;
      }
    }

}
