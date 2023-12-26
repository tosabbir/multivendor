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
                <a aria-label="Add To Wishlist" class="action-btn" id="{{$item->product_id}}"
                    onclick="addToWishlist(this.id)"><i class="fi-rs-heart"></i></a>
                <a aria-label="Compare" class="action-btn" id="{{$item->product_id}}"
                    onclick="addToCompare(this.id)"><i
                        class="fi-rs-shuffle"></i></a>
                <a aria-label="Quick view" class="action-btn " data-bs-toggle="modal"
                    data-bs-target="#quickViewModal" id="{{$item->product_id}}" onclick="productView(this.id)" ><i class="fi-rs-eye"></i></a>
            </div>

            @php
                $price = $item->product_sel_price - $item->product_discount_price;
                $discount = ($price / $item->product_sel_price) * 100 ;
            @endphp

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
                @if ($item->product_discount_price != null)

                <div class="product-price">
                    <span>{{round($price)}}</span>
                    <span class="old-price">{{round($item->product_sel_price)}}</span>
                </div>
                @else

                <div class="product-price">
                    <span>{{round($item->product_sel_price)}}</span>
                </div>

                @endif


                <div class="add-cart">
                    <a class="add" href="shop-cart.html"><i
                            class="fi-rs-shopping-cart mr-5"></i>Add </a>
                </div>
            </div>
        </div>
    </div>
</div>
