<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class UserOrderController extends Controller
{
    //all order
    public function userOrder(){
        $user_id = Auth::user()->user_id;
        $orders = Order::where('user_id', $user_id)->latest()->get();

        return view('order', compact('orders'));

    }

    //all order details
    public function userOrderDetails($id){

        $user_id = Auth::user()->user_id;

        $order_details = Order::with('division','district','police_station','user')->where('id', $id)->where('user_id', $user_id)->first();

        $order_item = OrderItem::with('order', 'product')->where('order_id', $id)->latest()->get();

        return view('order_details', compact('order_details', 'order_item'));

    }

    // invoice download
    public function userOrderInvoicePdf($id){

        $user_id = Auth::user()->user_id;

        $order_details = Order::with('division','district','police_station','user')->where('id', $id)->where('user_id', $user_id)->first();

        $order_item = OrderItem::with('order', 'product')->where('order_id', $id)->latest()->get();

        $pdf = Pdf::loadView('order_invoice', compact('order_details', 'order_item'));
        // return $pdf->download($order_details->invoice_no.'invoice.pdf');
        return view('order_invoice', compact('order_details', 'order_item'));
    }
}
