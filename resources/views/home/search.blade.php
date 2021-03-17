@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{asset('css/style2.css')}}">
@endsection
@section('content')
    <header class="page__header">
        @if(!empty($results) && count($results) > 0)
            <h1 class="page-title">Tìm kiếm với từ khóa: <span>{{ app('request')->input('q') }}</span></h1>
        @else
            <h1 class="page-title">Nothing Found</h1>
        @endif
    </header>
    <div class="archive__content">
        @if(!empty($results) && count($results) > 0)
            @foreach($results as $item)
                <article class="archive__item">
                    <div class="row">
                        <div class="col-4 col-lg-4">
                            @php
                                $table = rtrim($item->table, "s");
                                $cat_slug = '';
                                switch ($table){
                                    case 'project':
                                        $cat_slug = $item->project_cat->slug;
                                        break;
                                    case 'furniture':
                                        $cat_slug = $item->furniture_cat->slug;
                                        break;
                                    case 'construction':
                                        $cat_slug = $item->construction_cat->slug;
                                        break;
                                }
                            @endphp
                            <div class="item__thumb">
                                <a href="{{route(rtrim($item->table, "s").'.detail',['cat_slug'=>$cat_slug, 'slug' => $item->slug, 'id' => $item->id])}}" class="dnfix__thumb">
                                    <img width="268" height="300" src="{{is_array($item->image) ? $item->image[0] : $item->image}}" class="img-fluid wp-post-image" alt="TỔNG HỢP DỰ ÁN" >
                                </a>
                            </div>
                            <!-- .post-thumbnail -->
                        </div>
                        <div class="col-8 col-lg-8">
                            <h3 class="entry-title item__title">
                                <a href="https://azar.vn/project/tong-hop-du-an/" title="TỔNG HỢP DỰ ÁN" rel="bookmark">{{$item->title}}</a>
                            </h3>
{{--                            <div class="entry-summary d-none d-md-block text__truncate text__truncate--3">--}}
{{--                                {!! \Illuminate\Support\Str::limit($item->content, 50, $end='...') !!}--}}
{{--                            </div>--}}
                            <!-- .entry-summary -->
                        </div>
                    </div>
                </article>
            @endforeach
        @else
            <p class="mb-2 text-center">Rất tiếc, nhưng không có gì phù hợp với cụm từ tìm kiếm của bạn. Vui lòng thử lại với một số từ khóa khác nhau.</p>

            <form style="width: 80%;margin: 0 auto;" role="search" method="get" class="search-form search__form" action="">
                <div class="input-group">
                    <input type="search" id="search-form-605234eb1f5c9" class="search-field form-control" placeholder="Nhập từ khóa cần tìm …" value="{{ app('request')->input('q') }}" name="q">
                    <div class="input-group-append">
                        <button class="search-submit btn btn-outline-secondary" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </div>
                </div>
            </form>
    @endif


        {{ $results->links() }}
        <!-- .navigation -->
    </div>
@endsection
