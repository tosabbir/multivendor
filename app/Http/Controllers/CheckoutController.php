<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //store checkout

    public function Store(Request $request){

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

        if ($request->payment_option == 'stripe') {
            return view('payment.stripe', compact('shipping_data'));
        }elseif($request->payment_option == 'card'){
            return view('payment.card', compact('shipping_data'));
        }else{
            return view('payment.cash', compact('shipping_data'));
        }
    }
}
