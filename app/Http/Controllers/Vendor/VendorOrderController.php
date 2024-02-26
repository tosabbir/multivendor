<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorOrderController extends Controller
{
     // all order for vendor
     public function vendorAllOrder(){
        $vendor_id = Auth::user()->user_id;
        $all = OrderItem::with('order')->where('vendor_id', $vendor_id)->latest()->get();

        return view('vendor.order.all_order', compact('all'));
    }

    // show order for vendor
    public function vendorOrderDetails($id){

        $order_details = Order::with('division','district','police_station','user')->where('id', $id)->first();

        $order_item = OrderItem::with('order', 'product')->where('order_id', $id)->latest()->get();

        return view('vendor.order.vendor_order_details', compact('order_details', 'order_item'));


    }

    // all return order for vendor
    public function vendorAllReturnOrder(){
       $vendor_id = Auth::user()->user_id;
       $all = OrderItem::with('order')->where('vendor_id', $vendor_id)->latest()->get();

       return view('vendor.order.all_return_order', compact('all'));
   }
}
