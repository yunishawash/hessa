<?php namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use Dingo\Api\Routing\Helpers;

use App\Models\Location;

class LocationTransformer extends TransformerAbstract
{
    use Helpers;
    /**
     * Turn this item object into a generic array
     *
     * @return array
     */

    public function __construct() {


    }

    public function transform(Location $location)
    {

        $data = [
          'location_id' => $location->location_id,
          'location_name' => $location->location_name,
        ];

        return $data;
    }

}
