@extends('layouts.app')
@section('css')
    <style>
        .form-construction{
            margin-top: 150px;
            width: 50%;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
            margin-bottom: 150px;
        }
    </style>
@endsection
@section('content')
    <form class="form-construction" action="{{route('storeProgress')}}" method="get">
{{--        @csrf--}}
        <div class="form-group">
            <label for="exampleInputEmail1">Mã tiến độ</label>
            <input type="text" name="code" class="form-control @error('code') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập mã tiến trình">
            @error('code')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
    </form>
@endsection
