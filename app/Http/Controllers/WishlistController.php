<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WishlistController extends Controller
{
    //all item
    public function allWishlist(){
        return view('wishlist');
    }
}
