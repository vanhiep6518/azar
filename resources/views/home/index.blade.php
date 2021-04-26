@extends('layouts.app')
@section('title','Thiết kế & Xây dựng Nhà đẹp 81ART')
@section('content')
    <section class="slider">
        <div class="main-carousel dn__slider">
            @if($sliders)
                @foreach($sliders as $item)
                    <div class="carousel-cell">
                        <div class="slider__item">
                            <div class="item__thumb dnfix__thumb"> <img src="{{$item->image}}" class="img-fluid mx-auto"/></div>
                            <div class="item__meta__wrap">
                                <div class="container">
                                    <div class="item__meta d-sm-flex">
                                        <div class="item__box">
                                            <p class="item__title text-uppercase" data-animate="flipInX" data-animate-delay="5000">{{$item->title}}</p>
                                            <p class="item__sub" data-animate="bounceIn" data-animate-delay="5000">{{$item->sub_title}}<br/> <br/></p>
                                            <a href="{{$item->detail_url}}" class="item__readmore" data-animate="flipInX" data-animate-delay="5000">Xem chi tiết</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </section>
    <section class="projectSlider__featured waypoint">
        <header class="h-header s1 text-center h-header--border ">
            <p class="h-title color--white text-uppercase btn__effect"> <a href="project.html" class="">Dự án</a></p>
        </header>
        <ul class="nav nav-tabs myTabS1 --long" id="myTab" role="tablist">
            @if(isset($projectCats))
                @foreach($projectCats as $key => $item)
                    <li class="nav-item"> <a class="nav-link {{$key == 0 ? 'active':''}}" id="{{$item->slug}}-tab" data-toggle="tab" href="#{{$item->slug}}" role="tab" aria-controls="{{$item->slug}}" aria-selected="true">{{$item->name}}</a></li>
                @endforeach
            @endif
        </ul>
        <div class="tab-content" id="myTabContent">
            @if(isset($projectCats))
                @foreach($projectCats as $key1 => $item1)
                    <div class="tab-pane fade {{$key1 == 0 ? 'active show':''}}" id="{{$item1->slug}}" role="tabpanel" aria-labelledby="{{$item1->slug}}-tab">
                        <div class="sc__project">
                            <div class="row no-gutters">
                                @if(isset($item1->projects) && count($item1->projects) > 0)
                                    @foreach($item1->projects as $item2)
                                        <div class="col-md-6 col-lg-3 item__wrap">
                                            <archive class="project__item ef__zoomin">
                                                <a href="{{route('project.detail',['cat_slug'=>$item1->slug, 'slug' => $item2->slug, 'id' => $item2->id])}}" class="">
                                                    <div class="item__thumb">
                                                        <div class="dnfix__thumb">
                                                            <img width="300" height="300" src="{{$item2->image}}" class="img-fluid wp-post-image" alt="TOP NHÀ PHỐ TRÊN 990 TRIỆU ĐẸP NHẤT" /></div>
                                                    </div>
                                                    <div class="item__meta">
                                                        <p class="item__title">{{$item2->title}}</p>
                                                        <div class="item__field__wrap">
                                                            <div class="item__field">{{$item2->price}}</div>
                                                            <div class="item__field">{{$item2->floors}}</div>
                                                            <div class="item__field">{{$item2->acreage}}</div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </archive>
                                        </div>
                                    @endforeach
                                @else
                                    <p>Không có dự án nào trong danh mục này</p>
                                @endif
                            </div>
                            <div class="text-center read-all"> <a href="{{route('project.cat',['slug' => $item1->slug])}}" class="sc__readmore">Xem tất cả</a></div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </section>
    <section class="wp-fix-design">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 qttk">
                    <header class="h-header s1 text-center h-header--border --s2 ">
                        <p class="h-title color--black text-uppercase wow fadeInUp btn__effect --black">Quy trình thiết kế &amp; thi công</p>
                    </header>
                    <div class="itemAccordion__wrap">
                        <div id="accordion" class="accordion mb-5">
                            <div class="card active">
                                <div class="card-header" id="heading1">
                                    <h5 class="mb-0"> <button class="btn btn-link collapsed" "="" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">1. KHÁCH HÀNG GỬI YÊU CẦU VÀ THÔNG TIN THIẾT KẾ</button></h5>
                                </div>
                                <div id="collapse1" class="collapse show" aria-labelledby="heading1" data-parent="#accordion">
                                    <div class="card-body">- Chủ đầu tư xem xét quy trình thiết kế và sắp xếp thời gian địa điểm gặp gỡ.<br/> - Lên phương án cơ bản và báo giá theo phương án.<br/> - Lấy thông tin thiết kế từ chủ đầu tư bao gồm các yêu cầu về thiết kế, không gian chức năng, phong thủy,…</div>
                                </div>
                            </div>
                            <div class="card ">
                                <div class="card-header" id="heading2">
                                    <h5 class="mb-0"> <button class="btn btn-link " data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">2. ĐO ĐẠC KHẢO SÁT HIỆN TRẠNG, KÝ HĐ THIẾT KẾ VÀ TẠM ỨNG THEO HĐ</button></h5>
                                </div>
                                <div id="collapse2" class="collapse " aria-labelledby="heading2" data-parent="#accordion">
                                    <div class="card-body">- Đo dạc kích thước khu đất, hoặc kích thước hiện trạng công trình.<br/> - Lập bảng tiến độ thiết kế và tiến độ thanh toán gửi chủ đầu tư.<br/> - Hoàn thiện phương án Mặt bằng .<br/> - Số lần đưa phương án sơ bộ không quá 03 lần, nếu không phù hợp chủ đầu tư có thể chấm dứt việc hợp tác.<br/> - Sau khi thống nhất quy trình thiết kế đo đạc khảo sát lập bản vẽ hiện trạng gửi chủ đầu tư 81ART tạm ứng số tiền 40%.</div>
                                </div>
                            </div>
                            <div class="card ">
                                <div class="card-header" id="heading3">
                                    <h5 class="mb-0"> <button class="btn btn-link " data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">3. TRIỂN KHAI HỒ SƠ KIẾN TRÚC THEO PHƯƠNG ÁN ĐÃ THỐNG NHẤT</button></h5>
                                </div>
                                <div id="collapse3" class="collapse " aria-labelledby="heading3" data-parent="#accordion">
                                    <div class="card-body">- Chủ đầu tư chọn ra phương án phù hợp để triển khai hoặc chỉnh sửa trước khi triển khai hồ sơ kỹ thuật thi công.<br/> - Sau khi chủ đầu tư đồng ý với phương án thiết kế sơ với bộ chủ đầu tư và tạm ứng lần hai 30%.</div>
                                </div>
                            </div>
                            <div class="card ">
                                <div class="card-header" id="heading4">
                                    <h5 class="mb-0"> <button class="btn btn-link " data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">4. TRIỂN KHAI PHƯƠNG ÁN 3D VÀ XUẤT HỒ SƠ KỸ THUẬT THI CÔNG</button></h5>
                                </div>
                                <div id="collapse4" class="collapse " aria-labelledby="heading4" data-parent="#accordion">
                                    <div class="card-body">- Triển khai phương án 3D không quá 3 lần.<br/> - Sau khi chủ đầu tư lựa chọn phương án 3D phù hợp 81ART sẽ tiến hành triển khai hồ sơ kỹ thuật thi công.<br/> - Khi xuất hồ sơ kỹ thuật thi công số lần chỉnh sửa phương án chọn không quá 02 lần mỗi lần không quá 30%.<br/> - Nếu chỉnh sửa bản vẽ do sai sót từ 81ART thì hoàn toàn không phát sinh chi phí.<br/> - Thời gian chỉnh sửa bản vẽ không được tính vào hợp đồng đã ký.</div>
                                </div>
                            </div>
                            <div class="card ">
                                <div class="card-header" id="heading5">
                                    <h5 class="mb-0"> <button class="btn btn-link " data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapse5">5. BÀN GIAO HỒ SƠ VÀ THANH TOÁN HỢP ĐỒNG</button></h5>
                                </div>
                                <div id="collapse5" class="collapse " aria-labelledby="heading5" data-parent="#accordion">
                                    <div class="card-body">- Sau khi 81ART bàn giao đầy đủ hồ sơ kỹ thuật thi công chủ đầu tư chuyển nốt số tiền còn lại 30%. - Thời hạn thanh toán không quá 10 ngày sau khi bàn giao bản vẽ.</div>
                                </div>
                            </div>
                            <div class="card ">
                                <div class="card-header" id="heading6">
                                    <h5 class="mb-0"> <button class="btn btn-link " data-toggle="collapse" data-target="#collapse6" aria-expanded="false" aria-controls="collapse6">6. THẢO LUẬN VÀ THỎA THUẬN VỀ THI CÔNG</button></h5>
                                </div>
                                <div id="collapse6" class="collapse " aria-labelledby="heading6" data-parent="#accordion">
                                    <div class="card-body">- Giải thích và làm rõ các tài liệu thiết kế công trình khi có yêu cầu của chủ đầu tư, nhà thầu và nhà thầu giám sát..<br/> -Phối hợp với chủ đầu tư khi được yêu cầu để giải quyết các vướng mắc, phát sinh về thiết kế trong quá trình thi công xây dựng, điều chỉnh thiết kế phù hợp với thực tế thi công xây dựng công trình, xử lý những bất hợp lý trong thiết kế theo yêu cầu của chủ đầu tư.<br/> - Tham gia nghiệm thu công trình xây dựng khi có yêu cầu của chủ đầu tư.<br/> - Giám sát trực tiếp tại công trường là 03 lần trong 06 tháng kể từ ngày bàn giao hồ sơ kỹ thuật thi công.<br/> - Giám sát tác giả không trực tiếp thông qua điện thoại, email, facebook… trong giờ hành chính từ thứ 2 đến thứ 6</div>
                                </div>
                            </div>
                            <div class="tab__readmore"><a href="{{route('procProgress')}}">Xem chi tiết</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 price-new">
                    <div class="new text-center">
                        <h3 class="title">TIN TỨC "thường nhật"</h3>
                        <p class="sub-title">Bữa ăn sáng mỗi ngày</p>
                        <div class="owl-carousel owl-theme">
                            @if(isset($news) && count($news) > 0)
                                @foreach($news as $item)
                                    <div class="item">
                                        <archive class="project__item">
                                            <a href="{{route('construction.detail',['cat_slug'=>$item->construction_cat->slug, 'slug' => $item->slug, 'id' => $item->id])}}" class="">
                                                <div class="item__thumb">
                                                    <div class="dnfix__thumb"> <img width="300" height="300" src="{{$item->image}}" class="img-fluid wp-post-image" alt="{{$item->title}}"></div>
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
                    </div>
                    <div class="price text-center">
                        <h3 class="title">BẢNG GIÁ THIẾT KẾ</h3>
                        <div class="row">
                            @if(isset($designPrices) && count($designPrices) > 0)
                                @foreach($designPrices as $item)
                                    <div class="col-md-4 ">
                                        <div class="item">
                                            <h5 class="title">{{$item->title}}</h5>
                                            <div class="content">
                                                {!! $item->content !!}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
    </div>
@endsection
@section('css')
<style>
    .carousel-cell {
        width: 100%!important;; /* full width */
        max-width: 100%!important;
        height: 100vh!important;; /* height of carousel */
        margin-right: 10px;
    }
</style>
@endsection
@section('custom-js')
    <script>
        $('.main-carousel').flickity({
            // options
            cellAlign: 'left',
            contain: true,
            autoPlay: false,
            pauseAutoPlayOnHover: true,
        });
        $('.owl-carousel').owlCarousel({
            loop:false,
            margin:10,
            nav:true,
            dots: false,
            autoplay: true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:3
                }
            }
        })
    </script>
@endsection
