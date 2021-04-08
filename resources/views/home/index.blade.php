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
                            <div class="text-center mt-3"> <a href="{{route('project.cat',['slug' => $item1->slug])}}" class="sc__readmore">Xem tất cả</a></div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </section>
    <section class="introduce waypoint">
        <div class="container-fluid">
            <header class="h-header s2 text-center wow fadeInUp">
                <p class="h-title color--white text-uppercase">VỀ CHÚNG TÔI</p>
                <p class="h-sub color--white mt-2">Công ty Cổ phần Tư vấn thiết kế &amp; Xây dựng 81ART với 5 kinh nghiệm hoạt động cùng hàng trăm dự án lớn nhỏ khắp khu vực miền Trung.<br/> 81ART Thiết kế và Thi công từ Nhà phố, Biệt thự cho đến những công trình lớn như Khách sạn, Homestay, Nhà hàng, Coffee, Office, Shophouse, Resort, . . . với chi phí cực kỳ cạnh tranh và tự tin đem đến khách hàng sản phẩm tốt nhất trong từng phân khúc.</p>
            </header>
        </div>
        <div class="container-fluid">
            <div class="item__thumb pb-5 pb-md-3 wow fadeInUp">
                <div class="mb-2 wp-logo" style="width: 400px;margin: 0 auto;"> <img src="{{asset('images/Logo.png')}}" alt="Thiết kế &amp; Xây dựng Nhà đẹp 81ART" class="img-fluid"/></div>
{{--                <div> <img src="{{asset('images/LOGO-CHU.png')}}" alt="Thiết kế &amp; Xây dựng Nhà đẹp 81ART" class="img-fluid"/></div>--}}
                <a href="gioi-thieu.html" class="thumb__readmore">Khám phá thêm</a>
            </div>
        </div>
        <div class="sc-content item__content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-lg-4 item__wrap">
                        <div class="intro__item text-center wow fadeInUp">
                            <div class="item__meta">
                                <p class="item__title">Lịch sử</p>
                                <p class="item__excerpt">Với 5 năm thành lập và phát triển, đến nay 81ART đã mở rộng quy mô và trở thành công ty với 3 ngành nghề chính Kiến trúc - Xây dựng - Nội thất.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 item__wrap">
                        <div class="intro__item text-center wow fadeInUp">
                            <div class="item__meta">
                                <p class="item__title">Tầm nhìn</p>
                                <p class="item__excerpt">81ART không ngừng đổi mới, cập nhật xu hướng thiết kế, sáng tạo để kiến tạo các sản phẩm, dịch vụ đẳng cấp, mục tiêu trở thành doanh nghiệp dẫn đầu thị trường khu vực.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 item__wrap">
                        <div class="intro__item text-center wow fadeInUp">
                            <div class="item__meta">
                                <p class="item__title">Sứ mệnh</p>
                                <p class="item__excerpt">Kiến tạo không gian sống đẳng cấp, phù hợp với Công năng - Phong thủy - Chi phí của khách hàng đưa tra, đem đến những sản phẩm, trải nghiệm dịch vụ cạnh tranh nhất trong từng phân khúc, hướng tới tương lai vững bền với thương hiệu cao cấp mang tên 81ART.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="qttk_stnt__wrap">
        <section class="qttk">
            <div class="container-fluid">
                <header class="h-header s1 text-center h-header--border --s2 ">
                    <p class="h-title color--black text-uppercase wow fadeInUp btn__effect --black">Quy trình thiết kế &amp; thi công</p>
                </header>
                <div class="sc-content">
                    <div class="row">
                        <div class="col-lg-4 item__wrap mb-5 item--left">
                            <div class="itemImg__wrap"> <img src="{{asset('images/l-thicong.jpg')}}" class="img-fluid mx-auto wow fadeInUp"/></div>
                        </div>
                        <div class="col-lg-4">
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
                        <div class="col-lg-4 item__wrap item--left">
                            <div class="itemImg__wrap mb-3"> <img src="{{asset('images/r-thicong.jpg')}}" class="img-fluid mx-auto wow fadeInUp"/></div>
                        </div>
                    </div>
{{--                    <div class="text-center mb-2"> <a href="#copyright" class="sc__readmore --s2">Đăng ký Tư vấn miễn phí</a></div>--}}
                </div>
            </div>
        </section>
{{--        <section class="stnt">--}}
{{--            <div class="container-fluid">--}}
{{--                <header class="h-header s1 h-header--border --s2 text-center ">--}}
{{--                    <p class="h-title color--black text-uppercase wow fadeInUp btn__effect --black">Siêu thị nội thất</p>--}}
{{--                </header>--}}
{{--                <div class="sc-content">--}}
{{--                    <div class="stnt__item">--}}
{{--                        <div class="row no-guttersz">--}}
{{--                            <div class="col-md-6">--}}
{{--                                <div class="item__meta wow fadeInLeft">--}}
{{--                                    <p class="item__title"><span>81ART</span> <span>STORE</span></p>--}}
{{--                                    <div>--}}
{{--                                        <p>HÀNG NGÀN MẪU MÃ ĐA DẠNG, HIỆN ĐẠI<br/> ĐƯỢC 81ART CẬP NHẬT LIÊN TỤC<br/> ĐỂ ĐƯA ĐÊN KHÁCH HÀNG</p>--}}
{{--                                    </div>--}}
{{--                                    <div class="mt-auto"> <a href="danh-muc-noi-that/sieu-thi-noi-that/index.html" class="item__readmore color--black">Xem chi tiết</a></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-6 ">--}}
{{--                                <div class="item__thumb"> <a href="index.html" class="dnfix__thumb"><img src="{{asset('images/Untitled-3-min-29.jpg')}}" class="img-fluid"/></a></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}
{{--        <div class="container-fluid">--}}
{{--            <header class="header__title mt-3">--}}
{{--                <div class="box__title --border">--}}
{{--                    <div class="title__line"></div>--}}
{{--                    <h3 class="title__box"><span>Tin tức nổi bật</span></h3>--}}
{{--                    <div class="title__line"></div>--}}
{{--                </div>--}}
{{--            </header>--}}
{{--            <div class="related__slider slider flickity" data-flickity="{ &#34;autoPlay&#34;: true ,&#34;cellAlign&#34;: &#34;left&#34;, &#34;contain&#34;: true, &#34;wrapAround&#34;: true, &#34;groupCells&#34;: true, &#34;pageDots&#34;: false,&#34;prevNextButtons&#34;: true }">--}}
{{--                <div class="col-md-4 item__wrap">--}}
{{--                    <div class="item__ttnoithat ef__zoomin">--}}
{{--                        <a href="index.html%3Fp=1581.html" class="item__thumb dnfix__thumb"> <img width="300" height="200" src="wp-content/uploads/2020/08/ban-tho-to-tien.jpg" class="img-fluid wp-post-image" alt="THỦ TỤC MƯỢN TUỔI LÀM NHÀ _ THI CÔNG NHÀ ĐẸP 2020" srcset="wp-content/uploads/2020/08/ban-tho-to-tien.jpg 1000w, wp-content/uploads/2020/08/ban-tho-to-tien-768x512.jpg 768w, wp-content/uploads/2020/08/ban-tho-to-tien-150x100.jpg 150w" sizes="(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px"/> </a>--}}
{{--                        <div class="item__meta">--}}
{{--                            <div class="item__title text__truncate text__truncate--1"><a href="index.html%3Fp=1581.html">THỦ TỤC MƯỢN TUỔI LÀM NHÀ _ THI CÔNG NHÀ ĐẸP 2020</a></div>--}}
{{--                            <div class="item__excerpt text__truncate text__truncate--2">HÔM NAY 81ART XIN CHIA SẺ VỚI ANH CHỊ VỀ THỦ TỤC MƯỢN TUỔI LÀM NHÀ GỒM 6 ĐIỀU CƠ BẢN CẦN BIẾT 1. MƯỢN TUỔI LÀM NHÀ CÓ TỐT KHÔNG? Để trả lời câu hỏi có nên cho mượn tuổi làm nhà không, trước hết cùng tìm hiểu quan niệm mượn tuổi xây nhà là gì. Xem tuổi…</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-4 item__wrap">--}}
{{--                    <div class="item__ttnoithat ef__zoomin">--}}
{{--                        <a href="index.html%3Fp=1594.html" class="item__thumb dnfix__thumb"> <img width="300" height="300" src="wp-content/uploads/2020/08/Untitled-3-min-21.jpg" class="img-fluid wp-post-image" alt="XEM PHONG THỦY CHÍNH XÁC 2020" srcset="wp-content/uploads/2020/08/Untitled-3-min-21.jpg 500w, wp-content/uploads/2020/08/Untitled-3-min-21-100x100.jpg 100w, wp-content/uploads/2020/08/Untitled-3-min-21-150x150.jpg 150w" sizes="(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px"/> </a>--}}
{{--                        <div class="item__meta">--}}
{{--                            <div class="item__title text__truncate text__truncate--1"><a href="index.html%3Fp=1594.html">XEM PHONG THỦY CHÍNH XÁC 2020</a></div>--}}
{{--                            <div class="item__excerpt text__truncate text__truncate--2">HƯỚNG DẪN XEM PHONG THỦY NGAY TRÊN 81ART.VN MỘT CÁCH CHI TIẾT NHẤT Bước 1: Truy cập 81ART.vn  →  Chọn mục Phong thủy mà bạn muốn xem tại Tab Phong thủy ở thanh Menu dấu 3 gạch ở bản Mobile góc phải trên   Bước 2: Xem hướng nhà  →  Điền “Năm…</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-4 item__wrap">--}}
{{--                    <div class="item__ttnoithat ef__zoomin">--}}
{{--                        <a href="index.html%3Fp=514.html" class="item__thumb dnfix__thumb"> <img width="300" height="260" src="wp-content/uploads/2020/05/92470745_4302815893077818_6322199625012871168_o.jpg" class="img-fluid wp-post-image" alt="Biệt thự Tropical Design tối giản" srcset="wp-content/uploads/2020/05/92470745_4302815893077818_6322199625012871168_o.jpg 1500w, wp-content/uploads/2020/05/92470745_4302815893077818_6322199625012871168_o-768x665.jpg 768w, wp-content/uploads/2020/05/92470745_4302815893077818_6322199625012871168_o-116x100.jpg 116w" sizes="(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px"/> </a>--}}
{{--                        <div class="item__meta">--}}
{{--                            <div class="item__title text__truncate text__truncate--1"><a href="index.html%3Fp=514.html">Biệt thự Tropical Design tối giản</a></div>--}}
{{--                            <div class="item__excerpt text__truncate text__truncate--2">Biệt thự Tropical Design tối giản Ngôi nhà phong cách Tropical Design vạn người mê. Đơn giản hóa công năng và tối ưu không gian sân vườn để lấy ánh sáng và thông gió vào các không gian trong phòng. Ngôi nhà được thiết kế tinh tế tối giản đến từng chi…</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-4 item__wrap">--}}
{{--                    <div class="item__ttnoithat ef__zoomin">--}}
{{--                        <a href="index.html%3Fp=1609.html" class="item__thumb dnfix__thumb"> <img width="300" height="190" src="wp-content/uploads/2020/08/02a.jpg" class="img-fluid wp-post-image" alt="TOP NHỮNG CÔNG TRÌNH THI CÔNG TRỌN GÓI CỦA 81ART" srcset="wp-content/uploads/2020/08/02a.jpg 1848w, wp-content/uploads/2020/08/02a-768x487.jpg 768w, wp-content/uploads/2020/08/02a-1536x973.jpg 1536w, wp-content/uploads/2020/08/02a-1568x994.jpg 1568w, wp-content/uploads/2020/08/02a-158x100.jpg 158w" sizes="(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px"/> </a>--}}
{{--                        <div class="item__meta">--}}
{{--                            <div class="item__title text__truncate text__truncate--1"><a href="index.html%3Fp=1609.html">TOP NHỮNG CÔNG TRÌNH THI CÔNG TRỌN GÓI CỦA 81ART</a></div>--}}
{{--                            <div class="item__excerpt text__truncate text__truncate--2">Sau bước chọn lựa đơn vị thiết kế kiến trúc là bước tìm kiếm đơn vị thi công xây dựng công trình nhà ở. Đây là một công đoạn vất vả chẳng kém việc lọc các công ty thiết kế kiến trúc. Bởi, số lượng các công ty xây dựng hiện nay là rất nhiều, khó phân…</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-4 item__wrap">--}}
{{--                    <div class="item__ttnoithat ef__zoomin">--}}
{{--                        <a href="index.html%3Fp=1583.html" class="item__thumb dnfix__thumb"> <img width="300" height="251" src="wp-content/uploads/2020/08/cac-buoc-tien-hanh-le-cung-dong-tho-lam-nha.jpg" class="img-fluid wp-post-image" alt="CÚNG ĐỘNG THỔ KHỞI CÔNG LÀM NHÀ _ THI CÔNG TRỌN GÓI 2020" srcset="wp-content/uploads/2020/08/cac-buoc-tien-hanh-le-cung-dong-tho-lam-nha.jpg 940w, wp-content/uploads/2020/08/cac-buoc-tien-hanh-le-cung-dong-tho-lam-nha-768x644.jpg 768w, wp-content/uploads/2020/08/cac-buoc-tien-hanh-le-cung-dong-tho-lam-nha-119x100.jpg 119w" sizes="(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px"/> </a>--}}
{{--                        <div class="item__meta">--}}
{{--                            <div class="item__title text__truncate text__truncate--1"><a href="index.html%3Fp=1583.html">CÚNG ĐỘNG THỔ KHỞI CÔNG LÀM NHÀ _ THI CÔNG TRỌN GÓI 2020</a></div>--}}
{{--                            <div class="item__excerpt text__truncate text__truncate--2">HÔM NAY 81ART XIN CHIA SẺ VỚI ANH CHỊ VỀ THỦ TỤC CÚNG ĐỘNG THỔ KHỞI CÔNG LÀM NHÀ _ CÁCH SẮM LỄ VẬT, BÀI CÚNG CHUẨN Văn khấn, bài cúng động thổ xây nhà, khởi công nhà máy, dự án, cách sắm lễ vật, mâm cúng thổ công gồm những gì để vạn sự hanh thông. Tro…</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-4 item__wrap">--}}
{{--                    <div class="item__ttnoithat ef__zoomin">--}}
{{--                        <a href="index.html%3Fp=515.html" class="item__thumb dnfix__thumb"> <img width="300" height="190" src="wp-content/uploads/2020/05/102386786_4561558660536872_6418237704435378606_o-e1595068611647.jpg" class="img-fluid wp-post-image" alt="Ngôi nhà giá rẻ đình đám lên báo Mỹ" sizes="(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px"/> </a>--}}
{{--                        <div class="item__meta">--}}
{{--                            <div class="item__title text__truncate text__truncate--1"><a href="index.html%3Fp=515.html">Ngôi nhà giá rẻ đình đám lên báo Mỹ</a></div>--}}
{{--                            <div class="item__excerpt text__truncate text__truncate--2">Khi bạn muốn một ngôi nhà Đơn giản – Mộc mạc với chi phí thấp thì đây là mẫu nhà không thể bỏ lỡ. Sở hữu cho mình không gian mở lấy ánh sáng tự nhiên cho toàn bộ không gian của ngôi nhà. Vật liệu thô mộc nhẹ nhạc kết hợp mới những điểm nhấn nội…</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="text-center mb-3"> <a href="danh-muc-thi-cong/tin-tuc/index.html" class="sc__readmore --s2">Xem tất cả</a></div>--}}
{{--        </div>--}}
{{--        <section class="sc-feedback">--}}
{{--            <div class="container-fluid">--}}
{{--                <div class="position-relative pb-4">--}}
{{--                    <div class="testimonials__slider slider flickity" data-flickity="{ &#34;autoPlay&#34;: false ,&#34;cellAlign&#34;: &#34;left&#34;, &#34;contain&#34;: true, &#34;wrapAround&#34;: true, &#34;groupCells&#34;: true, &#34;pageDots&#34;: true,&#34;prevNextButtons&#34;: false }">--}}
{{--                        <div class="col-md-4 item__wrap">--}}
{{--                            <div class="slider__item">--}}
{{--                                <div class="text-center">--}}
{{--                                    <div class="item__thumb dnfix__thumb"> <img src="wp-content/uploads/2020/06/Untitled-3-min-23.jpg" class="img-fluid"/></div>--}}
{{--                                    <div>--}}
{{--                                        <div class="item__name">Chị Hoàng</div>--}}
{{--                                        <div class="item__sub">Hòa Xuân</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="item__comment">Thiết kế đã đẹp rồi lên hoàn thiện còn đẹp hơn. Cảm ơn 81ART đội ngũ trẻ đầy nhiệt huyết và chỉnh chu giúp chị hoàn thành ngôi nhà mơ ước của mình</div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-4 item__wrap">--}}
{{--                            <div class="slider__item">--}}
{{--                                <div class="text-center">--}}
{{--                                    <div class="item__thumb dnfix__thumb"> <img src="wp-content/uploads/2020/06/Untitled-3-min-24.jpg" class="img-fluid"/></div>--}}
{{--                                    <div>--}}
{{--                                        <div class="item__name">Anh Trung</div>--}}
{{--                                        <div class="item__sub">Nguyễn Thành Hãn, Hải Châu</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="item__comment">Cảm ơn 81ART đã đem đến căn nhà quá đẹp với mức giá quá tốt. Thi công nhanh với trang thiết bị hiện đại cho anh cảm giác an tâm khi xây nhà.</div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-4 item__wrap">--}}
{{--                            <div class="slider__item">--}}
{{--                                <div class="text-center">--}}
{{--                                    <div class="item__thumb dnfix__thumb"> <img src="wp-content/uploads/2020/06/Capture3.jpg" class="img-fluid"/></div>--}}
{{--                                    <div>--}}
{{--                                        <div class="item__name">Anh Phúc</div>--}}
{{--                                        <div class="item__sub">Văn phòng cho thuê Q5</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="item__comment">Giao cho 81ART Thiết kế một phương án hơn cả mong đợi. Đường nét hiện đại đã làm tòa nhà của Công ty thực sự nổi bật</div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-4 item__wrap">--}}
{{--                            <div class="slider__item">--}}
{{--                                <div class="text-center">--}}
{{--                                    <div class="item__thumb dnfix__thumb"> <img src="wp-content/uploads/2020/06/Untitled-3-min-25.jpg" class="img-fluid"/></div>--}}
{{--                                    <div>--}}
{{--                                        <div class="item__name">Chú Sơn</div>--}}
{{--                                        <div class="item__sub">Nhà chú Sơn</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="item__comment">Cảm ơn công ty đã giúp chú xây lên một ngôi nhà quá đẹp và ấn tượng. Chúc công ty phát triển mạnh trong tương lai</div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-4 item__wrap">--}}
{{--                            <div class="slider__item">--}}
{{--                                <div class="text-center">--}}
{{--                                    <div class="item__thumb dnfix__thumb"> <img src="wp-content/uploads/2020/06/Untitled-3-min-26.jpg" class="img-fluid"/></div>--}}
{{--                                    <div>--}}
{{--                                        <div class="item__name">Anh Long</div>--}}
{{--                                        <div class="item__sub">Biệt thự nhà anh Long</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="item__comment">Đội ngũ thi công của 81ART đã giúp anh hoàn thành ngôi nhà của mình quá đẹp và vượt ngoài mong đợi.</div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="text-center"> <a href="index.html#copyright" class="sc__readmore --s2">Đăng ký Tư vấn miễn phí</a></div>--}}
{{--            </div>--}}
{{--        </section>--}}
    </div>
{{--    <section class="tablePrice">--}}
{{--        <div class="sc-content ">--}}
{{--            <ul class="nav nav-tabs myTabS1 --short wow fadeInUp" id="PriceTab" role="tablist">--}}
{{--                <li class="nav-item"> <a class="nav-link active" id="PriceTab1-tab" data-toggle="tab" href="index.html#PriceTab1" role="tab" aria-controls="PriceTab1" aria-selected="true">Báo giá</a></li>--}}
{{--                <li class="nav-item"> <a class="nav-link" id="PriceTab2-tab" data-toggle="tab" href="index.html#PriceTab2" role="tab" aria-controls="PriceTab2" aria-selected="false">Phương thức thanh toán</a></li>--}}
{{--                <li class="nav-item"> <a class="nav-link" id="PriceTab3-tab" href="hop-dong-thiet-ke.html">Hợp đồng</a></li>--}}
{{--            </ul>--}}
{{--            <div class="tab-content" id="PriceTabContent">--}}
{{--                <div class="tab-pane fade show active" id="PriceTab1" role="tabpanel" aria-labelledby="PriceTab1-tab">--}}
{{--                    <div class="container">--}}
{{--                        <header class="h-header s1 h-header--border text-center">--}}
{{--                            <p class="h-title color--white text-uppercase mb-3 wow fadeInUp btn__effect">Bảng giá thiết kế</p>--}}
{{--                        </header>--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-md-4">--}}
{{--                                <div class="tablePrice__item ">--}}
{{--                                    <div class="tablePrice__header">--}}
{{--                                        <p class="item__title">Gói Nhà phố</p>--}}
{{--                                    </div>--}}
{{--                                    <div class="tablePrice__content">--}}
{{--                                        <div class="content--large"></div>--}}
{{--                                        <p><strong>Ngoại thất: 110.000 </strong>đ/m2</p>--}}
{{--                                        <ul>--}}
{{--                                            <li>3D Phối cảnh Mặt tiền</li>--}}
{{--                                            <li>Hồ sơ Kiến trúc</li>--}}
{{--                                            <li>Hồ sơ Triển khai Thi công</li>--}}
{{--                                            <li>Hồ sơ Kết cấu – Điện nước</li>--}}
{{--                                            <li>Hồ sơ Xin phép xây dựng</li>--}}
{{--                                        </ul>--}}
{{--                                        <p><strong>Nội thất: 100.000 </strong>đ/m2</p>--}}
{{--                                        <ul>--}}
{{--                                            <li>3D Phối cảnh Nội thất</li>--}}
{{--                                            <li>Hồ sơ Mặt bằng Nội thất</li>--}}
{{--                                            <li>Hồ sơ Triển khai Nội thất</li>--}}
{{--                                        </ul>--}}
{{--                                        <p><strong>TRỌN GÓI: </strong><del>2</del><del>50.000 </del><del>đ/m2</del><strong> → 110.000 </strong>đ/m2<del><br/> </del><em>Gói hỗ trợ Encovi<br/> </em><em>Giá Thiết kế <strong>giảm đến 50%</strong> </em></p>--}}
{{--                                    </div>--}}
{{--                                    <div class="tablePrice__footer">--}}
{{--                                        <p><strong>GÓI KIẾN TRÚC: </strong>Chỉ từ<strong> 80.000 </strong>đ/m2</p>--}}
{{--                                        <p><strong>Hoàn 100% tiền Thiết kế</strong><br/> khi ký Hợp đồng Thi công</p>--}}
{{--                                        <p> </p>--}}
{{--                                        <a href="index.html%3Fp=224.html" class="table__dktv">Xem chi tiết</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-4">--}}
{{--                                <div class="tablePrice__item ">--}}
{{--                                    <div class="tablePrice__header">--}}
{{--                                        <p class="item__title">Gói Biệt thự</p>--}}
{{--                                    </div>--}}
{{--                                    <div class="tablePrice__content">--}}
{{--                                        <div class="content--large"></div>--}}
{{--                                        <p><strong>Ngoại thất: 150.000 </strong>đ/m2</p>--}}
{{--                                        <ul>--}}
{{--                                            <li>3D Phối cảnh Mặt tiền</li>--}}
{{--                                            <li>Hồ sơ Kiến trúc</li>--}}
{{--                                            <li>Hồ sơ Triển khai Thi công</li>--}}
{{--                                            <li>Hồ sơ Kết cấu – Điện nước</li>--}}
{{--                                            <li>Hồ sơ Xin phép xây dựng</li>--}}
{{--                                        </ul>--}}
{{--                                        <p><strong>Nội thất: 100.000 </strong>đ/m2</p>--}}
{{--                                        <ul>--}}
{{--                                            <li>3D Phối cảnh Nội thất</li>--}}
{{--                                            <li>Hồ sơ Mặt bằng Nội thất</li>--}}
{{--                                            <li>Hồ sơ Triển khai Nội thất</li>--}}
{{--                                        </ul>--}}
{{--                                        <p><strong>TRỌN GÓI: </strong><del>2</del><del>50.000 </del><del>đ/m2</del> → <strong>130.000 </strong>đ/m2<del><br/> </del><em>Gói hỗ trợ Encovi<br/> </em><em>Giá Thiết kế <strong>giảm đến 50%</strong></em></p>--}}
{{--                                    </div>--}}
{{--                                    <div class="tablePrice__footer">--}}
{{--                                        <p><strong>GÓI KIẾN TRÚC: </strong>Chỉ từ<strong> 100.000 </strong>đ/m2</p>--}}
{{--                                        <p><del></del><strong>Hoàn 100% tiền Thiết kế<br/> </strong>khi ký Hợp đồng Thi công</p>--}}
{{--                                        <p> </p>--}}
{{--                                        <a href="index.html%3Fp=224.html" class="table__dktv">Xem chi tiết</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-4">--}}
{{--                                <div class="tablePrice__item ">--}}
{{--                                    <div class="tablePrice__header">--}}
{{--                                        <p class="item__title">Công trình khác</p>--}}
{{--                                    </div>--}}
{{--                                    <div class="tablePrice__content">--}}
{{--                                        <div class="content--large"></div>--}}
{{--                                        <p><strong>LIÊN HỆ ĐỂ NHẬN BÁO GIÁ</strong></p>--}}
{{--                                        <p><strong>0898 234 779 – 0905 770 456</strong></p>--}}
{{--                                        <ul>--}}
{{--                                            <li>Thiết kế Coffee</li>--}}
{{--                                            <li>Thiết kế Nhà hàng</li>--}}
{{--                                            <li>Thiết kế Bar – Pub – Karaoke</li>--}}
{{--                                            <li>Thiết kế Văn phòng</li>--}}
{{--                                            <li>Thiết kế Khách sạn – Homestay</li>--}}
{{--                                            <li>Thiết kế Resort</li>--}}
{{--                                            <li>Quy hoạch</li>--}}
{{--                                        </ul>--}}
{{--                                        <p> </p>--}}
{{--                                        <p><strong>TRỌN GÓI TỪ  </strong><del>2</del><del>50.000 </del><del>đ/m2</del><em><br/> </em><strong>150.000 </strong><em>đ/m2</em></p>--}}
{{--                                        <p><em>Gói hỗ trợ Encovi<br/> </em><em>Giá Thiết kế <strong>giảm đến 50%</strong></em></p>--}}
{{--                                    </div>--}}
{{--                                    <div class="tablePrice__footer">--}}
{{--                                        <p><strong>BÁO GIÁ THEO CÔNG TRÌNH CỤ THỂ</strong></p>--}}
{{--                                        <p><strong>Hoàn 100% tiền Thiết kế</strong><br/> khi ký Hợp đồng Thi công</p>--}}
{{--                                        <p> </p>--}}
{{--                                        <a href="index.html%3Fp=224.html" class="table__dktv">Xem chi tiết</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <header class="h-header s1 h-header--border text-center">--}}
{{--                            <p class="h-title color--white text-uppercase mb-3 wow fadeInUp btn__effect">Bảng giá thi công</p>--}}
{{--                        </header>--}}
{{--                        <div class="row table__tc">--}}
{{--                            <div class="col-md-4">--}}
{{--                                <div class="tablePrice__item ">--}}
{{--                                    <div class="tablePrice__header">--}}
{{--                                        <p class="item__title">Gói tiết kiệm</p>--}}
{{--                                    </div>--}}
{{--                                    <div class="tablePrice__content">--}}
{{--                                        <div class="content--largez"></div>--}}
{{--                                        <div></div>--}}
{{--                                        <p><strong>4.850.000 </strong>đ/m2</p>--}}
{{--                                        <p> </p>--}}
{{--                                        <p><em>Đơn giá xây thô từ</em></p>--}}
{{--                                        <p><strong>3.100.000 </strong>đ/m2</p>--}}
{{--                                        <p> </p>--}}
{{--                                    </div>--}}
{{--                                    <div class="tablePrice__footer">--}}
{{--                                        <p><strong>Miễn phí hồ sơ thiết kế<br/> </strong></p>--}}
{{--                                        <p>Quà tặng Hoàn thiện trị giá 5.000.000đ</p>--}}
{{--                                        <p> </p>--}}
{{--                                        <a href="index.html%3Fp=226.html" class="table__dktv">Xem chi tiết</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-4">--}}
{{--                                <div class="tablePrice__item ">--}}
{{--                                    <div class="tablePrice__header">--}}
{{--                                        <p class="item__title">Gói nhà phố</p>--}}
{{--                                    </div>--}}
{{--                                    <div class="tablePrice__content">--}}
{{--                                        <div class="content--largez"></div>--}}
{{--                                        <div></div>--}}
{{--                                        <p><strong>5.000.000</strong> đ/m2<br/> <i class="fa fa-angle-up fa-flip-vertical" aria-hidden="true"></i><br/> <strong>5.500.000</strong> đ/m2</p>--}}
{{--                                    </div>--}}
{{--                                    <div class="tablePrice__footer">--}}
{{--                                        <p><strong>Miễn phí hồ sơ thiết kế</strong></p>--}}
{{--                                        <p>Quà tặng Hoàn thiện trị giá 10.000.000đ</p>--}}
{{--                                        <p> </p>--}}
{{--                                        <a href="index.html%3Fp=226.html" class="table__dktv">Xem chi tiết</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-4">--}}
{{--                                <div class="tablePrice__item ">--}}
{{--                                    <div class="tablePrice__header">--}}
{{--                                        <p class="item__title">Gói cao cấp</p>--}}
{{--                                    </div>--}}
{{--                                    <div class="tablePrice__content">--}}
{{--                                        <div class="content--largez"></div>--}}
{{--                                        <div></div>--}}
{{--                                        <p><strong>5.600.000</strong> đ/m2<br/> <i class="fa fa-angle-up fa-flip-vertical" aria-hidden="true"></i><br/> <strong>6.000.000</strong> đ/m2</p>--}}
{{--                                    </div>--}}
{{--                                    <div class="tablePrice__footer">--}}
{{--                                        <p><strong>Miễn phí hồ sơ thiết kế</strong></p>--}}
{{--                                        <p>Quà tặng Hoàn thiện trị giá 20.000.000đ</p>--}}
{{--                                        <p> </p>--}}
{{--                                        <a href="index.html%3Fp=226.html" class="table__dktv">Xem chi tiết</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="tab-pane fade" id="PriceTab2" role="tabpanel" aria-labelledby="PriceTab2-tab">--}}
{{--                    <div class="container">--}}
{{--                        <header class="h-header s1 h-header--border text-center">--}}
{{--                            <p class="h-title color--white text-uppercase mb-3 wow fadeInUp btn__effect">Phương thức thanh toán</p>--}}
{{--                        </header>--}}
{{--                        <div class="pttt__content">--}}
{{--                            <p><span style="color: #339966;"><strong>1. Thiết kế kiến trúc và thiết kế nội thất</strong></span></p>--}}
{{--                            <p><strong><span style="color: #808080;">Bước 1:</span> Khách hàng gửi yêu cầu – Lên phương án cơ bản và báo giá theo phương án</strong></p>--}}
{{--                            <p>– Chủ đầu tư xem xét quy trình thiết kế và sắp xếp thời gian địa điểm gặp gỡ.<br/> – Lên phương án cơ bản và báo giá theo phương án.<br/> – Lấy thông tin thiết kế từ chủ đầu tư bao gồm các yêu cầu về thiết kế, không gian chức năng, phong thủy,…</p>--}}
{{--                            <p><strong><span style="color: #808080;">Bước 2:</span> Đo đạc khảo sát hiện trạng – Ký HĐ thiết kế và tạm ứng theo HĐ</strong><br/> – Đo dạc kích thước khu đất, hoặc kích thước hiện trạng công trình.<br/> – Lập bảng tiến độ thiết kế và tiến độ thanh toán gửi chủ đầu tư.<br/> – Hoàn thiện phương án Mặt bằng .<br/> – Số lần đưa phương án sơ bộ không quá 03 lần, nếu không phù hợp chủ đầu tư có thể chấm dứt việc hợp tác.<br/> – Sau khi thống nhất quy trình thiết kế đo đạc khảo sát lập bản vẽ hiện trạng gửi chủ đầu tư 81ART tạm ứng số tiền 40%.</p>--}}
{{--                            <p><strong><span style="color: #808080;">Bước 3:</span> Triển khai Hồ sơ kiến trúc theo phương án đã thống nhất</strong><br/> – Chủ đầu tư chọn ra phương án phù hợp để triển khai hoặc chỉnh sửa trước khi triển khai hồ sơ kỹ thuật thi công.<br/> – Sau khi chủ đầu tư đồng ý với phương án thiết kế sơ với bộ chủ đầu tư và tạm ứng lần hai 30%.</p>--}}
{{--                            <p><strong><span style="color: #808080;">Bước 4:</span> Triển khai Phương án 3D và xuất Hồ sơ kỹ thuật thi công</strong></p>--}}
{{--                            <p>– Triển khai phương án 3D không quá 3 lần.<br/> – Sau khi chủ đầu tư lựa chọn phương án 3D phù hợp 81ART sẽ tiến hành triển khai hồ sơ kỹ thuật thi công.<br/> – Khi xuất hồ sơ kỹ thuật thi công số lần chỉnh sửa phương án chọn không quá 02 lần mỗi lần không quá 30%.<br/> – Nếu chỉnh sửa bản vẽ do sai sót từ 81ART thì hoàn toàn không phát sinh chi phí.<br/> – Thời gian chỉnh sửa bản vẽ không được tính vào hợp đồng đã ký.</p>--}}
{{--                            <p><strong><span style="color: #808080;">Bước 5:</span> Bàn giao Hồ sơ và thanh toán hợp đồng</strong></p>--}}
{{--                            <p>– Sau khi 81ART bàn giao đầy đủ hồ sơ kỹ thuật thi công chủ đầu tư chuyển nốt số tiền còn lại 30%. – Thời hạn thanh toán không quá 10 ngày sau khi bàn giao bản vẽ.</p>--}}
{{--                            <p><strong><span style="color: #808080;">Bước 6:</span> Thảo luận và Thỏa thuận về thi công</strong></p>--}}
{{--                            <p><span style="color: #339966;"><strong>2. Thi công hạng mục Kiến trúc :</strong></span><br/> Hai bên thỏa thuận thi công , theo nhu cầu và các hạng mục trong bản vẽ,. Sau khi kí hợp đồng, bên CĐT sẽ thứ tự tạm ứng và phương thức thanh toán theo hợp đồng như sau:</p>--}}
{{--                            <p><strong>PHƯƠNG THỨC THANH TOÁN</strong></p>--}}
{{--                            <p><strong>• Đợt 01:</strong> 10% GTHĐ trong vòng 3 ngày sau khi ký kết hợp đồng)<br/> ( Số tiền này coi như tiền cọc, nếu bên CĐR hủy hợp đồng sẽ bị mất, còn bên công ty hủy hợp đồng sẽ trả lại cho bên CĐT)</p>--}}
{{--                            <p><strong>• Đợt 02:</strong> 20% GTHĐ sau khi đổ bê tông phần móng.</p>--}}
{{--                            <p><strong>• Đợt 03:</strong> 15% GTHĐ sau khi đổ bê tông sàn tầng 2.</p>--}}
{{--                            <p><strong>• Đợt 04:</strong> 15% GTHĐ sau khi đổ bê tôngsàn tầng mái.</p>--}}
{{--                            <p><strong>• Đợt 05:</strong> 20% GTHĐ sau khi xong phần xây tô .</p>--}}
{{--                            <p><strong>• Đợt 06:</strong> 18% GTHĐ sau khi xong hoàn thiện bàn giao nhà .</p>--}}
{{--                            <p><strong>• Đợt 07:</strong> 2% GTHĐ sau 6tháng kể từ ngày hoàn thiện bàn giao .</p>--}}
{{--                            <p>Các khoản thanh toán trên sẽ được thực hiện trong vòng ba (03) ngày kể từ ngày công ty thông báo hoàn thành các công đoạn thi công tương ứng. Về các phương diện còn lại như: tiến độ, tư vấn kĩ thuật, quyền và trách nhiệm, các chế độ bảo hành… sẽ có trong chi tiết của từng mẫu hợp đồng riêng biệt.</p>--}}
{{--                            <p><span style="color: #339966;"><strong>3. Thi công hạng mục nội thất</strong></span></p>--}}
{{--                            <p>Trước khi nhận thi công nội thất trọn gói của các công trình bạn cần phải có hồ sơ đã thiết kế nội thất và có bản vẽ kỹ thuật hoàn chỉnh gồm: bản vẽ thiết kế nội thất 3D và bản vẽ chi tiết kỹ thuật thi công thì đội ngũ thi công Nội Thất Morehome mới đảm bảo hoàn thiện thi công theo đúng yêu cầu của quý khách hàng. <strong>Sau đây là quy trình thi công nội thất của 81ART Architecture:</strong></p>--}}
{{--                            <p>• 1. Dự toán báo giá</p>--}}
{{--                            <p>• 2. Trao đổi hạng mục thi công</p>--}}
{{--                            <p>• 3. Ký hợp đồng thi công nội thất</p>--}}
{{--                            <p>• 4. Bảo hành</p>--}}
{{--                            <p> </p>--}}
{{--                            <p> </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="tab-pane fade" id="PriceTab3" role="tabpanel" aria-labelledby="PriceTab3-tab">...</div>--}}
{{--                <div class="container text-center">--}}
{{--                    <div class="sc__footer">--}}
{{--                        <p class="h2 color--white letter-spacing-5">LIÊN HỆ NGAY VỚI KIẾN TRÚC SƯ ĐỂ ĐƯỢC TƯ VẤN MIỄN PHÍ</p>--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-md-4">--}}
{{--                                <a href="tel:0905.770.456" class="item__wrap" rel="nofollow">--}}
{{--                                    <div class="item__sonline2">--}}
{{--                                        <img src="wp-content/themes/blogdefault/assets/img/phone-call.svg" class="" alt=""/>--}}
{{--                                        <div class="ml-1 d-inline-block">0905.770.456</div>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-4">--}}
{{--                                <a href="tel:0898.234.779" class="item__wrap" rel="nofollow">--}}
{{--                                    <div class="item__sonline2">--}}
{{--                                        <img src="wp-content/themes/blogdefault/assets/img/phone-call.svg" class="" alt=""/>--}}
{{--                                        <div class="ml-1 d-inline-block">0898.234.779</div>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-4">--}}
{{--                                <a href="tel:0899.94.2288" class="item__wrap" rel="nofollow">--}}
{{--                                    <div class="item__sonline2">--}}
{{--                                        <img src="wp-content/themes/blogdefault/assets/img/phone-call.svg" class="" alt=""/>--}}
{{--                                        <div class="ml-1 d-inline-block">0899.94.2288</div>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <section id="homeNumber" class="homeNumber ">--}}
{{--                    <div class="container">--}}
{{--                        <div class="sc-content">--}}
{{--                            <div class="row wow fadeInUp">--}}
{{--                                <div class="col-md-4 col-lg-4 item__wrap">--}}
{{--                                    <div class="icon__item">--}}
{{--                                        <div class="row no-guttersz align-items-center">--}}
{{--                                            <div class="col-4">--}}
{{--                                                <div class="item__thumb"> <a href="index.html" class="dnfix__thumb dnfix__thumb--contain"><img src="wp-content/uploads/2020/04/LOGO-BẢN-VẼ.png" alt="" class="img-fluid mx-auto"/></a></div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-8">--}}
{{--                                                <div class="item__meta">--}}
{{--                                                    <p class="item__title"><span class="counter">520</span></p>--}}
{{--                                                    <div class="item__excerpt">Bản thiết kế</div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-4 col-lg-4 item__wrap">--}}
{{--                                    <div class="icon__item">--}}
{{--                                        <div class="row no-guttersz align-items-center">--}}
{{--                                            <div class="col-4">--}}
{{--                                                <div class="item__thumb"> <a href="index.html" class="dnfix__thumb dnfix__thumb--contain"><img src="wp-content/uploads/2020/04/LOGO-CÔNG-TRÌNH.png" alt="" class="img-fluid mx-auto"/></a></div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-8">--}}
{{--                                                <div class="item__meta">--}}
{{--                                                    <p class="item__title"><span class="counter">258</span></p>--}}
{{--                                                    <div class="item__excerpt">Công trình</div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-4 col-lg-4 item__wrap">--}}
{{--                                    <div class="icon__item">--}}
{{--                                        <div class="row no-guttersz align-items-center">--}}
{{--                                            <div class="col-4">--}}
{{--                                                <div class="item__thumb"> <a href="index.html" class="dnfix__thumb dnfix__thumb--contain"><img src="wp-content/uploads/2020/04/LOGO-KHÁCH-HÀNG.png" alt="" class="img-fluid mx-auto"/></a></div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-8">--}}
{{--                                                <div class="item__meta">--}}
{{--                                                    <p class="item__title"><span class="counter">1254</span></p>--}}
{{--                                                    <div class="item__excerpt">Khách hàng</div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </section>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
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
    </script>
@endsection
