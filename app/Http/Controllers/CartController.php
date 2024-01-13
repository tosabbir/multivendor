<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\District;
use App\Models\Division;
use App\Models\PoliceStation;
use App\Models\Product;
use Carbon\Carbon;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
     //add to cart
     public function productAddToCart(Request $request, $id){

        if(Session::has('couponPrice')){
            Session::forget('couponPrice');
        }

        $product = Product::findOrFail($id);

        if($product->product_discount_price == null){

            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'quantity' => $request->product_quantity,
                'price' => $product->product_sel_price,
                'attributes' => [
                    'image' => $product->product_thumbnail,
                    'color' => $request->product_color,
                    'size' => $request->product_size,
                    'vendor_id' => $request->vendor_id,
                ],
            ]);

            return response()->json([
                'success' => 'Successfully added on your cart',
            ]);
        }else{
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'quantity' => $request->product_quantity,
                'price' => $request->product_descount_price,
                'attributes' => [
                    'image' => $product->product_thumbnail,
                    'color' => $request->product_color,
                    'size' => $request->product_size,
                    'vendor_id' => $request->vendor_id,
                ],
            ]);

            return response()->json([
                'success' => 'Successfully added on your cart',
            ]);
        }

    }

     //add to cart from product details page
     public function productAddToCartFromDetailsPage(Request $request, $id){

        if(Session::has('couponPrice')){
            Session::forget('couponPrice');
        }

        $product = Product::findOrFail($id);

        if($product->product_discount_price == null){

            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'quantity' => $request->product_quantity,
                'price' => $product->product_sel_price,
                'attributes' => [
                    'image' => $product->product_thumbnail,
                    'color' => $request->product_color,
                    'size' => $request->product_size,
                    'vendor_id' => $request->pd_vendor_id,
                    // 'product_quantity_type' => $product->product_quantity_type,
                ],
            ]);

            return response()->json([
                'success' => 'Successfully added on your cart',
            ]);
        }else{
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'quantity' => $request->product_quantity,
                'price' => $request->product_descount_price,
                'attributes' => [
                    'image' => $product->product_thumbnail,
                    'color' => $request->product_color,
                    'size' => $request->product_size,
                    'vendor_id' => $request->pd_vendor_id,
                    // 'product_quantity_type' => $product->product_quantity_type,
                ],
            ]);

            return response()->json([
                'success' => 'Successfully added on your cart',
            ]);
        }

    }

    // get in mini cart
    public function productAddToMiniCart(){

        $carts = Cart::getContent();
        $cartQuantity = $carts->count();;
        $cartSubTotal = Cart::getSubTotal();

        return response()->json(array(
            'carts' => $carts,
            'cartQuantity' => $cartQuantity,
            'cartSubTotal' => $cartSubTotal,

        ));

    }

    // remove mini cart item
    public function removeMiniCartItem($cart_id){

        if(Session::has('couponPrice')){
            Session::forget('couponPrice');
        }

        Cart::remove($cart_id);

        return response()->json([
            'success' => 'Successfully remove from your cart',
        ]);
    }


    // all cart in cart page
    public function allCart(){
        return view('cart');
    }

     // get in cart page
     public function myCart(){
        $carts = Cart::getContent();
        $cartQuantity = $carts->count();;
        $cartSubTotal = Cart::getSubTotal();

        return response()->json(array(
            'myCarts' => $carts,
            'cartQuantity' => $cartQuantity,
            'cartSubTotal' => $cartSubTotal,
        ));

    }

    // remove cart item
    public function removeCartItem($cart_id){

        if(Session::has('couponPrice')){
            Session::forget('couponPrice');
        }

        Cart::remove($cart_id);

        return response()->json([
            'success' => 'Successfully remove from your cart',
        ]);
    }


    // decrement cart quantity
    public function decCartQty($cart_id){

        if(Session::has('couponPrice')){
            Session::forget('couponPrice');
        }

        Cart::update($cart_id, array(
            'quantity' => -1,
          ));

        return response()->json([
            'success' => 'Successfully Update Your Cart Quantity',
        ]);
    }

    // increment cart quantity
    public function incCartQty($cart_id){

        if(Session::has('couponPrice')){
            Session::forget('couponPrice');
        }

        Cart::update($cart_id, array(
            'quantity' => +1,
          ));

        return response()->json([
            'success' => 'Successfully Update Your Cart Quantity',
        ]);
    }

    // find coupon here
    public function findCoupon(Request $request, $coupon_code){
        $coupon = Coupon::where('coupon_code', $coupon_code)->first();
        $subtotal = $request->subtotal;
        if($coupon != null){

            $couponValidity = Coupon::where('coupon_code', $coupon_code)
            ->where('coupon_validity', '>=', Carbon::now()->toDateTimeString())
            ->first();

            if($couponValidity != null){
                $price = $subtotal - $coupon->coupon_discount;


                Session::put('couponPrice', [
                    'coupon_code' => $coupon->coupon_code,
                    'coupon_discount' => $coupon->coupon_discount,
                    'price' => $price,
                ]);

                return response()->json([
                    'success' => 'Coupon Apply Successfully',
                    'coupon_code' => $coupon->coupon_code,
                    'coupon_discount' => $coupon->coupon_discount,
                    'price' => $price,
                ]);

            }else{
                return response()->json([
                    'validityError' => '!Sorry This Coupon Validity Already Expired',
                ]);
            }

        }else{
            return response()->json([
                'unmatchError' => '!Sorry This Is Not Our Coupon Code',
            ]);
        }
    }

    public function checkout(){

        if(Auth::check()){

            $carts = Cart::getContent();
            $cartQuantity = $carts->count();;

            if($cartQuantity > 0){

                $carts = Cart::getContent();
                $cartQuantity = $carts->count();;
                $cartSubTotal = Cart::getSubTotal();
                $divisions = Division::OrderBy('division_name', 'ASC')->get();
                $districts = District::OrderBy('district_name', 'ASC')->get();
                $policeStations = PoliceStation::OrderBy('police_station_name', 'ASC')->get();
                return view('checkout', compact('carts', 'cartQuantity', 'cartSubTotal', 'divisions', 'districts', 'policeStations'));

            }else{
                $notification = array(
                    'message' => "Please Shop Minimum One Item",
                    'alert-type' => "error",
                );

                return back()->with($notification);
            }

        }else{


            $notification = array(
                'message' => "You Have To Log In First",
                'alert-type' => "error",
            );

            return redirect()->route('login')->with($notification);
        }


    }

    // find district here
    public function findDistrict($division_id){
        $allDistrict = District::where('division_id', $division_id)->orderBy('district_name', 'ASC')->get();
        return json_decode($allDistrict);
    }

    // find police station here
    public function findPoliceStation($district_id){
        $allPoliceStation = PoliceStation::where('district_id', $district_id)->orderBy('police_station_name', 'ASC')->get();
        return json_decode($allPoliceStation);
    }


}
