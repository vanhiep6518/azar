@extends('admin.layouts.app')
@section('css')
{{--<link rel="stylesheet" href="{{asset('css/admin/reset.css')}}">--}}
@endsection
@section('content')
    <div id="content" class="detail-exhibition fl-right" style="min-height: 499px;">
        <div class="section" id="info">
            <div class="section-head">
                <h3 class="section-title">Thông tin đơn hàng</h3>
            </div>
            <ul class="list-item list-unstyled">
                <li>
                    <h3 class="title"><i class="fas fa-barcode"></i> Mã đơn hàng</h3>
                    <span class="detail">{{$detail->id}}</span>
                </li>
                <li>
                    <h3 class="title"><i class="fas fa-map-marker-alt"></i> Địa chỉ nhận hàng</h3>
                    <span class="detail">{{$detail->customer->address}}</span>
                </li>
                <li>
                    <h3 class="title"><i class="fab fa-opencart"></i> Thông tin vận chuyển</h3>
                    <span class="detail">{{transport_info($detail->payment_type)}}</span>
                </li>
                <form method="POST" action="{{route('admin.updateStatusOrder',['id'=>$detail->id])}}">
                    @csrf
                    <li>
                        <h3 class="title"><i class="fas fa-exclamation"></i> Tình trạng đơn hàng</h3>
                        <select name="status">
                            <option value="1" @if($detail->status == 1) selected="selected" @endif>Chờ duyệt</option>
                            <option value="2" @if($detail->status == 2) selected="selected" @endif>Đang vận chuyển</option>
                            <option value="3" @if($detail->status == 3) selected="selected" @endif>Thành công</option>
                            <option value="4" @if($detail->status == 4) selected="selected" @endif>Thùng rác</option>
                        </select>
                        <input type="submit" name="sm_status" value="Cập nhật đơn hàng">
                    </li>
                </form>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
            </ul>
        </div>
        <div class="section">
            <div class="section-head">
                <h3 class="section-title">Sản phẩm đơn hàng</h3>
            </div>
            <div class="table-responsive">
                <table class="table info-exhibition">
                    <thead>
                    <tr>
                        <td class="thead-text">STT</td>
                        <td class="thead-text">Ảnh sản phẩm</td>
                        <td class="thead-text">Tên sản phẩm</td>
                        <td class="thead-text">Đơn giá</td>
                        <td class="thead-text">Số lượng</td>
                        <td class="thead-text">Thành tiền</td>
                    </tr>
                    </thead>
                    <tbody>
                    @if($detail->order_items && count($detail->order_items) > 0)
                        @foreach($detail->order_items as $key => $item)
                            <tr>
                                <td class="thead-text">{{$key + 1}}</td>
                                <td class="thead-text">
                                    <div class="thumb">
                                        <img src="{{$item->product->image[0]}}" alt="{{$item->product->name}}">
                                    </div>
                                </td>
                                <td class="thead-text">{{$item->product->name}}</td>
                                <td class="thead-text">{{currency_format($item->product->price)}}</td>
                                <td class="thead-text">{{$item->quantity}}</td>
                                <td class="thead-text">{{currency_format($item->product->price*$item->quantity)}}</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
            <div class="section">
                <h3 class="section-title">Giá trị đơn hàng</h3>
                <div class="section-detail">
                    <ul class="list-item clearfix list-unstyled">
                        <li>
                            <span class="total-fee">Tổng số lượng</span>
                            <span class="total">Tổng đơn hàng</span>
                        </li>
                        <li>
                            <span class="total-fee">{{$detail->order_number}} sản phẩm</span>
                            <span class="total">{{currency_format($detail->total_price)}}</span>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
@endsection
