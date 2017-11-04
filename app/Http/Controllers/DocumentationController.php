<?php

namespace App\Http\Controllers;

use App\lookup_value;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Auth;
use App\module;
use App\User;
use App\users_patient;
use App\module_navigation;
use App\navigation;
use App\patient;
use App\active_record;


class DocumentationController extends Controller
{
    public function find_diagnosis(Request $request)
    {
        $term = trim($request->q);

        if (empty($term)) {
            return \Response::json([]);
        }

        $lookups = lookup_value::search($term)->limit(5)->get();

        $formatted_lookups = [];

        foreach ($lookups as $lookup) {
            $formatted_lookups[] = ['id' => $lookup->lookup_value_id, 'text' => $lookup->lookup_value];
        }

        return \Response::json($formatted_lookups);
    }
    public function post_HPI(Request $request)
    {
        $role='';
        if(Auth::check()) {
            $role = Auth::user()->role;
        }

        if($role == 'Student') {
            try {
                //
//                $patient = new patient($request->all());
//
//                $patient['last_name'] = 'Doe' . $append_number;
//
//                $patient['archived'] = 0;
//                $patient['completed_flag'] = 0;
//                $patient['height'] = $request['height'] ." ". $request['height_unit'];
//                $patient['weight'] = $request['weight'] ." ". $request['weight_unit'];
//                $patient['created_by'] = $request['user_id'];
//                $patient['updated_by'] = $request['user_id'];
//
//                $patient->save();

                //Fetching all navs associated with this patient's module
                $navIds = module_navigation::where('module_id', $request->module_id)->pluck('navigation_id');
                $navs = array();

                //Now get nav names
                foreach ($navIds as $nav_id) {
                    $nav_name = navigation::where('navigation_id', $nav_id)->pluck('navigation_name');
                    array_push($navs, $nav_name);
                }
                return view('patient/HPI', compact ('patient','navs'));

            } catch (\Exception $e) {
                return view('errors/503');
            }
        }
        else
        {
            return view('auth/login');
        }

    }
    public function post_Demographics(Request $request)
    {
        $role='';
        if(Auth::check()) {
            $role = Auth::user()->role;
        }

        if($role == 'Student') {
            try {
                    //Validating input data
                    $this->validate($request, [
                        'age' => 'required|numeric',
                        'height' => 'required',
                        'weight' => 'required',
                    ]);
                    $patient = patient::where('patient_id', $request['patient_id'])->first();
                    //if sex is male then first name is John else Jane
                    if ($request->gender == 'Male')
                    {
                        $patient['first_name'] = 'John';
                    }
                    else
                    {
                        $patient['first_name'] = 'Jane';
                    }

                    $patient->gender = $request->gender;
                    $patient->age = $request->age;
                    $patient->height = $request->height;
                    $patient->weight = $request->weight;
                    $patient->save();

                //Fetching all navs associated with this patient's module
                $navIds = module_navigation::where('module_id', $patient->module_id)->pluck('navigation_id');
                $navs = array();

                //Now get nav names
                foreach ($navIds as $nav_id) {
                    $nav_name = navigation::where('navigation_id', $nav_id)->pluck('navigation_name');
                    array_push($navs, $nav_name);
                }
                return view('patient/demographics_patient', compact ('patient','navs'));
            } catch (\Exception $e) {
                return view('errors/503');
            }
        }
        else
        {
            return view('auth/login');
        }
    }
    public function post_social_history(Request $request)
    {
        Log::info('Aditya reached here');
        $role='';
        if(Auth::check()) {
            $role = Auth::user()->role;
        }

        if($role == 'Student') {
            try {

                //Fetching all navs associated with this patient's module
                $navIds = module_navigation::where('module_id', $request->module_id)->pluck('navigation_id');
                $navs = array();

                //Now get nav names
                foreach ($navIds as $nav_id) {
                    $nav_name = navigation::where('navigation_id', $nav_id)->pluck('navigation_name');
                    array_push($navs, $nav_name);
                }
                return view('patient/medical_history', compact ('patient','navs'));

            } catch (\Exception $e) {
                return view('errors/503');
            }
        }
        else
        {
            return view('auth/login');
        }

    }
     public function post_personal_history(Request $request)
    {
        Log::info('Aditya reached here');
        $role='';
        if(Auth::check()) {
            $role = Auth::user()->role;
        }

        if($role == 'Student') {
            try {

                //Fetching all navs associated with this patient's module
                $navIds = module_navigation::where('module_id', $request->module_id)->pluck('navigation_id');
                $navs = array();

                //Now get nav names
                foreach ($navIds as $nav_id) {
                    $nav_name = navigation::where('navigation_id', $nav_id)->pluck('navigation_name');
                    array_push($navs, $nav_name);
                }
                return view('patient/medical_history', compact ('patient','navs'));

            } catch (\Exception $e) {
                return view('errors/503');
            }
        }
        else
        {
            return view('auth/login');
        }

    }
    
