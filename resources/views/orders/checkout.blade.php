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
    <div id="main-content-wp" class="cart-page">
        <div class="section" id="breadcrumb-wp">
            <div class="wp-inner">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <a href="/" title="">Trang chủ</a>
                        </li>
                        <li>
                            <a href="cart/checkout" title="">Thanh toán</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    <div id="wrapper" class="wp-inner clearfix">
        <form method="POST" action="{{route('cart.order')}}" name="form-checkout">
            @csrf
        <div class="section" id="customer-info-wp">
            <div class="section-head">
                <h1 class="section-title">Thông tin khách hàng</h1>
            </div>
            <div class="section-detail">
                    <div class="form-row clearfix">
                        <div class="form-col fl-left">
                            <label for="fullname">Họ tên</label>
                            <input type="text" class="form-control @error('fullname') is-invalid @enderror" name="fullname" id="fullname" value="{{ old('fullname') }}">
                            @error('fullname')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-col fl-right">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row clearfix">
                        <div class="form-col fl-left">
                            <label for="address">Địa chỉ</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address" value="{{ old('address') }}">
                            @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-col fl-right">
                            <label for="phone">Số điện thoại</label>
                            <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{ old('phone') }}">
                            @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="notes">Ghi chú</label>
                            <textarea name="note"></textarea>
                        </div>
                    </div>
            </div>
        </div>
        <div class="section" id="order-review-wp">
            <div class="section-head">
                <h1 class="section-title">Thông tin đơn hàng</h1>
            </div>
            <div class="section-detail">
                <table class="shop-table">
                    <thead>
                    <tr>
                        <td>Sản phẩm</td>
                        <td>Tổng</td>
                    </tr>
                    </thead>
                    <tbody>
                    @if($cartItems && count($cartItems) > 0)
                        @foreach($cartItems as $item)
                            <tr class="cart-item">
                                <td class="product-name">{{$item->model->name}}<strong class="product-quantity">x {{$item->qty}}</strong></td>
                                <td class="product-total">{{currency_format($item->qty * $item->price)}}</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                    <tfoot>
                    <tr class="order-total">
                        <td>Tổng đơn hàng:</td>
                        <td>
                            <strong class="total-price">
                                {{Cart::subtotal(0)}}đ                                    </strong>
                        </td>
                    </tr>
                    </tfoot>
                </table>
                <div id="payment-checkout-wp">
                    <ul id="payment_methods">
                        <li>
                            <input type="radio" id="direct-payment" name="payment_method" value="direct" checked>
                            <label for="direct-payment">Thanh toán tại cửa hàng</label>
                        </li>
                        <li>
                            <input type="radio" id="payment-home" name="payment_method" value="home">
                            <label for="payment-home">Thanh toán tại nhà</label>
                        </li>
                        @error('payment_method')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </ul>
                </div>
                <div class="place-order-wp clearfix">
                    <input type="submit" id="order-now" name="btn-order" value="Đặt hàng">
                </div>
            </div>
        </div>
        </form>
    </div>
    </div>
@endsection
