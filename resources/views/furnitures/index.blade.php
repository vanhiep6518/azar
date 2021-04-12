@extends('layouts.app')
@section('title','Nội thất - Thiết kế & Xây dựng Nhà đẹp 81ART')
@section('content')
    <div class="wrap__page archive__project">
        @include('layouts.video')
        <div class="container-fluidz">
            <div class="page__content sc__wrap">
                <header class="page__header">
                    <h1 class="page-title text-white btn__effect btn--active button_hover"><span class="page-description">Dự án</span></h1>
                </header>
                <div class="archive__content">
                    <ul class="nav nav-tabs myTabS1 --long" id="myTab" role="tablist">
                        @if(isset($cats) && $cats['furniture'])
                            @foreach($cats['furniture'] as $item)
                                <li class="nav-item"> <a class="nav-link {{(isset($cat) && $cat->id == $item->id) ? 'active' : ''}}" href="{{route('furniture.cat',['slug'=>$item->slug])}}">{{$item->name}}</a></li>
                            @endforeach
                        @endif
                    </ul>
                    <div class="row no-gutters">
                        @if(isset($projects))
                            @foreach($projects as $item)
                                <div class="col-md-6 col-lg-3">
                                    <archive class="project__item ef__zoomin">
                                        <a href="{{route('furniture.detail',['cat_slug'=>$item->furniture_cat->slug , 'slug' => $item->slug, 'id' => $item->id])}}" class="">
                                            <div class="item__thumb">
                                                <div class="dnfix__thumb"> <img width="300" height="300" src="{{$item->image[0]}}" class="img-fluid wp-post-image" alt="{{$item->title}}"></div>
                                            </div>
                                            <div class="item__meta">
                                                <p class="item__title">{{$item->title}}</p>

                                            </div>
                                        </a>
                                    </archive>
                                </div>
                            @endforeach
                        @endif

                    </div>
                    {{ $projects->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
