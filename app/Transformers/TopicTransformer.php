<?php namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use Dingo\Api\Routing\Helpers;

use App\Models\Topic;

class TopicTransformer extends TransformerAbstract
{
    use Helpers;
    /**
     * Turn this item object into a generic array
     *
     * @return array
     */

    public function __construct() {


    }

    public function transform(Topic $topic)
    {
        $data = [
          'topic_id' => $topic->topic_id,
          'topic_name' => $topic->topic_name_ar,
        ];

        return $data;
    }

}
