@extends('admin.admin_master')
@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Coupon Trash</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Recycle Coupon</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('admin.all.coupon') }}" type="button" class="btn btn-primary">All Coupon</a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">All Coupon Information</h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>SL:</th>
                                <th>Coupon Code</th>
                                <th>Discount</th>
                                <th>Validity</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->coupon_code }}</td>
                                    <td>{{ $item->coupon_discount }}</td>
                                    <td>{{ $item->coupon_validity }}</td>
                                    <td>{{ $item->coupon_status }}</td>
                                    <td>
                                        <a href="{{ route('admin.coupon.restore', $item->coupon_code) }}"
                                            class="btn btn-info btn-sm " id="restore"><i class="fa fa-refresh "></i></a>

                                        <a href="{{ route('admin.coupon.permanentlyDelete', $item->coupon_code) }}"
                                            class="btn btn-info btn-sm " id="permanentlyDelete"><i
                                                class="fa fa-trash "></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>SL:</th>
                                <th>Coupon Code</th>
                                <th>Discount</th>
                                <th>Validity</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>

    </div>

    <script></script>
@endsection
