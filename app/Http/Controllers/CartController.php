<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
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
                'qty' => $request->product_quantity,
                'price' => $product->product_sel_price,
                'options' => [
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
                'qty' => $request->product_quantity,
                'price' => $request->product_descount_price,
                'options' => [
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
                'qty' => $request->product_quantity,
                'price' => $product->product_sel_price,
                'options' => [
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
                'qty' => $request->product_quantity,
                'price' => $request->product_descount_price,
                'options' => [
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
    // public function productAddToMiniCart(){
    //     $carts = Cart::content();
    //     $cartQuantity = Cart::count();

    //     return response()->json(array(
    //         'carts' => $carts
    //     ));

    // }

    // remove mini cart item
    public function removeMiniCartItem($cart_id){

        Cart::remove($cart_id);

        return response()->json([
            'success' => 'Successfully added on your cart',
        ]);
    }
}
