<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserOrderController extends Controller
{
    //all order
    public function userOrder(){
        $user_id = Auth::user()->user_id;
        $orders = Order::where('user_id', $user_id)->latest()->get();

        return view('order', compact('orders'));

    }
}
