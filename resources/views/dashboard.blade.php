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
                                        <a class="nav-link active" href="{{ route('dashboard') }}"><i
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
                                        <a class="nav-link"
                                            href="{{ route('user.account.details') }}"><i class="fi-rs-user mr-10"></i>Account details</a>
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


                                <div class="tab-pane fade active show" id="dashboard" role="tabpanel"
                                    aria-labelledby="dashboard-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="mb-0">Hello {{ $userData->name }}</h3>
                                        </div>
                                        <div class="card-body">
                                            <p>
                                                From your account dashboard. you can easily check &amp; view your <a
                                                    href="#">recent orders</a>,<br />
                                                manage your <a href="#">shipping and billing addresses</a> and <a
                                                    href="#">edit your password and account details.</a>
                                            </p>
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
