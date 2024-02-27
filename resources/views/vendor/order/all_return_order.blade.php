@extends('vendor.vendor_master')
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
                        <li class="breadcrumb-item active" aria-current="page">Orders</li>
                    </ol>
                </nav>
            </div>



            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('vendor.pending.order') }}" type="button" class="btn btn-primary btn-sm">Pending Order</a>
                </div>
                <div class="btn-group">
                    <a href="{{ route('vendor.processing.order') }}" type="button" class="btn btn-primary btn-sm">Processing Order</a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">All Orders</h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Date </th>
                                <th>Invoice </th>
                                <th>Amount </th>
                                <th>Payment </th>
                                <th>Status </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all as $key => $item)

                                @if ($item->order->return_reason != null)

                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->order->order_date }}</td>
                                    <td>{{ $item->order->invoice_no }}</td>
                                    <td>{{ $item->order->amount }}</td>
                                    <td>{{ $item->order->payment_method }}</td>
                                    <td>
                                        @if ($item->order->return_order == 1)
                                            Return Pending
                                        @else
                                            Returned
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('vendor.order.show', $item->id) }}"
                                            class="btn btn-info btn-sm "><i class="fa fa-eye "></i></a>
                                    </td>
                                </tr>
                                @else

                                @endif
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sl</th>
                                <th>Date </th>
                                <th>Invoice </th>
                                <th>Amount </th>
                                <th>Payment </th>
                                <th>State </th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <script>

    </script>
@endsection