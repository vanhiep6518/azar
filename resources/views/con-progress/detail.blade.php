@extends('layouts.app')
@section('css')
    <style>
        .wp-content {
            margin-top:100px;
        }
    </style>
@endsection
@section('content')
<div class="container wp-content">
    <p>Mã tiến độ: <b>{{$progress->code}}</b></p>
    <p>Tên khách hàng: <b>{{$progress->customer_name}}</b></p>
    <h1>Nội dung:</h1>
    {!! $progress->content !!}
</div>
@endsection
