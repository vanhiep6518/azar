@extends('layouts.app')
@section('content')
    <div class="wrap__page archive__project">
        <div class="wrap__ytplayer"><iframe id="ytplayer" frameborder="0" allowfullscreen="1" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" title="YouTube video player" width="1350" height="512" src="https://www.youtube.com/embed/5JAIC35ZIoo?autoplay=1&amp;loop=1&amp;controls=0&amp;rel=0&amp;fs=0&amp;enablejsapi=1&amp;origin=https%3A%2F%2Fazar.vn&amp;widgetid=1"></iframe></div>
        <script>// Load the IFrame Player API code asynchronously.
            var tag = document.createElement('script');
            tag.src = "https://www.youtube.com/player_api";
            var firstScriptTag = document.getElementsByTagName('script')[0];
            firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

            // Replace the 'ytplayer' element with an <iframe> and
            // YouTube player after the API code downloads.
            var player;
            function onYouTubePlayerAPIReady() {
                player = new YT.Player('ytplayer', {
                    height: '512',
                    width: '1350',
                    playerVars: {
                        'autoplay': 1,
                        'loop':1,
                        'controls': 0,
                        'rel' : 0,
                        'fs' : 0,
                    },
                    videoId: '5JAIC35ZIoo',
                    events: {
                        'onStateChange': function(e) {
                            if (e.data === YT.PlayerState.ENDED) {
                                player.playVideo();
                            }
                        }
                    }
                });
            }
        </script>
        <div class="container-fluidz">
            <div class="page__content sc__wrap">
                <header class="page__header">
                    <h1 class="page-title text-white btn__effect btn--active button_hover"><span class="page-description">Dự án</span></h1>
                </header>
                <div class="archive__content">
                    <ul class="nav nav-tabs myTabS1 --long" id="myTab" role="tablist">
                        @if(isset($cats) && $cats['project'])
                            @foreach($cats['project'] as $item)
                                <li class="nav-item"> <a class="nav-link {{(isset($cat) && $cat->id == $item->id) ? 'active' : ''}}" href="{{route('project.cat',['slug'=>$item->slug])}}">{{$item->name}}</a></li>
                            @endforeach
                        @endif
                    </ul>
                    <div class="row no-gutters">
                        @if(isset($projects))
                            @foreach($projects as $item)
                                <div class="col-md-6 col-lg-3">
                                    <archive class="project__item ef__zoomin">
                                        <a href="{{route('project.detail',['cat_slug'=>$item->project_cat->slug, 'slug' => $item->slug, 'id' => $item->id])}}" class="">
                                            <div class="item__thumb">
                                                <div class="dnfix__thumb"> <img width="300" height="300" src="{{$item->image}}" class="img-fluid wp-post-image" alt="{{$item->title}}"></div>
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
                    {{ $projects->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
