@extends('master')
@section('content')
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Pages <span></span> My Account
            </div>
        </div>
    </div>
    <div class="page-content pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 m-auto">
                    <div class="row">

                        @include('user_sidebar')

                        <div class="col-md-9">
                            <div class="tab-content account dashboard-content pl-50">

                                <div class="tab-pane fade active show" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="mb-0">Your Orders</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>SL:</th>
                                                            <th>Date</th>
                                                            <th>Total</th>
                                                            <th>Payment</th>
                                                            <th>Invoice ID:</th>
                                                            <th>Return Reason</th>
                                                            <th>Status</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($orders as $key=> $order)

                                                            <tr>
                                                                <td>{{ $key+1 }}</td>
                                                                <td>{{ $order->created_at }}</td>
                                                                <td>{{ $order->amount }}</td>
                                                                <td>{{ $order->payment_type }}</td>
                                                                <td>{{ $order->invoice_no }}</td>
                                                                <td>{{ $order->return_reason }}</td>
                                                                <td>
                                                                    @if ($order->return_order == 1)
                                                                        <span class="badge rounded-pill bg-danger">Pending</span>

                                                                    @elseif ($order->return_order == 2)
                                                                        <span class="badge rounded-pill bg-warning">Returned</span>
                                                                    @elseif ($order->status == 'shipping')
                                                                        <span class="badge rounded-pill bg-info">Shipping</span>

                                                                    @endif
                                                                </td>

                                                                <td>
                                                                    <a href="{{ route('user.order.details',$order->id) }}" class="btn-small mx-3"><i class="fa fa-eye" style="font-size: large; color:black;"></i></a>

                                                                    <a href="{{ route('order.invoice.download',  $order->id) }}" class="btn-small "><i class="fa fa-download" style="font-size: large; color:blue;"></i></a>

                                                                </td>
                                                            </tr>

                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection