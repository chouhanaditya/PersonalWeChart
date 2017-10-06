<?php

namespace App\Http\Controllers;
use App\module;
use App\patient_record_status;
use App\users_patient;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\patient;

class StudentController extends Controller
{
    public function index()
    {
//
        $patients = patient::where('created_by', Auth::user()->id)->get();
//        var_dump($patients);
        return view('student/studentHome', compact('patients'));
    }
    public function get_add_patient()
    {
        $modules = module::where('archived',0)->get();
        $append_number='';
        return view('patient/add_patient',compact('modules','append_number'));
    }
    public function post_add_patient(Request $request)
    {
        $patient = new patient($request->all());

        //Fetching last inserted patient_id to generate Patient name
        $last_patient = patient::max('patient_id');
        if($last_patient == null)
            $append_number = 1;
        else
            $append_number = $last_patient + 1;

        //if sex is male then first name is John else Jane
        if($request['sex'] == 'Male') {
            $patient['first_name'] = 'John';
        }
        else
        {
            $patient['first_name'] = 'Jane';
        }
        $patient['last_name'] = 'Doe'.$append_number;

        $patient['archived'] = 0;
        $patient['created_by'] = $request['user_id'];
        $patient['weight'] = 0;
        $patient->save();


        $user_patient = new users_patient();
        $user_patient->patient_record_status_id = 2;
        $user_patient->patient_id = $patient->id;
        $user_patient->user_id = $request['user_id'];
        $user_patient->created_by = $request['user_id'];
        $user_patient->save();

        $patients = patient::all();

        return view('student/studentHome', compact('patients','append_number'));
    }

}
