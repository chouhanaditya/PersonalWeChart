<?php
/*
 Developer - Varun Parihar
 Date - 09/23/2017
 Description - Controller Code for Edit Profile functionality.
*/
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use Log;

class UserController extends Controller
{
    public $erroredForm = '';
    public $Profilesubmitted = '';

    public function getEditProfile()
    {
        try {
            $email=Auth::user()->email;
            $user = User::where('email', $email)->first();
            $Profilesubmitted='';
            $erroredForm= '';
            return view('user/editprofile',compact('Profilesubmitted','user', 'erroredForm'));
        }
        catch (Exception $e)
        {
            return view ('errors/503');
        }
    }

    public function postEditProfile(Request $request)
    {
        $email = Auth::user()->email;
        $user = User::where('email', $email)->first();
        $oldHashedPassword = $user->password;
        //To check if contact number is of valid format
        if (strlen($request['contactno']) !== 10)
        {
            $erroredForm = 'Contact Number invalid';
            $Profilesubmitted = '';
        }
        else
        {
            // To check if old password provided by user is empty or not.
            if (!empty($request['old']))
            {
                // To check if old password is equal to the current password.
                if (Hash::check($request->old, $oldHashedPassword))
                {
                    $user['departmentName'] = $request['departmentName'];
                    $user['firstname'] = $request['firstname'];
                    $user['lastname'] = $request['lastname'];
                    $user['contactno'] = $request['contactno'];
                    //To check if new password is empty or not.
                    if (!empty($request['password']))
                    {
                        //To check if new password meets length requirements.
                        if(strlen($request['password']) < 6)
                        {
                            $erroredForm= 'Password short';
                            $Profilesubmitted='';
                        }
                        else
                        {
                            // To check if new password matches with confirm password.
                            if($request['password'] == $request['password_confirmation'])
                            {
                                //log:info('Dhakkan'.$request['password']);
                                $user['password'] = Hash::make($request->password);
                                $user->save();
                                $Profilesubmitted = 'Yes';
                                $erroredForm= '';
                            }
                            else
                            {
                                $erroredForm= 'New & Confirm password do not match.';
                                $Profilesubmitted = '';
                            }
                        }
                    }
                    else
                    {
                        $erroredForm= 'New password empty';
                        $Profilesubmitted = '';
                    }
                }
                else
                {
                    $erroredForm= 'Old & Current password do not match';
                    $Profilesubmitted='';
                }
            }
            // To check if new password is not empty
            elseif (empty($request['old']) and !empty($request['password']) and !empty($request['password_confirmation']))
            {
                $erroredForm= 'Old password blank';
                $Profilesubmitted = '';
            }
            else
            {
                log:info('Dhakkan'.$request['password']);
                $user['departmentName'] = $request['departmentName'];
                $user['firstname'] = $request['firstname'];
                $user['lastname'] = $request['lastname'];
                $user['contactno'] = $request['contactno'];
                $user->save();
                $erroredForm= '';
                $Profilesubmitted = 'Yes';
            }
        }

        return view('user/editprofile', compact('Profilesubmitted', 'user', 'erroredForm'));

    }
}
