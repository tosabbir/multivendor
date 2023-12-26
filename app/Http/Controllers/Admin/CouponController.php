<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CouponController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all = Coupon::whereNull('deleted_at')->latest()->get();
        return view('admin.coupon.all_coupon', compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.coupon.add_coupon');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'coupon_code' => 'required|string|max:20|unique:coupons',
            'coupon_discount' => 'required|numeric',
            'coupon_validity' => 'required|string',
        ]);
        $coupon_code = Str::slug($request->coupon_code);
        $insert = Coupon::insert([
            'coupon_code' => $coupon_code,
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'coupon_creator' => Auth::user()->user_id,
            'created_at' => Carbon::now()->toDateString(),

        ]);

        if($insert){
            $notification = array(
                'message' => "Coupon Added Successfully",
                'alert-type' => "success",
            );

        }else{
            $notification = array(
                'message' => "Opps, Something is Wrong",
                'alert-type' => "error",
            );
        }
        return redirect()->route('admin.all.coupon')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $data = Coupon::where('coupon_code', $slug)->firstOrFail();
        return view('admin.coupon.edit_coupon', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $coupon_code = $request->coupon_code;

        $this->validate($request,[
            'coupon_code' => 'required|string|max:20|unique:coupons,coupon_code,'.$coupon_code.',coupon_code',
            'coupon_discount' => 'required|numeric',
            'coupon_validity' => 'required|string',
        ]);

        $update = Coupon::where('coupon_code', $coupon_code)->update([
            'coupon_code' => Str::slug($coupon_code),
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'coupon_editor' => Auth::user()->user_id,
            'updated_at' => Carbon::now()->toDateTimeString(),

        ]);

        if($update){
            $notification = array(
                'message' => "Coupon Updated Successfully",
                'alert-type' => "success",
            );

        }else{
            $notification = array(
                'message' => "Opps, Something is Wrong",
                'alert-type' => "error",
            );
        }
        return redirect()->route('admin.all.coupon')->with($notification);


    }

    /**
     * Soft Delete the specified resource from storage.
     */
    public function softDelete(string $slug)
    {


        $softDelete = Coupon::where('coupon_code', $slug)->delete();

        if($softDelete){
            $notification = array(
                'message' => "Coupons Move To Trash Successfully",
                'alert-type' => "success",
            );

        }else{
            $notification = array(
                'message' => "Opps, Something is Wrong",
                'alert-type' => "error",
            );
        }
        return redirect()->route('admin.all.coupon')->with($notification);
    }


    /**
     * Show All Delete or Recycle Item.
     */
    public function recycle()
    {
        $all = Coupon::onlyTrashed()->latest()->get();
        return view('admin.coupon.all_recycle_coupon', compact('all'));
    }

    /**
     * Restore Delete or Recycle Item.
     */
    public function restore($slug)
    {
        $update = Coupon::where('coupon_code', $slug)->restore();

        if($update){
            $notification = array(
                'message' => "Coupon Restore Successfully",
                'alert-type' => "success",
            );

        }else{
            $notification = array(
                'message' => "Opps, Something is Wrong",
                'alert-type' => "error",
            );
        }
        return back()->with($notification);
    }

    /**
     * Permanently Delete Item.
     */
    public function permanentlyDelete($slug)
    {


        $delete = Coupon::where('coupon_code', $slug)->forceDelete();

        if($delete){
            $notification = array(
                'message' => "Coupon Permanently Deleted Successfully",
                'alert-type' => "success",
            );

        }else{
            $notification = array(
                'message' => "Opps, Something is Wrong",
                'alert-type' => "error",
            );
        }
        return redirect()->route('admin.all.coupon')->with($notification);
    }
}
