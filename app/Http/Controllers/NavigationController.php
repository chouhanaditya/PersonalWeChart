<?php

namespace App\Http\Controllers;
use App\module;
use App\User;
use App\users_patient;
use App\module_navigation;
use App\navigation;
use Illuminate\Support\Facades\Log;
use Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\patient;

class NavigationController extends Controller
{
    public function get_demographics_panel($id)
    {
        if(Auth::check()) {
            $patient = patient::where('patient_id', $id)->first();
            //Fetching all navs associated with this patient's module
            $navIds = module_navigation::where('module_id', $patient->module_id)->pluck('navigation_id');

            $navs = array();
            //Now get nav names
            foreach ($navIds as $nav_id) {
                $nav_name = navigation::where('navigation_id', $nav_id)->pluck('navigation_name');
                array_push($navs, $nav_name);
            }

            return view('patient/demographics_patient', compact ('patient','navs'));
        }
        else
        {
            return view('auth/login');
        }
    }
    public function get_HPI($id)
    {
        if(Auth::check()) {
            $patient = patient::where('patient_id', $id)->first();
            //Fetching all navs associated with this patient's module
            $navIds = module_navigation::where('module_id', $patient->module_id)->pluck('navigation_id');

            $navs = array();
            //Now get nav names
            foreach ($navIds as $nav_id) {
                $nav_name = navigation::where('navigation_id', $nav_id)->pluck('navigation_name');
                array_push($navs, $nav_name);
            }

            return view('patient/HPI', compact ('patient','navs'));
        }
        else
        {
            return view('auth/login');
        }
    }
    public function get_medical_history($id)
    {
        if(Auth::check()) {
            $patient = patient::where('patient_id', $id)->first();
            //Fetching all navs associated with this patient's module
            $navIds = module_navigation::where('module_id', $patient->module_id)->pluck('navigation_id');

            $navs = array();
            //Now get nav names
            foreach ($navIds as $nav_id) {
                $nav_name = navigation::where('navigation_id', $nav_id)->pluck('navigation_name');
                array_push($navs, $nav_name);
            }
            return view('patient/medical_history', compact ('patient','navs'));
        }
        else
        {
            return view('auth/login');
        }
    }
    public function get_medications($id)
    {
        if(Auth::check()) {
            $patient = patient::where('patient_id', $id)->first();
            //Fetching all navs associated with this patient's module
            $navIds = module_navigation::where('module_id', $patient->module_id)->pluck('navigation_id');

            $navs = array();
            //Now get nav names
            foreach ($navIds as $nav_id) {
                $nav_name = navigation::where('navigation_id', $nav_id)->pluck('navigation_name');
                array_push($navs, $nav_name);
            }

            return view('patient/general_patient', compact ('patient','navs'));
        }
        else
        {
            return view('auth/login');
        }
    }
        public function get_vital_signs($id)
    {
        if(Auth::check()) {
            $patient = patient::where('patient_id', $id)->first();
            $navIds = module_navigation::where('module_id', $patient->module_id)->pluck('navigation_id');

            $navs = array();
            foreach ($navIds as $nav_id) {
                $nav_name = navigation::where('navigation_id', $nav_id)->pluck('navigation_name');
                array_push($navs, $nav_name);
            }
            $timestamps = active_record::where('patient_id', $id)
                ->where('navigation_id', '8')->distinct()->pluck('created_at');


            $vital_sign_details = Array();

            foreach($timestamps as $ts)
            {
                $vital_sign_detail = new vital_signs();
                $vital_sign_detail->timestamp = $ts;

                $vital_sign_detail->BP_Diastolic = active_record::where('patient_id', $id)
                    ->where('navigation_id','8')
                    ->where('doc_control_id','20')
                    ->where('created_at',$ts)->pluck('value');

                $vital_sign_detail->BP_Systolic = active_record::where('patient_id', $id)
                    ->where('navigation_id','8')
                    ->where('doc_control_id','21')
                    ->where('created_at',$ts)->pluck('value');

                $vital_sign_detail->Heart_Rate =
                    active_record::where('patient_id', $id)
                        ->where('navigation_id','8')
                        ->where('doc_control_id','22')
                        ->where('created_at',$ts)->pluck('value');

                $vital_sign_detail->Respiratory_Rate = active_record::where('patient_id', $id)
                    ->where('navigation_id','8')
                    ->where('doc_control_id','23')
                    ->where('created_at',$ts)->pluck('value');

                $vital_sign_detail->Temperature = active_record::where('patient_id', $id)
                    ->where('navigation_id','8')
                    ->where('doc_control_id','24')
                    ->where('created_at',$ts)->pluck('value');

                $vital_sign_detail->Weight = active_record::where('patient_id', $id)
                    ->where('navigation_id','8')
                    ->where('doc_control_id','25')
                    ->where('created_at',$ts)->pluck('value');

                $vital_sign_detail->Height = active_record::where('patient_id', $id)
                    ->where('navigation_id','8')
                    ->where('doc_control_id','26')
                    ->where('created_at',$ts)->pluck('value');

                $vital_sign_detail->Pain = active_record::where('patient_id', $id)
                    ->where('navigation_id','8')
                    ->where('doc_control_id','27')
                    ->where('created_at',$ts)->pluck('value');

                $vital_sign_detail->Oxygen_Saturation = active_record::where('patient_id', $id)
                    ->where('navigation_id','8')
                    ->where('doc_control_id','28')
                    ->where('created_at',$ts)->pluck('value');

                $vital_sign_detail->Comment = active_record::where('patient_id', $id)
                    ->where('navigation_id','8')
                    ->where('doc_control_id','29')
                    ->where('created_at',$ts)->pluck('value');

                array_push($vital_sign_details, $vital_sign_detail);

            }
            return view('patient/vital_signs', compact('patient','navs','vital_sign_details'));
        }
        else
        {
            return view('auth/login');
        }
    }
    public function get_ROS($id)
    {
        if(Auth::check()) {
            $patient = patient::where('patient_id', $id)->first();
            //Fetching all navs associated with this patient's module
            $navIds = module_navigation::where('module_id', $patient->module_id)->pluck('navigation_id');

            $navs = array();
            //Now get nav names
            foreach ($navIds as $nav_id) {
                $nav_name = navigation::where('navigation_id', $nav_id)->pluck('navigation_name');
                array_push($navs, $nav_name);
            }

            return view('patient/general_patient', compact ('patient','navs'));
        }
        else
        {
            return view('auth/login');
        }
    }
    public function get_physical_exams($id)
    {
        if(Auth::check()) {
            $patient = patient::where('patient_id', $id)->first();
            //Fetching all navs associated with this patient's module
            $navIds = module_navigation::where('module_id', $patient->module_id)->pluck('navigation_id');

            $navs = array();
            //Now get nav names
            foreach ($navIds as $nav_id) {
                $nav_name = navigation::where('navigation_id', $nav_id)->pluck('navigation_name');
                array_push($navs, $nav_name);
            }

            return view('patient/general_patient', compact ('patient','navs'));
        }
        else
        {
            return view('auth/login');
        }
    }
    public function get_orders($id)
    {
        if(Auth::check()) {
            $patient = patient::where('patient_id', $id)->first();
            //Fetching all navs associated with this patient's module
            $navIds = module_navigation::where('module_id', $patient->module_id)->pluck('navigation_id');

            $navs = array();
            //Now get nav names
            foreach ($navIds as $nav_id) {
                $nav_name = navigation::where('navigation_id', $nav_id)->pluck('navigation_name');
                array_push($navs, $nav_name);
            }

            return view('patient/general_patient', compact ('patient','navs'));
        }
        else
        {
            return view('auth/login');
        }
    }
    public function get_results($id)
    {
        if(Auth::check()) {
            $patient = patient::where('patient_id', $id)->first();
            //Fetching all navs associated with this patient's module
            $navIds = module_navigation::where('module_id', $patient->module_id)->pluck('navigation_id');

            $navs = array();
            //Now get nav names
            foreach ($navIds as $nav_id) {
                $nav_name = navigation::where('navigation_id', $nav_id)->pluck('navigation_name');
                array_push($navs, $nav_name);
            }

            return view('patient/general_patient', compact ('patient','navs'));
        }
        else
        {
            return view('auth/login');
        }
    }
    public function get_MDM($id)
    {
        if(Auth::check()) {
            $patient = patient::where('patient_id', $id)->first();
            //Fetching all navs associated with this patient's module
            $navIds = module_navigation::where('module_id', $patient->module_id)->pluck('navigation_id');

            $navs = array();
            //Now get nav names
            foreach ($navIds as $nav_id) {
                $nav_name = navigation::where('navigation_id', $nav_id)->pluck('navigation_name');
                array_push($navs, $nav_name);
            }

            return view('patient/general_patient', compact ('patient','navs'));
        }
        else
        {
            return view('auth/login');
        }
    }
    public function get_disposition($id)
    {
        if(Auth::check()) {
            $patient = patient::where('patient_id', $id)->first();
            //Fetching all navs associated with this patient's module
            $navIds = module_navigation::where('module_id', $patient->module_id)->pluck('navigation_id');

            $navs = array();
            //Now get nav names
            foreach ($navIds as $nav_id) {
                $nav_name = navigation::where('navigation_id', $nav_id)->pluck('navigation_name');
                array_push($navs, $nav_name);
            }

            return view('patient/general_patient', compact ('patient','navs'));
        }
        else
        {
            return view('auth/login');
        }
    }
}
