<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

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

    // order return request
    public function userOrderReturn(Request $request, $id){

        $this->validate($request, [
            'return_reason' => 'required|string',
        ]);

        Order::where('id', $id)->update([
            'return_order' => '1',
            'return_reason' => $request->return_reason,
            'return_date' => Carbon::now()->format('d F Y'),
        ]);

        $notification = array(
            'message' => 'Your Order Return Request Send Successfully',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }

    // user return order page
    public function userReturnOrderPage(){

        $orders = Order::where('return_order', 1)->latest()->get();

        return view('return_order', compact('orders'));
    }
}
