@extends('layouts.report')

@section('content')
    <form method="post" action="" id="f-contract" name="f-contract">
        <div id="response" style="display:none;"></div>
        <div id="input">
            @include('prices.menu-left')
            <div id="inputdata">
                <p></p>
                <div class="form-group typeahead"> <input type="text" id="contract_code" name="contract_code" value="" class="form-control form-control-sm typeahead" data-type="" placeholder="Mã số hợp đồng" data-toggle="tooltip" title="" data-original-title="Mã số hợp đồng"></div>
                <div class="form-group "> <input type="text" id="contract_price" name="contract_price" value="" class="form-control form-control-sm " data-type="money" placeholder="Giá trị hợp đồng (đồng)" data-toggle="tooltip" title="" data-original-title="Giá trị hợp đồng (đồng)"></div>
                <div class="form-group "> <input type="text" id="contract_signed_date" name="contract_signed_date" value="" class="form-control form-control-sm " data-type="date" placeholder="Ngày ký (dd/mm/yyyy)" data-toggle="tooltip" title="" data-original-title="Ngày ký (dd/mm/yyyy)"></div>
                <div class="form-group "> <input type="text" id="contract_day" name="contract_day" value="" class="form-control form-control-sm " placeholder="Số ngày hoàn thành" data-toggle="tooltip" title="" data-original-title="Số ngày hoàn thành"></div>
                <div class="form-group party_type_dn_show party_type_cn_hide" style="display: none;"> <input type="text" id="company_name" name="company_name" value="" class="form-control form-control-sm party_type_dn_show party_type_cn_hide" placeholder="Tên doanh nghiệp" data-toggle="tooltip" title="" style="display: none;" data-original-title="Tên doanh nghiệp"></div>
                <div class="form-group party_type_dn_show party_type_cn_hide" style="display: none;"><textarea id="company_address" name="company_address" class="form-control form-control-sm party_type_dn_show party_type_cn_hide" placeholder="Địa chỉ" data-toggle="tooltip" title="" style="display: none;" data-original-title="Địa chỉ"></textarea></div>
                <div class="form-group party_type_dn_show party_type_cn_hide" style="display: none;"> <input type="text" id="company_taxcode" name="company_taxcode" value="" class="form-control form-control-sm party_type_dn_show party_type_cn_hide" placeholder="Mã số thuế" data-toggle="tooltip" title="" style="display: none;" data-original-title="Mã số thuế"></div>
                <div class="form-group party_type_dn_show party_type_cn_hide" style="display: none;"> <input type="text" id="company_phone" name="company_phone" value="" class="form-control form-control-sm party_type_dn_show party_type_cn_hide" placeholder="Số điện thoại" data-toggle="tooltip" title="" style="display: none;" data-original-title="Số điện thoại"></div>
                <div class="form-group party_type_dn_show party_type_cn_hide" style="display: none;"> <input type="text" id="company_email" name="company_email" value="" class="form-control form-control-sm party_type_dn_show party_type_cn_hide" placeholder="Email" data-toggle="tooltip" title="" style="display: none;" data-original-title="Email"></div>
                <div class="form-group party_type_dn_show party_type_cn_hide" style="display: none;"> <input type="text" id="company_representative" name="company_representative" value="" class="form-control form-control-sm party_type_dn_show party_type_cn_hide" placeholder="Người đại diện" data-toggle="tooltip" title="" style="display: none;" data-original-title="Người đại diện"></div>
                <div class="form-group party_type_dn_show party_type_cn_hide" style="display: none;"> <input type="text" id="company_representative_position" name="company_representative_position" value="" class="form-control form-control-sm party_type_dn_show party_type_cn_hide" placeholder="Chức vụ" data-toggle="tooltip" title="" style="display: none;" data-original-title="Chức vụ"></div>
                <div class="form-group party_type_dn_hide party_type_cn_show"> <input type="text" id="party_name" name="party_name" value="" class="form-control form-control-sm party_type_dn_hide party_type_cn_show" placeholder="Tên khách hàng" data-toggle="tooltip" title="" data-original-title="Tên khách hàng"></div>
                <div class="form-group party_type_dn_hide party_type_cn_show"><textarea id="party_address" name="party_address" class="form-control form-control-sm party_type_dn_hide party_type_cn_show" placeholder="Địa chỉ liên hệ" data-toggle="tooltip" title="" data-original-title="Địa chỉ liên hệ"></textarea></div>
                <div class="form-group party_type_dn_hide party_type_cn_show"> <input type="text" id="party_phone" name="party_phone" value="" class="form-control form-control-sm party_type_dn_hide party_type_cn_show" placeholder="Số điện thoại" data-toggle="tooltip" title="" data-original-title="Số điện thoại"></div>
                <div class="form-group party_type_dn_hide party_type_cn_show"> <input type="text" id="party_email" name="party_email" value="" class="form-control form-control-sm party_type_dn_hide party_type_cn_show" placeholder="Email" data-toggle="tooltip" title="" data-original-title="Email"></div>
                <div style="float:right"> <input type="checkbox" id="vat" name="vat" value="1"> VAT <button type="reset" class="btn">Reset</button> <button id="btn_print_hdtk" type="button" class="btn btn-info">Print</button></div>
            </div>
        </div>
        <div id="content">
            <div id="print-this">
                <h1 style="text-align:center;margin:0 0 20px;font-size:26px;"><strong>HỢP ĐỒNG THI CÔNG NỘI THẤT</strong></h1>
                <p style="text-align: center;">Số: <span class="qr_code" id="contract_code">...</span></p>
                <p>Hôm nay, <span class="signed_date_auto">ngày 06 tháng 03 năm 2021</span>, chúng tôi gồm có:</p>
                <p><strong><span class="idata" style="width: 69%;">BÊN A: <span class="party_name"><span id="ngDaiDien"></span></span></span></strong> <span class="idata" style="width: 30%;">- Chức vụ: Chủ đầu tư</span></p>
                <ul class="party_type_dn_hide party_type_cn_show">
                    <li><span class="idata" style="width: 100%;">Địa chỉ: <span class="party_address"></span></span></li>
                    <li><span class="idata" style="width: 100%;">Số điện thoại: <span class="party_phone"></span></span></li>
                    <li><span class="idata" style="width: 100%;">Email: <span class="party_email"></span></span></li>
                </ul>
                <p><strong>BÊN B: <span class="office_info_auto-name">CÔNG TY CỔ PHẦN TƯ VẤN THIẾT KẾ &amp; XÂY DỰNG AZAR</span></strong></p>
                <ul>
                    <li><span class="idata" style="width: 16%; border-bottom: none;">Đại diện</span><span>: </span><span class="office_info_auto-representative">Ông. LÊ QUANG TRUNG</span></li>
                    <li><span class="idata" style="width: 16%; border-bottom: none;">Chức vụ</span><span>: </span><span class="office_info_auto-position">Giám đốc</span></li>
                    <li><span class="idata" style="width: 16%; border-bottom: none;">Địa chỉ</span><span>: </span><span class="office_info_auto-address">29 Phú Xuân 2, Hòa Minh, Q. Liên chiểu, TP. Đà Nẵng</span></li>
                    <li><span class="idata" style="width: 16%; border-bottom: none;">Điện thoại</span><span>: </span><span class="office_info_auto-phone">0905.770.456</span></li>
                    <li><span class="idata" style="width: 16%; border-bottom: none;">Mã số thuế</span><span>: </span><span class="office_info_auto-tax_code">0401992979</span></li>
                    <li><span class="idata" style="width: 16%; border-bottom: none;">Số tài khoản</span><span>: </span><span class="office_info_auto-bank">99798868 - ACB Thanh Khê</span></li>
                </ul>
                <p>Hai bên cùng thống nhất và thỏa thuận ký kết hợp đồng với các điều khoản như sau:</p>
                <p><strong>ĐIỀU 1: NỘI DUNG CÔNG VIỆC </strong></p>
                <p>Bên A đồng ý giao và Bên B đồng ý nhận thi công nội thất, tính toán khối lượng, đơn giá phù hợp thi công kèm theo bảng báo giá. Nội dung hạng mục công việc trong bảng báo giá là cơ sở tính toán khối lượng hoàn thành và nghiệm thu (Bảng báo giá là một phần không thể tách rời của hợp đồng này).</p>
                <p><strong>ĐIỀU 2: CHẤT LƯỢNG VÀ CÁC YÊU CẦU KỸ THUẬT </strong></p>
                <p>Bên B thi công các công việc theo đúng bản vẽ phối cảnh, bản vẽ chi tiết, vật liệu cấu tạo sản phẩm đã được trình duyệt (Chính xác 95% so với bản vẽ thiết kế).</p>
                <p><strong>ĐIỀU 3: THỜI GIAN THỰC HIỆN HỢP ĐỒNG </strong></p>
                <p>Bên B khẩn trương triển khai các nội dung đã thống nhất ở điều 1.</p>
                <p>Thời gian hoàn thành là <span class="contract_day">...</span> ngày kể từ ngày Bên A bàn giao mặt bằng cho Bên B (hoàn thiện sơn, lát gạch trang trí và lan can cầu thang), và sau khi ứng tiền Đợt 1 theo điều 5 của Hợp đồng.</p>
                <p><strong>ĐIỀU 4: GIÁ TRỊ HỢP ĐỒNG </strong></p>
                <p><strong>Giá trị hợp đồng: <span class="contract_price"></span> VNĐ. (chi tiết theo báo giá đính kèm)</strong></p>
                <p><strong>Viết bằng chữ: <span class="contract_price_word_auto"></span> đồng./.</strong></p>
                <p><strong>ĐIỀU 5: PHƯƠNG THỨC TẠM ỨNG VÀ THANH TOÁN </strong></p>
                <ul class="payment_list_tcnt">
                    <li><strong>Đợt 1:</strong><span> Sau khi ký kết hợp đồng, bên A tạm ứng trước cho bên B 30% giá trị hợp đồng. Số tiền: ..................... </span></li>
                    <li><strong>Đợt 2:</strong><span> Sau khi bên B thi công 50% khối lượng công việc, bên A tiếp tục tạm ứng cho bên B 50% giá trị hợp đồng. Số tiền: ......................</span></li>
                    <li><strong>Đợt 3:</strong><span> Bên A thanh toán toàn bộ số tiền còn lại sau khi nghiệm thu và bàn giao toàn bộ công trình. Số tiền: ...................... </span></li>
                </ul>
                <p>Các khoản thanh toán trên sẽ được thực hiện trong vòng ba (03) ngày kể từ ngày hoàn thành công đoạn thi công tương ứng.</p>
                <p><strong>ĐIỀU 6: KHỐI LƯỢNG VÀ CHI PHÍ PHÁT SINH</strong></p>
                <p>Bên B phải ngay lập tức thông báo cho Bên A về khối lượng phát sinh công trình để hai Bên cùng bàn bạc để đưa ra quyết định.</p>
                <p>Chi phí phát sinh được tính toán dựa trên cơ sở dự toán thực tế và được hai Bên xác nhận bằng văn bản.</p>
                <p><strong>ĐIỀU 7: PHẠT HỢP ĐỒNG</strong></p>
                <p>Nếu Bên A chậm thanh toán cho Bên B, cụ thể là quá bảy (07) ngày kể từ Ngày hoàn thành công đoạn thi công tương ứng mà không có cam kết cụ thể thì Bên B có quyền tạm ngưng thi công công trình.</p>
                <p>Bên B vi phạm về quy cách, chủng loại sản phẩm theo bản vẽ đã được chủ đầu tư phê duyệt thì bên B sẽ chịu trách nhiệm sửa đổi và bồi thường thiệt hại nếu thay thế cho bên A.</p>
                <p>Bên B vi phạm về thời gian thực hiện hợp đồng mà không do sự kiện bất khả kháng (mưa bão, lũ lụt, …) hoặc không do bên A gây ra, Bên B chịu phạt theo quy định 0.5% mỗi tuần trên giá trị của khối lượng bị kéo dài, nhưng không quá 5% tổng giá trị hợp đồng</p>
                <p><strong>ĐIỀU 8: TRÁCH NHIỆM CỦA MỖI BÊN</strong></p>
                <p><strong>Trách nhiệm của bên A</strong></p>
                <p>Thanh toán cho Bên B theo đúng điều 5, 6.</p>
                <p>Cùng với Bên B nghiệm thu kịp thời và xác nhận đầy đủ khối lượng công việc Bên B đã thực hiện từng phần hoặc toàn bộ công trình trên cơ sở khối lượng và chất lượng hoàn thành.</p>
                <p><strong>Trách nhiệm của bên B</strong></p>
                <p>Cung cấp vật tư đúng chủng loại theo đúng thiết kế và bảng kê chi tiết có xác nhận bằng biên bản của kỹ thuật công trình Bên A.</p>
                <p>Đảm bảo chất lượng và khối lượng công việc thực hiện theo bản vẽ thiết kế và tiến độ thỏa thuận.</p>
                <p><strong>ĐIỀU 9: BẢO HÀNH</strong></p>
                <p><strong>Thời gian bảo hành</strong></p>
                <p>Bảo hành, bảo dưỡng trong thời gian 01 năm, tính từ thời điểm nghiệm thu công trình.</p>
                <p><strong>Phương thức bảo hành</strong></p>
                <p>Chỉ bảo hành những hư hỏng, thiệt hại đối với công trình nội thất do lỗi thi công bên B gây ra.</p>
                <p>Các thiết bị hư hỏng do tác động cơ học, biến dạng, rơi, vỡ, bị xướt, các sự cố bất khả kháng như thiên tai..... hoặc do con người làm hỏng bên B không chịu trách nhiệm.</p>
                <p>Hợp đồng được lập thành 02 (hai) bản, mỗi Bên giữ 01 (một) bản và có giá trị pháp lý như nhau.</p>
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
