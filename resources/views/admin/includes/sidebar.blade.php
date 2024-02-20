		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="{{asset('admin')}}/assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">Admin</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
                <li>
					<a href="widgets.html">
						<div class="parent-icon"><i class='bx bx-cookie'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-home-circle'></i>
						</div>
						<div class="menu-title">Brand</div>
					</a>
					<ul>
						<li> <a href="{{route('admin.all.brand')}}"><i class="bx bx-right-arrow-alt"></i>All Brand</a>
						<li> <a href="{{route('admin.add.brand')}}"><i class="bx bx-right-arrow-alt"></i>Add Brand</a>
						<li> <a href="{{route('admin.recycle.brand')}}"><i class="bx bx-right-arrow-alt"></i>Trash</a>

						</li>
						{{-- <li> <a href="index.html"><i class="bx bx-right-arrow-alt"></i>Default</a>
						</li>
						<li> <a href="dashboard-eCommerce.html"><i class="bx bx-right-arrow-alt"></i>eCommerce</a>
						</li>
						<li> <a href="dashboard-analytics.html"><i class="bx bx-right-arrow-alt"></i>Analytics</a>
						</li>
						<li> <a href="dashboard-digital-marketing.html"><i class="bx bx-right-arrow-alt"></i>Digital Marketing</a>
						</li>
						<li> <a href="dashboard-human-resources.html"><i class="bx bx-right-arrow-alt"></i>Human Resources</a>
						</li> --}}
					</ul>
				</li>

				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-home-circle'></i>
						</div>
						<div class="menu-title">Category</div>
					</a>
					<ul>
						<li> <a href="{{route('admin.all.category')}}"><i class="bx bx-right-arrow-alt"></i>All Category</a>
						<li> <a href="{{route('admin.add.category')}}"><i class="bx bx-right-arrow-alt"></i>Add Category</a>
						<li> <a href="{{route('admin.recycle.category')}}"><i class="bx bx-right-arrow-alt"></i>Trash</a>

						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-home-circle'></i>
						</div>
						<div class="menu-title">Sub Category</div>
					</a>
					<ul>
						<li> <a href="{{route('admin.all.sub.category')}}"><i class="bx bx-right-arrow-alt"></i>All Sub Category</a>
						<li> <a href="{{route('admin.add.sub.category')}}"><i class="bx bx-right-arrow-alt"></i>Add Sub Category</a>
						<li> <a href="{{route('admin.recycle.sub.category')}}"><i class="bx bx-right-arrow-alt"></i>Trash</a>

						</li>
					</ul>
				</li>

				<li class="menu-label">Vendor Manage</li>

				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-cart'></i>
						</div>
						<div class="menu-title">Vendors</div>
					</a>
					<ul>
						<li> <a href="{{route('admin.all.active.vendor')}}"><i class="bx bx-right-arrow-alt"></i>All Active Vendor</a>
						</li>
						<li> <a href="{{route('admin.all.requested.vendor')}}"><i class="bx bx-right-arrow-alt"></i>All Requested Vendor</a>
						</li>
					</ul>
				</li>


				<li class="menu-label">Product Manage</li>

				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-cart'></i>
						</div>
						<div class="menu-title">Products</div>
					</a>
					<ul>
                        <li> <a href="{{route('admin.add.product')}}"><i class="bx bx-right-arrow-alt"></i>Add Products</a>
                        </li>
						<li> <a href="{{route('admin.all.product')}}"><i class="bx bx-right-arrow-alt"></i>All Products</a>
						</li>
						<li> <a href="{{route('admin.recycle.product')}}"><i class="bx bx-right-arrow-alt"></i>Trash</a>
						</li>
					</ul>
				</li>


				<li class="menu-label">Coupon Manage</li>

				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-cart'></i>
						</div>
						<div class="menu-title">Coupons</div>
					</a>
					<ul>
                        <li> <a href="{{route('admin.add.coupon')}}"><i class="bx bx-right-arrow-alt"></i>Add Coupons</a>
                        </li>
						<li> <a href="{{route('admin.all.coupon')}}"><i class="bx bx-right-arrow-alt"></i>All Coupons</a>
						</li>
						<li> <a href="{{route('admin.recycle.coupon')}}"><i class="bx bx-right-arrow-alt"></i>Trash</a>
						</li>
					</ul>
				</li>


				<li class="menu-label">Order Manage</li>

				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-cart'></i>
						</div>
						<div class="menu-title">Orders</div>
					</a>
					<ul>

                        <li> <a href="{{route('admin.all.order')}}"><i class="bx bx-right-arrow-alt"></i>All Pending Order</a>
                        </li>

                        <li> <a href="{{route('admin.all.processing.order')}}"><i class="bx bx-right-arrow-alt"></i>All Processing Order</a>
                        </li>

                        <li> <a href="{{route('admin.all.shipping.order')}}"><i class="bx bx-right-arrow-alt"></i>All Shipping Order</a>
                        </li>

                        <li> <a href="{{route('admin.all.delivered.order')}}"><i class="bx bx-right-arrow-alt"></i>All Delivered Order</a>
                        </li>


					</ul>
				</li>



				<li class="menu-label">Support</li>

				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-cart'></i>
						</div>
						<div class="menu-title">Support</div>
					</a>
					<ul>
                        {{-- <li> <a href="{{route('admin.all.order')}}"><i class="bx bx-right-arrow-alt"></i>All Order</a>
                        </li> --}}
						{{-- <li> <a href="{{route('admin.all.coupon')}}"><i class="bx bx-right-arrow-alt"></i>All Coupons</a>
						</li>
						<li> <a href="{{route('admin.recycle.coupon')}}"><i class="bx bx-right-arrow-alt"></i>Trash</a> --}}
						</li>
					</ul>
				</li>
			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->
