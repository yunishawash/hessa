<?php namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use Dingo\Api\Routing\Helpers;

use App\Models\Language;

class LanguageTransformer extends TransformerAbstract
{
    use Helpers;
    /**
     * Turn this item object into a generic array
     *
     * @return array
     */

    public function __construct() {


    }

    public function transform(Language $language)
    {
        $data = [
          'lang_id' => $language->lang_id,
          'lang_name' => $language->lang_name,
        ];

        return $data;
    }

}
