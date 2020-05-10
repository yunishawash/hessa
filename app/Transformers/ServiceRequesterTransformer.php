<?php namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use Dingo\Api\Routing\Helpers;

use App\Models\ServiceRequester;

class ServiceRequesterTransformer extends TransformerAbstract
{
    use Helpers;
    /**
     * Turn this item object into a generic array
     *
     * @return array
     */

    public function __construct() {


    }

    /**
    * @author Yousef Zammar <yousef.zammar@gmail.com>
    *
    */
    public function transform(ServiceRequester $serviceRequester)
    {
        $data = [
          'sr_id' => $serviceRequester->sr_id,
          'sr_full_name' => $serviceRequester->sr_full_name,
          'sr_mobile' => $serviceRequester->sr_mobile,
          'sr_email' => $serviceRequester->sr_email,
          'sr_facebook_id' => $serviceRequester->sr_facebook_id,
          'sr_gender' => $serviceRequester->sr_gender,
          'sr_community' => $serviceRequester->sr_community,
          'sr_address_1' => $serviceRequester->sr_address_1,
          'sr_address_2' => $serviceRequester->sr_address_2,
          'sr_street' => $serviceRequester->sr_street,
          'sr_join_date' => isset($serviceRequester->sr_join_date)?$serviceRequester->sr_join_date->format('Y-m-d'): null,
          'inserted_by' => isset($serviceRequester->insertedBy)?$serviceRequester->insertedBy->user_name:null,
          'service_admin' => isset($serviceRequester->serviceAdmin)?$serviceRequester->serviceAdmin->user_admin:null,
          'district' => $serviceRequester->district->district_name,
          'fk_district_id' => [
            "id" => $serviceRequester->fk_district_id,
            "name" => $serviceRequester->district->district_name
          ],
          'location' => $serviceRequester->location->location_name,
          'fk_location_id' => [
            "id" => $serviceRequester->fk_location_id,
            "name" => $serviceRequester->location->location_name
          ]
        ];

        return $data;
    }

}
