@extends('master')
@section('content')

<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
            <span></span> Shop <span></span> Wishlist
        </div>
    </div>
</div>
<div class="container mb-30 mt-50">
    <div class="row">
        <div class="col-xl-10 col-lg-12 m-auto">
            <div class="mb-50">
                <h1 class="heading-2 mb-10">Your Wishlist</h1>
                <h6 class="text-body">There are <span class="text-brand">5</span> products in this list</h6>
            </div>
            <div class="table-responsive shopping-summery">
                <table class="table table-wishlist">
                    <thead>
                        <tr class="main-heading">
                            <th class="custome-checkbox start pl-30">

                            </th>
                            <th scope="col" colspan="2">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Stock Status</th>
                            <th scope="col">Action</th>
                            <th scope="col" class="end">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all as $item)

                        <tr class="pt-30">
                            <td class="custome-checkbox pl-30">
                            </td>
                            <td class="image product-thumbnail pt-40"><img src="{{asset('uploads/product/'.$item->productInfo->product_thumbnail)}}" alt="#" /></td>
                            <td class="product-des product-name">
                                <h6><a class="product-name mb-10" href="shop-product-right.html">{{$item->productInfo->product_name}}</a></h6>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                            </td>
                            <td class="price" data-title="Price">
                                <h3 class="text-brand">{{ ($item->prodcutInfo?->product_discount_price == null)? ($item->productInfo->product_sel_price - $item->productInfo->product_discount_price) : $item->productInfo->product_discount_price }}</h3>

                            </td>

                            <td class="text-center detail-info" data-title="Stock">
                                <span class="stock-status in-stock mb-0"> In Stock </span>
                            </td>
                            <td class="text-right" data-title="Cart">
                                <button class="btn btn-sm">Add to cart</button>
                            </td>
                            <td class="action text-center" data-title="Remove">
                                <a href="{{ route('remove.wishlist',$item->id) }}" class="text-body"><i class="fi-rs-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
