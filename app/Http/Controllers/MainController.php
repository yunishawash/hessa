<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Redirect;
use App\Http\Controllers\Controller;
use Dingo\Api\Routing\Helpers;
use App\Helpers\Status;


use App\Models\District;
use App\Models\Location;
use App\Models\Language;
use App\Models\University;
use App\Models\AcademicSpecialization;
use App\Models\Topic;
use App\Models\Package;
use App\Models\ServiceRequester;

use App\Transformers\DistrictTransformer;
use App\Transformers\LocationTransformer;
use App\Transformers\LanguageTransformer;
use App\Transformers\UniversityTransformer;
use App\Transformers\AcademicSpecializationTransformer;
use App\Transformers\TopicTransformer;
use App\Transformers\PackageTransformer;
use App\Transformers\ServiceRequesterTransformer;

class MainController extends BaseController
{

    use Helpers;

    /**
     * List cities for lookup
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function listDistricts(Request $request)
    {
        $districts = District::orderBy('district_id', 'asc')->whereHas('locations');

        if($request->has('term') && ! empty($request->get('term'))) {
          $districts = $districts->where('district_name', 'like', '%'.$request->get('term').'%');
        }

        $districts = $districts->get();

        return $this->data($districts, new DistrictTransformer, 'list_districts', Status::HESSA_SUCCESS);
    }


    public function listLocations(Request $request)
    {
        $locations = Location::orderBy('location_id', 'asc');

        if($request->has('district_id')) {
          $locations = $locations->where('fk_district_id', $request->district_id);
        }

        if($request->has('term') && ! empty($request->get('term'))) {
          $locations = $locations->where('location_name', 'like', '%'.$request->get('term').'%');
        }

        $locations = $locations->get();

        return $this->data($locations, new LocationTransformer, 'list_locations', Status::HESSA_SUCCESS);
    }

    public function listLanguages(Request $request)
    {
        $languages = Language::orderBy('lang_name', 'asc');

        if($request->has('term') && ! empty($request->get('term'))) {
          $languages = $languages->where('lang_name', 'like', '%'.$request->get('term').'%');
        }

        $languages = $languages->get();

        return $this->data($languages, new LanguageTransformer, 'list_languages', Status::HESSA_SUCCESS);
    }

    public function listUniversities(Request $request)
    {
        $universities = University::orderBy('univ_name', 'asc');

        if($request->has('term') && ! empty($request->get('term'))) {
          $universities = $universities->where('univ_name', 'like', '%'.$request->get('term').'%');
        }

        $universities = $universities->get();

        return $this->data($universities, new UniversityTransformer, 'list_universities', Status::HESSA_SUCCESS);
    }

    public function listSpecializations(Request $request)
    {
        $academicSpecializations = AcademicSpecialization::orderBy('as_id', 'asc');

        if($request->has('term') && ! empty($request->get('term'))) {
          $academicSpecializations = $academicSpecializations
                                      ->where('as_name_ar', 'like', '%'.$request->get('term').'%')
                                      ->where('as_name_en', 'like', '%'.$request->get('term').'%');
        }

        $academicSpecializations = $academicSpecializations->get();

        return $this->data($academicSpecializations, new AcademicSpecializationTransformer, 'list_academicTopics', Status::HESSA_SUCCESS);
    }

    public function listTopics(Request $request)
    {
        $topics = Topic::orderBy('topic_name_ar', 'asc');

        if($request->has('term') && ! empty($request->get('term'))) {
          $topics = $topics->where('topic_name_ar', 'like', '%'.$request->get('term').'%')
                           ->where('topic_name_en', 'like', '%'.$request->get('term').'%');
        }

        $topics = $topics->get();

        return $this->data($topics, new TopicTransformer, 'list_topics', Status::HESSA_SUCCESS);
    }

    public function listPackages(Request $request)
    {
        $packages = Package::orderBy('package_name', 'asc');

        if($request->has('term') && ! empty($request->get('term'))) {
          $packages = $packages->where('package_name', 'like', '%'.$request->get('term').'%');
        }

        $packages = $packages->get();


        return $this->data($packages, new PackageTransformer, 'list_packages', Status::HESSA_SUCCESS);
    }

    public function listSR(Request $request)
    {
        $serviceRequesters = ServiceRequester::orderBy('sr_full_name', 'asc');

        if($request->has('term') && ! empty($request->get('term'))) {
          $serviceRequesters = $serviceRequesters->where('sr_full_name', 'like', '%'.$request->get('term').'%');
        }

        $serviceRequesters = $serviceRequesters->get();

        return $this->data($serviceRequesters, new ServiceRequesterTransformer, 'list_service_requesters', Status::HESSA_SUCCESS);
    }

    public function listSA(Request $request)
    {
        $serviceAdministrators = Users::orderBy('user_name', 'asc');

        if($request->has('term') && ! empty($request->get('term'))) {
          $serviceAdministrators = $serviceAdministrators->where('sr_full_name', 'like', '%'.$request->get('term').'%');
        }

        $serviceAdministrators = $serviceAdministrators->get();

        // filter admins by city
        
        return $this->data($serviceAdministrators, new ServiceRequesterTransformer, 'list_service_requesters', Status::HESSA_SUCCESS);
    }


    public function contactServiceProvider(Request $request)
    {

      $messages = Lang::get("Login_Validator");

      $rules = array(
        'content' => 'required',
        'email' => 'required|email',
      );

      $validator = Validator::make(Input::all(), $rules, $messages);

      if($validator->passes()) {
          \Mail::to($request->email)->send(new ContactServiceProviderMessage($request));
          $result = array();
          $result["isTrue"] = true;
          $result["Message"] = Lang::get("Master.Success_ContactEmailSent");
          return Response::json($result);
      } else {
          $result = array();
          $result["isTrue"] = false;
          $result["Erorrs"] = $validator->errors();
          return Response::json($result);
      }
    }


}
