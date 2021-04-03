@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/shop.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('css/xzoom.css')}}">
    <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">
@endsection
@section('content')
    <div id="site">
        <div id="container">
            <div id="main-content-wp" class="home-page clearfix">
                <div class="wp-inner">
                    <div class="main-content fl-right">
                        <div class="section" id="detail-product-wp">
                            <div class="section-detail clearfix">
                                <div class="thumb-wp fl-left">
                                    <img class="xzoom" id="xzoom-default" src="{{$product->image[0]}}" xoriginal="{{$product->image[0]}}" />
                                    <div class="thumb-respon-wp">
                                        <img src="{{$product->image[0]}}" alt="">
                                    </div>
                                    <div class="xzoom-thumbs d-flex mt-2">
                                        @if($product->image && count($product->image) > 0)
                                            @foreach($product->image as $item)
                                                <a href="{{$item}}"><img class="xzoom-gallery" width="80" src="{{$item}}" title=""></a>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="info fl-right">
                                    <h3 class="product-name">{{$product->name}}</h3>
                                    <div class="desc">
                                        {!! $product->short_desc !!}
                                    </div>
{{--                                    <div class="num-product">--}}
{{--                                        <span class="title">Sản phẩm: </span>--}}
{{--                                        <span class="status">Còn hàng</span>--}}
{{--                                    </div>--}}
                                    <p class="price">{{currency_format($product->price)}}</p>
                                    <form id="add-cart-form">
                                        @csrf
                                        <div id="num-order-wp">
                                            <a title="" id="minus"><i class="fa fa-minus"></i></a>
                                            <input type="text" name="num_order" value="1" id="num-order">
                                            <input type="hidden" id="price" value="6990000">
                                            <a title="" id="plus"><i class="fa fa-plus"></i></a>
                                        </div>
                                        <button type="button" title="Thêm giỏ hàng" data-id="{{$product->id}}" class="add-cart2">Thêm giỏ hàng</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="section" id="post-product-wp">
                            <div class="section-head">
                                <h3 class="section-title">Mô tả sản phẩm</h3>
                            </div>
                            <div class="section-detail">
                                {!! $product->detail !!}
                            </div>
                        </div>
                        <div class="section" id="same-category-wp">
                            <div class="section-head">
                                <h3 class="section-title">Cùng chuyên mục</h3>
                            </div>
                            <div class="section-detail">
                                @if($relativeProduct && count($relativeProduct) > 0)
                                    <div class="list-item main-carousel">
                                    @foreach($relativeProduct as $item)
                                            <div class="carousel-cell">
                                            <a href="{{route('shop.detailProduct',['cat_slug'=>$item->product_cat->slug,'product_slug'=>$item->slug,'id'=>$item->id])}}" title="" class="thumb">
                                                <img src="{{$item->image[0]}}">
                                            </a>
                                            <a class="product-name" href="{{route('shop.detailProduct',['cat_slug'=>$item->product_cat->slug,'product_slug'=>$item->slug,'id'=>$item->id])}}">{{$item->name}}</a>
                                            <div class="price">
                                                <span class="new">{{currency_format($item->price)}}</span>
                                                <!-- <span class="old">20.900.000đ</span> -->
                                            </div>
                                            <div class="action clearfix">
                                                <a href="javascript:void(0)" data-id="{{$item->id}}" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                                <a href="{{route('cart.buyNow',['id'=>$item->id])}}" title="" class="buy-now fl-right">Mua ngay</a>
                                            </div>
                                            </div>
                                    @endforeach
                                    </div>
                                @else
                                    <p>Không có sản phẩm nào cùng chuyên mục</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="sidebar fl-left">
                        <div class="section" id="category-product-wp">
                            <div class="section-head">
                                <h3 class="section-title">Danh mục sản phẩm</h3>
                            </div>
                            <div class="secion-detail">
                                {{showCategories($productCats)}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="menu-respon">
            <a href="?page=home" title="" class="logo">VSHOP</a>
            <div id="menu-respon-wp">
                <ul class="" id="main-menu-respon">
                    <li>
                        <a href="?page=home" title>Trang chủ</a>
                    </li>
                    <li>
                        <a href="?page=category_product" title>Điện thoại</a>
                        <ul class="sub-menu">
                            <li>
                                <a href="?page=category_product" title="">Iphone</a>
                            </li>
                            <li>
                                <a href="?page=category_product" title="">Samsung</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="?page=category_product" title="">Iphone X</a>
                                    </li>
                                    <li>
                                        <a href="?page=category_product" title="">Iphone 8</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="?page=category_product" title="">Nokia</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="?page=category_product" title>Máy tính bảng</a>
                    </li>
                    <li>
                        <a href="?page=category_product" title>Laptop</a>
                    </li>
                    <li>
                        <a href="?page=category_product" title>Đồ dùng sinh hoạt</a>
                    </li>
                    <li>
                        <a href="?page=blog" title>Blog</a>
                    </li>
                    <li>
                        <a href="#" title>Liên hệ</a>
                    </li>
                </ul>
            </div>
        </div>
        <div id="btn-top"><img src="public/images/icon-to-top.png" alt=""/></div>

    </div>
@endsection
@section('custom-js')
{{--    <script src="{{asset('js/jquery.min.js')}}"></script>--}}
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/xzoom.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <script src="{{asset('js/toastr.min.js')}}"></script>
    <script src="{{asset('js/customs.js')}}"></script>
    {!! Toastr::message() !!}

    <script>
        $('.main-carousel').flickity({
            // options
            cellAlign: 'left',
            contain: true,
            prevNextButtons: false,
            pageDots: false
        });

        $(".xzoom, .xzoom-gallery").xzoom({tint: '#333', Xoffset: 15});
    </script>
@endsection
