@extends('admin.admin_master')

@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add Coupon</li>
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
        <div class="container">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">

                            <div class="card-header">
                                <h4>Add Coupon Information</h4>
                            </div>
                            <form action="{{ route('admin.coupon.store') }}" method="post"
                                >
                                @csrf
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-sm-3 flex">
                                            <h6 class="mb-0">Coupon Code:</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">

                                            <input type="text"
                                                class="form-control @error('coupon_code') is-invalid @enderror"
                                                id="coupon_code" name="coupon_code"
                                                value="{{ old('coupon_code') }}" />

                                            @error('coupon_code')
                                                <span class="text-danger"></span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3 flex">
                                            <h6 class="mb-0">Coupon Discount:</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">

                                            <input type="number"
                                                class="form-control @error('coupon_discount') is-invalid @enderror"
                                                id="coupon_discount" name="coupon_discount"
                                                value="{{ old('coupon_discount') }}" />

                                            @error('coupon_discount')
                                                <span class="text-danger"></span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3 flex">
                                            <h6 class="mb-0">Coupon Validity:</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">

                                            <input type="datetime-local"
                                                class="form-control @error('coupon_validity') is-invalid @enderror"
                                                id="coupon_validity" name="coupon_validity"
                                                value="{{ old('coupon_validity') }}" />

                                            @error('coupon_validity')
                                                <span class="text-danger"></span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <input type="reset" class="btn btn-info"></input>
                                        <button type="submit" class="btn btn-success">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
