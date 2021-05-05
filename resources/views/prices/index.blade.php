@extends('layouts.app')
{{--@section('css')--}}
{{--    <style>--}}
{{--        .wrap__page{--}}
{{--            background-image: url(../images/bg-qt.jpg);--}}
{{--        }--}}
{{--    </style>--}}
{{--@endsection--}}
@section('content')
    <div class="wrap__page page__padding" style="padding-top: 100px;">
        <nav class="nav__bangGia">
            <div class="container">
                <ul id="menu-bang-gia" class="dn__menu">
                    @if(isset($cats) && $cats['price'])
                        @foreach($cats['price'] as $item)
                            @if($item->id !== 2 && $item->id !== 3)
                                <li id="menu-item-428" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor {{$item->id == $project->price_cat->id ? 'current-menu-parent' : ''}} menu-item-has-children menu-item-428"><a href="javascript:void(0)">{{$item->name}}</a>
                                    @if($item->prices)
                                        <ul class="sub-menu">
                                            @foreach($item->prices as $item2)
                                                <li id="menu-item-440" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-224 current_page_item menu-item-440 active "><a href="{{route('price.detail',['slug'=>$item2->slug,'id'=>$item2->id])}}">{{$item2->title}}</a></li>
                                            @endforeach
                                        </ul>
                                    @endif
                                    {{--                                @if($item->id == 2)--}}
                                    {{--                                    <ul class="sub-menu">--}}
                                    {{--                                        <li id="menu-item-440" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-224 current_page_item menu-item-440 active "><a href="/bao-gia-thiet-ke">Thiết kế</a></li>--}}
                                    {{--                                        <li id="menu-item-440" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-224 current_page_item menu-item-440 active "><a href="/bao-gia-thi-cong">Thi công</a></li>--}}
                                    {{--                                    </ul>--}}
                                    {{--                                @elseif($item->id == 3)--}}
                                    {{--                                    <ul class="sub-menu">--}}
                                    {{--                                        <li id="menu-item-440" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-224 current_page_item menu-item-440 active "><a href="/hop-dong-thiet-ke">Thiết kế</a></li>--}}
                                    {{--                                        <li id="menu-item-440" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-224 current_page_item menu-item-440 active "><a href="/hop-dong-thi-cong-doi-tac">Thi công ĐT</a></li>--}}
                                    {{--                                        <li id="menu-item-440" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-224 current_page_item menu-item-440 active "><a href="/hop-dong-thi-cong-khach-hang">Thi công KH</a></li>--}}
                                    {{--                                    </ul>--}}
{{--                                    @endif--}}
                                </li>
                            @endif
                        @endforeach
                    @endif
                </ul>
            </div>
        </nav>
        <div class="container">
            <main class="site-main" role="main">
                <article class="page__content pt-5">
                    {!! $project->content !!}
                </article>
            </main>
        </div>
    </div>
@endsection
