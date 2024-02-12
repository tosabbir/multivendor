<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     // all order for admin
     public function adminAllOrder(){

        $all = Order::latest()->get();
        return view('admin.order.all_order', compact('all'));
    }

    public function adminOrderDetailsShow($id){

        $order_details = Order::with('division','district','police_station','user')->where('id', $id)->first();

        $order_item = OrderItem::with('order', 'product')->where('order_id', $id)->latest()->get();

        return view('admin.order.order_details', compact('order_details', 'order_item'));
    }


}
