<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    //all item
    public function allWishlist(){
        $all = Wishlist::where('user_id', Auth::user()->user_id)->latest()->get();
        return view('wishlist', compact('all'));
    }

    //add item
    public function addToWishlist($id){

        if( Auth::check() ){
            $exists = Wishlist::where('product_id', $id)->where('user_id' , Auth::user()->user_id)->first();

            if(!$exists){

                Wishlist::insert([
                    'product_id' => $id,
                    'user_id' => Auth::user()->user_id,
                    'created_at' => Carbon::now(),
                ]);

                return response()->json([
                    'success' => 'Successfully Added In Your Wishlist',
                
                ]);

            }else{

                return response()->json([
                    'error' => 'Item Is Already In Your Wishlist',

                ]);
            }

        }else{
            return response()->json([
                'error'=> 'Please Log In Your Account First'
            ]);
        }

    }

    // count wishlist
    public function countWishlist(){

        $wishlistCount = Wishlist::where('user_id', Auth::user()->user_id)->count();
        return response()->json([
            'wishlistCount' => $wishlistCount,
        ]);
    }

    public function removeWishlist($id){

        $item = Wishlist::find($id)->delete();

        $notification = array(
            'message' => "Successfully Remove From Your Wishlist",
            'alert-type' => "success",
        );

        return back()->with($notification);
    }
}
