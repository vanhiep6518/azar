@extends('layouts.app')
@section('title','Giới thiệu - Thiết kế & Xây dựng Nhà đẹp 81ART')
@section('content')
    <div class="wrap__page page__gioithieu">
        <div class="container">
            <main class="site-main" role="main">
                <div class="text-center page__gtcontent">
                    <article class="page__content">
                        <header class="entry-header page__header">
                            <h1 class="page-title">Giới thiệu</h1>
                        </header>
                        <div class="entry-content --custom">
                            <div>
                                {!! $page->content !!}
                            </div>
                        </div>
                    </article>
                </div>
{{--                <header class="page__header --gt py-5">--}}
{{--                    <h3 class="page-title text-white btn__effect btn--active button_hover">THÀNH VIÊN</h3>--}}
{{--                </header>--}}
{{--                <div class="row justify-content-center">--}}
{{--                    <div class="col-md-4">--}}
{{--                        <div class="item__team wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">--}}
{{--                            <div class="item__thumb">--}}
{{--                                <div class="dnfix__thumb"> <img width="612" height="612" src="https://F81ART.vn/wp-content/uploads/2020/09/v3.png" class="img-fluid" alt="" srcset="https://81ART.vn/wp-content/uploads/2020/09/v3.png 612w, https://81ART.vn/wp-content/uploads/2020/09/v3-100x100.png 100w, https://81ART.vn/wp-content/uploads/2020/09/v3-150x150.png 150w" sizes="100vw"></div>--}}
{{--                            </div>--}}
{{--                            <div class="item__meta">--}}
{{--                                <div class="item__title">Quang Trung</div>--}}
{{--                                <div class="item__position">General Director</div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    <div class="col-6 col-md-4">--}}
{{--                        <div class="item__team wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">--}}
{{--                            <div class="item__thumb">--}}
{{--                                <div class="dnfix__thumb"> <img width="612" height="612" src="https://81ART.vn/wp-content/uploads/2020/09/av2.jpg" class="img-fluid" alt="" srcset="https://81ART.vn/wp-content/uploads/2020/09/av2.jpg 612w, https://81ART.vn/wp-content/uploads/2020/09/av2-100x100.jpg 100w, https://81ART.vn/wp-content/uploads/2020/09/av2-150x150.jpg 150w" sizes="100vw"></div>--}}
{{--                            </div>--}}
{{--                            <div class="item__meta">--}}
{{--                                <div class="item__title">Lâm Huy</div>--}}
{{--                                <div class="item__position">Construction Manager</div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-6 col-md-4">--}}
{{--                        <div class="item__team wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">--}}
{{--                            <div class="item__thumb">--}}
{{--                                <div class="dnfix__thumb"> <img width="612" height="612" src="https://81ART.vn/wp-content/uploads/2020/09/AV1.jpg" class="img-fluid" alt="" srcset="https://81ART.vn/wp-content/uploads/2020/09/AV1.jpg 612w, https://81ART.vn/wp-content/uploads/2020/09/AV1-100x100.jpg 100w, https://81ART.vn/wp-content/uploads/2020/09/AV1-150x150.jpg 150w" sizes="100vw"></div>--}}
{{--                            </div>--}}
{{--                            <div class="item__meta">--}}
{{--                                <div class="item__title">Nguyễn Hùng</div>--}}
{{--                                <div class="item__position">Architect Manager</div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-6 col-md-4">--}}
{{--                        <div class="item__team wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">--}}
{{--                            <div class="item__thumb">--}}
{{--                                <div class="dnfix__thumb"> <img width="855" height="857" src="https://81ART.vn/wp-content/uploads/2020/12/z2243783526935_9401ac6ef8ecf3372e653c3d4d42b961.jpg" class="img-fluid" alt="" srcset="https://81ART.vn/wp-content/uploads/2020/12/z2243783526935_9401ac6ef8ecf3372e653c3d4d42b961.jpg 958w, https://81ART.vn/wp-content/uploads/2020/12/z2243783526935_9401ac6ef8ecf3372e653c3d4d42b961-768x770.jpg 768w, https://81ART.vn/wp-content/uploads/2020/12/z2243783526935_9401ac6ef8ecf3372e653c3d4d42b961-100x100.jpg 100w, https://81ART.vn/wp-content/uploads/2020/12/z2243783526935_9401ac6ef8ecf3372e653c3d4d42b961-150x150.jpg 150w" sizes="100vw"></div>--}}
{{--                            </div>--}}
{{--                            <div class="item__meta">--}}
{{--                                <div class="item__title">Hoàng Thiện</div>--}}
{{--                                <div class="item__position">Architect</div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-6 col-md-4">--}}
{{--                        <div class="item__team wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">--}}
{{--                            <div class="item__thumb">--}}
{{--                                <div class="dnfix__thumb"> <img width="831" height="951" src="https://81ART.vn/wp-content/uploads/2020/08/59106122_1211707395665475_1417586722350301184_o-e1597233335117.jpg" class="img-fluid" alt="" sizes="100vw"></div>--}}
{{--                            </div>--}}
{{--                            <div class="item__meta">--}}
{{--                                <div class="item__title">Ngọc Đạt</div>--}}
{{--                                <div class="item__position">Architect</div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-6 col-md-4">--}}
{{--                        <div class="item__team wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">--}}
{{--                            <div class="item__thumb">--}}
{{--                                <div class="dnfix__thumb"> <img width="623" height="664" src="https://81ART.vn/wp-content/uploads/2020/08/Capture12312132.jpg" class="img-fluid" alt="" srcset="https://81ART.vn/wp-content/uploads/2020/08/Capture12312132.jpg 623w, https://81ART.vn/wp-content/uploads/2020/08/Capture12312132-94x100.jpg 94w" sizes="100vw"></div>--}}
{{--                            </div>--}}
{{--                            <div class="item__meta">--}}
{{--                                <div class="item__title">Trường Nguyên</div>--}}
{{--                                <div class="item__position">Interior Design</div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-6 col-md-4">--}}
{{--                        <div class="item__team wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">--}}
{{--                            <div class="item__thumb">--}}
{{--                                <div class="dnfix__thumb"> <img width="302" height="320" src="https://81ART.vn/wp-content/uploads/2020/08/59106122_1211707395665475_1417586722350301184_o-1.jpg" class="img-fluid" alt="" srcset="https://81ART.vn/wp-content/uploads/2020/08/59106122_1211707395665475_1417586722350301184_o-1.jpg 302w, https://81ART.vn/wp-content/uploads/2020/08/59106122_1211707395665475_1417586722350301184_o-1-94x100.jpg 94w" sizes="100vw"></div>--}}
{{--                            </div>--}}
{{--                            <div class="item__meta">--}}
{{--                                <div class="item__title">Trần Minh</div>--}}
{{--                                <div class="item__position">Interior Design</div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-6 col-md-4">--}}
{{--                        <div class="item__team wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">--}}
{{--                            <div class="item__thumb">--}}
{{--                                <div class="dnfix__thumb"> <img width="855" height="989" src="https://81ART.vn/wp-content/uploads/2020/08/Capture12312312D-1.jpg" class="img-fluid" alt="" srcset="https://81ART.vn/wp-content/uploads/2020/08/Capture12312312D-1.jpg 923w, https://81ART.vn/wp-content/uploads/2020/08/Capture12312312D-1-768x889.jpg 768w, https://81ART.vn/wp-content/uploads/2020/08/Capture12312312D-1-86x100.jpg 86w" sizes="100vw"></div>--}}
{{--                            </div>--}}
{{--                            <div class="item__meta">--}}
{{--                                <div class="item__title">Lê Linh</div>--}}
{{--                                <div class="item__position">Saler</div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-6 col-md-4">--}}
{{--                        <div class="item__team wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">--}}
{{--                            <div class="item__thumb">--}}
{{--                                <div class="dnfix__thumb"> <img width="768" height="1024" src="https://81ART.vn/wp-content/uploads/2020/08/551b52aabed643881ac7.jpg" class="img-fluid" alt="" srcset="https://81ART.vn/wp-content/uploads/2020/08/551b52aabed643881ac7.jpg 960w, https://81ART.vn/wp-content/uploads/2020/08/551b52aabed643881ac7-768x1024.jpg 768w, https://81ART.vn/wp-content/uploads/2020/08/551b52aabed643881ac7-75x100.jpg 75w" sizes="100vw"></div>--}}
{{--                            </div>--}}
{{--                            <div class="item__meta">--}}
{{--                                <div class="item__title">Kiều My</div>--}}
{{--                                <div class="item__position">Marketting</div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-6 col-md-4">--}}
{{--                        <div class="item__team wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">--}}
{{--                            <div class="item__thumb">--}}
{{--                                <div class="dnfix__thumb"> <img width="855" height="926" src="https://81ART.vn/wp-content/uploads/2020/08/Capture222s-e1597233454982.jpg" class="img-fluid" alt="" sizes="100vw"></div>--}}
{{--                            </div>--}}
{{--                            <div class="item__meta">--}}
{{--                                <div class="item__title">Nhật Nhạn</div>--}}
{{--                                <div class="item__position">Marketting</div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-6 col-md-4">--}}
{{--                        <div class="item__team wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">--}}
{{--                            <div class="item__thumb">--}}
{{--                                <div class="dnfix__thumb"> <img width="640" height="960" src="https://81ART.vn/wp-content/uploads/2020/08/90778286_1445250655655522_6995209648697507840_o.jpg" class="img-fluid" alt="" srcset="https://81ART.vn/wp-content/uploads/2020/08/90778286_1445250655655522_6995209648697507840_o.jpg 640w, https://81ART.vn/wp-content/uploads/2020/08/90778286_1445250655655522_6995209648697507840_o-67x100.jpg 67w" sizes="100vw"></div>--}}
{{--                            </div>--}}
{{--                            <div class="item__meta">--}}
{{--                                <div class="item__title">Dung Nguyễn</div>--}}
{{--                                <div class="item__position">Accountant</div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <header class="page__header --gt pt-5 pb-3">--}}
{{--                    <h3 class="page-title text-white btn__effect btn--active button_hover">ĐỐI TÁC</h3>--}}
{{--                </header>--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-4">--}}
{{--                        <div class="item__doitac wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">--}}
{{--                            <div class="item__thumb">--}}
{{--                                <div class="dnfix__thumb dnfix__thumb--contain"> <img width="855" height="215" src="https://81ART.vn/wp-content/uploads/2020/08/vietceramics_logo_rgb-01_ecce3e2d798d441ca6836a035f7bd9ff-e1597315679745.png" class="img-fluid" alt="" sizes="100vw"></div>--}}
{{--                            </div>--}}
{{--                            <div class="item__meta">--}}
{{--                                <div class="item__title">VIETCERAMICS</div>--}}
{{--                                <div class="item__position">Đem vào không gian với những xu hướng gạch ốp lát mới nhất trên thế giới. Tại Vietceramics, các bộ sưu tập gạch ốp lát được lựa chọn từ những thương hiệu sản xuất nổi tiếng nhất trên thế giới. Phù hợp với nhiều không gian, các bộ sưu tập gạch ốp tường và gạch lát nền được ứng dụng rộng rãi từ những khu vực di chuyển nhiều đến tường trang trí.</div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-4">--}}
{{--                        <div class="item__doitac wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">--}}
{{--                            <div class="item__thumb">--}}
{{--                                <div class="dnfix__thumb dnfix__thumb--contain"> <img width="498" height="180" src="https://81ART.vn/wp-content/uploads/2020/08/an-cuong1-e1597315187716.png" class="img-fluid" alt="" sizes="100vw"></div>--}}
{{--                            </div>--}}
{{--                            <div class="item__meta">--}}
{{--                                <div class="item__title">AN CƯỜNG</div>--}}
{{--                                <div class="item__position">Gỗ An Cường là thương hiệu nổi tiếng chuyên sản xuất gỗ công nghiệp như gỗ công nghiệp laminate, gỗ mdf, gỗ mfc, gỗ hdf, gỗ chống ẩm, gỗ acrylic, gỗ veneer, gỗ melamine, gỗ lõi xanh chống ẩm,… Chính vì vậy, trong các mẫu thiết kế nội thất của 81ART không thể thiếu gỗ An Cường, chất liệu cao cấp, sang trọng đã tạo nên rất nhiều không gian đẹp, độc đáo gây ấn tượng mạnh trong khách hàng như chung cư, biệt thự, nhà phố, nhà ống, văn phòng, showroom, cửa hàng,…</div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-4">--}}
{{--                        <div class="item__doitac wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">--}}
{{--                            <div class="item__thumb">--}}
{{--                                <div class="dnfix__thumb dnfix__thumb--contain"> <img width="855" height="327" src="https://81ART.vn/wp-content/uploads/2020/08/unnamed222-1-e1597315737631.png" class="img-fluid" alt="" sizes="100vw"></div>--}}
{{--                            </div>--}}
{{--                            <div class="item__meta">--}}
{{--                                <div class="item__title">XINGFA</div>--}}
{{--                                <div class="item__position">Xingfa là một trong những thương hiệu hàng đầu thế giới về cung cấp nhôm thanh định hình ngành nhôm kính. Nhôm Xingfa có xuất xứ từ Quảng Đông. Xingfa đáp ứng đúng nhu cầu tiêu dùng của khách hàng về mặt thẩm mỹ, chất lượng và giá cả tương xứng phù hợp.</div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <header class="page__header --gt py-5">--}}
{{--                    <h3 class="page-title text-white btn__effect btn--active button_hover">HÌNH ẢNH VĂN PHÒNG</h3>--}}
{{--                </header>--}}
{{--                <div class="row no-guttersz">--}}
{{--                    <div class="col-md-6">--}}
{{--                        <div class="item__hahd ef__zoomin wow fadeInUp" data-fancybox="group1" data-src="https://81ART.vn/wp-content/uploads/2020/08/115908933_1590066627829548_3432337906317421004_o.jpg" data-caption="" style="visibility: visible; animation-name: fadeInUp;">--}}
{{--                            <div class="item__thumb">--}}
{{--                                <div class="dnfix__thumb"> <img src="https://81ART.vn/wp-content/uploads/2020/08/115908933_1590066627829548_3432337906317421004_o.jpg" alt="" class="img-fluid"></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-6">--}}
{{--                        <div class="item__hahd ef__zoomin wow fadeInUp" data-fancybox="group1" data-src="https://81ART.vn/wp-content/uploads/2020/08/116019528_1590066454496232_7589351514789159587_o.jpg" data-caption="" style="visibility: visible; animation-name: fadeInUp;">--}}
{{--                            <div class="item__thumb">--}}
{{--                                <div class="dnfix__thumb"> <img src="https://81ART.vn/wp-content/uploads/2020/08/116019528_1590066454496232_7589351514789159587_o.jpg" alt="" class="img-fluid"></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <header class="page__header --gt py-5">--}}
{{--                    <h3 class="page-title text-white btn__effect btn--active button_hover">HÌNH ẢNH HOẠT ĐỘNG</h3>--}}
{{--                </header>--}}
{{--                <div class="row no-guttersz pb-5">--}}
{{--                    <div class="col-md-4">--}}
{{--                        <div class="item__hahd ef__zoomin wow fadeInUp" data-fancybox="group2" data-src="https://81ART.vn/wp-content/uploads/2020/08/115927563_1590065927829618_3950133384943231366_o.jpg" data-caption="" style="visibility: visible; animation-name: fadeInUp;">--}}
{{--                            <div class="item__thumb">--}}
{{--                                <div class="dnfix__thumb"> <img src="https://81ART.vn/wp-content/uploads/2020/08/115927563_1590065927829618_3950133384943231366_o.jpg" alt="" class="img-fluid"></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-4">--}}
{{--                        <div class="item__hahd ef__zoomin wow fadeInUp" data-fancybox="group2" data-src="https://81ART.vn/wp-content/uploads/2020/08/115928868_1590066077829603_8814300865307523321_o.jpg" data-caption="" style="visibility: visible; animation-name: fadeInUp;">--}}
{{--                            <div class="item__thumb">--}}
{{--                                <div class="dnfix__thumb"> <img src="https://81ART.vn/wp-content/uploads/2020/08/115928868_1590066077829603_8814300865307523321_o.jpg" alt="" class="img-fluid"></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-4">--}}
{{--                        <div class="item__hahd ef__zoomin wow fadeInUp" data-fancybox="group2" data-src="https://81ART.vn/wp-content/uploads/2020/08/115932790_1590066227829588_6398327200839160252_o.jpg" data-caption="" style="visibility: visible; animation-name: fadeInUp;">--}}
{{--                            <div class="item__thumb">--}}
{{--                                <div class="dnfix__thumb"> <img src="https://81ART.vn/wp-content/uploads/2020/08/115932790_1590066227829588_6398327200839160252_o.jpg" alt="" class="img-fluid"></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-4">--}}
{{--                        <div class="item__hahd ef__zoomin wow fadeInUp" data-fancybox="group2" data-src="https://81ART.vn/wp-content/uploads/2020/08/116098862_1590066141162930_7323148931967668706_o.jpg" data-caption="" style="visibility: visible; animation-name: fadeInUp;">--}}
{{--                            <div class="item__thumb">--}}
{{--                                <div class="dnfix__thumb"> <img src="https://81ART.vn/wp-content/uploads/2020/08/116098862_1590066141162930_7323148931967668706_o.jpg" alt="" class="img-fluid"></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-4">--}}
{{--                        <div class="item__hahd ef__zoomin wow fadeInUp" data-fancybox="group2" data-src="https://81ART.vn/wp-content/uploads/2020/08/116155213_1590066674496210_5958384073465175915_o.jpg" data-caption="" style="visibility: visible; animation-name: fadeInUp;">--}}
{{--                            <div class="item__thumb">--}}
{{--                                <div class="dnfix__thumb"> <img src="https://81ART.vn/wp-content/uploads/2020/08/116155213_1590066674496210_5958384073465175915_o.jpg" alt="" class="img-fluid"></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-4">--}}
{{--                        <div class="item__hahd ef__zoomin wow fadeInUp" data-fancybox="group2" data-src="https://81ART.vn/wp-content/uploads/2020/08/116184800_1590066721162872_8734952047990586683_o.jpg" data-caption="" style="visibility: visible; animation-name: fadeInUp;">--}}
{{--                            <div class="item__thumb">--}}
{{--                                <div class="dnfix__thumb"> <img src="https://81ART.vn/wp-content/uploads/2020/08/116184800_1590066721162872_8734952047990586683_o.jpg" alt="" class="img-fluid"></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-4">--}}
{{--                        <div class="item__hahd ef__zoomin wow fadeInUp" data-fancybox="group2" data-src="https://81ART.vn/wp-content/uploads/2020/08/116203711_1590066181162926_4252368923048140860_o.jpg" data-caption="" style="visibility: visible; animation-name: fadeInUp;">--}}
{{--                            <div class="item__thumb">--}}
{{--                                <div class="dnfix__thumb"> <img src="https://81ART.vn/wp-content/uploads/2020/08/116203711_1590066181162926_4252368923048140860_o.jpg" alt="" class="img-fluid"></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-4">--}}
{{--                        <div class="item__hahd ef__zoomin wow fadeInUp" data-fancybox="group2" data-src="https://81ART.vn/wp-content/uploads/2020/08/116222050_1590066504496227_2231880990342108780_o.jpg" data-caption="" style="visibility: visible; animation-name: fadeInUp;">--}}
{{--                            <div class="item__thumb">--}}
{{--                                <div class="dnfix__thumb"> <img src="https://81ART.vn/wp-content/uploads/2020/08/116222050_1590066504496227_2231880990342108780_o.jpg" alt="" class="img-fluid"></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-4">--}}
{{--                        <div class="item__hahd ef__zoomin wow fadeInUp" data-fancybox="group2" data-src="https://81ART.vn/wp-content/uploads/2020/08/116435079_1590066577829553_2356695336190642844_o.jpg" data-caption="" style="visibility: visible; animation-name: fadeInUp;">--}}
{{--                            <div class="item__thumb">--}}
{{--                                <div class="dnfix__thumb"> <img src="https://81ART.vn/wp-content/uploads/2020/08/116435079_1590066577829553_2356695336190642844_o.jpg" alt="" class="img-fluid"></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-4">--}}
{{--                        <div class="item__hahd ef__zoomin wow fadeInUp" data-fancybox="group2" data-src="https://81ART.vn/wp-content/uploads/2020/08/116444545_1590066367829574_156636965960130441_o.jpg" data-caption="" style="visibility: visible; animation-name: fadeInUp;">--}}
{{--                            <div class="item__thumb">--}}
{{--                                <div class="dnfix__thumb"> <img src="https://81ART.vn/wp-content/uploads/2020/08/116444545_1590066367829574_156636965960130441_o.jpg" alt="" class="img-fluid"></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-4">--}}
{{--                        <div class="item__hahd ef__zoomin wow fadeInUp" data-fancybox="group2" data-src="https://81ART.vn/wp-content/uploads/2020/08/116019528_1590066454496232_7589351514789159587_o.jpg" data-caption="" style="visibility: visible; animation-name: fadeInUp;">--}}
{{--                            <div class="item__thumb">--}}
{{--                                <div class="dnfix__thumb"> <img src="https://81ART.vn/wp-content/uploads/2020/08/116019528_1590066454496232_7589351514789159587_o.jpg" alt="" class="img-fluid"></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-4">--}}
{{--                        <div class="item__hahd ef__zoomin wow fadeInUp" data-fancybox="group2" data-src="https://81ART.vn/wp-content/uploads/2020/08/115908933_1590066627829548_3432337906317421004_o.jpg" data-caption="" style="visibility: visible; animation-name: fadeInUp;">--}}
{{--                            <div class="item__thumb">--}}
{{--                                <div class="dnfix__thumb"> <img src="https://81ART.vn/wp-content/uploads/2020/08/115908933_1590066627829548_3432337906317421004_o.jpg" alt="" class="img-fluid"></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </main>
        </div>
    </div>

@endsection

@section('custom-js')
    <script>
        $("img").each(function() {        //Loop through all images
            var $t = $(this);             //$t is the current iteration
            var ht = $t.attr("height");   //Get the HTML height
            var w = $t.attr("width");   //Get the HTML height
            ht = ht ? ht+"px" : "auto";   //If HTML height is defined, add "px" | Else, use "auto"
            w = w ? w+"px" : "auto";   //If HTML height is defined, add "px" | Else, use "auto"
            $t.css("height", ht);         //Apply the height to the current element
            $t.css("width", w);         //Apply the height to the current element
        });
    </script>
@endsection
