<?php

namespace App\Http\Controllers;

use App\Models\User;
use Cart;
use Illuminate\Http\Request;


class CheckoutController extends Controller
{
    //store checkout

    public function Store(Request $request){

        $request->validate([
            'shipping_name' => ['required', 'string', 'max:25'],
            'shipping_email' => ['required', 'string', 'email', 'max:50'],
            'shipping_phone' => ['required', 'max:20'],
            'shipping_address' => ['required', 'string','max:100'],
            'shipping_division_id' => ['required'],
            'shipping_district_id' => ['required'],
            'shipping_police_station_id' => ['required'],

        ]);

        $shipping_data = array();

        $shipping_data['shipping_name'] = $request->shipping_name;
        $shipping_data['shipping_email'] = $request->shipping_email;
        $shipping_data['shipping_phone'] = $request->shipping_phone;
        $shipping_data['shipping_post_code'] = $request->shipping_post_code;

        $shipping_data['shipping_division_id'] = $request->shipping_division_id;
        $shipping_data['shipping_district_id'] = $request->shipping_district_id;
        $shipping_data['shipping_police_station_id'] = $request->shipping_police_station_id;
        $shipping_data['shipping_address'] = $request->shipping_address;
        $shipping_data['shipping_additional_information'] = $request->shipping_additional_information;

        $cartSubTotal = Cart::getSubTotal();

        if ($request->payment_option == 'stripe') {
            return view('payment.stripe', compact('shipping_data','cartSubTotal'));
        }elseif($request->payment_option == 'card'){
            return view('payment.card', compact('shipping_data','cartSubTotal'));
        }else{
            return view('payment.cash', compact('shipping_data','cartSubTotal'));
        }
    }
}
