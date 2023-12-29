<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\ProductMultiImage;

class FrontendController extends Controller
{
    /**
     * find sub category on category change dropdown.
     */
    public function findSubcategory($id)
    {
        $data = SubCategory::where('category_id', $id)->get();
        return json_decode($data);
    }
    /**
     * find product details
     */
    public function productDetails($slug)
    {

       $product = Product::where('product_slug', $slug)->first();
       $product_multi_img = ProductMultiImage::where('product_id', $product->product_id)->get();

       return view('product_details', compact('product', 'product_multi_img'));
    }

    /**
     * find vendor.
     */
    public function vendorDetails($slug)
    {

       $vendor = User::where('slug', $slug)->first();
       $product = Product::where('product_status_id', 1)->where('product_vendor_status_id', 1)->where('vendor_id',$vendor->user_id)->latest()->get();
       return view('vendor_details', compact('vendor','product'));
    }
    /**
     * Categorywise Product
     */
    public function categorywiseProduct($slug)
    {

       $category = Category::where('category_slug', $slug)->first();
       $categories = Category::where('category_status', 1)->orderBy('category_name', 'ASC')->get();
       $product = Product::where('product_status_id', 1)->where('product_vendor_status_id', 1)->where('category_id',$category->category_id)->latest()->get();
       return view('categorywise_product', compact('product', 'categories', 'category'));
    }

    /**
     * Sub Categorywise Product
     */
    public function subCategorywiseProduct($slug)
    {

       $sub_category = SubCategory::where('sub_category_slug', $slug)->first();
       $sub_categories = SubCategory::where('sub_category_status', 1)->orderBy('sub_category_name', 'ASC')->get();
       $product = Product::where('product_status_id', 1)->where('product_vendor_status_id', 1)->where('sub_category_id',$sub_category->sub_category_id)->latest()->get();
       return view('sub_categorywise_product', compact('product', 'sub_categories', 'sub_category'));
    }


    /**
     *  Product Quick View
     */
    public function productQuickView($id)
    {

      $product = Product::with('categoryInfo', 'brandInfo', 'vendorInfo')->findOrFail($id);
      $product_multi_img = ProductMultiImage::where('product_id', $id)->get();
      $color = $product->product_color;
      $product_color = explode(',', $color);
      $size = $product->product_size;
      $product_size = explode(',',$size);

      return response()->json(array(
        'product' => $product,
        'product_color' => $product_color,
        'product_size' => $product_size,
        'product_size' => $product_size,
        'product_multi_img' => $product_multi_img
      ));
    }


}
