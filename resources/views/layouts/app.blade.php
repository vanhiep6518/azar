<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&amp;display=swap" rel="stylesheet"/>
    <title>Thiết kế &amp; Xây dựng Nhà đẹp AZAR</title>
    <link href="https://fonts.gstatic.com" crossorigin="" rel="preconnect"/>
    <link data-minify="1" rel="stylesheet" id="contact-form-7-css" href="{{asset('css/styles-659c78715297af5a1e12b8358b540b51.css')}}" type="text/css" media="all"/>
    <link data-minify="1" rel="stylesheet" id="taxonomy-image-plugin-public-css" href="{{asset('css/style-843175da3b18f4497c2360158e20f1d7.css')}}" type="text/css" media="screen"/>
    <link data-minify="1" rel="stylesheet" id="wppopups-base-css" href="{{asset('css/wppopups-base-c304f0d0a07206208c9125a14c3055d0.css')}}" type="text/css" media="all"/>
    <link rel="stylesheet" id="bootstrap-css" href="{{asset('css/bootstrap.min.css')}}" type="text/css" media="all"/>
    <link rel="stylesheet" id="fontawesome-css" href="{{asset('font-awesome-4.7.0/css/font-awesome.min.css')}}" type="text/css" media="all"/>
    <link rel="stylesheet" id="flickity-css" href="{{asset('css/flickity.min.css')}}" type="text/css" media="all"/>
    <link rel="stylesheet" id="fancybox-style-css" href="{{asset('css/jquery.fancybox.min.css')}}" type="text/css" media="all"/>
    <link rel="stylesheet" id="animate-css" href="{{asset('css/animate.min.css')}}" type="text/css" media="all"/>
    <link data-minify="1" rel="stylesheet" id="mmenu-css" href="{{asset('css/mmenu-532c7b4b74947e618fbfbd8e44d8fc12.css')}}" type="text/css" media="all"/>
    <link data-minify="1" rel="stylesheet" id="dn-style-css" href="{{asset('css/style-41955f29b45f44b0f7e53369fa839b95.css')}}" type="text/css" media="all"/>
    <link rel="stylesheet" id="jquery.contactus.css-css" href="{{asset('css/jquery.contactus.min.css')}}" type="text/css" media="all"/>
    <link data-minify="1" rel="stylesheet" id="contactus.generated.desktop.css-css" href="{{asset('css/generated-desktop-ef915ff20effb64b1a0e42394ef61123.css')}}" type="text/css" media="all"/>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    @yield('css')
