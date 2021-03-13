@extends('layouts.report')

@section('content')
    <form method="post" action="" id="f-contract" name="f-contract">
        <div id="response" style="display:none;"></div>
        <div id="input">
            @include('prices.menu-left')
            <div id="inputdata">
                <p></p>
                <div class="form-group typeahead"> <input type="text" id="contract_code" name="contract_code" value="" class="form-control form-control-sm typeahead" data-type="" placeholder="Mã số hợp đồng" data-toggle="tooltip" title="" data-original-title="Mã số hợp đồng"></div>
                <div class="form-group ">
                    <select id="contract_type1" name="contract_type" class="form-control form-control-sm " data-toggle="tooltip" title="" onchange="loaiHDTC()" data-original-title="Loại hợp đồng">
                        <option value="0">--- Chọn loại hợp đồng ---</option>
                        <option value="tc_tron_goi">Thi công trọn gói</option>
                        <option value="tc_phan_tho">Thi công phần thô</option>
                        <option value="tc_hoan_thien">Thi công hoàn thiện</option>
                        <option value="tc_noi_that">Thi công nội thất</option>
                    </select>
                </div>
                <div class="form-group "> <input type="text" id="contract_price" name="contract_price" value="" class="form-control form-control-sm " data-type="money" placeholder="Giá trị hợp đồng (đồng)" data-toggle="tooltip" title="" data-original-title="Giá trị hợp đồng (đồng)"></div>
                <div class="form-group "> <input type="text" id="contract_signed_date" name="contract_signed_date" onchange="validatedate(this);" value="" class="form-control form-control-sm " data-type="date" placeholder="Ngày ký (dd/mm/yyyy)" data-toggle="tooltip" title="" data-original-title="Ngày ký (dd/mm/yyyy)"></div>
                <div class="form-group party_type_dn_show party_type_cn_hide" style="display: none;"> <input type="text" id="company_name" name="company_name" value="" class="form-control form-control-sm party_type_dn_show party_type_cn_hide" placeholder="Tên doanh nghiệp" data-toggle="tooltip" title="" style="display: none;" data-original-title="Tên doanh nghiệp"></div>
                <div class="form-group party_type_dn_show party_type_cn_hide" style="display: none;"><textarea id="company_address" name="company_address" class="form-control form-control-sm party_type_dn_show party_type_cn_hide" placeholder="Địa chỉ" data-toggle="tooltip" title="" style="display: none;" data-original-title="Địa chỉ"></textarea></div>
                <div class="form-group party_type_dn_show party_type_cn_hide" style="display: none;"> <input type="text" id="company_taxcode" name="company_taxcode" value="" class="form-control form-control-sm party_type_dn_show party_type_cn_hide" placeholder="Mã số thuế" data-toggle="tooltip" title="" style="display: none;" data-original-title="Mã số thuế"></div>
                <div class="form-group party_type_dn_show party_type_cn_hide" style="display: none;"> <input type="text" id="company_phone" name="company_phone" value="" class="form-control form-control-sm party_type_dn_show party_type_cn_hide" placeholder="Số điện thoại" data-toggle="tooltip" title="" style="display: none;" data-original-title="Số điện thoại"></div>
                <div class="form-group party_type_dn_show party_type_cn_hide" style="display: none;"> <input type="text" id="company_email" name="company_email" value="" class="form-control form-control-sm party_type_dn_show party_type_cn_hide" placeholder="Email" data-toggle="tooltip" title="" style="display: none;" data-original-title="Email"></div>
                <div class="form-group party_type_dn_show party_type_cn_hide" style="display: none;"> <input type="text" id="company_representative" name="company_representative" value="" class="form-control form-control-sm party_type_dn_show party_type_cn_hide" placeholder="Người đại diện" data-toggle="tooltip" title="" style="display: none;" data-original-title="Người đại diện"></div>
                <div class="form-group party_type_dn_show party_type_cn_hide" style="display: none;"> <input type="text" id="company_representative_position" name="company_representative_position" value="" class="form-control form-control-sm party_type_dn_show party_type_cn_hide" placeholder="Chức vụ" data-toggle="tooltip" title="" style="display: none;" data-original-title="Chức vụ"></div>
                <div class="form-group party_type_dn_hide party_type_cn_show"> <input type="text" id="party_name" name="party_name" value="" class="form-control form-control-sm party_type_dn_hide party_type_cn_show" placeholder="Tên khách hàng" data-toggle="tooltip" title="" data-original-title="Tên khách hàng"></div>
                <div class="form-group party_type_dn_hide party_type_cn_show"> <input type="text" id="party_yearofbirth" name="party_yearofbirth" value="" class="form-control form-control-sm party_type_dn_hide party_type_cn_show" placeholder="Năm sinh" data-toggle="tooltip" title="" data-original-title="Năm sinh"></div>
                <div class="form-group party_type_dn_hide party_type_cn_show"> <input type="text" id="party_id" name="party_id" value="" class="form-control form-control-sm party_type_dn_hide party_type_cn_show" placeholder="CMND/hộ chiếu/căn cước" data-toggle="tooltip" title="" data-original-title="CMND/hộ chiếu/căn cước"></div>
                <div class="form-group party_type_dn_hide party_type_cn_show"> <input type="text" id="party_id_provided_by" name="party_id_provided_by" value="" class="form-control form-control-sm party_type_dn_hide party_type_cn_show" placeholder="Nơi cấp" data-toggle="tooltip" title="" data-original-title="Nơi cấp"></div>
                <div class="form-group party_type_dn_hide party_type_cn_show"><textarea id="party_address" name="party_address" class="form-control form-control-sm party_type_dn_hide party_type_cn_show" placeholder="Địa chỉ liên hệ" data-toggle="tooltip" title="" data-original-title="Địa chỉ liên hệ"></textarea></div>
                <div class="form-group party_type_dn_hide party_type_cn_show"> <input type="text" id="party_phone" name="party_phone" value="" class="form-control form-control-sm party_type_dn_hide party_type_cn_show" placeholder="Số điện thoại" data-toggle="tooltip" title="" data-original-title="Số điện thoại"></div>
                <div class="form-group party_type_dn_hide party_type_cn_show"> <input type="text" id="party_email" name="party_email" value="" class="form-control form-control-sm party_type_dn_hide party_type_cn_show" placeholder="Email" data-toggle="tooltip" title="" data-original-title="Email"></div>
                <div class="form-group "><textarea id="building_address" name="building_address" class="form-control form-control-sm " placeholder="Địa chỉ công trình" data-toggle="tooltip" title="" data-original-title="Địa chỉ công trình"></textarea></div>
                <div class="form-group ">
                    <select id="building_type" name="building_type" class="form-control form-control-sm " data-toggle="tooltip" title="" onchange="buildingType()" data-original-title="Loại công trình">
                        <option value="0">--- Chọn loại công trình ---</option>
                        <option value="nha_pho">Nhà phố/nhà liên kế</option>
                        <option value="biet_thu">Biệt thự</option>
                        <option value="can_ho">Căn hộ/penthouse</option>
                        <option value="nha_hang_cafe">Bar, nhà hàng, cafe</option>
                        <option value="khach_san">Khách sạn</option>
                        <option value="resort">Resort</option>
                        <option value="office">Văn phòng</option>
                        <option value="building">Nhà cao tầng</option>
                    </select>
                </div>
                <div class="form-group "><textarea id="building_quymo" name="building_quymo" class="form-control form-control-sm " placeholder="Quy mô công trình" data-toggle="tooltip" title="" data-original-title="Quy mô công trình"></textarea></div>
                <div class="form-group "> <input type="text" id="contract_date_start" name="contract_date_start" onchange="validatedate(this);" value="" class="form-control form-control-sm " data-type="date" placeholder="Ngày khởi công (dd/mm/yyyy)" data-toggle="tooltip" title="" data-original-title="Ngày khởi công (dd/mm/yyyy)"></div>
                <div class="form-group "> <input type="text" id="contract_date_end" name="contract_date_end" onchange="validatedate(this);" value="" class="form-control form-control-sm " data-type="date" placeholder="Ngày hoàn thành (dd/mm/yyyy)" data-toggle="tooltip" title="" data-original-title="Ngày hoàn thành (dd/mm/yyyy)"></div>
                <div class="form-group "> <input type="text" id="contract_day" name="contract_day" value="" class="form-control form-control-sm " placeholder="Số ngày hoàn thành" data-toggle="tooltip" title="" data-original-title="Số ngày hoàn thành"></div>
                <div style="float:right"> <input type="checkbox" id="vat" name="vat" value="1"> VAT <button type="reset" class="btn">Reset</button> <button id="btn_print_hdtk" type="button" class="btn btn-info">Print</button></div>
            </div>
        </div>
        <div id="content">
            <div id="print-this">
                <p style="text-align: center;"><strong>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM <br> <span style="text-decoration: underline;">Độc lập - Tự do - Hạnh phúc</span> </strong></p>
                <p></p>
                <br>
                <h1 style="text-align:center;margin:0 0 20px;font-size:16px;"><strong>HỢP ĐỒNG THI CÔNG XÂY DỰNG CÔNG TRÌNH <br> Số: <span class="qr_code">...</span></strong></h1>
                <ul>
                    <li>Căn cứ luật Dân Sự, Thương Mại và Xây Dựng của nước CHXHCN Việt Nam hiện hành.</li>
                    <li>Căn cứ vào nhu cầu của chủ đầu tư và khả năng cung cấp dịch vụ của nhà thầu thi công.</li>
                    <li>Hôm nay, <span class="signed_date_auto">ngày 06 tháng 03 năm 2021</span>, chúng tôi gồm có:</li>
                </ul>
                <p><strong>BÊN A : BÊN GIAO THẦU </strong></p>
                <ul class="party_type_dn_hide party_type_cn_show">
                    <li><span class="idata" style="width: 49%;">Họ và tên: <span class="party_name"><span id="ngDaiDien"></span></span></span> <span class="idata" style="width: 50%;">- Năm sinh: <span class="party_yearofbirth"></span></span></li>
                    <li><span class="idata" style="width: 49%;">Số CMND/Hộ chiếu: <span class="party_id"></span></span> <span class="idata" style="width: 50%;">- Nơi cấp: <span class="party_id_provided_by"></span></span></li>
                    <li><span class="idata" style="width: 100%;">Địa chỉ: <span class="party_address"></span></span></li>
                    <li><span class="idata" style="width: 49%;">Số điện thoại: <span class="party_phone"></span></span> <span class="idata" style="width: 50%;">- Email: <span class="party_email"></span></span></li>
                </ul>
                <ul class="party_type_dn_show party_type_cn_hide" style="display:none;">
                    <li><span class="company_name idata" style="min-width: 562px;"></span></li>
                    <li>Đại diện: <span class="company_representative idata" style="min-width: 232px;"></span> - Chức vụ: <span class="company_representative_position idata" style="min-width: 189px;"></span></li>
                    <li>Địa chỉ: <span class="company_address idata" style="min-width: 508px;"></span></li>
                    <li>Mã số thuế: <span class="company_taxcode idata" style="min-width: 480px;"></span></li>
                    <li>Điện thoại: <span class="company_phone idata" style="min-width: 222px;"></span> - Email: <span class="company_email idata" style="min-width: 205px;"></span></li>
                </ul>
                <p><strong>BÊN B : BÊN NHẬN THẦU</strong></p>
                <ul>
                    <li><span class="idata" style="width: 16%; border-bottom: none;">Tên đơn vị</span><span>: </span><span class="office_info_auto-name">CÔNG TY CỔ PHẦN TƯ VẤN THIẾT KẾ &amp; XÂY DỰNG 81ART</span></li>
                    <li><span class="idata" style="width: 16%; border-bottom: none;">Đại diện</span><span>: </span><span class="office_info_auto-representative">Ông. LÊ QUANG TRUNG</span></li>
                    <li><span class="idata" style="width: 16%; border-bottom: none;">Chức vụ</span><span>: </span><span class="office_info_auto-position">Giám đốc</span></li>
                    <li><span class="idata" style="width: 16%; border-bottom: none;">Địa chỉ</span><span>: </span><span class="office_info_auto-address">29 Phú Xuân 2, Hòa Minh, Q. Liên chiểu, TP. Đà Nẵng</span></li>
                    <li><span class="idata" style="width: 16%; border-bottom: none;">Điện thoại</span><span>: </span><span class="office_info_auto-phone">0905.770.456</span></li>
                    <li><span class="idata" style="width: 16%; border-bottom: none;">Mã số thuế</span><span>: </span><span class="office_info_auto-tax_code">0401992979</span></li>
                    <li><span class="idata" style="width: 16%; border-bottom: none;">Số tài khoản</span><span>: </span><span class="office_info_auto-bank">99798868 - ACB Thanh Khê</span></li>
                </ul>
                <p>Hai bên thống nhất ký kết hợp đồng <span class="contract_type_auto-title">thi công trọn gói</span> công trình với các điều khoản cụ thể như sau:</p>
                <p><strong>ĐIỀU 1: QUY MÔ VÀ ĐỊA ĐIỂM XÂY DỰNG</strong></p>
                <ul>
                    <li>Công trình: <span class="building_type_auto-title idata" style="min-width: 524px;"></span></li>
                    <li>Cấu tạo công trình : Công trình xây dựng kiên cố, riêng lẻ.</li>
                    <li>Kết cấu : Móng, cột, sàn, mái bê tông cốt thép, tường gạch bao che.</li>
                    <li>Quy mô: <span class="building_type_auto-quymo idata" style="min-width: 541px;"><span id="quymo"></span></span></li>
                    <li>Địa điểm xây dựng: <span class="building_address idata" style="min-width: 468px;"></span></li>
                </ul>
                <p><strong>ĐIỀU 2: NỘI DUNG CÔNG VIỆC</strong></p>
                <p>Bên A giao khoán trọn gói phần thô và hoàn thiện và nội thất, theo Hồ sơ thiết kế cho Bên B thi công công trình nói trên. Chi tiết hạng mục và vật tư theo bảng phụ lục đính kèm.</p>
                <p><strong>ĐIỀU 3: THỜI GIAN THỰC HIỆN HỢP ĐỒNG</strong></p>
                <ul>
                    <li>- Ngày khởi công: <span class="building_date_start">...............</span></li>
                    <li>- Ngày hoàn thành: <span class="building_date_end">...............</span></li>
                    <li>- Công trình được hoàn thành sau: <span class="contract_day">........ </span> ngày kể từ ngày Bên B nhận bàn giao mặt bằng.</li>
                </ul>
                <ul>
                    <li>3.1. Trong trường hợp kéo dài thời hạn thi công do Bên A chậm bàn giao mặt bằng, chậm cung cấp vật tư hoặc do các trường hợp bất khả kháng theo quy định của Pháp luật như thiên tai, dịch họa thì hai bên sẽ bàn bạc và thống nhất lại tiến độ cho phù hợp.</li>
                    <li>3.2. Trong trường hợp có các yếu tố khách quan và bất khả kháng gây chậm tiến độ thì Bên B phải phát hành văn bản có xác nhận của giám sát Bên A để cùng nhau giải quyết, thời hạn thông báo và giải quyết sự cố sẽ không tính vào tiến độ thi công.</li>
                    <li>3.3. Mọi lý do chậm trễ khác, Bên B phải chịu phạt theo quy định 0.5% mỗi tuần trên giá trị của khối lượng bị kéo dài, nhưng không quá 5% tổng giá trị hợp đồng.</li>
                </ul>
                <p><strong>ĐIỀU 4: GIÁ TRỊ HỢP ĐỒNG VÀ PHƯƠNG THỨC THANH TOÁN</strong></p>
                <p>4.1. Tổng giá trị Hợp đồng (GTHĐ)</p>
                <p><strong>Giá trị dự toán thi công phần thô công trình : <span class="contract_price"></span> VNĐ.</strong></p>
                <p>(Bằng chữ: <span class="contract_price_word_auto"></span> đồng./.)</p>
                <p>Giá trị hợp đồng trên chưa bao gồm thuế GTGT (10%) và các loại thuế phí khác</p>
                <p>Chi tiết tính toán giá trị hợp đồng nêu trên theo Hồ sơ dự toán đính kèm</p>
                <ul>
                    4.2. Phương thức thanh toán: Bên A sẽ thanh toán cho Bên B bằng tiền mặt hoặc chuyển khoản theo các đợt như sau:
                    <ul class="payment_list_hdtg">
                        <li>Đợt 1: 20% GTHĐ sau khi ký kết hợp đồng .....</li>
                        <li>Đợt 2: 20% GTHĐ sau khi đổ bê tông sàn tầng 2 :....</li>
                        <li>Đợt 3: 20% GTHĐ sau khi hoàn thành xong công việc ốp lát hoàn thiện trong nhà:....</li>
                        <li>Đợt 4: 20% GTHĐ sau khi hoàn thành phần sơn và lắp đặt thiết bị vệ sinh, thiết bị đèn:....</li>
                        <li>Đợt 5: 10% GTHĐ sau khi tập kết vật tư nội thất tại chân công trình.....</li>
                        <li>Đợt 6: 10% GTHĐ sau khi hoàn thành và bàn giao toàn bộ công trình:</li>
                    </ul>
                    <li>Các khoản thanh toán trên sẽ được thực hiện trong vòng ba (03) ngày kể từ Ngày hoàn thành công đoạn thi công tương ứng và đã được Tư vấn giám sát xác nhận bằng biên bản nghiệm thu liên quan.</li>
                    <li>Nếu Bên A chậm thanh toán cho Bên B, cụ thể là quá bảy (07) ngày kể từ Ngày hoàn thành công đoạn thi công tương ứng mà không có cam kết cụ thể thì Bên B có quyền tạm ngưng thi công công trình.</li>
                    <li>Nếu Bên A chậm thanh toán cho Bên B, cụ thể là quá mười bốn (14) ngày kể từ Ngày hoàn thành công đoạn thi công tương ứng, Bên B có quyền đơn phương chấm dứt hợp đồng thi công theo quy định tại Điều 7.</li>
                </ul>
                <p><strong>ĐIỀU 5: VẬT TƯ – KỸ THUẬT</strong></p>
                <p>5.1. Bên B cung cấp toàn bộ vật tư, máy móc, công cụ dụng cụ thi công để thi công (chi tiết theo bảng phụ lục hợp đồng) đến tận công trình theo đúng yêu cầu của tiến độ thi công, quy cách kỹ thuật đã cam kết và đúng theo Hồ sơ thiết kế.</p>
                <table class="materials">
                    <tbody>
                    <tr>
                        <th width="50%">Vật tư thô</th>
                        <th>Chủng loại</th>
                    </tr>
                    <tr>
                        <td><span>Sắt thép</span></td>
                        <td><span>Hòa Phát, Việt Nhật</span></td>
                    </tr>
                    <tr>
                        <td><span>Xi măng</span></td>
                        <td><span>Kim đỉnh PC 40, sông gianh</span></td>
                    </tr>
                    <tr>
                        <td><span>Bê tông</span></td>
                        <td><span>Tươi của Công ty CP bê tông Đăng Hải</span></td>
                    </tr>
                    <tr>
                        <td><span>Vật liệu cấp thoát nước</span></td>
                        <td><span>Bình Minh, ống nhiệt, thay ống ruột gà bằng ống cứng</span></td>
                    </tr>
                    <tr>
                        <td><span>Gạch xây</span></td>
                        <td><span>Gạch tuynel 6 lỗ ( Đại Hiệp Trung, Điện Ngọc)</span></td>
                    </tr>
                    <tr>
                        <td><span>Cát xây</span></td>
                        <td><span>Túy Loan</span></td>
                    </tr>
                    <tr>
                        <td><span>Dây điện, ống luồn dây điện, dây cáp</span></td>
                        <td><span>Cadivi</span></td>
                    </tr>
                    <tr>
                        <th width="50%">Vật tư hoàn thiện</th>
                        <th>Chủng loại</th>
                    </tr>
                    <tr>
                        <td><span>Gạch ốp lát </span></td>
                        <td><span>Kingress nhập khẩu Malaysia</span></td>
                    </tr>
                    <tr>
                        <td><span>Sàn gỗ ốp phòng ngủ</span></td>
                        <td><span>Sàn gỗ Thaixin </span></td>
                    </tr>
                    <tr>
                        <td><span>Đá ốp sân vườn </span></td>
                        <td><span>Đá sa thạch </span></td>
                    </tr>
                    <tr>
                        <td><span>Đá ốp lát, trang trí</span></td>
                        <td><span>Đá granite Tự nhiên </span></td>
                    </tr>
                    <tr>
                        <td><span>Thạch cao</span></td>
                        <td><span>Khung nhôm Tika loại 1,Vĩnh Tường</span></td>
                    </tr>
                    <tr>
                        <td><span>Trần ban công, trần trang trí</span></td>
                        <td><span>conwood </span></td>
                    </tr>
                    <tr>
                        <td><span>Sơn nước</span></td>
                        <td><span>Sơn Toa nanoshield, JoTun</span></td>
                    </tr>
                    <tr>
                        <td><span>Thiết bị điện( công tắc ổ cắm, đèn led âm)</span></td>
                        <td><span>Panasonic</span></td>
                    </tr>
                    <tr>
                        <td><span>Thiết bị vệ sinh</span></td>
                        <td><span>TOTO, INAX</span></td>
                    </tr>
                    <tr>
                        <td><span>Thiết bị điều hòa</span></td>
                        <td><span>Daikin</span></td>
                    </tr>
                    <tr>
                        <td><span>Thiết bị bồn nước, máy năng lượng</span></td>
                        <td><span>Sơn Hà.</span></td>
                    </tr>
                    <tr>
                        <td><span>Máy bơm nước</span></td>
                        <td><span>Panasonic</span></td>
                    </tr>
                    <tr>
                        <td><span>Hệ thống cửa đi mặt tiền + cửa sổ</span></td>
                        <td><span>Nhôm xingfa nhập khẩu.</span></td>
                    </tr>
                    <tr>
                        <td><span>Mái thông tầng</span></td>
                        <td><span>Khung sắt sơn tĩnh điện, kính cường lực 8mm</span></td>
                    </tr>
                    <tr>
                        <td><span>Lan can cầu thang, mặt tiền</span></td>
                        <td><span>Kính cường lực 10mm + pas inox</span></td>
                    </tr>
                    <tr>
                        <th width="50%">Nội thất</th>
                        <th>Chủng loại</th>
                    </tr>
                    <tr>
                        <td><span>Gỗ nội thất </span></td>
                        <td><span>MDF chống ẩm nhập An Cường</span></td>
                    </tr>
                    <tr>
                        <td><span>Đá bếp, đá quầy bar, đá bệ lavabo</span></td>
                        <td><span>Granite tự nhiên kim sa, trắng sứ </span></td>
                    </tr>
                    <tr>
                        <td><span>Phụ kiện bản lề, nêm giảm chấn </span></td>
                        <td><span>Nhập khẩu</span></td>
                    </tr>
                    <tr>
                        <td><span>Màn rèm</span></td>
                        <td><span>Nhập khẩu </span></td>
                    </tr>
                    <tr>
                        <td><span>Màn rèm</span></td>
                        <td><span>Vải nhập khẩu</span></td>
                    </tr>
                    <tr>
                        <td><span>Hệ thống cửa p ngủ + cửa vệ sinh</span></td>
                        <td><span>MDF chống ẩm nhập An Cường </span></td>
                    </tr>
                    </tbody>
                </table>
                <br>
                <p>5.2. Bên B thi công đúng kỹ thuật, bảo đảm đúng theo yêu cầu của Hồ sơ thiết kế</p>
                <p>Thi công đúng cấp phối bê tông, phù hợp mác bê tông thiết kế.</p>
                <p>Cốt thép đúng bản vẽ, bố trí đúng vị trí, buộc đúng quy chuẩn.</p>
                <p>Lắp dựng và tháo dỡ cốt pha đúng quy định.</p>
                <p>Xây, tô hoàn thiện, ốp lát gạch đúng kỹ thuật.</p>
                <p>Khi chuẩn bị lấp các hệ thống ngầm, Bên B sẽ yêu cầu Bên A nghiệm thu trước.</p>
                <p><strong>ĐIỀU 6: QUYỀN VÀ NGHĨA VỤ CỦA CÁC BÊN</strong></p>
                <p><strong>6.1. Quyền và nghĩa vụ của Bên A:</strong></p>
                <p>Trong quá trình thi công nêu Bên B thay đổi công việc bổ sung thì phải tính phát sinh chi phí và thời gian cho bên B theo khối lượng đã phát sinh.</p>
                <p>Chịu trách nhiệm về quyền sở hữu nhà, đất, tranh chấp xây dựng....nếu có tranh chấp;</p>
                <p>Tạm ứng và thanh toán đúng theo Điều 4 của hợp đồng này;</p>
                <p>Có mặt khi cơ quan chức năng yêu cầu để cùng với Bên B giải quyết kịp thời các vướng mắc, tranh chấp (nếu có) trong suốt quá trình thi công;</p>
                <p>Bên A có trách nhiệm thông báo cho đơn vị thiết kế (nếu đơn vị thiết kế không phải là Bên B) và đơn vị giám sát có mặt để kiểm tra nghiệm thu các hạng mục công trình trước khi Bên B tiến hành các hạng mục tiếp theo;</p>
                <p><strong>6.2. Quyền và nghĩa vụ của Bên B</strong></p>
                <p>Trong quá trình thi công, mọi vấn đề liên quan đến kỹ thuật thi công không được gây ảnh hưởng đến kết cấu những nhà lân cận, nếu có sự cố xảy ra do lỗi của Bên B thì Bên B phải chịu trách nhiệm khắc phục hoặc bồi thường thiệt hại;</p>
                <p>Cử người có chuyên môn, có kinh nghiệm để làm chỉ huy trưởng, giám sát kỹ thuật thi công tại công trình và làm đầu mối liên lạc với Bên A trong suốt quá trình thực hiện hợp đồng;</p>
                <p>Tổ chức thi công bảo đảm chất lượng, đúng quy phạm kỹ thuật và đúng Hồ sơ thiết kế. Mọi sự thay đổi về thiết kế kiến trúc phải được sự đồng ý của Bên A;</p>
                <p>Tổ chức thi công bảo đảm an toàn lao động – có biện pháp che chắn bảo vệ công trình (Lưới bảo vệ an toàn), có biển báo đúng quy cách, tuân thủ yêu cầu phù hợp về an toàn lao động;</p>
                <p>Bên B có quyền chấm dứt hợp đồng nếu Bên A vi phạm nghĩa vụ thanh toán của mình theo Điều 4;</p>
                <p>Bên B có trách nhiệm mua bảo hiểm công trình trong quá trình thi công theo qui định của Nhà nước.</p>
                <p><strong>ĐIỀU 7: NGHIỆM THU CÔNG TRÌNH</strong></p>
                <p>7.1. Sau khi hoàn thành công trình, Bên B phải thông báo cho Bên A để tiến hành nghiệm thu. Thời điểm nghiệm thu sẽ do Bên B thông báo cho Bên A trong vòng 3 ngày.</p>
                <p>7.2. Mọi thủ tục nghiệm thu từng phần và nghiệm thu toàn bộ công trình nêu tại Điều này phải được thực hiện bằng văn bản và có chữ ký của hai bên.</p>
                <p>7.3. Nếu Bên A không có mặt theo yêu cầu của Bên B để nghiệm thu công trình như nêu tại Điều 7.4 thì công trình sẽ đương nhiên được coi là đã được Bên A nghiệm thu và các bên sẽ làm thủ tục bàn giao Công trình, thanh lý hợp đồng.</p>
                <p><strong>ĐIỀU 8: BẢO HÀNH VÀ BẢO TRÌ CÔNG TRÌNH</strong></p>
                <p>8.1. Bên B cam kết bảo hành kỹ thuật toàn bộ phần thô công trình, khắc phục những hư hỏng tự nhiên trong 01 năm kể từ ngày đưa vào sử dụng.</p>
                <p>8.2. Phạm vi bảo hành không bao gồm vật tư, các trang thiết bị hoàn thiện, các vật liệu trang trí hoặc phần sắt, gỗ các tác động bên ngoài do chấn động, mối, mọt hoặc tương tự.</p>
                <p><strong>ĐIỀU 9: CAM KẾT CHUNG</strong></p>
                <p>9.1. Văn bản sau đây là một phần đính kèm của hợp đồng này.</p>
                <p>Các phụ lục đính kèm theo hợp đồng này và Bản vẽ thiết kế.</p>
                <p>9.2. Hai bên cần chủ động thông báo cho nhau tiến độ thực hiện hợp đồng. Nếu có vấn đề gì bất lợi phát sinh, các bên phải kịp thời thông báo cho nhau biết để tích cực giải quyết. (Nội dung được ghi lại dưới hình thức biên bản).</p>
                <p>9.3. Mọi sự sửa đổi hay bổ sung vào hợp đồng này phải được sự đồng ý của cả hai bên và được lập thành văn bản mới có giá trị hiệu lực.</p>
                <p>9.4. Hợp đồng này có hiệu lực từ ngày ký cho đến khi hoàn tất việc thanh lý hợp đồng. Hợp đồng này được lập thành 04 bản, Bên A giữ 02 bản, Bên B giữ 02 bản có giá trị pháp lý như nhau.</p>
                <p>Hợp đồng đã được hai bên đọc lại lần cuối cùng và thống nhất với những nội dung đã ghi trong hợp đồng trước khi ký kết.</p>
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
                        <td><span class="office_info_auto-representative">LÊ QUANG TRUNG</span></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </form>
@endsection
