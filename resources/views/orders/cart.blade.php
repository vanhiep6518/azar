@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{asset('css/shop.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    <style>
        #main-content-wp{
            padding-top: 90px;
        }
    </style>
@endsection
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <div id="main-content-wp" class="cart-page">
        <div class="section" id="breadcrumb-wp">
            <div class="wp-inner">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <a href="/" title="">Trang chủ</a>
                        </li>
                        <li>
                            <a href="/cart" title="">Giỏ hàng</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="wrapper" class="wp-inner clearfix">
            @if($cartItems && count($cartItems) > 0)
                <div class="section" id="info-cart-wp">
                    <div class="section-detail table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <td>Mã sản phẩm</td>
                                <td>Ảnh sản phẩm</td>
                                <td>Tên sản phẩm</td>
                                <td>Giá sản phẩm</td>
                                <td>Số lượng</td>
                                <td colspan="2">Thành tiền</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cartItems as $item)
                                <tr>
                                    <td>{{$item->model->code}}</td>
                                    <td>
                                        <a href="{{route('shop.detailProduct',['cat_slug'=>$item->model->cat_slug,'product_slug'=>$item->model->slug,'id'=>$item->model->id])}}" title="" class="thumb">
                                            <img src="{{$item->model->image[0]}}" alt="{{$item->model->name}}">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('shop.detailProduct',['cat_slug'=>$item->model->cat_slug,'product_slug'=>$item->model->slug,'id'=>$item->model->id])}}" title="" class="name-product">{{$item->model->name}}</a>
                                    </td>
                                    <td>{{currency_format($item->price)}}</td>
                                    <td>
                                        <input type="number" min="1" max="50" name="num_order" data-id="{{$item->rowId}}" value="{{$item->qty}}" class="num-order">
                                    </td>
                                    <td id="{{$item->rowId}}">{{currency_format($item->qty * $item->price)}}</td>
                                    <td>
                                        <a href="{{route('cart.delete',['rowId'=>$item->rowId])}}" title="" class="del-product"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="7">
                                    <div class="clearfix">
                                        <p class="fl-right">Tổng giá: <span id="total-price">{{Cart::subtotal(0)}}đ</span></p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="7">
                                    <div class="clearfix">
                                        <div class="fl-right">
                                            <!-- <a href="" title="" id="update-cart">Cập nhật giỏ hàng</a> -->
                                            <a href="{{route('cart.checkout')}}" title="" id="checkout-cart">Thanh toán</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="section" id="action-cart-wp">
                    <div class="section-detail">
                        <p class="title">Click vào <span>“Cập nhật giỏ hàng”</span> để cập nhật số lượng. Nhập vào số lượng <span>0</span> để xóa sản phẩm khỏi giỏ hàng. Nhấn vào thanh toán để hoàn tất mua hàng.</p>
                        <a href="{{route('shop.index')}}" title="" id="buy-more">Mua tiếp</a><br>
                        <a href="{{route('cart.deleteAll')}}" title="" id="delete-cart">Xóa giỏ hàng</a>
                    </div>
                </div>
            @else
                <p id="come-back">Không có sản phẩm nào trong giỏ hàng.Click <a href="/">vào đây</a> để quay trở lại trang chủ.</p>
            @endif
        </div>
    </div>
@endsection
@section('custom-js')
        <script src="{{asset('js/customs.js')}}"></script>

@endsection
