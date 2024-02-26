
@php

    $route = Route::currentRouteName();

@endphp

<div class="col-md-3">
    <div class="dashboard-menu">
        <ul class="nav flex-column" role="tablist">

            <li class="nav-item">
                <a class="nav-link {{ ($route == 'dashboard')? 'active' : '' }} " href="{{ route('dashboard') }}"><i
                        class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
            </li>

            <li class="nav-item">
                <a class="nav-link  {{ ($route == 'user.order')? 'active' : '' }} " href="{{ route('user.order') }}">
                    <i class="fi-rs-shopping-bag mr-10"></i>Orders</a>
            </li>

            <li class="nav-item">
                <a class="nav-link  {{ ($route == 'user.return.order.page')? 'active' : '' }} " href="{{ route('user.return.order.page') }}">
                    <i class="fi-rs-shopping-bag mr-10"></i>Return Orders</a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ ($route == 'user.voucher')? 'active' : '' }}" href="#voucher"
                    ><i
                        class="fi-rs-shopping-bag mr-10"></i>Voucher</a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ ($route == 'user.wishlist')? 'active' : '' }}"  href="#wishlist" ><i
                        class="fi-rs-shopping-bag mr-10"></i>Wishlist</a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ ($route == 'user.compare')? 'active' : '' }}"  href="#compare" ><i
                        class="fi-rs-shopping-bag mr-10"></i>Compare</a>
            </li>


            <li class="nav-item">
                <a class="nav-link {{ ($route == 'user.account.details')? 'active' : '' }}"
                    href="{{ route('user.account.details') }}"><i class="fi-rs-user mr-10"></i>Account details</a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ ($route == 'user.profile.settings')? 'active' : '' }}" href="{{ route('user.profile.settings') }}" ><i
                        class="fi-rs-user mr-10"></i>Settings</a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ ($route == 'logout')? 'active' : '' }}" href="{{ route('logout') }}"><i
                        class="fi-rs-sign-out mr-10"></i>Logout</a>
            </li>
        </ul>
    </div>
</div>
