<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    //view user account details
    public function accountDetails(){
        $userData = User::find(Auth::user()->user_id);
        return view('account_details', compact('userData'));
    }

    //view user account details
    public function accountSettings(){
        // $userData = User::find(Auth::user()->user_id);
        return view('settings');
    }


    // admin Password Update
    public function userPasswordUpdate(Request $request)
    {
        // form validation
        $this->validate($request,[
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password',
        ]);

        // old password match
        if (Hash::check($request->old_password, Auth()->user()->password)) {
            User::where('user_id', Auth()->user()->user_id)->update([
                'password' => Hash::make($request->new_password),
            ]);

            return redirect()->route('logout');

        }else{
            return back()->with('error', "Old Password Doesn't Match");
        }

    }
}