     public function post_surgical_history(Request $request)
    {
        Log::info('Aditya reached here');
        $role='';
        if(Auth::check()) {
            $role = Auth::user()->role;
        }

        if($role == 'Student') {
            try {

                //Fetching all navs associated with this patient's module
                $navIds = module_navigation::where('module_id', $request->module_id)->pluck('navigation_id');
                $navs = array();

                //Now get nav names
                foreach ($navIds as $nav_id) {
                    $nav_name = navigation::where('navigation_id', $nav_id)->pluck('navigation_name');
                    array_push($navs, $nav_name);
                }
                return view('patient/medical_history', compact ('patient','navs'));

            } catch (\Exception $e) {
                return view('errors/503');
            }
        }
        else
        {
            return view('auth/login');
        }

    }
    
    public function post_vital_signs(Request $request)
    {
        $role='';
        if(Auth::check()) {
            $role = Auth::user()->role;
        }         if($role == 'Student') {

        try {
        $active_record = new active_record();
        $active_record['patient_id'] = $request['patient_id'];
        $active_record['navigation_id'] = '8';
        $active_record['doc_control_id'] = '20';
        $active_record['value'] = $request['BP_Systolic'];
        $active_record['created_by'] = $request['user_id'];
        //$active_record['created_at'] = $request['timestamp'];
        $active_record['updated_by'] = $request['user_id'];
        $active_record->save();

        $active_record = new active_record();
        $active_record['patient_id'] = $request['patient_id'];
        $active_record['navigation_id'] = '8';
        $active_record['doc_control_id'] = '21';
        $active_record['value'] = $request['BP_Diastolic'];
        $active_record['created_by'] = $request['user_id'];
        //$active_record['created_at'] = $request['timestamp'];
        $active_record['updated_by'] = $request['user_id'];
        $active_record->save();

        $active_record = new active_record();
        $active_record['patient_id'] = $request['patient_id'];
        $active_record['navigation_id'] = '8';
        $active_record['doc_control_id'] = '22';
        $active_record['value'] = $request['Heart_Rate'];
        $active_record['created_by'] = $request['user_id'];
        //$active_record['created_at'] = $request['timestamp'];
        $active_record['updated_by'] = $request['user_id'];
        $active_record->save();

        $active_record = new active_record();
        $active_record['patient_id'] = $request['patient_id'];
        $active_record['navigation_id'] = '8';
        $active_record['doc_control_id'] = '23';
        $active_record['value'] = $request['Respiratory_Rate'];
        $active_record['created_by'] = $request['user_id'];
        //$active_record['created_at'] = $request['timestamp'];
        $active_record['updated_by'] = $request['user_id'];
        $active_record->save();

        $active_record = new active_record();
        $active_record['patient_id'] = $request['patient_id'];
        $active_record['navigation_id'] = '8';
        $active_record['doc_control_id'] = '24';
        $active_record['value'] = $request['Temperature'] . " " . $request['temperature_unit'];
        $active_record['created_by'] = $request['user_id'];
        //$active_record['created_at'] = $request['timestamp'];
        $active_record['updated_by'] = $request['user_id'];
        $active_record->save();

        $active_record = new active_record();
        $active_record['patient_id'] = $request['patient_id'];
        $active_record['navigation_id'] = '8';
        $active_record['doc_control_id'] = '25';
        $active_record['value'] = $request['Weight'] . " " . $request['weight_unit'];
        $active_record['created_by'] = $request['user_id'];
        //$active_record['created_at'] = $request['timestamp'];
        $active_record['updated_by'] = $request['user_id'];
        $active_record->save();

        $active_record = new active_record();
        $active_record['patient_id'] = $request['patient_id'];
        $active_record['navigation_id'] = '8';
        $active_record['doc_control_id'] = '26';
        $active_record['value'] = $request['Height'] . " " . $request['height_unit'];
        $active_record['created_by'] = $request['user_id'];
        //$active_record['created_at'] = $request['timestamp'];
        $active_record['updated_by'] = $request['user_id'];
        $active_record->save();

        $active_record = new active_record();
        $active_record['patient_id'] = $request['patient_id'];
        $active_record['navigation_id'] = '8';
        $active_record['doc_control_id'] = '27';
        $active_record['value'] = $request['Pain'];
        $active_record['created_by'] = $request['user_id'];
        //$active_record['created_at'] = $request['timestamp'];
        $active_record['updated_by'] = $request['user_id'];
        $active_record->save();

        $active_record = new active_record();
        $active_record['patient_id'] = $request['patient_id'];
        $active_record['navigation_id'] = '8';
        $active_record['doc_control_id'] = '28';
        $active_record['value'] = $request['Oxygen_Saturation'];
        $active_record['created_by'] = $request['user_id'];
        //$active_record['created_at'] = $request['timestamp'];
        $active_record['updated_by'] = $request['user_id'];
        $active_record->save();

        $active_record = new active_record();
        $active_record['patient_id'] = $request['patient_id'];
        $active_record['navigation_id'] = '8';
        $active_record['doc_control_id'] = '29';
        $active_record['value'] = $request['Comments'];
        $active_record['created_by'] = $request['user_id'];
        //$active_record['created_at'] = $request['timestamp'];
        $active_record['updated_by'] = $request['user_id'];
        $active_record->save();


        return redirect()->route('Vital Signs',[$request['patient_id']]);

            }
            catch (\Exception $e)
            {
             return view('errors/503');
            }
            }
             else {
            return view('auth/login');
            }
    }

