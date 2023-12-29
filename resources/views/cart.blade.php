@extends('master')
@section('content')


    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Shop
                <span></span> Cart
            </div>
        </div>
    </div>
    <div class="container mb-80 mt-50">
        <div class="row">
            <div class="col-lg-8 mb-40">
                <h1 class="heading-2 mb-10">Your Cart</h1>
                <div class="d-flex justify-content-between">
                    <h6 class="text-body">There are <span class="text-brand" id="totalCartItem"></span> products in your cart</h6>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive shopping-summery">
                    <table class="table table-wishlist">
                        <thead>
                            <tr class="main-heading">
                                <th class="custome-checkbox start pl-30">
                                    {{-- <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox11" value="">
                                    <label class="form-check-label" for="exampleCheckbox11"></label> --}}
                                </th>
                                <th scope="col" colspan="2">Product</th>
                                <th scope="col">Unit Price</th>
                                <th scope="col">Size</th>
                                <th scope="col">Color</th>
                                <th scope="col">Quantity</th>

                                <th scope="col">Subtotal</th>
                                <th scope="col" class="end">Remove</th>
                            </tr>
                        </thead>
                        <tbody id="myCarts" class="position-relative">

                            {{-- load cart item form ajax  --}}

                        </tbody>
                        <div id="loader" style="position: fixed; left:0; top:0; right:0; bottom:0; background:#000; opacity:0.5; display:none;"><div style="width:100%; height:100vh; display:flex; justify-content: center; aligns-items:center;">loading....</div></div>
                    </table>
                </div>


                <div class="row mt-50">

                    <div class="col-lg-5" >
                        <div class="p-40" id="couponApplyInput">
                            <h4 class="mb-10">Apply Coupon</h4>
                            <p class="mb-30"><span class="font-lg text-muted">Using A Promo Code?</p>

                                <div class="d-flex justify-content-between">
                                    <input class="font-medium mr-15 coupon" name="Coupon" placeholder="Enter Your Coupon" id="coupon_code">
                                    <button class="btn" onclick="applyCoupon()"><i class="fi-rs-label mr-10"></i>Apply</button>
                                </div>

                        </div>
                    </div>


                    <div class="col-lg-7">
                         <div class="divider-2 mb-30"></div>



                        <div class="border p-md-4 cart-totals ml-30">
                    <div class="table-responsive">
                        <table class="table no-border">
                            <tbody>
                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Subtotal</h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h4 class="text-brand text-end" id="cartTotal"></h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Coupon Code</h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h4 class="text-brand text-end" id="couponCode">N/A</h4>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Coupon Descount</h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h4 class="text-brand text-end" id="couponDescount">N/A</h4>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Grand Total</h6>

                                    </td>
                                    <td class="cart_total_amount">
                                        <h4 class="text-brand text-end" id="grandTotal"></h4>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <a href="{{route('checkout')}}" class="btn mb-20 w-100">Proceed To CheckOut<i class="fi-rs-sign-out ml-15"></i></a>
                </div>
                    </div>



                </div>
            </div>

        </div>
    </div>


@endsection
