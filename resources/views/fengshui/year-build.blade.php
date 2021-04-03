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
                        <h1 class="page-title pl-0">XEM TUỔI XÂY NHÀ</h1>
                    </header>
                    <!-- .entry-header -->
                </article>
                <div class="form__searchpt">
                    <h3 class="mb-3">Nhập thông tin để xem Phong Thủy</h3>
                    <form action="" method="POST" class="row" id="fengshui-form">
                        @csrf
                        <div class="form-group col-md-4"> <input type="number" class="form-control" name="year_birth" placeholder="Năm sinh của gia chủ"></div>
                        <div class="form-group col-md-4"> <input type="number" class="form-control" name="year_build" placeholder="Năm dự kiến khởi công"></div>
                        <div class="col-md-12"> <input type="submit" class="btn btn-primary btn-fengshui" value="Xem kết quả"></div>
                    </form>
                </div>
                <div id="pt__results" class="pt__results mt-3 mb-3">
                    {!! $detail ?? '' !!}
                </div>
            </main>
        </div>
    </div>
@endsection


