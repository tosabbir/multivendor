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
                        <li class="breadcrumb-item active" aria-current="page">Orders</li>
                    </ol>
                </nav>
            </div>



            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('admin.pending.order') }}" type="button" class="btn btn-primary btn-sm">Pending Order</a>
                </div>
                <div class="btn-group">
                    <a href="{{ route('admin.processing.order') }}" type="button" class="btn btn-primary btn-sm">Processing Order</a>
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
                                <th>Return Reason </th>
                                <th>Return Status </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->order_date }}</td>
                                    <td>{{ $item->invoice_no }}</td>
                                    <td>{{ $item->amount }}</td>
                                    <td>{{ $item->payment_method }}</td>
                                    <td>{{ $item->return_reason }}</td>
                                    <td>
                                    @if ($item->return_order == 1)
                                        Pending
                                    @elseif ($item->return_order == 2)
                                        Returned
                                    @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.order.show', $item->id) }}"
                                            class="btn btn-info btn-sm "><i class="fa fa-eye "></i></a>
                                        @if ($item->return_order == 1)

                                        <a href="{{ route('admin.order.return.approved', $item->id) }}"
                                            class="btn btn-info btn-sm "><i class="fa fa-check "></i></a>
                                        @endif
                                    </td>
                                </tr>
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
