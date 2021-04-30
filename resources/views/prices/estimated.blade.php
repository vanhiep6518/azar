
<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <meta name="theme-color" content="#338dbc"/>

    <title>Khái toán chi phí xây nhà, cách tính giá xây dựng nhà</title>
    <linl rel="canonical" href="http://qpshouse.com/khai-toan" />
    <meta name="keywords" content="cách tính chi phí xây nhà,
chi phí xây nhà,
dự toán chi phí xây nhà,
cách tính giá xây nhà,
tính giá xây nhà,
dự toán nhà ở,
lap du an,
lập dự án đầu tư,
chi phi xay nha,
" />
    <meta name="description" content="Khái toán chi phí xây nhà, cách tính giá xây dựng nhà... đơn giản, chính xác"/>
    <meta name="author" content="Kiến trúc QPS house"/>
    <meta property="og:title" content="Khái toán chi phí xây nhà, cách tính giá xây dựng nhà" />
    <meta property="og:description" content="Khái toán chi phí xây nhà, cách tính giá xây dựng nhà... đơn giản, chính xác" />
    <meta property="og:type" content="House" />
    <meta property="og:url" content="http://qpshouse.com" />
    <meta property="og:image" content="http://qpshouse.com/upload/image/casax15.jpg" />

    <meta name="twitter:card" content="Thiết kế kiến trúc, nhà ở, nội thất | QPS house">
    <meta name="twitter:site" content="http://qpshouse.com">
    <meta name="twitter:title" content="Khái toán chi phí xây nhà, cách tính giá xây dựng nhà">
    <meta name="twitter:description" content="Khái toán chi phí xây nhà, cách tính giá xây dựng nhà... đơn giản, chính xác">
    <meta name="twitter:creator" content="Kiến trúc QPS house">
    <meta name="twitter:image" content="http://qpshouse.com/upload/image/casax15.jpg">

    <link href="https://plus.google.com/collection/8f-HaB" rel="publisher" />

    <link rel="stylesheet" href="{{asset('css/estimated/font-awesome.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/estimated/bootstrap.min.css')}}"/>
    <link href="{{asset('css/estimated/main.css')}}" rel="stylesheet" type="text/css" media="all" />
    <script src="{{asset('js/estimated/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/estimated/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/estimated/public.js')}}" type="text/javascript"></script>
    <noscript>Bạn nên bật javascript để sử dụng hết tính năng của website</noscript>
    <style type="text/css">
        .s-hide{
            display:none
        }
        .s-border-top{
            border-top: 1px solid #848484;
        }
        .s-lineheight{
            line-height: 48px;
        }
        .s-rightfloat{
            float: right;
        }
        .s-copyright{
            display: inline-block; margin-right: 20px;padding: 4px 0;
        }
    </style>
</head>
<body>

<script src="{{asset('js/estimated/compute.js')}}" type="text/javascript"></script>
<style>
    table tr td:first-child{
        text-align: left;
    }

    table thead th{
        text-align: right;
    }

    table thead th:first-child{
        text-align: left;
    }

    table tr td{
        text-align: right;
    }

    table tr td input{
        text-align: right;
        width: 100px;
    }

    .s-container{
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    }

    .s-title{
        color: #FFF; line-height: 40px; font-size: 1.2em;
    }

    .margin-top-g{
        margin-top: 15px;
    }

    @media screen and (device-aspect-ratio: 40/71) {

        .right-box{
            clear: both !important;
            min-height: inherit;
        }
        .auto-show-parent{
            min-height: auto !important;
            height: auto !important;
        }
    }

</style>

