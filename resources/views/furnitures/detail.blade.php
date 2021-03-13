@extends('layouts.app')
@section('title',$project->title)
@section('content')
    <div class="dn__breadcrumb">
        <div class="sc__wrap">
            <div class="container-fluid"> <span typeof="v:Breadcrumb"><a rel="v:url" property="v:title" class="crumbs-home" href="https://81ART.vn">Trang chủ</a></span> <span class="delimiter"><i class="fa fa-angle-right" aria-hidden="true"></i></span> <span typeof="v:Breadcrumb"><a rel="v:url" property="v:title" href="https://81ART.vn/project/">Dự án</a></span> <span class="delimiter"><i class="fa fa-angle-right" aria-hidden="true"></i></span> <span class="current">TOP NHÀ PHỐ TRÊN 990 TRIỆU ĐẸP NHẤT</span></div>
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
                                <section id="media_image-2" class="widget widget_media_image"><a href="https://media.giphy.com/media/lPjHC9zJScNjqIECmu/giphy.gif"><img class="image " src="https://media.giphy.com/media/lPjHC9zJScNjqIECmu/giphy.gif" alt="" width="382" height="678"></a></section>
                            </div>
                        </aside>
                        <div class="boxWg__contact">
                            <div role="form" class="wpcf7" id="wpcf7-f383-o1" lang="vi" dir="ltr">
                                <div class="screen-reader-response" role="alert" aria-live="polite"></div>
                                <form action="/project/top-nha-pho-tren-990-trieu-dep-nhat/#wpcf7-f383-o1" method="post" class="wpcf7-form init" novalidate="novalidate">
                                    <div style="display: none;"> <input type="hidden" name="_wpcf7" value="383"> <input type="hidden" name="_wpcf7_version" value="5.2"> <input type="hidden" name="_wpcf7_locale" value="vi"> <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f383-o1"> <input type="hidden" name="_wpcf7_container_post" value="0"> <input type="hidden" name="_wpcf7_posted_data_hash" value=""></div>
                                    <div class="single__contactForm">
                                        <h3>Đăng ký tư vấn</h3>
                                        <div class="form-group"> <span class="wpcf7-form-control-wrap your-name"><input type="text" name="your-name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control" aria-required="true" aria-invalid="false" placeholder="* Họ và tên"></span></div>
                                        <div class="form-group"> <span class="wpcf7-form-control-wrap your-phone"><input type="text" name="your-phone" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control" aria-required="true" aria-invalid="false" placeholder="* Số điện thoại"></span></div>
                                        <div class="form-group"> <span class="wpcf7-form-control-wrap your-email"><input type="email" name="your-email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-email form-control" aria-invalid="false" placeholder="* Email"></span></div>
                                        <input type="submit" value="Gửi đi" class="wpcf7-form-control wpcf7-submit btn form-control btn__success"><span class="ajax-loader"></span>
                                    </div>
                                    <div class="wpcf7-response-output" role="alert" aria-hidden="true"></div>
                                </form>
                            </div>
                        </div>
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
                                                <a href="{{route('project.detail',['cat_slug'=>$item->furniture_cat->slug, 'slug' => $item->slug, 'id' => $item->id])}}" class="">
                                                    <div class="item__thumb">
                                                        <div class="dnfix__thumb"> <img width="300" height="300" src="{{$item->image[0]}}" class="img-fluid wp-post-image" ></div>
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
