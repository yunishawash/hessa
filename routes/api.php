<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
  $api->post('lookups/districts', '\App\Http\Controllers\MainController@listDistricts');
  $api->post('lookups/locations', '\App\Http\Controllers\MainController@listLocations');
  $api->post('lookups/languages', '\App\Http\Controllers\MainController@listLanguages');
  $api->post('lookups/universities', '\App\Http\Controllers\MainController@listUniversities');
  $api->post('lookups/specializations', '\App\Http\Controllers\MainController@listSpecializations');
  $api->post('lookups/topics', '\App\Http\Controllers\MainController@listTopics');
  $api->post('lookups/packages', '\App\Http\Controllers\MainController@listPackages');
  $api->post('lookups/sa', '\App\Http\Controllers\MainController@sa');
  $api->post('lookups/sp', '\App\Http\Controllers\MainController@listSP');
  $api->post('lookups/sr', '\App\Http\Controllers\MainController@listSR');
});
