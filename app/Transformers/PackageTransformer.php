<?php namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use Dingo\Api\Routing\Helpers;

use App\Models\Package;

class PackageTransformer extends TransformerAbstract
{
    use Helpers;
    /**
     * Turn this item object into a generic array
     *
     * @return array
     */

    public function __construct() {


    }

    public function transform(Package $package)
    {
        $data = [
          'package_id' => $package->package_id,
          'package_name' => $package->package_name,
          'package_price' => $package->package_price,
          'package_hourly_rate' => $package->package_hourly_rate,
        ];

        return $data;
    }

}
