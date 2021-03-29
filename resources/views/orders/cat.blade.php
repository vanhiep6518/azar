@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{asset('css/shop.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">
@endsection
@section('content')
    <div id="site">
        <div id="container">
            <div id="main-content-wp" class="home-page clearfix">
                <div class="wp-inner">
                    <div class="main-content fl-right">
                        <div class="section clearfix" id="list-product-wp">
                            <div class="section-head">
                                <h3 class="section-title">{{$productCat->name}}</h3>
                            </div>
                            <div class="section-detail">
                                <ul class="list-item clearfix">
                                    @if($productCat && $productCat->recursiveProducts && count($productCat->recursiveProducts)>0)
                                        @foreach($productCat->recursiveProducts as $item)
                                            <li>
                                                <a href="{{route('shop.detailProduct',['cat_slug'=>$item->product_cat->slug,'product_slug'=>$item->slug,'id'=>$item->id])}}" title="" class="thumb">
                                                    <img src="{{$item->image[0]}}">
                                                </a>
                                                <a href="{{route('shop.detailProduct',['cat_slug'=>$item->product_cat->slug,'product_slug'=>$item->slug,'id'=>$item->id])}}" title="" class="product-name">{{$item->name}}</a>
                                                <div class="price">
                                                    <span class="new">{{currency_format($item->price)}}</span>
                                                    <!-- <span class="old">6.190.000đ</span> -->
                                                </div>
                                                <div class="action clearfix">
                                                    <a href="javascript:void(0)" data-id="{{$item->id}}" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                                    <a href="{{route('cart.buyNow',['id'=>$item->id])}}" title="" class="buy-now fl-right">Mua ngay</a>
                                                </div>
                                            </li>
                                        @endforeach
                                    @else
                                        <p>Không có sản phẩm nào</p>
                                    @endif
                                </ul>
                                {{ $productCat->recursiveProducts->links() }}
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
        <div id="fb-root"></div>
    </div>
@endsection
@section('custom-js')
    <script src="{{asset('js/toastr.min.js')}}"></script>
    <script src="{{asset('js/customs.js')}}"></script>
    {!! Toastr::message() !!}
@endsection

