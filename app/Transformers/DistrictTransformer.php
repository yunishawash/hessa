<?php namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use Dingo\Api\Routing\Helpers;

use App\Models\District;

class DistrictTransformer extends TransformerAbstract
{
    use Helpers;
    /**
     * Turn this item object into a generic array
     *
     * @return array
     */

    public function __construct() {


    }

    public function transform(District $district)
    {

        $data = [
          'district_id' => $district->district_id,
          'district_name' => $district->district_name,
        ];

        return $data;
    }

}
