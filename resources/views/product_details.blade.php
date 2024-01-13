
@extends('master')
@section('content')

<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
            <span></span> <a href="shop-grid-right.html">{{$product->categoryInfo->category_name}}</a> <span></span> {{$product->subcategoryInfo->sub_category_name}}
        </div>
    </div>
</div>
<div class="container mb-30">
    <div class="row">
        <div class="col-xl-10 col-lg-12 m-auto">
            <div class="product-detail accordion-detail">
                <div class="row mb-50 mt-30">
                    <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                        <div class="detail-gallery">
                            <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                            <!-- MAIN SLIDES -->
                            <div class="product-image-slider">

                                @foreach ($product_multi_img as $img)

                                <figure class="border-radius-10">
                                    <img src="{{asset('uploads/product/multi_image/'.$img->product_multi_image)}}" alt="product image" />
                                </figure>
                                @endforeach


                            </div>
                            <!-- THUMBNAILS -->
                            <div class="slider-nav-thumbnails">
                                @foreach ($product_multi_img as $img)
                                <div><img src="{{asset('uploads/product/multi_image/'.$img->product_multi_image)}}" alt="product image" /></div>
                                @endforeach
                            </div>
                        </div>
                        <!-- End Gallery -->
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="detail-info pr-30 pl-30">
                            <span class="stock-status out-stock"> Sale Off </span>
                            <h2 class="title-detail" id="dproduct_name">{{$product->product_name}}</h2>
                            <div class="product-detail-rating">
                                <div class="product-rate-cover text-end">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (32 reviews)</span>
                                </div>
                            </div>
                            <div class="clearfix product-price-cover">
                                <div class="product-price primary-color float-left">
                                    @php
                                        $price = $product->product_sel_price - $product->product_discount_price;
                                        $discount = ($price / $product->product_sel_price) * 100 ;
                                    @endphp

                                    @if ($product->product_discount_price != null)
                                        <span class="current-price text-brand" id="dproduct_descount_price">{{round($price)}}</span>
                                        <span>
                                            <span class="save-price font-md color3 ml-15">{{round($discount)}}% Off</span>
                                            <span class="old-price font-md ml-15">{{$product->product_sel_price}}</span>
                                        </span>
                                    @else
                                    <span class="current-price text-brand" id="dproduct_descount_price">{{$product->product_sel_price}}</span>
                                    @endif

                                </div>
                            </div>
                            <div class="short-desc mb-30">
                              {!! $product->product_short_description !!}
                            </div>


                            @if ($product->product_color != null)
                                @php
                                    $colors = explode(',' , $product->product_color);
                                @endphp

                            <div class="attr-detail attr-size mb-30">
                                <strong class="mr-10" style="width:50px;">Color : </strong>
                                <select class="form-control unicase-form-control" id="dproduct_color">
                                    <option selected="" disabled="">--Choose Color--</option>
                                    @foreach($colors as $color)
                                    <option value="{{ $color }}">{{ ucwords($color)  }}</option>
                                    @endforeach
                                </select>
                            </div>

                            @endif

                            @if ($product->product_size != null)
                                @php
                                    $sizes = explode(',' , $product->product_size);

                                @endphp

                            <div class="attr-detail attr-size mb-30">
                                <strong class="mr-10" style="width:50px;">Size : </strong>
                                <select class="form-control unicase-form-control" id="dproduct_size">
                                    <option selected="" disabled="">--Choose Size--</option>
                                    @foreach($sizes as $size)
                                    <option value="{{ $size }}">{{ ucwords($size)  }}</option>
                                    @endforeach
                                </select>
                            </div>

                            @endif


                            <div class="attr-detail attr-size mb-30">
                                <strong class="mr-10">Quantity Type: </strong>
                                <span class="fs-5">{{$product->product_quantity_type}}</span>
                            </div>

                            @if ($product->product_quantity_type == 'litter&piece')
                            <div class="attr-detail attr-size mb-30">
                                <strong class="mr-10" style="width:50px;">Litter : </strong>
                               <input type="number" style="width: 100px">
                            </div>
                            @elseif ($product->product_quantity_type == 'kg&piece')
                                 <strong class="mr-10" style="width:50px;">KG : </strong>
                                <input type="number" style="width: 100px">
                            @endif

                            <div class="detail-extralink mb-50">
                                <div class="detail-qty border radius">
                                    <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                    <input type="text" name="quantity" class="qty-val" value="1" min="1" id="dquantity">
                                    <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                </div>
                                <div class="product-extra-link2">
                                    <input type="hidden" id="dproduct_id" value="{{$product->product_id}}">
                                    <button type="submit" class="button button-add-to-cart" onclick="addToCartFromDetailsPage()"><i class="fi-rs-shopping-cart"></i>Add to cart</button>
                                    <a aria-label="Add To Wishlist" class="action-btn hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                </div>
                            </div>
