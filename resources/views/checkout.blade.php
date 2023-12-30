@extends('master')
@section('content')
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Checkout
            </div>
        </div>
    </div>
    <div class="container mb-80 mt-50">
        <div class="row">
            <div class="col-lg-8 mb-40">
                <h3 class="heading-2 mb-10">Checkout</h3>
                <div class="d-flex justify-content-between">
                    <h6 class="text-body">There are {{$cartQuantity}} products in your cart</h6>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-7">

                <div class="row">
                    <h4 class="mb-30">Billing Details</h4>
                    <form method="post">


                        <div class="row">
                            <div class="form-group col-lg-6">
                                <input type="text" required="" name="username" placeholder="User Name *" value="{{Auth::user()->username}}">
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="email" required="" name="email" placeholder="Email *" value="{{Auth::user()->email}}">
                            </div>
                        </div>


                        <div class="row shipping_calculator">
                            <div class="form-group col-lg-6">
                                <div class="custom_select">
                                    <select class="form-control select-active" id="divisions" onchange="findDistrict()">
                                        <option value=" ">Select a Divission...</option>
                                        @foreach ($divisions as $division)

                                        <option value="{{ $division->division_id }}">{{ $division->division_name }}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-lg-6">
                                <input required="" type="text" name="city" placeholder="Phone*" value="{{Auth::user()->phone}}">
                            </div>
                        </div>

                        <div class="row shipping_calculator">
                            <div class="form-group col-lg-6">
                                <div class="custom_select">
                                    <select class="form-control select-active" id="district" onchange="findPoliceStation()">
                                        <option value=" ">Please Select Divission First</option>
                                        {{-- district add from ajax  --}}

                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-lg-6">
                                <input required="" type="text" name="city" placeholder="Post Code *">
                            </div>
                        </div>


                        <div class="row shipping_calculator">
                            <div class="form-group col-lg-6">
                                <div class="custom_select">
                                    <select class="form-control select-active" id="policeStation">

                                        <option value=" ">Please Select District First</option>
                                        {{-- police station load from ajax  --}}

                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-lg-6">
                                <input required="" type="text" name="city" placeholder="Address *" value="{{Auth::user()->address}}">
                            </div>
                        </div>


                        <div class="form-group mb-30">
                            <textarea rows="5" placeholder="Additional information"></textarea>
                        </div>


                    </form>
                </div>
            </div>


            <div class="col-lg-5">
                <div class="border p-40 cart-totals ml-30 mb-50">
                    <div class="d-flex align-items-end justify-content-between mb-30">
                        <h4>Your Order</h4>
                        <h6 class="text-muted">Subtotal</h6>
                    </div>
                    <div class="divider-2 mb-30"></div>
                    <div class="table-responsive order_table checkout">
                        <table class="table no-border">
                            <tbody>
                                @foreach ($carts as $item)

                                    <tr>
                                        <td class="image product-thumbnail"><img src="{{ asset('uploads/product/'.$item->attributes->image) }}"
                                                alt="#"></td>
                                        <td>
                                            <h6 class="w-160 mb-5"><a href="shop-product-full.html"
                                                    class="text-heading">{{$item->name}}</a></h6></span>
                                            <div class="product-rate-cover">

                                                @if ($item->attributes->color)
                                                <strong>Color : {{$item->attributes->color}}</strong>
                                                @endif
                                                <br>

                                                @if ($item->attributes->color)
                                                <strong>Size : {{$item->attributes->color}}</strong>
                                                @endif

                                            </div>
                                        </td>
                                        <td>
                                            <h6 class="text-muted pl-20 pr-20">X {{ $item->quantity }}</h6>
                                        </td>
                                        <td>
                                            <h4 class="text-brand">${{ $item->quantity * $item->price }}</h4>
                                        </td>
                                    </tr>

                                @endforeach

                            </tbody>
                        </table>


                        @if (Session::has('couponPrice'))


                        <table class="table no-border">
                            <tbody>
                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Subtotal</h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h4 class="text-brand text-end">${{ $cartSubTotal }}</h4>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Coupn Name</h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h6 class="text-brand text-end">{{Session::get('couponPrice')['coupon_code']}}</h6>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Coupon Discount</h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h4 class="text-brand text-end">${{Session::get('couponPrice')['coupon_discount']}}</h4>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Grand Total</h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h4 class="text-brand text-end">${{ $cartSubTotal - Session::get('couponPrice')['coupon_discount'] }}</h4>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        @else


                        <table class="table no-border">
                            <tbody>
                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Subtotal</h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h4 class="text-brand text-end">${{ $cartSubTotal }}</h4>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Coupn Name</h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h6 class="text-brand text-end">EASYLEA</h6>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Coupon Discount</h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h4 class="text-brand text-end">$0</h4>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Grand Total</h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h4 class="text-brand text-end">${{ $cartSubTotal }}</h4>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        @endif





                    </div>
                </div>
                <div class="payment ml-30">
                    <h4 class="mb-30">Payment</h4>
                    <div class="payment_option">
                        <div class="custome-radio">
                            <input class="form-check-input" required="" type="radio" name="payment_option"
                                id="exampleRadios3" checked="">
                            <label class="form-check-label" for="exampleRadios3" data-bs-toggle="collapse"
                                data-target="#bankTranfer" aria-controls="bankTranfer">Direct Bank Transfer</label>
                        </div>
                        <div class="custome-radio">
                            <input class="form-check-input" required="" type="radio" name="payment_option"
                                id="exampleRadios4" checked="">
                            <label class="form-check-label" for="exampleRadios4" data-bs-toggle="collapse"
                                data-target="#checkPayment" aria-controls="checkPayment">Cash on delivery</label>
                        </div>
                        <div class="custome-radio">
                            <input class="form-check-input" required="" type="radio" name="payment_option"
                                id="exampleRadios5" checked="">
                            <label class="form-check-label" for="exampleRadios5" data-bs-toggle="collapse"
                                data-target="#paypal" aria-controls="paypal">Online Getway</label>
                        </div>
                    </div>
                    <div class="payment-logo d-flex">
                        <img class="mr-15" src="{{asset('frontend')}}/assets/imgs/theme/icons/payment-paypal.svg" alt="">
                        <img class="mr-15" src="{{asset('frontend')}}/assets/imgs/theme/icons/payment-visa.svg" alt="">
                        <img class="mr-15" src="{{asset('frontend')}}/assets/imgs/theme/icons/payment-master.svg" alt="">
                        <img src="{{asset('frontend')}}/assets/imgs/theme/icons/payment-zapper.svg" alt="">
                    </div>
                    <a href="#" class="btn btn-fill-out btn-block mt-30">Place an Order<i
                            class="fi-rs-sign-out ml-15"></i></a>
                </div>
            </div>
        </div>
    </div>
@endsection