<div class="s-center">
    <div class="c-header">
{{--        <p><img src="/upload/image/160717khaitoanmenu.jpg" width="1218" height="513" alt="" /></p>		--}}
        <div class="c-mark">
            <div class="mark-content">
                <h2 style="padding: 10px; margin: 0; color: #FFF">Khái toán</h2>
                <p>L&agrave; ứng dụng được QPS house x&acirc;y dựng v&agrave; ph&aacute;t triển dựa tr&ecirc;n kiến thức v&agrave; kinh nghiệm thực tiển, ch&uacute;ng t&ocirc;i muốn đem đến cho kh&aacute;ch h&agrave;ng một c&ocirc;ng cụ đơn giản để dự to&aacute;n chi ph&iacute; x&acirc;y nh&agrave; trước khi c&oacute; thiết kế chi tiết. Muốn biết th&ecirc;m chi tiết, vui l&ograve;ng li&ecirc;n hệ với ch&uacute;ng t&ocirc;i để được tư vấn.</p>			</div>
        </div>
    </div>
    <div class="s-container">
        <div style="padding-top: 30px">

            <!-- Left box -->
            <div class="left-box col-md-8 col-sm-6 col-xs-12">
                <!-- <ul class="nav nav-tabs" style="background-color: #78909C">
                    <li class=""><a data-toggle="tab" href="#home">Kiến trúc</a></li>
                </ul> -->
                <div class="col-xs-12" style="display:flex; height: 40px; background-color: #78909C">
                    <span class="s-title">KIẾN TRÚC</span>
                </div>

                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">

                        <!-- Kien truc -->
                        <div class="col-xs-12 margin-top">
                            <div class="col-xs-12 col-md-6">
                                <label for="ex1">Diện tích đất (m<sup>2</sup>)</label>
                                <input onkeyup="_change_dientichdat(this)" id="dientichdat" class="form-control" placeholder="Diện tích"/>
                            </div>

                            <div class="col-xs-12 col-md-6">
                                <label for="ex2">Vị trí khu đất</label>
                                <select class="form-control" id="select-vitrikd"
                                        onchange="_select_vitrikd(this)">
                                    <option value="0;0">...</option>
                                    <option value="1.00;1.00">Đường tiếp cận > 3.5m</option>
                                    <option value="1.10;1.05">Đường tiếp cận < 3.5m</option>
                                </select>
                            </div>

                            <div class="col-xs-12 col-md-6 margin-top-g">
                                <label for="ex1">Loại nhà</label>
                                <select class="form-control" id="select-loainha" onchange="select_loainha(this)">
                                    <option value="0;...;...">...</option>
                                    <option value="2,900,000;1,200,000;700000">Nhà phố 1 mặt tiền</option>
                                    <option value="2,900,000;1,800,000;800000">Nhà phố 2 mặt tiền</option>
                                    <option value="3,000,000;2,200,000;1000000">Biệt thự</option>
                                    <option value="1,800,000;900,000;500000">Nhà cấp 4</option>
                                </select>
                            </div>

                            <div class="col-xs-12 col-md-6 margin-top-g">
                                <label for="ex2">Mức độ đầu tư</label>
                                <select class="form-control" id="select-mucdodautu" onchange="select_mucdodautu(this)">
                                    <option value="0;0;0">...</option>
                                    <option value="1.00;0.88;1.00">Thấp</option>
                                    <option value="1.00;1.00;1.20">Trung bình</option>
                                    <option value="1.06;1.40;1.60">Khá</option>
                                    <option value="1.20;1.80;2.00">Cao</option>
                                </select>
                            </div>

                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-4" style="text-align: left; font-weight: bold; margin-top: 15px;
							padding: 0 15px">
                                Chọn số tầng
                            </div>
                        </div>
                        <div class="col-xs-12 sotang">
                            <div class="col-xs-4 margin-top">
                                <div class="checkbox">
                                    <label><input onclick="_ham(this);" type="checkbox" id="checkbox-ham" /> Hầm</label>
                                </div>
                                <div class="checkbox">
                                    <label><input onclick="_tret(this)" checked disabled type="checkbox" id="checkbox-tret"/> Trệt</label>
                                </div>
                                <div class="checkbox">
                                    <label><input onclick="_lung(this)" type="checkbox" id="checkbox-lung"/> Lửng</label>
                                </div>
                            </div>

                            <div class="col-xs-4 margin-top">
                                <div class="checkbox">
                                    <label><input onclick="_lau1(this)" type="checkbox" id="checkbox-lau1" /> Lầu 1</label>
                                </div>
                                <div class="checkbox">
                                    <label><input onclick="_lau2(this)" type="checkbox" id="checkbox-lau2"/> Lầu 2</label>
                                </div>
                                <div class="checkbox">
                                    <label><input onclick="_lau3(this)" type="checkbox" id="checkbox-lau3"/> Lầu 3</label>
                                </div>
                            </div>

                            <div class="col-xs-4 margin-top">
                                <div class="checkbox">
                                    <label><input onclick="_santhuong(this)" type="checkbox" id="checkbox-santhuong" /> Sân thượng</label>
                                </div>
                                <div class="checkbox">
                                    <label><input onclick="_mai(this)" checked disabled type="checkbox" id="checkbox-mai"/> Mái</label>
                                </div>
                            </div>
                        </div>
                        <!-- End kien truc -->

                        <!-- Ket cau -->
                        <div class="col-xs-12" style="display:flex; height: 40px; background-color: #78909C">
                            <span class="s-title">KẾT CẤU</span>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-12 col-md-6 min-height">
                                <div class="col-xs-12 margin-top">
                                    <label for="ex3">Đặc điểm nền đất</label>
                                    <select class="form-control" id="select-dacdiemnendat" onchange="_dacdiemnendat(this)">
                                        <option value="0;...;...;0">...</option>
                                        <option value="0.7;Móng đơn, móng băng;Sàn bê tông M100 (không cốt thép);0">Tốt (cát, cát pha, sét cứng)</option>
                                        <option value="1;Móng cọc;Sàn bê tông cốt thép;19008000">Yếu (bùn, sét nhão)</option>
                                    </select>
                                </div>
                                <div style="display: none" class="col-xs-12 margin-top hide-sanlung">
                                    <label for="ex3">Sản lửng</label>
                                    <select class="form-control" id="select-sanlung" onchange="_sanlung(this)">
                                        <option value="0">...</option>
                                        <!-- <option value="0.4">Không có sàn lửng</option> -->
                                        <option value="1">Sàn bê tông cốt thép</option>
                                        <option value="0.4">Sàn sườn thép tấm cemnent</option>
                                    </select>
                                </div>
                                <div class="col-xs-12 margin-top">
                                    <label for="ex3">Kết cấu mái</label>
                                    <select class="form-control" id="select-ketcaumai" onchange="_ketcaumai(this)">
                                        <option value="0">...</option>
                                        <option value="0.6">Mái BẰNG bê tông cốt thép</option>
                                        <option value="1">Mái NGÓI bê tông cốt thép</option>
                                        <option value="0.5">Mái NGÓI kết cấu thép</option>
                                        <option value="0.3">Mái TÔN</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="col-xs-12 margin-top">
                                    <label for="ex3" >Móng dự kiến</label>
                                    <input style="pointer-events: none" class="form-control" id="txt-mongdukien" placeholder="Móng dự kiến" type="text">
                                </div>
                                <div class="col-xs-12 margin-top">
                                    <label for="ex3">Sàn trệt</label>
                                    <input style="pointer-events: none" class="form-control" id="txt-santret" placeholder="Sàn trệt" type="text">
                                </div>
                            </div>
                        </div>
                        <!-- End ket cau -->
                    </div>
                </div>
            </div>
            <!-- End left box -->

            <!-- Right box -->
            <div class="right-box col-md-4 col-xs-11 col-sm-6 auto-show-parent">
                <div class="auto-show">
                    <img src="{{asset('images/mai.jpg')}}" style="height: 10%; width: 100%" />
                    <img src="{{asset('images/santhuong.jpg')}}" style="height: 10%; width: 100%; display:none" />
                    <img src="{{asset('images/lau.jpg')}}" style="height: 10%; width: 100%; display:none" />
                    <img src="{{asset('images/lau.jpg')}}" style="height: 10%; width: 100%; display:none" />
                    <img src="{{asset('images/lau.jpg')}}" style="height: 10%; width: 100%; display:none" />
                    <img src="{{asset('images/lung.jpg')}}" style="height: 10%; width: 100%; display:none" />
                    <img src="{{asset('images/tret.jpg')}}" style="height: 10%; width: 100%" />
                    <img src="{{asset('images/ham.jpg')}}" style="height: 10%; width: 100%; display:none" />
                    <div style="margin-top: 15px">
                        <strong>SƠ ĐỒ MẶT CẮT</strong>
                    </div>
                </div>
            </div>
            <!-- End right box -->
        </div>
    </div>

    <!-- Nhap dien tich -->
    <div class="s-container">

        <div class="panel panel-default" style="margin-bottom: 0px">
            <div class="col-xs-12" style="height: 40px; background-color: #78909C">
                <span class="s-title" style="display: flex">QUY MÔ DIỆN TÍCH</span>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th>Hạng mục</th>
                    <th>Diện tích<span> (m<sup>2</sup>)</span></th>
                    <th>HS tính toán</th>
                    <th>DT tính toán<span> (m<sup>2</sup>)</span></th>
                </tr>
                </thead>
                <tbody id="tbody-quymodientich">
                <tr id="tr-tangham" style="display:none">
                    <td>Tầng hầm</td>
                    <td><input id="input-tangham" type="text" onkeyup="_change_row(this)" placeholder="Nhập số"/></td>
                    <td id="td-tangham">0</td>
                    <td></td>
                </tr>
                <tr id="tr-santret">
                    <td>Sàn trệt</td>
                    <td><input id="input-santret" type="text" onkeyup="_change_row(this)" placeholder="Nhập số"/></td>
                    <td id="td-santret">0</td>
                    <td></td>
                </tr>
                <tr id="tr-lung" style="display:none">
                    <td>Lửng</td>
                    <td><input id="input-lung" type="text" onkeyup="_change_row(this)" placeholder="Nhập số"/></td>
                    <td id="td-lung">0</td>
                    <td></td>
                </tr>
                <tr id="tr-lau1" style="display:none">
                    <td>Lầu 1</td>
                    <td><input id="input-lau1" type="text" onkeyup="_change_row(this)" placeholder="Nhập số"/></td>
                    <td id="td-lau1">0</td>
                    <td></td>
                </tr>
                <tr id="tr-lau2" style="display:none">
                    <td>Lầu 2</td>
                    <td><input id="input-lau2" type="text" onkeyup="_change_row(this)" placeholder="Nhập số"/></td>
                    <td id="td-lau2">0</td>
                    <td></td>
                </tr>
                <tr id="tr-lau3" style="display:none">
                    <td>Lầu 3</td>
                    <td><input id="input-lau3" type="text" onkeyup="_change_row(this)" placeholder="Nhập số"/></td>
                    <td id="td-lau3">0</td>
                    <td></td>
                </tr>
                <tr id="tr-santhuong" style="display:none">
                    <td>Sân thượng (Trong nhà và ngoài nhà)</td>
                    <td><input id="input-santhuong" type="text" onkeyup="_change_row(this)" placeholder="Nhập số"/></td>
                    <td id="td-santhuong">0</td>
                    <td></td>
                </tr>
                <tr id="tr-mai">
                    <td>Mái</td>
                    <td><input id="input-mai" type="text" onkeyup="_change_row(this)" placeholder="Nhập số"/></td>
                    <td id="td-mai">0</td>
                    <td></td>
                </tr>
                <tr id="tr-thongtang" style="display:none">
                    <td>DT ô thông tầng quy đổi</td>
                    <td id="td-dt-thongtang"></td>
                    <td>0.3</td>
                    <td></td>
                </tr>
                <tr id="tr-phanmong">
                    <td>DT quy đổi phần móng</td>
                    <td id="td-dt-phanmong"></td>
                    <td>0.3</td>
                    <td></td>
                </tr>
                <tr id="tr-sanvuon">
                    <td>DT quy đổi sân vườn tầng trệt</td>
                    <td id="td-dt-sanvuon"></td>
                    <td>0.2</td>
                    <td></td>
                </tr>
                </tbody>
            </table>
            <div style="margin: 10px 0;">
                <div style="text-align: left; padding-left: 15px">
                    <span style="font-size: 18px">Tổng diện tích sàn sử dụng: </span>
                    <span style="font-size: 22px; color: red" id="span-tongSSudung">0</span>
                    <span> m<sup>2</sup></span>
                </div>
                <div style="text-align: left; padding-left: 15px">
                    <span style="font-size: 18px">Tổng diện tích sàn tính toán chi phí xây dựng: </span>
                    <span style="font-size: 22px; color: red" id="span-tongSTinhtoan">0</span>
                    <span> m<sup>2</sup></span>
                </div>
            </div>
        </div>
    </div>
    <!-- Ket thuc nhap dien tich -->

    <!-- Chi phi -->
    <div class="s-container">
        <div class="panel panel-default">
            <div class="" style="height: 40px; background-color: #78909C">
                <div style="display: flex" class="col-xs-6 s-title">KHÁI TOÁN CHI PHÍ</div>
                <div style="line-height: 40px; color: #FFF; display: flex" class="col-xs-6">
                    Tổng diện tích(m2):
                    <span style="margin-left: 15px; font-size: 20px" id="tongdientich">0</span>
                </div>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th>Hạng mục</th>
                    <th>Đơn giá cơ bản (đồng/m2)</th>
                    <th>HS độ hoàn thiện</th>
                    <th>HS vị trí xây dựng</th>
                    <th style="text-align: right">Thành tiền (đồng)</th>
                </tr>
                </thead>
                <tbody id="tbody-tongchiphi">
                <tr id="tr-phancoc" style="display:none">
                    <td>Phần cọc (đối với nền đất yếu)</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="text-align: right"></td>
                </tr>
                <tr id="tr-phantho">
                    <td>Phần thô và nhân công hoàn thiện</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="text-align: right"></td>
                </tr>
                <tr id="tr-vattu">
                    <td>Phần vật tư hoàn thiện</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="text-align: right"></td>
                </tr>
                <!-- <tr id="tr-noithat">
                    <td>Phần nội thất</td>
                    <td></td>
                    <td></td>
                    <td style="text-align: right"></td>
                </tr> -->
                </tbody>
            </table>
            <div style="margin: 10px 0">
                <div style="text-align: left; padding-left: 15px">
                    <span style="font-size: 18px;">Chi phí đầu tư xây dựng và hoàn thiện cơ bản: </span>
                    <span style="font-size: 22px; color: red" id="chiphi-san">...</span>
                    <span> (đồng)</span>
                </div>
                <!-- <div>
                    <span style="font-size: 18px">Chi phí đầu tư xây dựng, hoàn thiện và nội thất: </span>
                    <span style="font-size: 22px; color: red" id="chiphi-noithat">...</span>
                    <span> (đồng)</span>
                </div> -->
            </div>
        </div>

        <div class="alert alert-success" role="alert" style="text-align: left">
            Giá trị khái toán chỉ mang tính tương đối tham khảo cho các công trình nhà ở có đặc điểm kiến trúc bình thường.
            Đối với các dạng công trình khác và có thiết kế đặc biệt, vui lòng liên hệ với chúng tôi để được tư vấn chi tiết hơn
            <a href="http://qpshouse.com/lien-he">TẠI ĐÂY!</a>
            Chân thành cảm ơn!
        </div>
    </div>
    <!-- Ket thuc chi phi -->
