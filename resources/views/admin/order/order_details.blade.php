@extends('admin.admin_master')
@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Order</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Order Details</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        {{-- order details  --}}
        <div class="container p-5">
            <div class="row">
                {{-- shipping details  --}}
                <div class="col-md-6">
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
                <div class="col-md-6">
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
                                            @if ($order_details->return_order == 1)
                                            <span class="badge rounded-pill bg-danger">Return Requested</span>

                                            @elseif($order_details->return_order == 2)
                                            <span class="badge rounded-pill bg-danger">Returned</span>

                                            @endif

                                        @endif

                                    </th>
                                </tr>
                            </table>

                            @if ($order_details->status == 'pending')

                            <a href="{{ route('admin.order.pending.to.processing',$order_details->id) }}" class="btn btn-success">Confirm Order</a>

                            @elseif ($order_details->status == 'processing')
                            <a href="{{ route('admin.order.processing.to.shipping',$order_details->id) }}" class="btn btn-success">Add To Shiping</a>

                            @elseif ($order_details->status == 'shipping')
                            <a href="{{ route('admin.order.shipping.to.delivered',$order_details->id) }}" class="btn btn-success">Delivered Order</a>

                            @endif

                        </div>

                    </div>
                </div>
                {{-- order shipping details  --}}

            </div>

            {{-- product details  --}}
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
                            @if ($order_details->status != 'delevered')
                            @else
                                <div class="mb-3">
                                    <h4>Return Your Order</h4>
                                    <label for="" class="form-label">Return Reason</label>
                                    <textarea class="form-control" name="" id="" rows="3"></textarea>
                                </div>
                                <button class="btn btn-danger">Return</button>
                            @endif
                        </div>
                    </div>

                </div>



            </div>

        </div>


    </div>

    <script></script>
@endsection
