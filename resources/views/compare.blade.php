@extends('master')
@section('content')

<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Shop <span></span> Compare
            </div>
        </div>
    </div>
    <div class="container mb-80 mt-50">
        <div class="row">
            <h1 class="heading-2 mb-10">Products Compare</h1>
            <h6 class="text-body mb-40">There are <span class="text-brand">3</span> products to compare</h6>

            @foreach ($all as $item)

            <div class="col-xl-6 col-lg-6">
                <div class="table-responsive">
                    <table class="table text-center table-compare">
                        <tbody>
                            <tr class="pr_image">
                                <td class="text-muted font-sm fw-600 font-heading mw-200">Thumbnail</td>
                                <td class="row_img"><img src="{{asset('uploads/product/'.$item->productInfo->product_thumbnail)}}" alt="compare-img" /></td>

                            </tr>
                            <tr class="pr_title">
                                <td class="text-muted font-sm fw-600 font-heading">Name</td>
                                <td class="product_name">
                                    <h6><a href="shop-product-full.html" class="text-heading">{{$item->productInfo->product_name}}</a></h6>
                                </td>

                            </tr>
                            <tr class="pr_price">
                                <td class="text-muted font-sm fw-600 font-heading">Price</td>
                                <td class="product_price">
                                    <h4 class="price text-brand">${{ ($item->prodcutInfo?->product_discount_price == null)? ($item->productInfo->product_sel_price - $item->productInfo->product_discount_price) : $item->productInfo->product_discount_price }}</h4>
                                </td>

                            </tr>
                            <tr class="pr_rating">
                                <td class="text-muted font-sm fw-600 font-heading">Rating</td>
                                <td>
                                    <div class="rating_wrap">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="rating_num">(121)</span>
                                    </div>
                                </td>

                            </tr>
                            <tr class="description">
                                <td class="text-muted font-sm fw-600 font-heading">Description</td>
                                <td class="row_text font-xs">
                                    <p class="font-sm text-muted">{!! $item->productInfo->product_long_description !!}</p>
                                </td>

                            </tr>
                            <tr class="pr_stock">
                                <td class="text-muted font-sm fw-600 font-heading">Stock status</td>
                                <td class="row_stock"><span class="stock-status in-stock mb-0">In Stock</span></td>

                            </tr>
                            <tr class="pr_weight">
                                <td class="text-muted font-sm fw-600 font-heading">Weight</td>
                                <td class="row_weight">{{ $item->productInfo->product_weight }} {{ $item->productInfo->product_quantity_type }}</td>

                            </tr>
                            <tr class="pr_dimensions">
                                <td class="text-muted font-sm fw-600 font-heading">Dimensions</td>
                                <td class="row_dimensions"> {{ ($item->productInfo?->product_dimensions == null)? "N/A" : $item->productInfo->product_dimensions }}</td>

                            </tr>
                            <tr class="pr_add_to_cart">
                                <td class="text-muted font-sm fw-600 font-heading">Buy now</td>
                                <td class="row_btn">
                                    <button class="btn btn-sm"><i class="fi-rs-shopping-bag mr-5"></i>Add to cart</button>
                                </td>

                            </tr>
                            <tr class="pr_remove text-muted">
                                <td class="text-muted font-md fw-600">Cancel</td>
                                <td class="row_remove">
                                    <a href="{{ route('remove.compare',$item->id) }}" class="text-muted"><i class="fi-rs-trash mr-5"></i><span>Remove</span> </a>
                                </td>

                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            @endforeach


        </div>
    </div>
</main>

@endsection
