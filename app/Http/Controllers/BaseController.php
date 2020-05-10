<?php

namespace App\Http\Controllers;

use JWTAuth;
use Validator;
use Config;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Dingo\Api\Routing\Helpers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use Tymon\JWTAuth\Exceptions\JWTException;
use Dingo\Api\Exception\ValidationHttpException;

use Illuminate\Support\Collection;
use Illuminate\Contracts\Pagination\Paginator;
use App\Helpers\Status;

class BaseController extends Controller
{

    public function __construct()
    {
      \App::setLocale('ar');
    }

    const PAGINATE_COUNT = 50;
    const TAKE_ALL_ROWS = 2000000000000;
    /**
   * Return Success message in the response
   *
   * @param array $data the returned data
   * @param object $transformer Message to be returned with response
   * @param array $additional additional data to return in response
   * @param string $message Message to be returned with response
   * @param string $status status code, default to 600 ( push status code ), check
   * App\Api\V1\Support\Status for all push status codes
   *
   * @return json
   */
  public function data($data, $transformer, $message = '', $status = Status::HESSA_SUCCESS, $additional = [])
  {

    if ($this->isCollection($data)) {
      $res = $this->response->collection($data, $transformer);
    } else if ($this->isPaginator($data)) {
      $res = $this->response->paginator($data, $transformer);
    } else {
      $res = $this->response->item($data, $transformer);
    }

    foreach ($additional as $key => $value) {
      $res->addMeta($key, $value);
    }

    $res->addMeta('message', $message);
    $res->addMeta('status_code', $status);

    return  $res;
  }

  /**
   * Return Error message in the response
   *
   * @param string $message Message to be returned with response
   * @param string $status status code, default to 601 ( push status code ), check
   * App\Api\V1\Support\Status for all push status codes
   *
   * @return json
  */
  public function error($message = '', $status = Status::HESSA_ERROR, $data = [], $additional = [])
  {

    if(isset($data) && ! empty($data)) {
      $resp['errors'] = $data;
    }

    $resp['meta']['message'] = $message;
    $resp['meta']['status_code'] = $status;

    foreach ($additional as $key => $value) {
      $resp['meta'][$key] = $value;
    }

    return $this->response->array($resp)->setStatusCode(400);

  }

  /**
   * Return Success message in the response
   *
   * @param string $message Message to be returned with response
   * @param string $status status code, default to 600 ( push status code ), check
   * App\Api\V1\Support\Status for all push status codes
   *
   * @return json
   */
  public function success($message = '', $status = Status::HESSA_SUCCESS, $additional = [])
  {

    $resp['meta']['message'] = $message;
    $resp['meta']['status_code'] = $status;

    foreach ($additional as $key => $value) {
      $resp['meta'][$key] = $value;
    }

    return $this->response->array($resp);

  }


  /**
   * Determine if the instance is a collection.
   *
   * @param object $instance
   *
   * @return bool
   */
  protected function isCollection($instance)
  {
      return $instance instanceof Collection;
  }

  /**
   * Determine if the instance is a paginator.
   *
   * @param object $instance
   *
   * @return bool
   */
  protected function isPaginator($instance)
  {
      return $instance instanceof Paginator;
  }


  public function isValidStore($request)
  {
    $validator = Validator::make($request->all(), $this->storeRules());

    if($validator->passes()) {
      return true;
    } else {
      $this->validationErrors = $validator->errors();
      return false;
    }
  }

  public function isValidUpdate($request)
  {
    $validator = Validator::make($request->all(), $this->updateRules());
    if($validator->passes()) {
      return true;
    } else {
      $this->validationErrors = $validator->errors();
      return false;
    }
  }


}
