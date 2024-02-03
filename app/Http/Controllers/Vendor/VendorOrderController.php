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
    public function vendorOrderShow(){

        return "show order";
    }
}
