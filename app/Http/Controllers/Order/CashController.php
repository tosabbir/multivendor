<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\OrderItem;
use Cart;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CashController extends Controller
{
    //order with stripe

    public function cashOrder(Request $request){

        if(Session::has('couponPrice')){
            $total_amount = Session::get('couponPrice')['price'];
        }else{
            $total_amount = round(Cart::getSubTotal());
        }

        $order_id = Order::insertGetId([
            'user_id' => Auth::user()->user_id,
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'police_station_id' => $request->police_station_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'post_code' => $request->post_code,
            'notes' => $request->notes,

            'payment_type' => "Cash On",
            'payment_method' => 'Cash',
            'transaction_id' => null,
            'currency' => "USD",
            'amount' => $total_amount,
            'order_number' => null,

            'invoice_no' => 'Or'.mt_rand(10000000,99999999),
            'order_date' => Carbon::now()->format('d F Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),
            'status_id' => 2,
            'created_at' => Carbon::now(),

        ]);

        $carts = Cart::getContent();
        foreach($carts as $cart){

            OrderItem::insert([
                'order_id' => $order_id,
                'product_id' => $cart->id,
                'vendor_id' => $cart->attributes->vendor_id,
                'color' => $cart->attributes->color,
                'size' => $cart->attributes->size,
                'qty' => $cart->quantity,
                'price' => $cart->price,
                'created_at' =>Carbon::now(),

            ]);

        } // End Foreach

        if (Session::has('couponPrice')) {
           Session::forget('couponPrice');
        }


        Cart::clear();


        $notification = array(
            'message' => 'Your Order Place Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('dashboard')->with($notification);


    }
}
