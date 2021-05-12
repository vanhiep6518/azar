@extends('layouts.app')
@section('title',$project->title)
@section('content')
    <div class="dn__breadcrumb">
        <div class="sc__wrap">
            <div class="sc__wrap">
                <div class="container-fluid">
                    <span><a rel="v:url" property="v:title" class="crumbs-home" href="https://81ART.vn">Trang chủ</a></span>
                    <span class="delimiter"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                    <span><a rel="v:url" property="v:title" href="{{route('construction.list')}}">Thi công</a></span>
                    <span class="delimiter"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                    <span class="current">{{$project->title}}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="wrap__page">
        <div class="container-fluid">
            <div class="wrap__content sc__wrap">
                <div class="row">
                    <div class="col-md-9">
                        <article class="content__single">
                            <header class="entry-header --s1">
                                <span class="title__line"></span>
                                <h1 class="entry-title">{{$project->title}}</h1>
                                <span class="title__line"></span>
                            </header>
                            <div class="entry-content --custom">
                                {!! $project->content !!}
                            </div>
                        </article>
                    </div>
                    <div class="col-md-3">
                        <div class="text-center mb-4">
                            <div class="header__title1 mb-3">
                                <h3 class="title--border1">Tip nội thất</h3>
                            </div>
                        </div>
                        <aside class="widget-area widget__left widget__fix">
                            <div class="sidebar__inner">
                                <section id="media_image-2" class="widget widget_media_image">

                                </section>
                            </div>
                        </aside>
                        @include('layouts.form-advice')
                    </div>
                    <div class="col-md-12 mb-5">
                        <div class="related__post project">
                            <header class="header__title mt-3">
                                <div class="box__title --border">
                                    <div class="title__line"></div>
                                    <h3 class="title__box"><span>Dự án liên quan</span></h3>
                                    <div class="title__line"></div>
                                </div>
                            </header>
                            <div class="main-carousel">
                                @if(isset($relatedProject))
                                    @foreach($relatedProject as $item)
                                        <div class="carousel-cell">
                                            <archive class="project__item ef__zoomin">
                                                <a href="{{route('project.detail',['cat_slug'=>$item->construction_cat->slug, 'slug' => $item->slug, 'id' => $item->id])}}" class="">
                                                    <div class="item__thumb">
                                                        <div class="dnfix__thumb"> <img width="300" height="300" src="{{$item->image}}" class="img-fluid wp-post-image" ></div>
                                                    </div>
                                                    <div class="item__meta">
                                                        <p class="item__title">{{$item->title}}</p>
                                                        <div class="item__field__wrap">
                                                            <div class="item__field">{{$item->price}}</div>
                                                            <div class="item__field">{{$item->floors}}</div>
                                                            <div class="item__field">{{$item->acreage}}</div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </archive>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom-js')
    <script>
        $('.main-carousel').flickity({
            // options
            cellAlign: 'left',
            contain: true
        });
    </script>
@endsection
