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
                            <li id="menu-item-428" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor {{$item->id == $price->price_cat->id ? 'current-menu-parent' : ''}} menu-item-has-children menu-item-428"><a href="javascript:void(0)">{{$item->name}}</a>
                                @if($item->prices)
                                    <ul class="sub-menu">
                                        @foreach($item->prices as $item2)
                                            <li id="menu-item-440" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-224 current_page_item menu-item-440 active "><a href="{{route('price.detail',['slug'=>$item2->slug,'id'=>$item2->id])}}">{{$item2->title}}</a></li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </nav>
        <div class="container">
            <main class="site-main" role="main">
                <article class="page__content pt-5">
                    {!! $price->content !!}
                </article>
            </main>
        </div>
    </div>
@endsection
