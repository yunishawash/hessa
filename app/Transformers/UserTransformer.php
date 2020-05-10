<?php namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use Dingo\Api\Routing\Helpers;

use App\Models\User;

class UserTransformer extends TransformerAbstract
{
    use Helpers;
    /**
     * Turn this item object into a generic array
     *
     * @return array
     */

    public function __construct() {
      // do some work in the master brnach that belongs to the dev branch

    }


    /**
    * @author Yousef Zammar <yousef.zammar@gmail.com>
    *
    */
    public function transform(User $user)
    {
        $data = [
          'user_id' => $user->user_id,
          'user_name' => $user->user_name,
          'user_email' => $user->user_email,
          'user_account_status' => $user->user_account_status,
          'district' => isset($user->district)?$user->district->district_name:null,
          'fk_district_id' => [
            "id" => @$user->fk_district_id,
            "name" => isset($user->district)?$user->district->district_name:null
          ]
        ];

        return $data;
    }

}
