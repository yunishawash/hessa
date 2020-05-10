<?php namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use Dingo\Api\Routing\Helpers;

use App\Models\University;

class UniversityTransformer extends TransformerAbstract
{
    use Helpers;
    /**
     * Turn this item object into a generic array
     *
     * @return array
     */

    public function __construct() {


    }

    public function transform(University $university)
    {
        $data = [
          'univ_id' => $university->univ_id,
          'univ_name' => $university->univ_name,
        ];

        return $data;
    }

}