    public function delete_vital_signs($ts, Request $request)
    {
        $role='';
        if(Auth::check()) {
            $role = Auth::user()->role;
        }         if($role == 'Student') {

        try {
        active_record::where('created_at',$ts)->where('navigation_id', '8')->where('doc_control_id','20')->delete();
        active_record::where('created_at',$ts)->where('navigation_id', '8')->where('doc_control_id','21')->delete();
        active_record::where('created_at',$ts)->where('navigation_id', '8')->where('doc_control_id','22')->delete();
        active_record::where('created_at',$ts)->where('navigation_id', '8')->where('doc_control_id','23')->delete();
        active_record::where('created_at',$ts)->where('navigation_id', '8')->where('doc_control_id','24')->delete();
        active_record::where('created_at',$ts)->where('navigation_id', '8')->where('doc_control_id','25')->delete();
        active_record::where('created_at',$ts)->where('navigation_id', '8')->where('doc_control_id','26')->delete();
        active_record::where('created_at',$ts)->where('navigation_id', '8')->where('doc_control_id','27')->delete();
        active_record::where('created_at',$ts)->where('navigation_id', '8')->where('doc_control_id','28')->delete();
        active_record::where('created_at',$ts)->where('navigation_id', '8')->where('doc_control_id','29')->delete();

        return redirect()->route('Vital Signs',[$request['patient_id']]);
        }
        catch (\Exception $e)
        {
            return view('errors/503');
        }
        }
        else {
        return view('auth/login');
            }
    }

}
