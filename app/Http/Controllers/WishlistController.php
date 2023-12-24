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
        return view('wishlist');
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
                    'success' => 'Successfully Add Your Wishlist'
                ]);

            }else{
                return response()->json([
                    'error' => 'Item Is Already In Your Wishlist'
                ]);
            }

        }else{
            return response()->json([
                'error'=> 'Please Log In Your Account First'
            ]);
        }

    }
}
