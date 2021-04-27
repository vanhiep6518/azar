@extends('layouts.report')

@section('content')
        <form method="post" action="" id="f-contract" name="f-contract">
            <div id="response" style="display:none;"></div>
            <div id="input">
                <div id="menu">
                    <div class="header__logo">
                        <a href="https://81art.vn" class="d-flex justify-content-between" title="Thiết kế &amp; Xây dựng Nhà đẹp 81ART">
                            <div class="logo1__wrap"><img src="{{asset('images/Logo.png')}}" alt="Thiết kế &amp; Xây dựng Nhà đẹp 81ART" class="img-fluid --st1"></div>
{{--                            <div class="logo2__wrap"><img src="https://81ART.vn/wp-content/uploads/2020/04/lgotexxt.png" alt="Thiết kế &amp; Xây dựng Nhà đẹp 81ART" class="img-fluid --st2"></div>--}}
                        </a>
                    </div>
                    <div><a id="menu-bgtk" href="/admin/bao-gia-thiet-ke" class="btn" title="" data-toggle="tooltip" data-original-title="Báo giá thiết kế">Báo giá thiết kế</a></div>
                    <div><a id="menu-bgtc" href="/admin/bao-gia-thi-cong" class="btn btn-light" title="" data-toggle="tooltip" data-original-title="Báo giá thi công">Báo giá thi công</a></div>
                </div>
                <div id="inputdata">
                    <p></p>
                    <div class="form-group "> <input type="text" id="contract_code" name="contract_code" value="" class="form-control form-control-sm " placeholder="Mã báo giá thiêt kế" data-toggle="tooltip" title="" data-original-title="Mã báo giá thi công"></div>
                    <div class="form-group "> <input type="text" id="contract_signed_date" name="contract_signed_date" value="" class="form-control form-control-sm " data-type="date" placeholder="Ngày báo giá (dd/mm/yyyy)" data-toggle="tooltip" onchange="validatedate(this)" title="" data-original-title="Ngày báo giá (dd/mm/yyyy)"></div>
                    <div class="form-group loc_loai_ct"></div>
                    <div class="form-group "><textarea id="building_address" name="building_address" class="form-control form-control-sm " placeholder="Địa chỉ công trình" data-toggle="tooltip" title="" data-original-title="Địa chỉ công trình"></textarea></div>
                    <div class="form-group "><textarea id="recipient" name="recipient" class="form-control form-control-sm " placeholder="Người nhận báo giá" data-toggle="tooltip" title="" data-original-title="Người nhận báo giá"></textarea></div>
                    <div class="form-group "> <input id="thoi_han_bao_gia" name="thoi_han_bao_gia" class="form-control form-control-sm " onchange="validatedate(this)" placeholder="Giá trị đến ngày dd/mm/yyyy" data-toggle="tooltip" title="" data-original-title="Báo giá có giá trị đến"> </div>
                    <div style="float:right"> <input type="checkbox" id="vat" name="vat" onclick="hideShowVAT()"> VAT <button type="reset" onclick="resetAll()" class="btn">Reset</button> <button id="btn_sum_all" type="button" class="btn btn-danger" onclick="sumAll()">Tổng</button> <button id="btn_print_bgtk" type="button" class="btn btn-info">Print</button></div>
                </div>
            </div>
            <div id="content">
                <div id="print-this">
                    <h1 style="text-align:center;margin:0 0 20px;font-size:26px;"><strong>BÁO GIÁ THI CÔNG</strong></h1>
                    <p>Số: <span class="qr_code"><span id="mabgtk">...</span></span><span class="signed_date_auto_bgtk" style="float:right;">Đà Nẵng, ngày 05 tháng 03 năm 2021</span></p>
                    <p style="font-weight: bold;">Kính gửi: <span class="recipient">Công ty ...</span></p>
                    <p>Chúng tôi: <span class="office_info_auto-name">CÔNG TY TNHH TƯ VẤN THIẾT KẾ &amp; XÂY DỰNG 81ART.</span></p>
                    <p>Địa chỉ: <span class="office_info_auto-address">78 Nguyễn Minh Chấn, Hòa Khánh Nam, Q.Liên Chiểu, TP.Đà Nẵng</span></p>
                    <p>Trân trọng báo giá thi công công trình: <input id="don_gia_tk_chinh" class="item_editable use_area w-50 text-left"  value="..."></p>
                    <p>Địa chỉ công trình: <span class="building_address">...</span></p>
                    <br>
                    <table class="table baogia table-bordered price" style="width:100%;">
                        <tbody>
                        <tr>
                            <th colspan="3"> HẠNG MỤC</th>
                            <th style="width: 11%;"> ĐƠN GIÁ (m<sup>2</sup>)</th>
                            <th style="width: 30%;"> CHI TIẾT VẬT LIỆU</th>
                            <th style="width: 7%;"> Diện tích</th>
                            <th style="width: 15%;"> Thành tiền</th>
                        </tr>
                        <tr class="maymoi">
                            <td style="text-align:center;"> <input id="phantho" type="checkbox" class="chkxm"></td>
                            <td rowspan="2"> <span style="text-align: center;"><strong>PHẦN THÔ XÂY MỚI</strong></span></td>
                            <td> <span style="text-align: center;">Nhà Phố</span></td>
                            <td> <span style="text-align: center;"> <input id="dg_xay_moi_nha_pho" name="dg_xay_moi_nha_pho xay_moi"  value="3,000,000" class="item_editable use_area xaymoi"> </span></td>
                            <td rowspan="4">
                                <ul style="margin: 0;font-size: 12px;">
                                    <li>Sắt thép: Hòa Phát, Việt Nhật, Việt Úc</li>
                                    <li>Xi măng: Kim Đỉnh PC 40, Sông Gianh</li>
                                    <li>Bê tông tươi Đăng Hải, Dinco</li>
                                    <li>Vật liệu cấp thoát nước: Bình Minh</li>
                                    <li>Gạch xây: Gạch tuynel 6 lỗ Đại Hiệp, Điện Ngọc</li>
                                    <li>Cát xây: Đại Lộc</li>
                                    <li>Dây điện, ống luồn dây điện, dây cáp: Cadivi.</li>
                                </ul>
                            </td>
                            <td> <span style="text-align: center;"> <input id="dt_xay_moi_nha_pho" name="dt_xay_moi_nha_pho"  value="" class="item_editable use_area "> </span></td>
                            <td class="item-total xay_moi_nha_pho_item_total"></td>
                        </tr>
                        <tr>
                            <td style="text-align:center;"> <input id="phantho1" type="checkbox" class="chkxm"></td>
                            <td> <span style="text-align: center;">Biệt Thự</span></td>
                            <td> <span style="text-align: center;"> <input id="dg_xay_moi_biet_thu" name="dg_xay_moi_biet_thu xay_moi"  value="3,500,000" class="item_editable use_area xaymoi"></span></td>
                            <td> <span style="text-align: center;"> <input id="dt_xay_moi_biet_thu" name="dt_xay_moi_biet_thu "  value="" class="item_editable use_area"> </span></td>
                            <td class="item-total xay_moi_biet_thu_item_total"></td>
                        </tr>
                        <tr>
                            <td style="text-align:center;"> <input id="phantho2" type="checkbox" class="chkxm"></td>
                            <td rowspan="2"> <span style="text-align: center;"><strong>PHẦN THÔ CẢI TẠO</strong></span></td>
                            <td> <span style="text-align: center;">Nhà Phố</span></td>
                            <td rowspan="2"> <span style="text-align: center;"> <input id="dg_cai_tao_nha_pho" name="dg_cai_tao_nha_pho xay_moi"  value="2,300,000" class="item_editable use_area xaymoi"></span></td>
                            <td> <span><input id="dt_cai_tao_nha_pho" name="dt_cai_tao_nha_pho"  value="" class="item_editable use_area"></span></td>
                            <td class="item-total cai_tao_nha_pho_item_total"></td>
                        </tr>
                        <tr>
                            <td style="text-align:center;"> <input id="phantho3" type="checkbox" class="chkxm"></td>
                            <td> <span style="text-align: center;">Biệt Thự</span></td>
                            <td> <span><input id="dt_cai_tao_biet_thu" name="dt_cai_tao_biet_thu"  value="" class="item_editable use_area xaymoi"></span></td>
                            <td class="item-total cai_tao_biet_thu_item_total"></td>
                        </tr>
                        <tr>
                            <td style="text-align:center;"> <input id="hoanthien" type="checkbox" class="chkht"></td>
                            <td rowspan="3"> <span style="text-align: center;"><strong>HOÀN THIỆN</strong></span></td>
                            <td> <span style="text-align: center;">Nhà Phố 1 MT</span></td>
                            <td> <span style="text-align: center;"><input id="dg_hoan_thien_nha_pho_1mt" name="dg_hoan_thien_nha_pho_1mt"  value="3,000,000" class="item_editable use_area"></span></td>
                            <td rowspan="3">
                                <ul style="margin: 0;font-size: 12px;">
                                    <li>Gạch ốp lát: Kimgress, Eurotile.</li>
                                    <li>Sàn gỗ công nghiệp</li>
                                    <li>Thạch cao: Khung nhôm Tika loại 1, Vĩnh Tường</li>
                                    <li>Trần ban công, trần trang trí:Conwood</li>
                                    <li>Sơn nước: Sơn Toa nanoshield, Jotun</li>
                                    <li>Thiết bị đèn điện: Panasonic, Kingled, SAT</li>
                                    <li>Thiết bị vệ sinh: TOTO, INAX</li>
                                    <li>Điều hòa: Daikin</li>
                                    <li>Hệ thống cửa mặt tiền:Nhôm xingfa nhập khẩu</li>
                                    <li>Cầu thang: Ốp đá Granite, lan can kính, sắt.</li>
                                </ul>
                            </td>
                            <td> <span><input id="dt_hoan_thien_nha_pho_1mt" name="dt_hoan_thien_nha_pho_1mt"  value="" class="item_editable use_area"></span></td>
                            <td class="item-total hoan_thien_nha_pho_1mt_item_total"></td>
                        </tr>
                        <tr>
                            <td style="text-align:center;"> <input id="hoanthien1" type="checkbox" class="chkht"></td>
                            <td> <span style="text-align: center;">Nhà Phố 2 MT</span></td>
                            <td> <span style="text-align: center;"><input id="dg_hoan_thien_nha_pho_2mt" name="dg_hoan_thien_nha_pho_2mt"  value="3,500,000" class="item_editable use_area"></span></td>
                            <td> <span><input id="dt_hoan_thien_nha_pho_2mt" name="dt_hoan_thien_nha_pho_2mt"  value="" class="item_editable use_area"></span></td>
                            <td class="item-total hoan_thien_nha_pho_2mt_item_total"></td>
                        </tr>
                        <tr>
                            <td style="text-align:center;"> <input id="hoanthien2" type="checkbox" class="chkht"></td>
                            <td> <span style="text-align: center;">Biệt Thự</span></td>
                            <td> <span style="text-align: center;"><input id="dg_hoan_thien_biet_thu" name="dg_hoan_thien_biet_thu"  value="4,000,000" class="item_editable use_area"></span></td>
                            <td> <span><input id="dt_hoan_thien_biet_thu" name="dt_hoan_thien_biet_thu"  value="" class="item_editable use_area"></span></td>
                            <td class="item-total hoan_thien_biet_thu_item_total"></td>
                        </tr>
                        <tr>
                            <td style="text-align:center;"> <input type="checkbox" class="chktr"></td>
                            <td rowspan="2"> <span style="text-align: center;"><strong>TƯỜNG RÀO</strong></span></td>
                            <td> <span style="text-align: center;">Nhà Phố</span></td>
                            <td> <span style="text-align: center;"><input id="dg_tuong_rao_nha_pho" name="dg_tuong_rao_nha_pho"  value="6,000,000" class="item_editable use_area"></span></td>
                            <td> <span style="margin: 0;font-size: 12px;">Cao 2.5m ốp đá 2 mặt, cổng sắt, conwood.</span></td>
                            <td> <span><input id="dt_tuong_rao_nha_pho" name="dt_tuong_rao_nha_pho"  value="" class="item_editable use_area"></span></td>
                            <td class="item-total tuong_rao_nha_pho_item_total"></td>
                        </tr>
                        <tr>
                            <td style="text-align:center;"> <input type="checkbox" class="chktr"></td>
                            <td> <span style="text-align: center;">Biệt Thự</span></td>
                            <td> <span style="text-align: center;"><input id="dg_tuong_rao_biet_thu" name="dg_tuong_rao_biet_thu"  value="8,000,000" class="item_editable use_area"></span></td>
                            <td> <span style="margin: 0;font-size: 12px;">Cao 2.5m ốp gạch, đá tự nhiên, cổng sắt, conwood.</span></td>
                            <td> <span><input id="dt_tuong_rao_biet_thu" name="dt_tuong_rao_biet_thu"  value="" class="item_editable use_area"></span></td>
                            <td class="item-total tuong_rao_biet_thu_item_total"></td>
                        </tr>
                        <tr>
                            <td style="text-align:center;"> <input type="checkbox" class="chksv"></td>
                            <td rowspan="2"> <span style="text-align: center;"><strong>SÂN VƯỜN</strong></span></td>
                            <td> <span style="text-align: center;">Nhà Phố</span></td>
                            <td rowspan="2"> <span style="text-align: center;"><input id="dg_san_vuon_nha_pho" name="dg_san_vuon_nha_pho"  value="4,000,000" class="item_editable use_area"></span></td>
                            <td rowspan="2"> <span style="margin: 0;font-size: 12px;">Nền lát đá sa thạch, bazan.<br> Bao gồm bồn hoa cây cỏ, hệ thống tưới tiêu.</span></td>
                            <td> <span><input id="dt_san_vuon_nha_pho" name="dt_san_vuon_nha_pho"  value="" class="item_editable use_area"></span></td>
                            <td class="item-total san_vuon_nha_pho_item_total"></td>
                        </tr>
                        <tr>
                            <td style="text-align:center;"> <input type="checkbox" class="chksv"></td>
                            <td> <span style="text-align: center;">Biệt Thự</span></td>
                            <td> <span><input id="dt_san_vuon_biet_thu" name="dt_san_vuon_biet_thu"  value="" class="item_editable use_area"></span></td>
                            <td class="item-total san_vuon_biet_thu_item_total"></td>
                        </tr>
                        <tr class="vat_row_cothue">
                            <td colspan="6" class="center sum">TỔNG CỘNG (chưa bao gồm hệ số)</td>
                            <td id="tong_hang_muc" class="item-total sum sub_total_hang_muc"></td>
                        </tr>
                        </tbody>
                    </table>
                    <p style="margin-top:10px;">Bằng chữ: <input id="don_gia_tk_chinh" class="item_editable use_area w-75 text-left" name="don_gia_tk_chinh" value="... đồng."></p>
                    <p style="margin-top:10px;" class="sum vat_row_cothue">* Ghi chú:</p>
                    <table class="table" style="margin-bottom:0;">
                        <tbody>
                        <tr>
                            <td style="width: 50%;border: none;">
                                <strong>Đơn giá trên chưa bao gồḿ:</strong>
                                <ul style="padding-left: 15px;margin-bottom: 0;">
                                    <li style="list-style-type: inherit;">Phần xử lý nền móng, mạch nước ngầm, ép cọc.</li>
                                    <li style="list-style-type: inherit;">Phần phá dỡ mặt bằng.</li>
                                    <li style="list-style-type: inherit;">Kết cấu móng phức tạp, mái nghiêng, hầm, hồ bơi, bể cá, xông hơi, hệ thống thông minh.</li>
                                    <li style="list-style-type: inherit;">Thiết bị vệ sinh.</li>
                                </ul>
                            </td>
                            <td style="border: none;">
                                <strong>Địa điểm xây dựng:</strong>
                                <ul style="padding-left: 15px;">
                                    <li style="list-style-type: inherit;">Giá trị áp dụng tại thành phố Đà Nẵng.</li>
                                    <li style="list-style-type: inherit;">Công trình nằm ở vị trí đường &gt; 5,5m.</li>
                                </ul>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <p><span style="font-weight: bold;">Chi phí hoàn thiện và nội thất chỉ là khái toán, đơn giá chính xác sẽ phụ thuộc vào chủng loại vật tư được tính thêm vào hệ số dưới đây: <br> Cách tính hệ số: </span> Hệ số x đơn giá thô hoặc hoàn thiện x m<sup>2</sup> = thành tiền. <br> Ví dụ: Đơn giá mái nghiêng biệt thự : 0.9 x 4tr x S mái = thành tiền</p>
                    <table class="price" id="tablePrice">
                        <tbody>
                        <tr>
                            <th class="check"></th>
                            <th class="content">PHẦN THÔ</th>
                            <th class="unit">Hệ số</th>
                            <th class="amount">Diện tích</th>
                            <th class="item-total">Thành tiền</th>
                        </tr>
                        <tr>
                            <td style="font-weight: bold; background-color: rgb(243, 243, 243);"></td>
                            <td colspan="4" style="font-weight: bold; background-color: rgb(243, 243, 243);">Móng</td>
                        </tr>
                        <tr>
                            <td style="text-align:center;"> <input type="checkbox"></td>
                            <td class="content">Móng cọc (đã gồm cọc)</td>
                            <td class="coefficient"> <input id="hs_mong_coc" name="hs_mong_coc"  value="0.6" class="item_editable use_area"></td>
                            <td class="amount"> <input id="dt_mong_coc" name="dt_mong_coc"  value="" class="item_editable use_area"></td>
                            <td class="item-total dt_mong_coc_item_total"></td>
                        </tr>
                        <tr>
                            <td style="text-align:center;"> <input type="checkbox"></td>
                            <td class="content">Móng băng 01 phương</td>
                            <td class="coefficient"> <input id="hs_mong_bang_1"  name="hs_mong_bang_1" value="0.4" class="item_editable garden_area"></td>
                            <td class="amount"> <input id="dt_mong_bang_1" name="dt_mong_bang_1"  value="" class="item_editable garden_area"></td>
                            <td class="item-total dt_mong_bang_1_item_total"></td>
                        </tr>
                        <tr>
                            <td style="text-align:center;"> <input type="checkbox"></td>
                            <td class="content">Móng băng 02 phương</td>
                            <td class="coefficient"> <input id="hs_mong_bang_2"  name="hs_mong_bang_2" value="0.6" class="item_editable use_area"></td>
                            <td class="amount"> <input id="dt_mong_bang_2" name="dt_mong_bang_2"  value="" class="item_editable use_area"></td>
                            <td class="item-total dt_mong_bang_2_item_total"></td>
                        </tr>
                        <tr>
                            <td style="text-align:center;"> <input type="checkbox"></td>
                            <td class="content">Móng bè</td>
                            <td class="coefficient"> <input id="hs_mong_be"  name="hs_mong_be" value="1" class="item_editable garden_area"></td>
                            <td class="amount"> <input id="dt_mong_be" name="dt_mong_be"  value="" class="item_editable garden_area"></td>
                            <td class="item-total dt_mong_be_item_total"></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold; background-color: rgb(243, 243, 243);"></td>
                            <td colspan="4" style="font-weight: bold; background-color: rgb(243, 243, 243);">Mái</td>
                        </tr>
                        <tr>
                            <td style="text-align:center;"> <input type="checkbox"></td>
                            <td class="content">Sân thượng (không mái che)</td>
                            <td class="coefficient"> <input id="hs_san_thuong"  name="hs_san_thuong" value="0.3" class="item_editable use_area"></td>
                            <td class="amount"> <input id="dt_san_thuong" name="dt_san_thuong"  value="" class="item_editable use_area"></td>
                            <td class="item-total dt_san_thuong_item_total"></td>
                        </tr>
                        <tr>
                            <td style="text-align:center;"> <input type="checkbox"></td>
                            <td class="content">Mái nghiêng (đã tính ngói)</td>
                            <td class="coefficient"> <input id="hs_mai_nghieng"  name="hs_mai_nghieng" value="0.9" class="item_editable garden_area"></td>
                            <td class="amount"> <input id="dt_mai_nghieng" name="dt_mai_nghieng"  value="" class="item_editable garden_area"></td>
                            <td class="item-total dt_mai_nghieng_item_total"></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold; background-color: rgb(243, 243, 243);"></td>
                            <td colspan="4" style="font-weight: bold; background-color: rgb(243, 243, 243);">Hầm</td>
                        </tr>
                        <tr>
                            <td style="text-align:center;"> <input type="checkbox"></td>
                            <td class="content">Hầm sâu từ 1.0 m đến 1.3 m</td>
                            <td class="coefficient"> <input id="hs_ham_sau_13"  name="hs_ham_sau_13" value="1.5" class="item_editable use_area"></td>
                            <td class="amount"> <input id="dt_ham_sau_13" name="dt_ham_sau_13"  value="" class="item_editable use_area"></td>
                            <td class="item-total dt_ham_sau_13_item_total"></td>
                        </tr>
                        <tr>
                            <td style="text-align:center;"> <input type="checkbox"></td>
                            <td class="content">Hầm sâu từ 1.3 m đến 1.7 m</td>
                            <td class="coefficient"> <input id="hs_ham_sau_17"  name="hs_ham_sau_17" value="1.7" class="item_editable garden_area"></td>
                            <td class="amount"> <input id="dt_ham_sau_17" name="dt_ham_sau_17"  value="" class="item_editable garden_area"></td>
                            <td class="item-total dt_ham_sau_17_item_total"></td>
                        </tr>
                        <tr>
                            <td style="text-align:center;"> <input type="checkbox"></td>
                            <td class="content">Hầm sâu từ 1.7m đến 2.0m</td>
                            <td class="coefficient"> <input id="hs_ham_sau_20"  name="hs_ham_sau_20" value="2" class="item_editable use_area"></td>
                            <td class="amount"> <input id="dt_ham_sau_20" name="dt_ham_sau_20"  value="" class="item_editable use_area"></td>
                            <td class="item-total dt_ham_sau_20_item_total"></td>
                        </tr>
                        <tr>
                            <td style="text-align:center;"> <input type="checkbox"></td>
                            <td class="content">Hầm sâu lớn hơn 2 mét</td>
                            <td class="coefficient"> <input id="hs_ham_sau_hon_2m"  name="hs_ham_sau_hon_2m" value="2.5" class="item_editable garden_area"></td>
                            <td class="amount"> <input id="dt_ham_sau_hon_2m" name="dt_ham_sau_hon_2m"  value="" class="item_editable garden_area"></td>
                            <td class="item-total dt_ham_sau_hon_2m_item_total"></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold; background-color: rgb(243, 243, 243);"></td>
                            <td colspan="4" style="font-weight: bold; background-color: rgb(243, 243, 243);">Độ cao tầng</td>
                        </tr>
                        <tr>
                            <td style="text-align:center;"> <input type="checkbox"></td>
                            <td class="content">Từ tầng 04 – tầng 05</td>
                            <td class="coefficient"> <input id="hs_5_tang"  name="hs_5_tang" value="1.2" class="item_editable use_area"></td>
                            <td class="amount"> <input id="dt_5_tang" name="dt_5_tang"  value="" class="item_editable use_area"></td>
                            <td class="item-total dt_5_tang_item_total"></td>
                        </tr>
                        <tr>
                            <td style="text-align:center;"> <input type="checkbox"></td>
                            <td class="content">Từ tầng 06 – tầng 09</td>
                            <td class="coefficient"> <input id="hs_9_tang"  name="hs_9_tang" value="1.5" class="item_editable garden_area"></td>
                            <td class="amount"> <input id="dt_9_tang" name="dt_9_tang"  value="" class="item_editable garden_area"></td>
                            <td class="item-total dt_9_tang_item_total"></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold; background-color: rgb(243, 243, 243);"></td>
                            <td colspan="4" style="font-weight: bold; background-color: rgb(243, 243, 243);">Địa điểm</td>
                        </tr>
                        <tr>
                            <td style="text-align:center;"> <input type="checkbox"></td>
                            <td class="content">Công trình trong hẻm &lt;5.5m</td>
                            <td class="coefficient"> <input id="hs_cong_trinh_hem"  name="hs_cong_trinh_hem" value="0.05" class="item_editable use_area"></td>
                            <td class="amount"> <input id="dt_cong_trinh_hem"  name="dt_cong_trinh_hem" value="" class="item_editable use_area"></td>
                            <td class="item-total dt_cong_trinh_hem_item_total"></td>
                        </tr>
                        <tr>
                            <td style="text-align:center;"> <input type="checkbox"></td>
                            <td class="content">Công trình ngoài tỉnh</td>
                            <td class="coefficient"> <input id="hs_cong_trinh_tinh"  name="hs_cong_trinh_tinh" value="0.1" class="item_editable garden_area"></td>
                            <td class="amount"> <input id="dt_cong_trinh_tinh" name="dt_cong_trinh_tinh"  value="" class="item_editable garden_area"></td>
                            <td class="item-total dt_cong_trinh_tinh_item_total"></td>
                        </tr>
                        <tr>
                            <td style="text-align:center;"> <input type="checkbox"></td>
                            <td class="content" style="font-weight: bold; background-color: rgb(243, 243, 243);"> Tầng lửng</td>
                            <td class="coefficient"> <input id="hs_tang_lung"  name="hs_tang_lung" value="0.4" class="item_editable garden_area"></td>
                            <td class="amount"> <input id="dt_tang_lung" name="dt_tang_lung"  value="" class="item_editable garden_area"></td>
                            <td class="item-total dt_tang_lung_item_total"></td>
                        </tr>
                        <tr class="vat_row_pt">
                            <td colspan="4" class="center sum">TỔNG</td>
                            <td id="tong_phan_tho" class="item-total sum sub_total_phan_tho"></td>
                        </tr>
                        </tbody>
                    </table>
                    <br>
                    <p></p>
                    <table class="price" id="hoanthien">
                        <tbody>
                        <tr>
                            <th class="check"></th>
                            <th class="content">HOÀN THIỆN</th>
                            <th class="unit">Hệ số</th>
                            <th class="amount">Diện tích</th>
                            <th class="item-total">Thành tiền</th>
                        </tr>
                        <tr>
                            <td style="text-align:center;"> <input type="checkbox"></td>
                            <td class="content">Sàn gỗ tự nhiên</td>
                            <td class="coefficient"> <input id="hs_san_go"  name="hs_san_go" value="0.4" class="item_editable use_area"></td>
                            <td class="amount"> <input id="dt_san_go" name="dt_san_go"  value="" class="item_editable use_area"></td>
                            <td class="item-total san_go_item_total"></td>
                        </tr>
                        <tr>
                            <td style="text-align:center;"> <input type="checkbox"></td>
                            <td class="content">Gạch Vietceramic</td>
                            <td class="coefficient"> <input id="hs_gach"  name="hs_gach" value="0.4" class="item_editable garden_area"></td>
                            <td class="amount"> <input id="dt_gach" name="dt_gach"  value="" class="item_editable garden_area"></td>
                            <td class="item-total gach_item_total"></td>
                        </tr>
                        <tr>
                            <td style="text-align:center;"> <input type="checkbox"></td>
                            <td class="content">Cửa nhôm Newzealand</td>
                            <td class="coefficient"> <input id="hs_cuanhom"  name="hs_cuanhom" value="0.5" class="item_editable use_area"></td>
                            <td class="amount"> <input id="dt_cuanhom" name="dt_cuanhom"  value="" class="item_editable use_area"></td>
                            <td class="item-total cua_nhom_item_total"></td>
                        </tr>
                        <tr>
                            <td style="text-align:center;"> <input type="checkbox"></td>
                            <td class="content">Trần gỗ, MDF trang trí</td>
                            <td class="coefficient"> <input id="hs_tran_go"  name="hs_tran_go" value="0.4" class="item_editable garden_area"></td>
                            <td class="amount"> <input id="dt_tran_go" name="dt_tran_go"  value="" class="item_editable garden_area"></td>
                            <td class="item-total tran_go_item_total"></td>
                        </tr>
                        <tr>
                            <td style="text-align:center;"> <input type="checkbox"></td>
                            <td class="content">Mái gara, sân thượng</td>
                            <td class="coefficient"> <input id="hs_mai_gara"  name="hs_mai_gara" value="0.5" class="item_editable use_area"></td>
                            <td class="amount"> <input id="dt_mai_gara" name="dt_mai_gara"  value="" class="item_editable use_area"></td>
                            <td class="item-total mai_gara_item_total"></td>
                        </tr>
                        <tr>
                            <td style="text-align:center;"> <input type="checkbox"></td>
                            <td class="content">Tường gạch trang trí</td>
                            <td class="coefficient"> <input id="hs_tuong_gach"  name="hs_tuong_gach" value="0.4" class="item_editable garden_area"></td>
                            <td class="amount"> <input id="dt_tuong_gach" name="dt_tuong_gach"  value="" class="item_editable garden_area"></td>
                            <td class="item-total tuong_gach_item_total"></td>
                        </tr>
                        <tr>
                            <td style="text-align:center;"> <input type="checkbox"></td>
                            <td class="content">Tường đá tự nhiên</td>
                            <td class="coefficient"> <input id="hs_tuong_da"  name="hs_tuong_da" value="0.7" class="item_editable use_area"></td>
                            <td class="amount"> <input id="dt_tuong_da" name="dt_tuong_da"  value="" class="item_editable use_area"></td>
                            <td class="item-total dt_tuong_da_item_total"></td>
                        </tr>
                        <tr>
                            <td style="text-align:center;"> <input type="checkbox"></td>
                            <td class="content">Hồ bơi – Hồ cá koi</td>
                            <td class="coefficient"> <input id="hs_hoboi"  name="hs_hoboi" value="1.5" class="item_editable garden_area"></td>
                            <td class="amount"> <input id="dt_hoboi" name="dt_hoboi"  value="" class="item_editable garden_area"></td>
                            <td class="item-total dt_hoboi_item_total"></td>
                        </tr>
                        <tr>
                            <td style="text-align:center;"> <input type="checkbox"></td>
                            <td class="content">Cửa lưới chống muỗi</td>
                            <td class="coefficient"> <input id="hs_cuoi_luoi"  name="hs_cuoi_luoi" value="0.2" class="item_editable use_area"></td>
                            <td class="amount"> <input id="dt_cuoi_luoi" name="dt_cuoi_luoi"  value="" class="item_editable use_area"></td>
                            <td class="item-total dt_cuoi_luoi_item_total"></td>
                        </tr>
                        <tr class="vat_row_ht">
                            <td colspan="4" class="center sum">TỔNG</td>
                            <td id="tong_hoan_thien" class="item-total sum sub_total_hoan_thien"></td>
                        </tr>
                        </tbody>
                    </table>
                    <br>
                    <table class="price" id="hangmuckhac">
                        <tbody>
                        <tr>
                            <th class="check"></th>
                            <th class="content" style="width: 23%;">Hạng mục không tính theo hệ số</th>
                            <th class="unit">ĐVT</th>
                            <th class="unit">Số lượng</th>
                            <th class="amount">Đơn giá</th>
                            <th class="item-total">Thành tiền</th>
                        </tr>
                        <tr>
                            <td style="text-align:center;"> <input type="checkbox"></td>
                            <td class="content">Điều hòa trung tâm</td>
                            <td class="content" style="text-align:center;">Bộ</td>
                            <td class="coefficient"> <input id="sl_dieu_hoa_tt"  name="sl_dieu_hoa_tt" value="" class="item_editable use_area"></td>
                            <td class="amount"> <input id="dg_dieu_hoa_tt" name="dg_dieu_hoa_tt"  value="" class="item_editable use_area"></td>
                            <td class="item-total dieu_hoa_tt_item_total"></td>
                        </tr>
                        <tr>
                            <td style="text-align:center;"> <input type="checkbox"></td>
                            <td class="content">Hệ thống thông minh</td>
                            <td class="content" style="text-align:center;">Bộ</td>
                            <td class="coefficient"> <input id="sl_he_thong_tm"  name="sl_he_thong_tm" value="" class="item_editable garden_area"></td>
                            <td class="amount"> <input id="dg_he_thong_tm" name="dg_he_thong_tm"  value="" class="item_editable garden_area"></td>
                            <td class="item-total he_thong_tm_item_total"></td>
                        </tr>
                        <tr>
                            <td style="text-align:center;"> <input type="checkbox"></td>
                            <td class="content">Xông hơi</td>
                            <td class="content" style="text-align:center;">35tr/p</td>
                            <td class="coefficient"> <input id="sl_xong_hoi"  name="sl_xong_hoi" value="" class="item_editable use_area"></td>
                            <td class="amount"> <input id="dg_xong_hoi" name="dg_xong_hoi"  value="" class="item_editable use_area"></td>
                            <td class="item-total xong_hoi_item_total"></td>
                        </tr>
                        <tr>
                            <td style="text-align:center;"> <input type="checkbox"></td>
                            <td class="content">TBVS Toto, inax</td>
                            <td class="content" style="text-align:center;">35tr/p</td>
                            <td class="coefficient"> <input id="sl_tbvs_toto"  name="sl_tbvs_toto" value="" class="item_editable garden_area"></td>
                            <td class="amount"> <input id="dg_tbvs_toto" name="dg_tbvs_toto"  value="" class="item_editable garden_area"></td>
                            <td class="item-total tbvs_toto_item_total"></td>
                        </tr>
                        <tr>
                            <td style="text-align:center;"> <input type="checkbox"></td>
                            <td class="content">TBVS Bravat</td>
                            <td class="content" style="text-align:center;">70tr/p</td>
                            <td class="coefficient"> <input id="sl_tbvs_bravat"  name="sl_tbvs_bravat" value="" class="item_editable use_area"></td>
                            <td class="amount"> <input id="dg_tbvs_bravat" name="dg_tbvs_bravat"  value="" class="item_editable use_area"></td>
                            <td class="item-total tbvs_bravat_item_total"></td>
                        </tr>
                        <tr class="vat_row_khac">
                            <td colspan="5" class="center sum">TỔNG</td>
                            <td id="tong_danh_muc_khac" class="item-total sum sub_total_danh_muc_khac"></td>
                        </tr>
                        </tbody>
                    </table>
                    <br>
                    <table class="table table-bordered price" style="width:100%;">
                        <tbody>
                        <tr>
                            <th> <span><strong>HOÀN THIỆN</strong></span></th>
                            <th colspan="3"> <span><strong>DIỄN GIẢI VẬT LIỆU</strong></span></th>
                        </tr>
                        <tr>
                            <td colspan="4" style="font-weight: bold; background-color: rgb(243, 243, 243);"> <span><strong>Gạch</strong></span></td>
                        </tr>
                        <tr>
                            <td><span>Kimgress</span></td>
                            <td colspan="3"> <span id="A62YE4DR">A62YE4DR</span>, <span id="AJ62AAF1DR">AJ62AAF1DR</span>, <span id="A59JN4LOOL">A59JN4LOOL</span>, <span id="A59JNADOOL">A59JNADOOL</span>, <span id="A80GQ1L">A80GQ1L</span>, <span id="A80GQ1D">A80GQ1D</span>, <span id="AJ80ACT4DR">AJ80ACT4DR</span>, <span id="A59TV1DOOL">A59TV1DOOL</span>, <span id="A59TK1D">A59TK1D</span></td>
                        </tr>
                        <tr>
                            <td><span>Eurotile</span></td>
                            <td colspan="3"> <span id="M01-M06">M01-M06 MMI</span>, <span id="DAS">DAS D01 - 02</span>, <span id="PHS">PHS G01</span>, <span id="LTH">LTH D02 - 03 – 04</span>, <span id="VOC">VOC 01 – 03</span>, <span id="NGC">NGC 01 – 03</span>, <span id="MOL">MOL 01 – 02 – 03 – 04 - 05</span></td>
                        </tr>
                        <tr>
                            <td> <span>Ceramic</span></td>
                            <td colspan="3"> <span id="75LVBL">75LVBL - 612GT748039</span>, <span id="TIPOSSIL">TIPOSSIL – OCE60120</span>, <span id="612H2LA">612H2LA – WILA</span>, <span id="16TAMEBLA">16TAMEBLA</span>, <span id="75150BVCO">75150BVCO</span>, <span id="75150MAGR">75150MAGR</span>, <span id="1224MVAC">1224MVAC</span></td>
                        </tr>
                        <tr>
                            <td colspan="4" style="font-weight: bold; background-color: rgb(243, 243, 243);"> <span><strong>Sàn gỗ</strong></span></td>
                        </tr>
                        <tr>
                            <td> <span>Gỗ tự nhiên</span></td>
                            <td colspan="3"> <span id="CAS3444SU">CAS3444SU</span>, <span id="CAS1356SU">CAS1356SU</span>, <span id="IMP1624SU">IMP1624SU</span></td>
                        </tr>
                        <tr>
                            <td> <span>Gỗ công nghiệp</span></td>
                            <td colspan="3"> <span id="IMU1849">IMU1849</span>, <span id="IMU1848">IMU1848</span>, <span id="IMU1860">IMU1860</span>, <span id="IMU3439">IMU3439</span> , <span id="IMU1854">IMU1854</span>, <span id="IMU1855">IMU1855</span>, <span id="D4495CM">D4495CM</span></td>
                        </tr>
                        <tr>
                            <td colspan="4" style="font-weight: bold; background-color: rgb(243, 243, 243);"> <span><strong>Đá ốp lát</strong></span></td>
                        </tr>
                        <tr>
                            <td> <span>Đá tự nhiên</span></td>
                            <td colspan="3"> <span id="Volakas">Volakas</span>, <span id="tiachop">tia chớp</span>, <span id="Polaris">Polaris</span>, <span id="saobangxanh">Sao băng xanh</span>, <span id="Daino">Daino</span>, <span id="Wooden">Wooden beige</span>, <span id="trangvango">trắng vân gỗ</span>, <span id="trangxacu">trắng xà cừ</span></td>
                        </tr>
                        <tr>
                            <td> <span>Đá sân vườn</span></td>
                            <td colspan="3"> <span id="Bazan">Bazan khò</span>, <span id="bazannham">bazan nhám</span>, <span id="dasocdua">đá sọc dưa</span>, <span id="sathachkho">sa thạch khò</span>, <span id="tron">trơn</span></td>
                        </tr>
                        <tr>
                            <td colspan="4" style="font-weight: bold; background-color: rgb(243, 243, 243);"> <span><strong>Vật liệu trang trí mặt tiền</strong></span></td>
                        </tr>
                        <tr>
                            <td> <span>Conwood</span></td>
                            <td colspan="3"> <span id="88301">88301</span>, <span id="8325">8325</span>, <span id="8294">8294</span></td>
                        </tr>
                        <tr>
                            <td> <span>Biowood</span></td>
                            <td colspan="3"> <span id="LV10524">LV10524</span>, <span id="WPO24030">WPO24030</span>, <span id="WPO18033">WPO18033</span></td>
                        </tr>
                        <tr>
                            <td colspan="4" style="font-weight: bold; background-color: rgb(243, 243, 243);"> <span><strong>Sơn nước</strong></span></td>
                        </tr>
                        <tr>
                            <td> <span>Toa</span></td>
                            <td colspan="3"> <span id="8435">8435</span>, <span id="8294Toa">8294 Toa</span>, <span id="quycachtungthanh">quy cách từng thanh conwood</span></td>
                        </tr>
                        <tr>
                            <td> <span>Jotun</span></td>
                            <td colspan="3"></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold; background-color: rgb(243, 243, 243);"> <span><strong>TBVS</strong></span></td>
                            <td> <span id="lavabovoi">Lavabo + vòi</span></td>
                            <td> <span id="sentam">Sen tắm</span></td>
                            <td> <span id="boncau">Bồn cầu</span></td>
                        </tr>
                        <tr>
                            <td> <span>Bravat</span></td>
                            <td> <span id="22238W">C 22238W-1</span>, <span id="C22137W">C22137W-1-ENG</span>, <span id="F1761106">F1761106</span></td>
                            <td> <span id="F6277312CP">F6277312CP-A-ENG</span>, <span id="F856101C">F856101C-A-ENG</span></td>
                            <td> <span id="C2181UW">C2181UW-P-ENG</span>, <span id="C21176UWeng">C21176UW-ENG</span></td>
                        </tr>
                        <tr>
                            <td> <span>Toto</span></td>
                            <td colspan="3"> <span id="DLB301">DLB301 – BLB303</span>, <span id="TX4695QBR">TX4695QBR – TX4915Q</span>, <span id="TL953">TL953</span></td>
                        </tr>
                        <tr>
                            <td style="width:151px;"> <span>Caesar + Inax</span></td>
                            <td colspan="3"> <span id="B302C">B302C</span>, <span id="BFV">BFV – 285</span></td>
                        </tr>
                        </tbody>
                    </table>
                    <table class="table table-bordered price" style="width:100%;">
                        <tbody>
                        <tr>
                            <th colspan="2"> <span><strong>NỘI THẤT</strong></span></th>
                            <th> <span><strong>ĐVT</strong></span></th>
                            <th> <span><strong>DIỄN GIẢI</strong></span></th>
                            <th> <span><strong>SỐ PHÒNG</strong></span></th>
                            <th> <span><strong>THÀNH TIỀN</strong></span></th>
                        </tr>
                        <tr style="font-weight: bold; background-color: rgb(243, 243, 243);">
                            <td colspan="6"><span><strong>Phòng khách</strong></span></td>
                        </tr>
                        <tr>
                            <td style="text-align:center;"> <input type="checkbox"></td>
                            <td> <span>Loại 1</span></td>
                            <td> <span style="text-align:center;"> <input id="khach_loai_1"  name="khach_loai_1" value="70tr/p" class="item_editable use_area"> </span></td>
                            <td> <span>S = 20-30 m<sup>2</sup>: sofa, bàn, ghế thư giãn, kệ tivi, thảm</span></td>
                            <td><input id="dt_khach_loai_1"  name="dt_khach_loai_1" value="" class="item_editable use_area"></td>
                            <td><input id="tt_khach_loai_1"  name="tt_khach_loai_1" value="" class="item_editable use_area"></td>
                        </tr>
                        <tr>
                            <td style="text-align:center;"> <input type="checkbox"></td>
                            <td> <span>Loại 2</span></td>
                            <td> <span style="text-align:center;"> <input id="khach_loai_2"  name="khach_loai_2" value="100tr/p" class="item_editable use_area"></span></td>
                            <td> <span>S = 40-50 m<sup>2</sup>: loại 1 + kệ trang trí, vách gỗ trang trí</span></td>
                            <td><input id="dt_khach_loai_2"  name="dt_khach_loai_2" value="" class="item_editable use_area"></td>
                            <td><input id="tt_khach_loai_2"  name="tt_khach_loai_2" value="" class="item_editable use_area"></td>
                        </tr>
                        <tr style="font-weight: bold; background-color: rgb(243, 243, 243);">
                            <td colspan="6"> <span><strong>Phòng bếp</strong></span></td>
                        </tr>
                        <tr>
                            <td style="text-align:center;"> <input type="checkbox"></td>
                            <td> <span>Loại 1</span></td>
                            <td> <span style="text-align:center;"><input id="bep_loai_1"  name="bep_loai_1" value="100tr/p" class="item_editable use_area"></span></td>
                            <td> <span>S = 20-30 m<sup>2</sup>: bếp, đảo bếp, bàn ăn 6 người, đèn ăn, 5 món phụ kiện</span></td>
                            <td><input id="dt_bep_loai_1"  name="dt_bep_loai_1" value="" class="item_editable use_area"></td>
                            <td><input id="tt_bep_loai_1"  name="tt_bep_loai_1" value="" class="item_editable use_area"></td>
                        </tr>
                        <tr>
                            <td style="text-align:center;"> <input type="checkbox"></td>
                            <td style="width:102px;"> <span>Loại 2</span></td>
                            <td style="width:76px;"> <span style="text-align:center;"><input id="bep_loai_2"  name="bep_loai_2" value="150tr/p" class="item_editable use_area"></span></td>
                            <td style="width:217px;"> <span>S = 35-50 m<sup>2</sup>: loại 1 + tủ rượu, bàn ăn 10 người</span></td>
                            <td><input id="dt_bep_loai_2"  name="dt_bep_loai_2" value="" class="item_editable use_area"></td>
                            <td><input id="tt_bep_loai_2"  name="tt_bep_loai_2" value="" class="item_editable use_area"></td>
                        </tr>
                        <tr style="font-weight: bold; background-color: rgb(243, 243, 243);">
                            <td colspan="6"> <span><strong>Phòng ngủ</strong></span></td>
                        </tr>
                        <tr>
                            <td style="text-align:center;"> <input type="checkbox"></td>
                            <td style="width:102px;"> <span>Tiêu chuẩn</span></td>
                            <td style="width:76px;"> <span style="text-align:center;"><input id="ngu_tieu_chuan"  name="ngu_tieu_chuan" value="60tr/p" class="item_editable use_area"></span></td>
                            <td style="width:217px;"> <span>S = 20-25 m<sup>2</sup>: tủ áo &lt; 3md, giường 1m6, tap, bàn trang điểm, kệ tivi</span></td>
                            <td><input id="dt_ngu_tieu_chuan"  name="dt_ngu_tieu_chuan" value="" class="item_editable use_area"></td>
                            <td><input id="tt_ngu_tieu_chuan"  name="tt_ngu_tieu_chuan" value="" class="item_editable use_area"></td>
                        </tr>
                        <tr>
                            <td style="text-align:center;"> <input type="checkbox"></td>
                            <td style="width:102px;"> <span>Master</span></td>
                            <td style="width:76px;"> <span style="text-align:center;"><input id="ngu_master"  name="ngu_master" value="90tr/p" class="item_editable use_area"></span></td>
                            <td style="width:217px;"> <span>S = 30-40 m<sup>2</sup>: phòng tiêu chuẩn + phòng thay đồ, sofa thư giãn, giường bọc nệm</span></td>
                            <td><input id="dt_ngu_master"  name="dt_ngu_master" value="" class="item_editable use_area"></td>
                            <td><input id="tt_ngu_master"  name="tt_ngu_master" value="" class="item_editable use_area"></td>
                        </tr>
                        <tr>
                            <td style="text-align:center;"> <input type="checkbox"></td>
                            <td style="width:102px;"> <span>VIP</span></td>
                            <td style="width:76px;"> <span style="text-align:center;"><input id="ngu_vip"  name="ngu_vip" value="150tr/p" class="item_editable use_area"></span></td>
                            <td style="width:217px;"> <span>S = 45-70 m<sup>2</sup>: phòng master + phòng thay đồ lớn, bar mini, sofa</span></td>
                            <td><input id="dt_ngu_VIP"  name="dt_ngu_VIP" value="" class="item_editable use_area"></td>
                            <td><input id="tt_ngu_VIP"  name="tt_ngu_VIP" value="" class="item_editable use_area"></td>
                        </tr>
                        <tr>
                            <td style="text-align:center;"> <input type="checkbox"></td>
                            <td> <span><strong>Phòng SHC</strong></span></td>
                            <td style="width:76px;"> <span style="text-align:center;"><input id="phong_shc"  name="phong_shc" value="50tr/p" class="item_editable use_area"></span></td>
                            <td style="width:217px;"> <span>Sofa, tap, kệ tivi, kệ trang trí, vách sau sofa</span></td>
                            <td><input id="dt_phong_shc"  name="dt_phong_shc" value="" class="item_editable use_area"></td>
                            <td><input id="tt_phong_shc"  name="tt_phong_shc" value="" class="item_editable use_area"></td>
                        </tr>
                        <tr style="font-weight: bold; background-color: rgb(243, 243, 243);">
                            <td colspan="6"> <span><strong>Phòng tắm</strong></span></td>
                        </tr>
                        <tr>
                            <td style="text-align:center;"> <input type="checkbox"></td>
                            <td style="width:102px;"> <span>Loại 1</span></td>
                            <td style="width:76px;"> <span style="text-align:center;"><input id="tam_1"  name="tam_1" value="10tr/p" class="item_editable use_area"></span></td>
                            <td style="width:217px;"> <span>Bệ lavabo &lt; 900mm, gương soi</span></td>
                            <td><input id="dt_tam_1"  name="dt_tam_1" value="" class="item_editable use_area"></td>
                            <td><input id="tt_tam_1"  name="tt_tam_1" value="" class="item_editable use_area"></td>
                        </tr>
                        <tr>
                            <td style="text-align:center;"> <input type="checkbox"></td>
                            <td style="width:102px;"> <span>Loại 2</span></td>
                            <td style="width:76px;"> <span style="text-align:center;"><input id="tam_2"  name="tam_2" value="20tr/p" class="item_editable use_area"></span></td>
                            <td style="width:217px;"> <span>Bệ lavabo dài &gt; 1m5, gương soi</span></td>
                            <td><input id="dt_tam_2"  name="dt_tam_2" value="" class="item_editable use_area"></td>
                            <td><input id="tt_tam_2"  name="tt_tam_2" value="" class="item_editable use_area"></td>
                        </tr>
                        <tr>
                            <td style="text-align:center;"> <input type="checkbox"></td>
                            <td> <span><strong>Giặt phơi</strong></span></td>
                            <td> <span style="text-align:center;"><input id="p_giat_phoi"  name="p_giat_phoi" value="30tr/p" class="item_editable use_area"></span></td>
                            <td> <span>Hệ tủ cửa đóng kín, bệ giặt tay, thanh treo di động</span></td>
                            <td><input id="dt_giat_phoi"  name="dt_giat_phoi" value="" class="item_editable use_area"></td>
                            <td><input id="tt_giat_phoi"  name="tt_giat_phoi" value="" class="item_editable use_area"></td>
                        </tr>
                        <tr>
                            <td style="text-align:center;"> <input type="checkbox"></td>
                            <td style="width:102px;"> <span><strong>Phòng thờ</strong></span></td>
                            <td style="width:76px;"> <span style="text-align:center;"><input id="p_tho"  name="p_tho" value="60tr/p" class="item_editable use_area"></span></td>
                            <td style="width:217px;"> <span>Tủ thờ 2 tầng, vách CNC 2 bên, vách sau bàn thờ</span></td>
                            <td><input id="dt_phong_tho"  name="dt_phong_tho" value="" class="item_editable use_area"></td>
                            <td><input id="tt_phong_tho"  name="tt_phong_tho" value="" class="item_editable use_area"></td>
                        </tr>
                        <tr class="vat_row_pt">
                            <td colspan="5" class="center sum">TỔNG</td>
                            <td><strong><input id="tong_noi_that" type="text" style="border: none; text-align:center;"></strong></td>
                        </tr>
                        </tbody>
                    </table>
                    <table class="table" style="margin-bottom:0;">
                        <tbody>
                        <tr>
                            <td style="width: 50%;border: none;">
                                <strong>CHI TIẾT VẬT LIỆU:</strong>
                                <ul style="padding-left: 15px;margin-bottom: 0;">
                                    <li style="list-style-type: inherit;">Gỗ nội thất: MDF An Cường</li>
                                    <li style="list-style-type: inherit;">Bếp Acrylic, đá quầy bar, đá bệ lavabo</li>
                                    <li style="list-style-type: inherit;">Cửa phòng ngủ: MDF An Cường</li>
                                </ul>
                            </td>
                            <td style="border: none;">
                                <strong>&nbsp;</strong>
                                <ul style="padding-left: 15px;">
                                    <li style="list-style-type: inherit;">Phụ kiện bản lề, nêm giảm chấn: Blum, Cariny.</li>
                                    <li style="list-style-type: inherit;">Màn rèm: Nhập khẩu</li>
                                    <li style="list-style-type: inherit;">Sofa, nệm thư giãn: Vải Acasia, Simili.</li>
                                </ul>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <ul>
                        <li> <em>Đơn giá nội thất chỉ là tạm tính theo vật liệu cơ bản, tùy theo yêu cầu vật liệu của chủ đầu tư</em></li>
                        <li> <em>Đơn giá trên chưa bao gồm: Thiết bị gia dụng như bếp nấu chậu rửa, tủ lạnh, lò vi sóng, tivi, rèm màn, chăn ga gối đệm, tranh, thảm và đồ decor trên kệ, đèn chùm trang trí, đèn để bàn.</em></li>
                        <li> <em>Bảng khái toán này chênh lệch &lt; 5% so với bảng báo giá chi tiết</em></li>
                    </ul>
                    <table class="table table-bordered price" style="width:100%;">
                        <tbody>
                        <tr>
                            <th> <span style="text-align: center;"><strong>NỘI THẤT</strong></span> <span></span></th>
                            <th colspan="4"> <span style="text-align:center;"><strong>DIỄN GIẢI VẬT LIỆU</strong></span></th>
                        </tr>
                        <tr style="font-weight: bold; background-color: rgb(243, 243, 243);">
                            <td colspan="5"> <span><strong>Ván gỗ an cường</strong></span></td>
                        </tr>
                        <tr>
                            <td> <span>Laminate</span></td>
                            <td colspan="4"> <span id="LK1121">LK1121</span></td>
                        </tr>
                        <tr>
                            <td> <span>Melamine</span></td>
                            <td colspan="4"> <span id="230S">230S</span>, <span id="230NV">230NV</span>, <span id="201PL">201PL</span>, <span id="230T">230T</span>, <span id="430BT">430BT</span>, <span id="338PL">338PL</span>, <span id="101T">101T</span>, <span id="333PL">333PL</span>, <span id="Verneer">Verneer sồi</span></td>
                        </tr>
                        <tr>
                            <td> <span>Acrylic</span></td>
                            <td colspan="4"> <span id="PARC87">PARC87</span>, <span id="PARC54">PARC54</span>, <span id="EARC16">EARC16</span>, <span id="EARC32">EARC32</span>, <span id="996NV">996NV</span>, <span id="446FR">446FR</span>, <span id="998EL">998EL</span></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold; background-color: rgb(243, 243, 243);" width="15%"> <span><strong>Thiết bị bếp</strong></span></td>
                            <td> <span id="chauvavoi">Chậu rửa và vòi</span></td>
                            <td> <span id="bep">Bếp</span></td>
                            <td> <span id="lovisong">Lò vi sóng – Lò nướng</span></td>
                            <td> <span id="hutmui">Hút mùi</span></td>
                        </tr>
                        <tr>
                            <td> <span>Hafele</span></td>
                            <td colspan="4"> <span></span></td>
                        </tr>
                        <tr>
                            <td> <span>Malloca</span></td>
                            <td> <span id="K-50040">NERO K-50040</span>, <span id="MF-040knero">MF-040 NERO K-45040</span>, <span id="MF-040">MF-040</span></td>
                            <td> <span id="HIH-864">HIH-864</span>, <span id="MH-03IRB">MH-03IRB S</span>, <span id="MH-04IR">MH-04IR S</span>, <span id="MI732SL">MI 732 SL</span></td>
                            <td> <span id="mwlx12">MW-LX12 , MOV-LX12</span> <span id="MW-927DE">MW-927DE, MOV-65DE</span></td>
                            <td> <span id="JOINT">JOINT-I900A, THETA K152</span> <span id="MC-9053">MC-9053 ISLA, LIFT-K6008</span></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold; background-color: rgb(243, 243, 243);"> <span><strong>Phụ kiện bếp</strong></span></td>
                            <td colspan="4"> <span></span></td>
                        </tr>
                        <tr>
                            <td> <span>Hafele</span></td>
                            <td colspan="4"> <span></span></td>
                        </tr>
                        <tr>
                            <td> <span>Garis</span></td>
                            <td colspan="4"> <span></span></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold; background-color: rgb(243, 243, 243);"> <span><strong>Đá bếp + đảo</strong></span></td>
                            <td colspan="4"> <span id="denkimsa">Đen kim sa</span>, <span id="denando">đen ấn độ</span>, <span id="trangsu">trắng sứ</span></td>
                        </tr>
                        </tbody>
                    </table>
                    <table class="table table-bordered price" style="width:100%;">
                        <tbody>
                        <tr>
                            <td class="no_included_vat_note_chua_vat" style="font-weight: bold; background-color: rgb(243, 243, 243);"> <span><strong>TỔNG GIÁ TRỊ THANH TOÁN (VNĐ)</strong></span></td>
                            <td class="no_included_vat_note_co_vat" style="display: none;"> <span><strong>TỔNG CÁC HẠNG MỤC</strong></span></td>
                            <td style="text-align: right; font-weight:bold;" id="tong_bang_so"></td>
                        </tr>
                        <tr class="vat_row" style="display: none;">
                            <td class="sum">THUẾ VAT (10%)</td>
                            <td style="text-align: right;" id="thueSumAll" class="item-total sum vat_total_hang_muc"></td>
                        </tr>
                        <tr class="vat_row" style="display: none;">
                            <td class="sum" style="font-weight: bold; background-color: rgb(243, 243, 243);">TỔNG GIÁ TRỊ THANH TOÁN (VNĐ)</td>
                            <td style="text-align: right;" id="tong_tat_ca_hang_muc" class="item-total sum sub_total_hang_muc"></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center;"> Bằng chữ: <input id="don_gia_tk_chinh" class="item_editable use_area w-75 text-left" name="don_gia_tk_chinh" value="... đồng."></td>
                        </tr>
                        </tbody>
                    </table>
                    <p class="no_included_vat_note_chua_vat">Báo giá chưa bao gồm thuế GTGT (VAT) 10%.</p>
                    <p>Báo giá có giá trị đến hết ngày. <span class="valid_until_date idata" style="min-width: 150px;"><span id="giatriden">04 tháng 04 năm 2021.</span></span></p>
                    <br>
                    <table class="sign">
                        <tbody>
                        <tr>
                            <th width="50%">ĐẠI DIỆN BÊN A</th>
                            <th>ĐẠI DIỆN BÊN B</th>
                        </tr>
                        <tr>
                            <td><span>Chủ đầu tư hoặc người đại diện</span></td>
                            <td><span class="office_info_auto-position">Giám đốc</span></td>
                        </tr>
                        <tr>
                            <td height="150px"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><span>..................................</span></td>
                            <td><span class="office_info_auto-representative">PHẠM VĂN THÔNG</span></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>

@endsection
@section('custom-js')
    <script>
        function numberWithCommas(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
        $('.item_editable').on('change',function(){
            var tr = $(this).closest('tr')
            var val1 = parseFloat(tr.find('input').eq(1).val().replace(/,/g, ''))
            var val2 = parseInt(tr.find('input').eq(2).val())
            var total = numberWithCommas(val1*val2)
            total = total ? total : '000'
            tr.find('.item-total').text(total)
            //sum
            var array = [];

            var elements = tr.closest('tbody').find('.item-total')
            for(var i = 0; i < elements.length; i++) {
                var current = elements[i];
                if(current.children.length === 0 && current.textContent.replace(/ |\n/g,'') !== '') {
                    // Check the element has no children && that it is not empty
                    if(!Number.isNaN(parseFloat(current.textContent))){
                        array.push(parseFloat(current.textContent.replace(/,/g, '')));
                    }

                }
            }
            // console.log(array)
            var sum = array.reduce(myFunction);

            function myFunction(total, value) {
                return total + value;
            }

            tr.closest('tbody').find('.sum').text(numberWithCommas(sum))
        })
    </script>
@endsection
