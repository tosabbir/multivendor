<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
     //add to cart
     public function productAddToCart(Request $request, $id){

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
                ],
            ]);

            return response()->json([
                'success' => 'Successfully added on your cart',
            ]);
        }

    }

     //add to cart from product details page
     public function productAddToCartFromDetailsPage(Request $request, $id){

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
            // 'cartQuantity' => $cartQuantity,
            // 'cartSubTotal' => $cartSubTotal,
        ));

    }

    // remove cart item
    public function removeCartItem($cart_id){

        Cart::remove($cart_id);

        return response()->json([
            'success' => 'Successfully remove from your cart',
        ]);
    }


    // decrement cart quantity
    public function decCartQty($cart_id){

        Cart::update($cart_id, array(
            'quantity' => -1,
          ));

        return response()->json([
            'success' => 'Successfully Update Your Cart Quantity',
        ]);
    }

    // increment cart quantity
    public function incCartQty($cart_id){

        Cart::update($cart_id, array(
            'quantity' => +1,
          ));

        return response()->json([
            'success' => 'Successfully Update Your Cart Quantity',
        ]);
    }
}
