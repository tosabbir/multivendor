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

        $all = Order::where('status', 'pending')->latest()->get();
        return view('admin.order.all_order', compact('all'));
    }

    public function adminOrderDetailsShow($id){

        $order_details = Order::with('division','district','police_station','user')->where('id', $id)->first();

        $order_item = OrderItem::with('order', 'product')->where('order_id', $id)->latest()->get();

        return view('admin.order.order_details', compact('order_details', 'order_item'));
    }

    public function adminOrderPendingToProcessing($id){
        Order::where('id', $id)->update(['status' => 'processing']);

        $notification = array(
            'message' => "Order Confirm And Move On Processing Done",
            'alert-type' => "success",
        );

        return back()->with($notification);
    }


    public function allProcessingOrder(){
        $all = Order::where('status', 'processing')->latest()->get();
        return view('admin.order.all_processing_order', compact('all'));
    }

    public function adminOrderProcessingToShipping($id){
        Order::where('id', $id)->update(['status' => 'shipping']);

        $notification = array(
            'message' => "Order Add To Shipping Done",
            'alert-type' => "success",
        );

        return back()->with($notification);
    }

    public function allShippingOrder(){
        $all = Order::where('status', 'shipping')->latest()->get();
        return view('admin.order.all_shipping_order', compact('all'));
    }

    public function adminOrderShippingToDelivered($id){
        Order::where('id', $id)->update(['status' => 'delivered']);

        $notification = array(
            'message' => "Order Delivered Done",
            'alert-type' => "success",
        );

        return back()->with($notification);
    }

    public function allDeliveredOrder(){
        $all = Order::where('status', 'delivered')->latest()->get();
        return view('admin.order.all_shipping_order', compact('all'));
    }

    public function allReturnOrder(){
        $all = Order::whereNotNull('return_reason')->latest()->get();
        return view('admin.order.all_return_order', compact('all'));
    }

    public function adminOrderReturnApproved($id){
        Order::where('id', $id)->update([
            'return_order' => 2,
        ]);

        $notification = array(
            'message' => "Order Request Approved Done",
            'alert-type' => "success",
        );
        return back()->with($notification);
    }

}
