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
                        <div class="col-md-2">
                            <div class="dashboard-menu">
                                <ul class="nav flex-column" role="tablist">

                                    <li class="nav-item">
                                        <a class="nav-link "href="{{ route('dashboard') }}" ><i
                                                class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders"
                                            role="tab" aria-controls="orders" aria-selected="false"><i
                                                class="fi-rs-shopping-bag mr-10"></i>Orders</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="voucher-tab" data-bs-toggle="tab" href="#voucher"
                                            role="tab" aria-controls="voucher" aria-selected="false"><i
                                                class="fi-rs-shopping-bag mr-10"></i>Voucher</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="wishlist-tab" data-bs-toggle="tab" href="#wishlist"
                                            role="tab" aria-controls="wishlist" aria-selected="false"><i
                                                class="fi-rs-shopping-bag mr-10"></i>Wishlist</a>
                                    </li>


                                    <li class="nav-item">
                                        <a class="nav-link active"
                                            href="{{ route('user.account.details') }}" ><i class="fi-rs-user mr-10"></i>Account details</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="settings-tab" data-bs-toggle="tab" href="#settings"
                                            role="tab" aria-controls="settings" aria-selected="true"><i
                                                class="fi-rs-user mr-10"></i>Settings</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('logout') }}"><i
                                                class="fi-rs-sign-out mr-10"></i>Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="tab-content account dashboard-content pl-50">

                                <div class="tab-pane fade active show" id="account-detail" role="tabpanel"
                                    aria-labelledby="account-detail-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Account Details</h5>
                                        </div>
                                        <div class="card-body">

                                            <form method="post" action="{{ route('update.profile') }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>Name <span class="required">*</span></label>
                                                        <input class="form-control @error('name') is-invalid @enderror"
                                                            name="name" type="text"
                                                            value="@if ($userData->name) {{ $userData->name }}@else{{ old('name') }} @endif" />
                                                        <input class="form-control" name="slug" type="hidden"
                                                            value="{{ $userData->slag }}" />
                                                        <input class="form-control" name="id" type="hidden"
                                                            value="{{ $userData->user_id }}" />

                                                        @error('name')
                                                            <span class="text-danger"></span>{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Username <span class="required">*</span></label>
                                                        <input required=""
                                                            class="form-control @error('username') is-invalid @enderror"
                                                            name="username" type="text"
                                                            value="@if ($userData->username) {{ $userData->username }}@else{{ old('username') }} @endif"
                                                            disabled />

                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Email Address <span class="required">*</span></label>
                                                        <input class="form-control @error('email') is-invalid @enderror"
                                                            name="email" type="email" value="{{ $userData->email }}"
                                                            value="@if ($userData->email) {{ $userData->email }}@else{{ old('email') }} @endif" />

                                                        @error('email')
                                                            <span class="text-danger"></span>{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Phone <span class="required">*</span></label>
                                                        <input class="form-control @error('phone') is-invalid @enderror"
                                                            name="phone" type="phone"
                                                            value="@if ($userData->phone) {{ $userData->phone }}@else{{ old('phone') }} @endif" />

                                                        @error('phone')
                                                            <span class="text-danger"></span>{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Address <span class="required">*</span></label>
                                                        <input class="form-control @error('address') is-invalid @enderror"
                                                            name="address" type="text"
                                                            value="@if ($userData->address) {{ $userData->address }}@else{{ old('address') }} @endif" "/>

                                                                @error('address')
                                                                    <span class="text-danger"></span>{{ $message }}</span>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="form-label">Profile Pic <span class="required">*</span></label>
                                                                <input class="form-control" type="file" name="image"/>
                                                            </div>

                                                            <div class="form-group col-md-12">
                                                                <label></span></label>
                                                                   @if ($userData->photo)
                                                        <img src="{{ asset('uploads/user/' . $userData->photo) }}"
                                                            alt="">
                                                    @else
                                                        <img src="{{ asset('uploads/no_image.jpg') }}" alt=""
                                                            style="width: 150px">
                                                        @endif
                                                    </div>

                                                    <div class="col-md-12" id="user_profile_update_block">
                                                        <button type="submit"
                                                            class="btn btn-fill-out submit font-weight-bold"
                                                            name="submit" value="Submit">Save Change</button>
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
            </div>
        </div>
    </div>
@endsection
