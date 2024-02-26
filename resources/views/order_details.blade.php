@extends('master');
@section('content')
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Pages <span></span> My Account
            </div>
        </div>
    </div>
    <div class="page-content">

        {{-- order details  --}}
        <div class="container">
            <div class="row">
                <div class="col-lg-11 m-auto">
                    <div class="row">

                        @include('user_sidebar')

                        {{-- shipping details  --}}
                        <div class="col-md-5">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Shipping Details</h5>
                                </div>

                                <div class="card-body">
                                    <table class="table" style="background:#F4F6FA;font-weight: 600;">
                                        <tr>
                                            <th>Shipping Name:</th>
                                            <th>{{ $order_details->name }}</th>
                                        </tr>

                                        <tr>
                                            <th>Shipping Phone:</th>
                                            <th>{{ $order_details->phone }}</th>
                                        </tr>

                                        <tr>
                                            <th>Shipping Email:</th>
                                            <th>{{ $order_details->email }}</th>
                                        </tr>

                                        <tr>
                                            <th>Division:</th>
                                            <th>{{ $order_details->division->division_name }}</th>
                                        </tr>

                                        <tr>
                                            <th>District:</th>
                                            <th>{{ $order_details->district->district_name }}</th>
                                        </tr>

                                        <tr>
                                            <th>State :</th>
                                            <th>{{ $order_details->police_station->police_station_name }}</th>
                                        </tr>

                                        <tr>
                                            <th>Post Code :</th>
                                            <th>{{ $order_details->post_code }}</th>
                                        </tr>

                                        <tr>
                                            <th>Shipping Address:</th>
                                            <th>{{ $order_details->address }}</th>
                                        </tr>

                                        <tr>
                                            <th>Order Date :</th>
                                            <th>{{ $order_details->order_date }}</th>
                                        </tr>

                                    </table>

                                </div>

                            </div>
                        </div>
                        {{-- end shipping details  --}}

                        {{-- order details  --}}
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Order Details</h5>
                                </div>

                                <div class="card-body">
                                    <table class="table" style="background:#F4F6FA;font-weight: 600;">
                                        <tr>
                                            <th>Order Id:</th>
                                            <th>{{ $order_details->id }}</th>
                                        </tr>

                                        <tr>
                                            <th>Invoice Id:</th>
                                            <th>{{ $order_details->invoice_no }}</th>
                                        </tr>


                                        <tr>
                                            <th>Payment Type:</th>
                                            <th>{{ $order_details->payment_type }}</th>
                                        </tr>

                                        <tr>
                                            <th>Amount:</th>
                                            <th>{{ $order_details->amount }}</th>
                                        </tr>

                                        <tr>
                                            <th>Order Date :</th>
                                            <th>{{ $order_details->order_date }}</th>
                                        </tr>

                                        <tr>
                                            <th>Status:</th>
                                            <th>
                                                @if ($order_details->status == 'pending')
                                                    <span class="badge rounded-pill bg-danger">Pending</span>
                                                @elseif ($order_details->status == 'processing')
                                                    <span class="badge rounded-pill bg-warning">processing</span>
                                                @elseif ($order_details->status == 'shipping')
                                                    <span class="badge rounded-pill bg-info">shipping</span>
                                                @elseif ($order_details->status == 'delivered')
                                                    <span class="badge rounded-pill bg-success">Delivered</span>
                                                @endif
                                            </th>
                                        </tr>
                                    </table>

                                </div>

                            </div>
                        </div>
                        {{-- order shipping details  --}}
                    </div>
                </div>
            </div>
        </div>

        {{-- product details  --}}
        <div class="container p-5">
            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header">
                            <h5>Product Details</h5>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table" style="font-weight: 600;">
                                    <tbody>
                                        <tr>
                                            <td class="col-md-1">
                                                <label>Image </label>
                                            </td>
                                            <td class="col-md-2">
                                                <label>Product Name </label>
                                            </td>
                                            <td class="col-md-2">
                                                <label>Vendor Name </label>
                                            </td>
                                            <td class="col-md-2">
                                                <label>Product Code </label>
                                            </td>
                                            <td class="col-md-1">
                                                <label>Color </label>
                                            </td>
                                            <td class="col-md-1">
                                                <label>Size </label>
                                            </td>
                                            <td class="col-md-1">
                                                <label>Quantity </label>
                                            </td>


                                            <td class="col-md-3">
                                                <label>Total Price </label>
                                            </td>

                                        </tr>


                                        @foreach ($order_item as $item)
                                            <tr>
                                                <td class="col-md-1">
                                                    <label><img
                                                            src="{{ asset('uploads/product/' . $item->product->product_thumbnail) }}"
                                                            style="width:50px; height:50px;"> </label>
                                                </td>
                                                <td class="col-md-2">
                                                    <label>{{ $item->product->product_name }}</label>
                                                </td>
                                                @if ($item->product->vendor_id == null)
                                                    <td class="col-md-2">
                                                        <label>Owner </label>
                                                    </td>
                                                @else
                                                    <td class="col-md-2">
                                                        <label>{{ $item->product->vendorInfo->vendor_shop_name }} </label>
                                                    </td>
                                                @endif

                                                <td class="col-md-1">
                                                    <label>{{ $item->product->product_code }} </label>
                                                </td>
                                                @if ($item->color == null)
                                                    <td class="col-md-1">
                                                        <label>.... </label>
                                                    </td>
                                                @else
                                                    <td class="col-md-1">
                                                        <label>{{ $item->color }} </label>
                                                    </td>
                                                @endif

                                                @if ($item->size == null)
                                                    <td class="col-md-1">
                                                        <label>.... </label>
                                                    </td>
                                                @else
                                                    <td class="col-md-1">
                                                        <label>{{ $item->size }} </label>
                                                    </td>
                                                @endif
                                                <td class="col-md-1">
                                                    <label>{{ $item->qty }} </label>
                                                </td>

                                                <td class="col-md-1">
                                                    <label>${{ $item->price }} * {{ $item->qty }} <br> Total =
                                                        ${{ $item->price * $item->qty }}
                                                    </label>
                                                </td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            @if ($order_details->status != 'delivered')
                            @else

                            @php
                                $order = App\Models\Order::where('id', $order_details->id)->where('return_order', '1')->first();

                            @endphp

                                @if ($order)
                                    <h3>You Send Return Request For This Product</h3>

                                @else()

                                    <form action="{{route('user.order.return', $order_details->id)}}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <h4>Return Your Order</h4>
                                            <label for="" class="form-label ">Return Reason</label>
                                            <textarea class="form-control @error('return_reason') is-invalid @enderror" name="return_reason" id="return_reason" rows="3"></textarea>
                                            @error('return_reason')
                                                <span class="text-danger"></span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <button class="btn btn-danger" type="submit">Return</button>
                                    </form>

                                @endif


                            @endif

                        </div>
                    </div>


                </div>



            </div>
        </div>
    </div>
@endsection
