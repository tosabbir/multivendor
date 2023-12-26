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
        $all = Coupon::withTrashed()->latest()->get();
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
    // public function softDelete(string $slug)
    // {


    //     $update = Subcategory::where('sub_category_slug', $slug)->update([
    //         'deleted_at' => Carbon::now(),
    //         'updated_at' => Carbon::now(),
    //         'sub_category_editor' => Auth::user()->id,
    //     ]);

    //     if($update){
    //         $notification = array(
    //             'message' => "Sub Category Move To Trash Successfully",
    //             'alert-type' => "success",
    //         );

    //     }else{
    //         $notification = array(
    //             'message' => "Opps, Something is Wrong",
    //             'alert-type' => "error",
    //         );
    //     }
    //     return redirect()->route('admin.all.sub.category')->with($notification);
    // }


    /**
     * Show All Delete or Recycle Item.
     */
    // public function recycle()
    // {
    //     $all = SubCategory::whereNotNull('deleted_at')->latest()->get();
    //     return view('admin.subCategory.all_recycle_sub_category', compact('all'));
    // }

    /**
     * Restore Delete or Recycle Item.
     */
    // public function restore($slug)
    // {
    //     $update = Subcategory::where('sub_category_slug', $slug)->update([
    //         'deleted_at' => null,
    //         'updated_at' => Carbon::now(),
    //         'sub_category_editor' => Auth::user()->id,
    //     ]);

    //     if($update){
    //         $notification = array(
    //             'message' => "Sub Category Restore Successfully",
    //             'alert-type' => "success",
    //         );

    //     }else{
    //         $notification = array(
    //             'message' => "Opps, Something is Wrong",
    //             'alert-type' => "error",
    //         );
    //     }
    //     return back()->with($notification);
    // }

    /**
     * Permanently Delete Item.
     */
    // public function permanentlyDelete($slug)
    // {

    //     $image = Subcategory::where('sub_category_slug', $slug)->value('sub_category_image');
    //     if(File::exists(public_path('uploads/subCategory/'.$image))){
    //         File::delete(public_path('uploads/subCategory/'.$image));
    //     }

    //     $delete = Subcategory::where('sub_category_slug', $slug)->delete();

    //     if($delete){
    //         $notification = array(
    //             'message' => "Sub Category Permanently Deleted Successfully",
    //             'alert-type' => "success",
    //         );

    //     }else{
    //         $notification = array(
    //             'message' => "Opps, Something is Wrong",
    //             'alert-type' => "error",
    //         );
    //     }
    //     return redirect()->route('admin.all.sub.category')->with($notification);
    // }
}
