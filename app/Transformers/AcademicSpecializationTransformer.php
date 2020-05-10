<?php namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use Dingo\Api\Routing\Helpers;

use App\Models\AcademicSpecialization;

class AcademicSpecializationTransformer extends TransformerAbstract
{
    use Helpers;
    /**
     * Turn this item object into a generic array
     *
     * @return array
     */

    public function __construct() {


    }

    public function transform(AcademicSpecialization $academicSpecialization)
    {
        $data = [
          'as_id' => $academicSpecialization->as_id,
          'as_name' => $academicSpecialization->as_name_ar,
        ];

        return $data;
    }

}