</div>


<style type="text/css">

    .s-lineheight li{
        display: block !important;
    }

    .s-lineheight{
        line-height: 26px !important;
    }
</style>

{{--<div class="row s-center footer">--}}
{{--    <div class="s-container container">--}}
{{--        <div>--}}
{{--            <ul>--}}
{{--                <li><a href="http://qpshouse.com"><span class="glyphicon glyphicon-home"></span></a></li>--}}
{{--                <li><a href="http://qpshouse.com/cong-trinh">Công trình</a></li>--}}
{{--                <li><a href="http://qpshouse.com/khai-toan">Khái toán</a></li>--}}
{{--                <li><a href="http://qpshouse.com/tin-tuc">Tin tức</a></li>--}}
{{--                <li><a href="http://qpshouse.com/lien-he">Liên hệ</a></li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="s-border-top">--}}
{{--        <div class="s-container container">--}}

{{--            <div class="col-md-7">--}}
{{--                <ul class="s-lineheight">--}}
{{--                    <li class="s-copyright">--}}
{{--                        <i class="glyphicon glyphicon-map-marker"></i> Địa chỉ: 27 đường số 2, KP6, Hiệp Bình Phước, Thủ Đức, Tp HCM.--}}
{{--                    </li>--}}
{{--                    <li class="s-copyright">--}}
{{--                        <i class="glyphicon glyphicon-copyright-mark"></i> Copyright © 2016 QPS.--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--            <div class="col-md-5">--}}
{{--                <ul class="s-lineheight">--}}
{{--                    <li class="s-rightfloat"><img src="/upload/img_base/icon-google-plus.png?v=1.1.1" alt="Nhà ở - QPS house" /></li>--}}
{{--                    <li class="s-rightfloat">--}}
{{--                        <a target="_blank" href="https://www.facebook.com/QPS-House-1200640749981082">--}}
{{--                            <img src="/upload/img_base/icon-facebook.png?v=1.1.1" alt="Thiết kế nội thất - QPS house" />--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<script type="text/javascript">--}}
{{--    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();--}}
{{--    (function(){--}}
{{--        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];--}}
{{--        s1.async=true;--}}
{{--        s1.src='https://embed.tawk.to/57c3e466b817ab664221c233/default';--}}
{{--        s1.charset='UTF-8';--}}
{{--        s1.setAttribute('crossorigin','*');--}}
{{--        s0.parentNode.insertBefore(s1,s0);--}}
{{--    })();--}}
{{--</script>--}}
</body>
</html>
