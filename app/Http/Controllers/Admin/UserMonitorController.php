<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserMonitorController extends Controller
{
    //all user show
    public function adminAllUser(){
        $all = User::where('role_id', 4)->latest()->get();
        return view('admin.users.all_user', compact('all'));
    }


}
