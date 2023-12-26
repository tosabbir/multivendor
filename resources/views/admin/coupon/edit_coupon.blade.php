@extends('admin.admin_master')

@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i>Edit Coupon</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Coupon Information</li>
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
                            {{-- <div class="text-end">
                                <i class="fa fa-pencil btn btn-info m-2" style="font-size: larger" id="input_toggle_btn" onclick="edit_form()"></i>
                            </div> --}}
                            <div class="card-header">
                                <h5>Coupon Information</h5>
                            </div>
                            <form action="{{ route('admin.coupon.update') }}" method="post" >
                                @csrf
                                <div class="card-body">

                                    <div class="row mb-3">
                                        <div class="col-sm-3 flex">
                                            <h6 class="mb-0">Coupon Code:</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="hidden" name="coupon_code" value="{{ $data->coupon_code }}">

                                            <input type="text"
                                                class="form-control @error('coupon_code') is-invalid @enderror"
                                                id="coupon_code" name="coupon_code"
                                                value="@if ($data->coupon_code) {{ $data->coupon_code }}@else{{ old('coupon_code') }} @endif"
                                                onkeydown="show_coupon_update_button()" />
                                            @error('coupon_code')
                                                <span class="text-danger"></span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3 flex">
                                            <h6 class="mb-0">Discount:</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text"
                                                class="form-control @error('coupon_discount') is-invalid @enderror"
                                                id="coupon_discount" name="coupon_discount"
                                                value="@if ($data->coupon_discount) {{ $data->coupon_discount }}@else{{ old('coupon_discount') }} @endif"
                                                onkeydown="show_coupon_update_button()" />
                                            @error('coupon_discount')
                                                <span class="text-danger"></span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3 flex">
                                            <h6 class="mb-0">Validity:</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="datetime-local"
                                                class="form-control @error('coupon_validity') is-invalid @enderror"
                                                id="coupon_validity" name="coupon_validity"
                                                value="{{ $data->coupon_validity ? date('Y-m-d\TH:i', strtotime($data->coupon_validity)) : old('coupon_validity') }}"
                                                onkeydown="show_coupon_update_button()" />
                                            @error('coupon_validity')
                                                <span class="text-danger"></span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="mb-3 mt-3" id="coupon_data_update_btn_block" style="display: none">
                                        <input type="reset" class="btn btn-info" id="coupon_data_reset_btn"></input>
                                        <button type="submit" class="btn btn-success" id="coupon_data_update_btn">Save
                                            Change</button>
                                    </div>
                                </div>
                            </form>

                            <div class="card-footer fs-6">
                                <tr>
                                    <td>Creator</td>
                                    <td> : </td>
                                    <td>
                                        {{$data->creatorInfo->name}}<br>
                                        {{$data->created_at->format('d-m-Y | h:i:s A')}}
                                      </td>
                                </tr>

                                @if ($data->editorInfo != '')
                                <hr>
                                <tr>
                                    <td>Editor</td>
                                    <td> : </td>
                                    <td>
                                        {{$data->editorInfo->name}}<br>
                                        {{$data->updated_at->format('d-m-Y | h:i:s A')}}
                                      </td>
                                </tr>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
