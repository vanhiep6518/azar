@extends('layouts.app')
@section('css')
    <style>
        .wrap__page {
            margin-top: 100px!important;
        }
    </style>
@endsection
@section('content')
    <div class="wrap__page padding__wrap">
        <div class="container">
            <main class="site-main bg--white" role="main">
                <article class="page__contentz">
                    <header class="entry-header page__headerz">
                        <h1 class="page-title pl-0">Xem hướng nhà</h1>
                    </header>
                    <!-- .entry-header -->
                </article>
                <div class="form__searchpt">
                    <h3 class="mb-3">Nhập thông tin để xem Phong Thủy</h3>
                    <form action="" method="post" class="row" id="fengshui-form">
                        @csrf
                        <div class="form-group col-md-4">
                            <input type="number" class="form-control" name="year_birth" placeholder="Nhập năm sinh">
                        </div>
                        <div class="form-group col-md-4">
                            <select name="gender" id="" class="form-control">
                                <option value="">-- Giới Tính --</option>
                                <option value="0">Nam</option>
                                <option value="1">Nữ</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <select name="huongnha" class="form-control">
                                <option value="" selected="">-- Hướng nhà --</option>
                                <option value="Đông">Đông</option>
                                <option value="Tây">Tây</option>
                                <option value="Nam">Nam</option>
                                <option value="Bắc">Bắc</option>
                                <option value="Tây Bắc">Tây Bắc</option>
                                <option value="Đông Bắc">Đông Bắc</option>
                                <option value="Tây Nam">Tây Nam</option>
                                <option value="Đông Nam">Đông Nam</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary btn-fengshui" value="Xem phong thủy">
                        </div>
                    </form>
                </div>
                <div id="pt__results" class="pt__results mt-3 mb-3">
                    {!! $detail ?? '' !!}
                </div>
            </main>
        </div>
    </div>
@endsection