<div class="font-xs">
<ul class="mr-50 float-start">
<li class="mb-5">Type: @php
    $product_types = explode(',', $product->product_quality_tag);
@endphp  @foreach ($product_types as $product_type)
<span class="text-brand">{{$product_type}}</span>
@endforeach </li>
<li class="mb-5">MFG:<span class="text-brand"> Jun 4.2022</span></li>
<li>LIFE: <span class="text-brand">70 days</span></li>
</ul>
<ul class="float-start">
<li class="mb-5">SKU: <a href="#">{{$product->product_code}}</a></li>
<li class="mb-5">Tags: @php
    $product_tags = explode(',', $product->product_tags);
@endphp  @foreach ($product_tags as $product_tag)
<span class="text-brand">{{$product_tag}}</span>
@endforeach </li>
<li class="mb-5">Vendor Id: <span class="text-brand " id="pd_vendor_id">{{$product->vendor_id}}</span></li>
<li>Stock:<span class="in-stock text-brand ml-5">8 Items In Stock</span></li>
</ul>
</div>
                        </div>
                        <!-- Detail Info -->
                    </div>
                </div>
                <div class="product-info">
                    <div class="tab-style3">
                        <ul class="nav nav-tabs text-uppercase">
                            <li class="nav-item">
                                <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab" href="#Additional-info">Additional info</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="Vendor-info-tab" data-bs-toggle="tab" href="#Vendor-info">Vendor</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews">Reviews (3)</a>
                            </li>
                        </ul>
                        <div class="tab-content shop_info_tab entry-main-content">
                            <div class="tab-pane fade show active" id="Description">
                                <div class="">
                                    {!! $product->product_long_description !!}
                                </div>
                            </div>
                            <div class="tab-pane fade" id="Additional-info">
                                <table class="font-md">
                                    <tbody>
                                        <tr class="stand-up">
                                            <th>Stand Up</th>
                                            <td>
                                                <p>35″L x 24″W x 37-45″H(front to back wheel)</p>
                                            </td>
                                        </tr>
                                        <tr class="folded-wo-wheels">
                                            <th>Folded (w/o wheels)</th>
                                            <td>
                                                <p>32.5″L x 18.5″W x 16.5″H</p>
                                            </td>
                                        </tr>
                                        <tr class="folded-w-wheels">
                                            <th>Folded (w/ wheels)</th>
                                            <td>
                                                <p>32.5″L x 24″W x 18.5″H</p>
                                            </td>
                                        </tr>
                                        <tr class="door-pass-through">
                                            <th>Door Pass Through</th>
                                            <td>
                                                <p>24</p>
                                            </td>
                                        </tr>
                                        <tr class="frame">
                                            <th>Frame</th>
                                            <td>
                                                <p>Aluminum</p>
                                            </td>
                                        </tr>
                                        <tr class="weight-wo-wheels">
                                            <th>Weight (w/o wheels)</th>
                                            <td>
                                                <p>20 LBS</p>
                                            </td>
                                        </tr>
                                        <tr class="weight-capacity">
                                            <th>Weight Capacity</th>
                                            <td>
                                                <p>60 LBS</p>
                                            </td>
                                        </tr>
                                        <tr class="width">
                                            <th>Width</th>
                                            <td>
                                                <p>24″</p>
                                            </td>
                                        </tr>
                                        <tr class="handle-height-ground-to-handle">
                                            <th>Handle height (ground to handle)</th>
                                            <td>
                                                <p>37-45″</p>
                                            </td>
                                        </tr>
                                        <tr class="wheels">
                                            <th>Wheels</th>
                                            <td>
                                                <p>12″ air / wide track slick tread</p>
                                            </td>
                                        </tr>
                                        <tr class="seat-back-height">
                                            <th>Seat back height</th>
                                            <td>
                                                <p>21.5″</p>
                                            </td>
                                        </tr>
                                        <tr class="head-room-inside-canopy">
                                            <th>Head room (inside canopy)</th>
                                            <td>
                                                <p>25″</p>
                                            </td>
                                        </tr>
                                        <tr class="pa_color">
                                            <th>Color</th>
                                            <td>
                                                <p>Black, Blue, Red, White</p>
                                            </td>
                                        </tr>
                                        <tr class="pa_size">
                                            <th>Size</th>
                                            <td>
                                                <p>M, S</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="Vendor-info">
                                <div class="vendor-logo d-flex mb-30">
                                    <img src="{{asset('uploads/vendor/'.$product->vendorInfo->vendor_profile_pic)}}" alt="" />
                                    <div class="vendor-name ml-15">
                                        <h5>
                                            <a href="vendor-details-2.html">{{$product->vendorInfo->vendor_shop_name}}</a>
                                        </h5>

                                        <div class="product-rate-cover text-end">
                                            <h6>
                                                {{$product->vendorInfo->vendor_pay_of_line}}
                                            </h6>
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (32 reviews)</span>
                                        </div>
                                    </div>
                                </div>
                                <ul class="contact-infor mb-50">
                                    <li><img src="assets/imgs/theme/icons/icon-location.svg" alt="" /><strong>Address: </strong> <span>{{$product->vendorInfo->vendor_shop_address}}</span></li>
                                    <li><img src="assets/imgs/theme/icons/icon-contact.svg" alt="" /><strong>Contact Seller:</strong><span>{{$product->vendorInfo->phone}}</span></li>
                                </ul>
                                <div class="d-flex mb-55">
                                    <div class="mr-30">
                                        <p class="text-brand font-xs">Rating</p>
                                        <h4 class="mb-0">92%</h4>
                                    </div>
                                    <div class="mr-30">
                                        <p class="text-brand font-xs">Ship on time</p>
                                        <h4 class="mb-0">100%</h4>
                                    </div>
                                    <div>
                                        <p class="text-brand font-xs">Chat response</p>
                                        <h4 class="mb-0">89%</h4>
                                    </div>
                                </div>
                                <p>{!! $product->vendorInfo->vendor_short_description !!}</p>
                            </div>
                            <div class="tab-pane fade" id="Reviews">
                                <!--Comments-->
                                <div class="comments-area">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <h4 class="mb-30">Customer questions & answers</h4>
                                            <div class="comment-list">
                                                <div class="single-comment justify-content-between d-flex mb-30">
                                                    <div class="user justify-content-between d-flex">
                                                        <div class="thumb text-center">
                                                            <img src="assets/imgs/blog/author-2.png" alt="" />
                                                            <a href="#" class="font-heading text-brand">Sienna</a>
                                                        </div>
                                                        <div class="desc">
                                                            <div class="d-flex justify-content-between mb-10">
                                                                <div class="d-flex align-items-center">
                                                                    <span class="font-xs text-muted">December 4, 2022 at 3:12 pm </span>
                                                                </div>
                                                                <div class="product-rate d-inline-block">
                                                                    <div class="product-rating" style="width: 100%"></div>
                                                                </div>
                                                            </div>
                                                            <p class="mb-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, suscipit exercitationem accusantium obcaecati quos voluptate nesciunt facilis itaque modi commodi dignissimos sequi repudiandae minus ab deleniti totam officia id incidunt? <a href="#" class="reply">Reply</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="single-comment justify-content-between d-flex mb-30 ml-30">
                                                    <div class="user justify-content-between d-flex">
                                                        <div class="thumb text-center">
                                                            <img src="assets/imgs/blog/author-3.png" alt="" />
                                                            <a href="#" class="font-heading text-brand">Brenna</a>
                                                        </div>
                                                        <div class="desc">
                                                            <div class="d-flex justify-content-between mb-10">
                                                                <div class="d-flex align-items-center">
                                                                    <span class="font-xs text-muted">December 4, 2022 at 3:12 pm </span>
                                                                </div>
                                                                <div class="product-rate d-inline-block">
                                                                    <div class="product-rating" style="width: 80%"></div>
                                                                </div>
                                                            </div>
                                                            <p class="mb-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, suscipit exercitationem accusantium obcaecati quos voluptate nesciunt facilis itaque modi commodi dignissimos sequi repudiandae minus ab deleniti totam officia id incidunt? <a href="#" class="reply">Reply</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="single-comment justify-content-between d-flex">
                                                    <div class="user justify-content-between d-flex">
                                                        <div class="thumb text-center">
                                                            <img src="assets/imgs/blog/author-4.png" alt="" />
                                                            <a href="#" class="font-heading text-brand">Gemma</a>
                                                        </div>
                                                        <div class="desc">
                                                            <div class="d-flex justify-content-between mb-10">
                                                                <div class="d-flex align-items-center">
                                                                    <span class="font-xs text-muted">December 4, 2022 at 3:12 pm </span>
                                                                </div>
                                                                <div class="product-rate d-inline-block">
                                                                    <div class="product-rating" style="width: 80%"></div>
                                                                </div>
                                                            </div>
                                                            <p class="mb-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, suscipit exercitationem accusantium obcaecati quos voluptate nesciunt facilis itaque modi commodi dignissimos sequi repudiandae minus ab deleniti totam officia id incidunt? <a href="#" class="reply">Reply</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <h4 class="mb-30">Customer reviews</h4>
                                            <div class="d-flex mb-30">
                                                <div class="product-rate d-inline-block mr-15">
                                                    <div class="product-rating" style="width: 90%"></div>
                                                </div>
                                                <h6>4.8 out of 5</h6>
                                            </div>
                                            <div class="progress">
                                                <span>5 star</span>
                                                <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                                            </div>
                                            <div class="progress">
                                                <span>4 star</span>
                                                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                            </div>
                                            <div class="progress">
                                                <span>3 star</span>
                                                <div class="progress-bar" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">45%</div>
                                            </div>
                                            <div class="progress">
                                                <span>2 star</span>
                                                <div class="progress-bar" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">65%</div>
                                            </div>
                                            <div class="progress mb-30">
                                                <span>1 star</span>
                                                <div class="progress-bar" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">85%</div>
                                            </div>
                                            <a href="#" class="font-xs text-muted">How are ratings calculated?</a>
                                        </div>
                                    </div>
                                </div>
                                <!--comment form-->
                                <div class="comment-form">
                                    <h4 class="mb-15">Add a review</h4>
                                    <div class="product-rate d-inline-block mb-30"></div>
                                    <div class="row">
                                        <div class="col-lg-8 col-md-12">
                                            <form class="form-contact comment_form" action="#" id="commentForm">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="Write Comment"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input class="form-control" name="name" id="name" type="text" placeholder="Name" />
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input class="form-control" name="email" id="email" type="email" placeholder="Email" />
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <input class="form-control" name="website" id="website" type="text" placeholder="Website" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="button button-contactForm">Submit Review</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-60">
                    <div class="col-12">
                        <h2 class="section-title style-1 mb-30">Related products</h2>
                    </div>
                    <div class="col-12">
                        <div class="row related-products">


                            @php
                            $all_product = App\Models\Product::where('product_status_id', 1)->where('product_vendor_status_id', 1)->where('category_id', $product->category_id)->latest()->get();
                        @endphp
                        @foreach ($all_product as $item)
                        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                            <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn"
                                data-wow-delay=".1s">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="{{route('product.details',$item->product_slug)}}">
                                            <img class="default-img"
                                                src="{{ asset('uploads/product/'.$item->product_thumbnail) }}"
                                                alt="" />

                                            @php
                                                $first_milti_img = App\Models\ProductMultiImage::where('product_id', $item->product_id)->first();
                                            @endphp
                                            <img class="hover-img"
                                                src="{{ asset('uploads/product/multi_image/'.$first_milti_img->product_multi_image) }}"
                                                alt="" />
                                        </a>
                                    </div>

                                    <div class="product-action-1">
                                        <a aria-label="Add To Wishlist" class="action-btn"
                                            href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                        <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                                class="fi-rs-shuffle"></i></a>
                                        <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                            data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                    </div>

                                    @if ($item->product_discount_price != null)

                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">{{round($discount)}} %</span>
                                        </div>

                                    @elseif($item->created_at->diffInDays(\Carbon\Carbon::now()) <= 30)

                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="hot">New</span>

                                    </div>

                                    @else
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="hot">Hot</span>
                                    </div>

                                    @endif

                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href="shop-grid-right.html">{{$item->categoryInfo->category_name}}</a>
                                    </div>
                                    <h2><a href="{{route('product.details',$item->product_slug)}}">{{$item->product_name}}</a></h2>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                    <div>
                                        <span class="font-small text-muted">By <a
                                            href="vendor-details-1.html">
                                            @if ($item->vendor_id != null)
                                            {{$item->vendorInfo->vendor_shop_name}}
                                            @else
                                        </a></span>
                                            Admin
                                            @endif
                                    </div>
                                    <div class="product-card-bottom">
                                        <div class="product-price">
                                            <span>{{round($price)}}</span>
                                            <span class="old-price">{{round($item->product_sel_price)}}</span>
                                        </div>
                                        <div class="add-cart">
                                            <a class="add" href="shop-cart.html"><i
                                                    class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end product card-->
                        @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
