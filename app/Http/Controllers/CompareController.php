<?php

namespace App\Http\Controllers;

use App\Models\Compare;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompareController extends Controller
{
        //all item
        public function allCompare(){
            $all = Compare::where('user_id', Auth::user()->user_id)->latest()->get();
            return view('compare', compact('all'));
        }

     //add item
    public function addToCompare($id){

        if( Auth::check() ){
            $exists = Compare::where('product_id', $id)->where('user_id' , Auth::user()->user_id)->first();

            if(!$exists){

                Compare::insert([
                    'product_id' => $id,
                    'user_id' => Auth::user()->user_id,
                    'created_at' => Carbon::now(),
                ]);

                return response()->json([
                    'success' => 'Successfully Added In Your Compare',
                ]);

            }else{

                return response()->json([
                    'error' => 'Item Is Already In Your Compare',

                ]);
            }

        }else{
            return response()->json([
                'error'=> 'Please Log In Your Account First'
            ]);
        }

    }

    // remove compare
    public function removeCompare($id){

        $item = Compare::find($id)->delete();

        $notification = array(
            'message' => "Successfully Remove From Your Compare",
            'alert-type' => "success",
        );

        return back()->with($notification);
    }
}
