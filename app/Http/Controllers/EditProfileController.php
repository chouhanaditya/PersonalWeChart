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
use Illuminate\Support\Facades\DB;

class EditProfileController extends Controller
{
	function getEditProfile()
	{
		try {
			$email=Auth::user()->email;
			$user = User::where('email', $email)->first();
			$role = $user->role;
            $Profilesubmitted='';
			return view('auth/editprofile',compact('Profilesubmitted','user', 'role'));
		}
		catch (Exception $e)
		{
			return view ('errors/503');
		}
	}
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function postEditProfile(Request $request)
	{
			try {
                $email = Auth::user()->email;
                $user = User::where('email', $email)->first();
                $user->update($request->all());
                $Profilesubmitted = 'Yes';
                return view('auth/editprofile', compact('Profilesubmitted', 'user'));
            }
            catch (\Exception $e)
            {
                return view ('errors/503');

            }

	}
}