</head>
<body data-rsssl="1" class="home blog">
<div class="wrapper">
    <header class="header header__fix active">
        <div class="container-fluid">
            <div class="sc__wrap d-flex justify-content-between">
                <div class="header__brand d-flex align-items-center">
                    <h1 class="logo">
                        <a href="/" class="d-flex justify-content-between" title="Thiết kế &amp; Xây dựng Nhà đẹp AZAR">
                            <div class="logo1__wrap"><img src="{{asset('images/Logo.png')}}" alt="Thiết kế &amp; Xây dựng Nhà đẹp AZAR" class="img-fluid --st1"/></div>
{{--                            <div class="logo2__wrap btn__effect --st2"><img src="{{asset('images/lgotexxt.png')}}" alt="Thiết kế &amp; Xây dựng Nhà đẹp AZAR" class="img-fluid --st2"/></div>--}}
                        </a>
                    </h1>
                </div>
                <nav class="main__nav d-flex">
                    <ul id="menu-main-menu" class="dn__menu d-none d-lg-block">
                        <li id="menu-item-268" class="menu-item menu-item-type-post_type_archive menu-item-object-project menu-item-has-children menu-item-268">
                            <a href="{{route('project.list')}}">Dự án</a>
                            <ul class="sub-menu">
                                @if(isset($cats) && $cats['project'])
                                    @foreach($cats['project'] as $item)
                                        <li id="menu-item-284" class="menu-item menu-item-type-taxonomy menu-item-object-project_cat menu-item-284"><a href="{{route('project.cat',['slug' => $item->slug])}}">{{$item->name}}</a></li>
                                    @endforeach
                                @endif
                            </ul>
                        </li>
                        <li id="menu-item-267" class="menu-item menu-item-type-post_type_archive menu-item-object-noi-that menu-item-has-children menu-item-267">
                            <a href="{{route('furniture.list')}}">Nội thất</a>
                            <ul class="sub-menu">
                                @if(isset($cats) && $cats['furniture'])
                                    @foreach($cats['furniture'] as $item)
                                        <li id="menu-item-284" class="menu-item menu-item-type-taxonomy menu-item-object-project_cat menu-item-284"><a href="{{route('furniture.cat',['slug' => $item->slug])}}">{{$item->name}}</a></li>
                                    @endforeach
                                @endif
                            </ul>
                        </li>
                        <li id="menu-item-212" class="menu-item menu-item-type-post_type_archive menu-item-object-thi-cong menu-item-has-children menu-item-212">
                            <a href="{{route('construction.list')}}">Thi công</a>
                            <ul class="sub-menu">
                                @if(isset($cats) && $cats['construction'])
                                    @foreach($cats['construction'] as $item)
                                        <li id="menu-item-284" class="menu-item menu-item-type-taxonomy menu-item-object-project_cat menu-item-284"><a href="{{route('construction.cat',['slug' => $item->slug])}}">{{$item->name}}</a></li>
                                    @endforeach
                                @endif
                            </ul>
                        </li>
                        <li id="menu-item-230" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-230">
                            <a href="">Bảng giá</a>
                            <ul class="sub-menu">
                                @if(isset($cats) && $cats['price'])
                                    @foreach($cats['price'] as $item)
                                        <li id="menu-item-284" class="menu-item menu-item-type-taxonomy menu-item-object-project_cat menu-item-284"><a href="javascript:void(0)">{{$item->name}}</a>
                                            @if($item->prices && count($item->prices) > 0)
                                                <ul class="sub-menu">
                                                @foreach($item->prices as $item2)
                                                    <li id="menu-item-282" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-282"><a href="{{route('price.detail',['slug'=>$item2->slug,'id'=>$item2->id])}}">{{$item2->title}}</a></li>
                                                @endforeach
                                                </ul>
                                            @elseif($item->id == 2)
                                                <ul class="sub-menu">
                                                    <li id="menu-item-282" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-282"><a href="/bao-gia-thiet-ke">Báo giá thiết kế</a></li>
                                                    <li id="menu-item-281" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-281"><a href="/bao-gia-thi-cong">Báo giá thi công</a></li>
                                                </ul>
                                            @elseif($item->id == 3)
                                                <ul class="sub-menu">
                                                    <li id="menu-item-282" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-282"><a href="/hop-dong-thiet-ke">Hợp đồng thiết kế</a></li>
                                                    <li id="menu-item-281" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-281"><a href="/hop-dong-thi-cong-doi-tac">Hợp đồng ĐT</a></li>
                                                    <li id="menu-item-281" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-281"><a href="/hop-dong-thi-cong-khach-hang">Hợp đồng KH</a></li>
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </li>
{{--                        @php--}}
{{--                            dd($cats['price']);--}}
{{--                        @endphp--}}
{{--                        <li id="menu-item-260" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-260">--}}
{{--                            <a href="index.html#">Phong thủy</a>--}}
{{--                            <ul class="sub-menu">--}}
{{--                                <li id="menu-item-282" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-282"><a href="index.html%3Fp=270.html">Xem hướng nhà</a></li>--}}
{{--                                <li id="menu-item-281" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-281"><a href="index.html%3Fp=273.html">Xem hướng bếp</a></li>--}}
{{--                                <li id="menu-item-280" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-280"><a href="index.html%3Fp=275.html">Xem màu hợp mệnh</a></li>--}}
{{--                                <li id="menu-item-279" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-279"><a href="index.html%3Fp=277.html">Xem tuổi xây nhà</a></li>--}}
{{--                                <li id="menu-item-261" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-261"><a href="index.html%3Fp=251.html">Thước lỗ ban</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
                        <li id="menu-item-269" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-269"><a href="{{route('introduce')}}">Giới thiệu</a></li>
                        <li class="item__custom d-md-none"><a href="login.html" class="">Login</a></li>
                        <li class="item__custom d-md-none"><a href="https://www.facebook.com/Thietkenhatrongoigiare/" class="d-inline-block"><i class="fa fa-facebook" aria-hidden="true"></i></a><a href="https://www.youtube.com/channel/UC6gIm2yTkuAtJK1kMC0zH3w" class="d-inline-block"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                    </ul>
                    <ul class="el__right">
                        <li class=""><a href="login.html" class=""><i class="fa fa-user" aria-hidden="true"></i></a></li>
                        <li class=""><a href="danh-muc-noi-that/sieu-thi-noi-that.html" class=""><i class="fa fa-shopping-bag" aria-hidden="true"></i></a></li>
                        <li class=""><a href="https://www.facebook.com/Thietkenhatrongoigiare/" class=""><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li class=""><a href="https://www.youtube.com/channel/UC6gIm2yTkuAtJK1kMC0zH3w" class=""><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                        <li class=" hbtn__search">
                            <a href="index.html#" class=""><i class="fa fa-search" aria-hidden="true"></i></a>
                            <form role="search" method="get" class="search-form search__form" action="index.html">
                                <div class="input-group">
                                    <input type="search" id="search-form-5fefb62161333" class="search-field form-control" placeholder="Nhập từ khóa cần tìm …" value="" name="s"/>
                                    <div class="input-group-append"> <button class="search-submit btn btn-outline-secondary" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button></div>
                                </div>
                            </form>
                        </li>
                    </ul>
                    <ul class="el__right --mb">
                        <li class=""><a href="danh-muc-noi-that/sieu-thi-noi-that.html" class=""><i class="fa fa-shopping-bag" aria-hidden="true"></i></a></li>
                    </ul>
                    <a href="index.html#menu__mobile" class="menu__mobile ml-2"> <span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></span> <span class="ml-1 icon-bar__text d-none"> MENU</span> </a>
                </nav>
            </div>
        </div>
    </header>
    @yield('content')
    <footer id="footer" class="footer">
{{--        <section class="whyChooseUs">--}}
{{--            <div class="container">--}}
{{--                <header class="h-header s1 h-header--border text-center ">--}}
{{--                    <p class="h-title color--white text-uppercase wow fadeInUp btn__effect">Tại sao chọn chúng tôi</p>--}}
{{--                </header>--}}
{{--                <div class="sc-content">--}}
{{--                    <div class="row no-guttersz">--}}
{{--                        <div class="col-md-6 item__wrap ">--}}
{{--                            <div class="why__item wow fadeInUp">--}}
{{--                                <div class="row no-guttersz">--}}
{{--                                    <div class="col-2 item--left">--}}
{{--                                        <div class="item__thumb"> <a href="index.html" class="dnfix__thumb dnfix__thumb--contain"><img src="wp-content/uploads/2020/04/w1-b3a.png" alt="" class="img-fluid mx-auto"/></a></div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-10 item--right">--}}
{{--                                        <div class="item__meta">--}}
{{--                                            <p class="item__title">Giá cả cạnh tranh</p>--}}
{{--                                            <div class="item__excerpt">--}}
{{--                                                <p>Thiết kế và Thi công với giá tốt nhất Đà Nẵng với hàng trăm công trình đã và đang thi công. Công trình được chăm chút tỉ mỉ từ những bước Thiết kế đầu tiên đến bước Hoàn thiện cuối cùng cho ngôi nhà.</p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6 item__wrap ">--}}
{{--                            <div class="why__item wow fadeInUp">--}}
{{--                                <div class="row no-guttersz">--}}
{{--                                    <div class="col-2 item--left">--}}
{{--                                        <div class="item__thumb"> <a href="index.html" class="dnfix__thumb dnfix__thumb--contain"><img src="wp-content/uploads/2020/04/w2-fc9.png" alt="" class="img-fluid mx-auto"/></a></div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-10 item--right">--}}
{{--                                        <div class="item__meta">--}}
{{--                                            <p class="item__title">Đội ngũ chuyên nghiệp</p>--}}
{{--                                            <div class="item__excerpt">--}}
{{--                                                <p>Trong 5 năm hoạt động AZAR với hơn 20 Kiến trúc sư - Nội thất sư - Kỹ sư cùng Đội ngũ xây dựng tay nghề cao và làm việc đầy tâm huyết để tạo ra những sản phẩm và dịch vụ chất lượng nhất.</p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6 item__wrap ">--}}
{{--                            <div class="why__item wow fadeInUp">--}}
{{--                                <div class="row no-guttersz">--}}
{{--                                    <div class="col-2 item--left">--}}
{{--                                        <div class="item__thumb"> <a href="index.html" class="dnfix__thumb dnfix__thumb--contain"><img src="wp-content/uploads/2020/04/w3-3b4.png" alt="" class="img-fluid mx-auto"/></a></div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-10 item--right">--}}
{{--                                        <div class="item__meta">--}}
{{--                                            <p class="item__title">Chất lượng sản phẩm</p>--}}
{{--                                            <div class="item__excerpt">--}}
{{--                                                <p>AZAR tập trung vào các Vật liệu mới Kết hợp với trình độ thi công cao sẽ đem đến cho khách hàng chất lượng công trình tốt nhất với mức giá cạnh tranh nhất trong từng phân khúc mà khách hàng hướng tới</p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6 item__wrap ">--}}
{{--                            <div class="why__item wow fadeInUp">--}}
{{--                                <div class="row no-guttersz">--}}
{{--                                    <div class="col-2 item--left">--}}
{{--                                        <div class="item__thumb"> <a href="index.html" class="dnfix__thumb dnfix__thumb--contain"><img src="wp-content/uploads/2020/04/w4-7b8-80-80-f38.png" alt="" class="img-fluid mx-auto"/></a></div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-10 item--right">--}}
{{--                                        <div class="item__meta">--}}
{{--                                            <p class="item__title">Uy tín hàng đầu</p>--}}
{{--                                            <div class="item__excerpt">--}}
{{--                                                <p>AZAR là thương hiệu được khẳng định bằng chất lượng sản phẩm với hàng trăm khách hàng và cùng chất lượng dịch vụ tốt trong nhiều năm qua</p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6 item__wrap ">--}}
{{--                            <div class="why__item wow fadeInUp">--}}
{{--                                <div class="row no-guttersz">--}}
{{--                                    <div class="col-2 item--left">--}}
{{--                                        <div class="item__thumb"> <a href="index.html" class="dnfix__thumb dnfix__thumb--contain"><img src="wp-content/uploads/2020/04/w5-c4a-80-80-7d9.png" alt="" class="img-fluid mx-auto"/></a></div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-10 item--right">--}}
{{--                                        <div class="item__meta">--}}
{{--                                            <p class="item__title">Ý tưởng sáng tạo</p>--}}
{{--                                            <div class="item__excerpt">--}}
{{--                                                <p>Luôn cập nhật Xu hướng thiết kế - Định hướng thẩm mỹ cho khách hàng và tạo ra những mẫu thiết kế độc đáo, mới mẻ phù hợp với Công năng - Phong thủy - Chi phí của chủ đầu tư đưa ra.</p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6 item__wrap ">--}}
{{--                            <div class="why__item wow fadeInUp">--}}
{{--                                <div class="row no-guttersz">--}}
{{--                                    <div class="col-2 item--left">--}}
{{--                                        <div class="item__thumb"> <a href="index.html" class="dnfix__thumb dnfix__thumb--contain"><img src="wp-content/uploads/2020/04/w6-14f.png" alt="" class="img-fluid mx-auto"/></a></div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-10 item--right">--}}
{{--                                        <div class="item__meta">--}}
{{--                                            <p class="item__title">Đảm bảo sự hài lòng của khách hàng</p>--}}
{{--                                            <div class="item__excerpt">--}}
{{--                                                <p>AZAR với đội ngũ chăm sóc khách hàng cam kết sẽ đem đến cho khách hàng với Dịch vụ và Chất lượng đi kèm tốt nhất thị trường.</p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}
        <div class="container">
            <hr class="bg-light"/>
        </div>
        <div class="container-fluid">
            <div class="sc__wrap">
                <div class="row">
                    <div class="col-lg-3 col-md-6 text-center text-uppercase footer--1">
                        <div class="ft__header3">
                            <p class="ft__title btn__effect btn--active button_hover">Liên hệ với chúng tôi</p>
                        </div>
                        <address class="footer__address mb-4">
                            <p class="company__name">CÔNG TY TƯ VẤN THIẾT KẾ VÀ <br>XÂY DỰNG 81Art</p>
                            <p class="mb-3">CHI NHÁNH 1: 78 NGUYÊN MINH CHẤN, HÒA KHÁNH NAM, LIÊN CHIỂU ĐÀ NẴNG.</p>
                            <p class="mb-3">CHI NHÁNH 2: 71/17 TRẦN ĐẠI NGHĨA, TỔ 6, YÊN THẾ, TP.PLEIKU, GIA LAI</p>
                            <p class="mb-3">Hotline: <a href="tel: 0374 059 517"> 0374 059 517</a></p>
                            <p>Email: 81ARTSTUDIO@GMAIL.COM</p>
{{--                            <p>MST: 0401992979</p>--}}
                        </address>
                        <div class="social__box --s1 flex-grow-1 mb-2"> <a href="https://www.facebook.com/Thietkenhatrongoigiare"><i class="fa fa-facebook-square" aria-hidden="true"></i></a> <a href="https://www.youtube.com/channel/UC6gIm2yTkuAtJK1kMC0zH3w"><i class="fa fa-youtube-play" aria-hidden="true"></i></a> <a href="https://www.tiktok.com/@azar.vn" class="ic--tiktok"><img src="{{asset('images/tiktok.png')}}" alt=""/></a> <a href="index.html"><i class="fa fa-instagram" aria-hidden="true"></i></a> <a href="index.html"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="custom__mw">
                            <div class="footer__box">
                                <div class="fb-page" data-href="https://www.facebook.com/Thietkenhatrongoigiare/" data-tabs="" data-width="500" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"></div>
                            </div>
                            <div id="" class="footer__box">
                                <div class="gmap__footer">
                                    <iframe width="600" height="450" style="border:0" loading="lazy" allowfullscreen src="https://www.google.com/maps/embed/v1/search?q=78%20Nguy%E1%BB%85n%20Minh%20Ch%E1%BA%A5n%2C%20H%C3%B2a%20Kh%C3%A1nh%20Nam%2C%20Li%C3%AAn%20Chi%E1%BB%83u%2C%20%C4%90%C3%A0%20N%E1%BA%B5ng%2C%20Vietnam&key=AIzaSyBMMiAwb58mAVGONPBiGud5OT1Kjh-64w4"></iframe>
                                </div>
                                <div id="dktv_formsc"></div>
                            </div>
                        </div>
                    </div>
                    <div id="" class="col-lg-6 col-md-12">
                        <div class="ft__header3 text-center">
                            <p class="ft__title btn__effect btn--active button_hover">Đăng ký tư vấn</p>
                        </div>
                        <div id="dktv_form" class="mb-3">
                            <div role="form" class="wpcf7" id="wpcf7-f256-o1" lang="vi" dir="ltr">
                                <div class="screen-reader-response" role="alert" aria-live="polite"></div>
                                <form action="index.html#wpcf7-f256-o1" method="post" class="wpcf7-form init" novalidate="novalidate">
                                    <div style="display: none;"> <input type="hidden" name="_wpcf7" value="256"/> <input type="hidden" name="_wpcf7_version" value="5.2"/> <input type="hidden" name="_wpcf7_locale" value="vi"/> <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f256-o1"/> <input type="hidden" name="_wpcf7_container_post" value="0"/> <input type="hidden" name="_wpcf7_posted_data_hash" value=""/></div>
                                    <div class="row contact-form">
                                        <div class="col-md-6">
                                            <div class="form-group"> <span class="wpcf7-form-control-wrap your-name"><input type="text" name="your-name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control" aria-required="true" aria-invalid="false" placeholder="* Họ và tên"/></span></div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group"> <span class="wpcf7-form-control-wrap your-phone"><input type="text" name="your-phone" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control" aria-required="true" aria-invalid="false" placeholder="* Số điện thoại"/></span></div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group"> <span class="wpcf7-form-control-wrap your-email"><input type="email" name="your-email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-email form-control" aria-invalid="false" placeholder="Email"/></span></div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group"> <span class="wpcf7-form-control-wrap your-subject"><input type="text" name="your-subject" value="" size="40" class="wpcf7-form-control wpcf7-text form-control" aria-invalid="false" placeholder="Mã giới thiệu"/></span></div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group"> <span class="wpcf7-form-control-wrap your-message"><textarea name="your-message" cols="40" rows="3" class="wpcf7-form-control wpcf7-textarea form-control" aria-invalid="false" placeholder="Dịch vụ yêu cầu"></textarea></span></div>
                                        </div>
                                        <div class="col-md-6"> <span class="btn_dlh flex-grow-1">Để lại thông tin của quý khách <br/> &amp; Kiến trúc sư sẽ liên hệ tư vấn miễn phí</span></div>
                                        <div class="col-md-6"> <input type="submit" value="Gửi đi" class="wpcf7-form-control wpcf7-submit btn form-control btn__success"/></div>
                                    </div>
                                    <div class="wpcf7-response-output" role="alert" aria-hidden="true"></div>
                                </form>
                            </div>
                        </div>
                        <div class="footer_hotline_sc mb-3">
                            <div class="d-flex flex-wrap align-items-center">
                                <div class="item__honline">
                                    <div class="item__sonline2">
                                        <img src="wp-content/themes/blogdefault/assets/img/phone-call.svg" class="" alt=""/>
                                        <div class="ml-1 d-inline-block"> 0374 059 517</div>
                                    </div>
                                </div>
{{--                                <div class="item__honline">--}}
{{--                                    <div class="item__sonline2">--}}
{{--                                        <img src="wp-content/themes/blogdefault/assets/img/phone-call.svg" class="" alt=""/>--}}
{{--                                        <div class="ml-1 d-inline-block"> 0905 770 456</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <section id="copyright" class="copyright text-center">
        <div class="container">© 2020 Domain. All rights reserved. Thiết kế bởi <a href="index.html#">www.azar.vn</a></div>
    </section>
    <div class="support-online">
        <div class="support-content">
            <a class="mes d-none d-md-block " href="https://www.facebook.com/messages/t/101371428384619">
                <img src="{{asset('images/messenger-2.png')}}" class="" alt=""/> <span>Nhắn tin với chúng tôi qua facebook</span>
                <p class="support__mb--text d-md-none">Messenger</p>
            </a>
            <a class="zalo d-none d-md-block " href="https://zalo.me/0374059517">
                <img src="{{asset('images/zalo-2.png')}}" class="" alt=""/> <span>Nhắn tin với chúng tôi qua Zalo</span>
                <p class="support__mb--text d-md-none">Gọi ngay</p>
            </a>
            <a href="tel:0374059517" class="call-nowz" rel="nofollow">
                <img src="{{asset('images/icon-phone.gif')}}" class="" alt=""/> <span>Gọi ngay cho chúng tôi</span>
                <p class="support__mb--text">Gọi ngay <span class="d-none d-md-inline-block"> 0374 059 517</span></p>
            </a>
            <a href="index.html#dktv_formsc" class="call-form" rel="nofollow">
                <i class="fa fa-user-o d-block d-md-none" aria-hidden="true"></i> <span>Để lại lời nhắn cho chúng tôi</span>
                <p class="support__mb--text">Tư vấn miễn phí</p>
            </a>
            <a href="index.html#" data-toggle="modal" data-target="#modal__yctv" class="call-address" rel="nofollow">
                <span>Yêu cầu tư vấn</span>
                <p class="support__mb--text mr-1">Yêu cầu tư vấn</p>
                <img src="{{asset('images/icon-phone.gif')}}" class="flip-image" alt=""/>
            </a>
        </div>
    </div>
    <div class="modal fade" id="modal__yctv" tabindex="-1" role="dialog" aria-labelledby="modal__yctvTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal__googlemapTitle">Để lại số điện thoại, chúng tôi sẽ liên hệ với bạn sớm nhất</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
                <div class="modal-body">
                    <div role="form" class="wpcf7" id="wpcf7-f887-o2" lang="vi" dir="ltr">
                        <div class="screen-reader-response" role="alert" aria-live="polite"></div>
                        <form action="index.html#wpcf7-f887-o2" method="post" class="wpcf7-form init" novalidate="novalidate">
                            <div style="display: none;"> <input type="hidden" name="_wpcf7" value="887"/> <input type="hidden" name="_wpcf7_version" value="5.2"/> <input type="hidden" name="_wpcf7_locale" value="vi"/> <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f887-o2"/> <input type="hidden" name="_wpcf7_container_post" value="0"/> <input type="hidden" name="_wpcf7_posted_data_hash" value=""/></div>
                            <div class="form-group"><span class="wpcf7-form-control-wrap tel-314"><input type="tel" name="tel-314" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-required wpcf7-validates-as-tel form-control" aria-required="true" aria-invalid="false" placeholder="Số điện thoại"/></span></div>
                            <div class="form-group"><span class="wpcf7-form-control-wrap your-message"><input type="text" name="your-message" value="" size="40" class="wpcf7-form-control wpcf7-text form-control" aria-invalid="false" placeholder="Để lại lời nhắn"/></span></div>
                            <div class="form-group text-center"><input type="submit" value="Gửi đi" class="wpcf7-form-control wpcf7-submit"/></div>
                            <div class="wpcf7-response-output" role="alert" aria-hidden="true"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav id="menu__mobile" class="nav__mobile">
        <div>
            <ul id="menu-main-menu-1" class="">
                <li class="menu-item menu-item-type-post_type_archive menu-item-object-project menu-item-has-children menu-item-268">
                    <a href="project/index.html">Dự án</a>
                    <ul class="sub-menu">
                        <li class="menu-item menu-item-type-taxonomy menu-item-object-project_cat menu-item-284"><a href="danh-muc-du-an/biet-thu/index.html">Biệt thự – Nhà phố</a></li>
                        <li class="menu-item menu-item-type-taxonomy menu-item-object-project_cat menu-item-288"><a href="danh-muc-du-an/hotel-homestay/index.html">Hotel – Homestay</a></li>
                        <li class="menu-item menu-item-type-taxonomy menu-item-object-project_cat menu-item-286"><a href="danh-muc-du-an/ca-phe-nha-hang-bar/index.html">Nhà hàng – Coffee</a></li>
                        <li class="menu-item menu-item-type-taxonomy menu-item-object-project_cat menu-item-1323"><a href="danh-muc-du-an/office-apartment/index.html">Office – Apartment</a></li>
                        <li class="menu-item menu-item-type-taxonomy menu-item-object-project_cat menu-item-1324"><a href="danh-muc-du-an/cong-trinh-khac/index.html">Công trình khác</a></li>
                        <li class="menu-item menu-item-type-taxonomy menu-item-object-project_cat menu-item-1322"><a href="danh-muc-du-an/phong-cach-kien-truc/index.html">Phong cách Kiến trúc</a></li>
                    </ul>
                </li>
                <li class="menu-item menu-item-type-post_type_archive menu-item-object-noi-that menu-item-has-children menu-item-267">
                    <a href="noi-that/index.html">Nội thất</a>
                    <ul class="sub-menu">
                        <li class="menu-item menu-item-type-post_type_archive menu-item-object-noi-that menu-item-484"><a href="noi-that/index.html">Nội thất</a></li>
                        <li class="menu-item menu-item-type-taxonomy menu-item-object-noi-that_cat menu-item-505"><a href="danh-muc-noi-that/noi-that-360/index.html">Nội thất 360</a></li>
                        <li class="menu-item menu-item-type-taxonomy menu-item-object-noi-that_cat menu-item-485"><a href="danh-muc-noi-that/sieu-thi-noi-that/index.html">Siêu thị nội thất</a></li>
                        <li class="menu-item menu-item-type-taxonomy menu-item-object-noi-that_cat menu-item-1325"><a href="danh-muc-noi-that/phong-cach-noi-that/index.html">Phong cách Nội thất</a></li>
                    </ul>
                </li>
                <li class="menu-item menu-item-type-post_type_archive menu-item-object-thi-cong menu-item-has-children menu-item-212">
                    <a href="thi-cong/index.html">Thi công</a>
                    <ul class="sub-menu">
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-616"><a href="index.html%3Fp=599.html">Quy trình thi công</a></li>
                        <li class="menu-item menu-item-type-taxonomy menu-item-object-thi-cong_cat menu-item-614"><a href="danh-muc-thi-cong/thi-cong/index.html">Thi công</a></li>
                        <li class="menu-item menu-item-type-taxonomy menu-item-object-thi-cong_cat menu-item-1321"><a href="danh-muc-thi-cong/cai-tao-azar/index.html">Cải tạo Nội thất – Ngoại thất</a></li>
                        <li class="menu-item menu-item-type-taxonomy menu-item-object-thi-cong_cat menu-item-615"><a href="danh-muc-thi-cong/tin-tuc/index.html">Tin tức</a></li>
                    </ul>
                </li>
                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-230">
                    <a href="index.html%3Fp=224.html">Bảng giá</a>
                    <ul class="sub-menu">
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-625">
                            <a href="index.html#">Đơn giá</a>
                            <ul class="sub-menu">
                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-617"><a href="index.html%3Fp=224.html">Bảng giá Thiết kế nhà Đà Nẵng 2020</a></li>
                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-629"><a href="index.html%3Fp=226.html">Bảng giá thi công</a></li>
                            </ul>
                        </li>
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-626">
                            <a href="index.html#">Báo giá</a>
                            <ul class="sub-menu">
                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-620"><a href="bao-gia-thi-cong/bao-gia-thiet-ke.html">Báo giá thiết kế</a></li>
                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-618"><a href="bao-gia-thi-cong/bao-gia-thi-cong.html">Báo giá thi công</a></li>
                            </ul>
                        </li>
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-627">
                            <a href="index.html#">Hợp đồng</a>
                            <ul class="sub-menu">
                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-623"><a href="hop-dong-thiet-ke/index.html">Hợp đồng thiết kế</a></li>
                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-621"><a href="hop-dong-thi-cong-doi-tac/index.html">Hợp đồng ĐT</a></li>
                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-622"><a href="hop-dong-thi-cong-khach-hang/index.html">Hợp đồng KH</a></li>
                            </ul>
                        </li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-624"><a href="index.html%3Fp=461.html">Diễn giải vật liệu</a></li>
                    </ul>
                </li>
                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-260">
                    <a href="index.html#">Phong thủy</a>
                    <ul class="sub-menu">
                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-282"><a href="index.html%3Fp=270.html">Xem hướng nhà</a></li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-281"><a href="index.html%3Fp=273.html">Xem hướng bếp</a></li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-280"><a href="index.html%3Fp=275.html">Xem màu hợp mệnh</a></li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-279"><a href="index.html%3Fp=277.html">Xem tuổi xây nhà</a></li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-261"><a href="index.html%3Fp=251.html">Thước lỗ ban</a></li>
                    </ul>
                </li>
                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-269"><a href="index.html%3Fp=2.html">Giới thiệu</a></li>
                <li class="item__custom d-md-none"><a href="login.html" class="">Login</a></li>
                <li class="item__custom d-md-none"><a href="https://www.facebook.com/Thietkenhatrongoigiare/" class="d-inline-block"><i class="fa fa-facebook" aria-hidden="true"></i></a><a href="https://www.youtube.com/channel/UC6gIm2yTkuAtJK1kMC0zH3w" class="d-inline-block"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
            </ul>
        </div>
    </nav>
</div>
<div id="arcontactus"></div>
<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('js/jquery.bind-first-0.2.3.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/js.cookie-2.1.3.min.js')}}"></script>
<script src="{{asset('js/flickity.pkgd.min.js')}}"></script>

@yield('custom-js')
{{--<script>--}}
{{--    $(document).scroll(function() {--}}
{{--        if($(document).scrollTop() > 0){--}}
{{--            $('.header__fix').addClass('active');--}}
{{--        }else{--}}
{{--            $('.header__fix').removeClass('active');--}}
{{--        }--}}
{{--    })--}}
{{--</script>--}}
</body>
</html>

