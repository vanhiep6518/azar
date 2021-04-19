@extends('layouts.report')

@section('content')
    <form method="post" action="" id="f-contract" name="f-contract">
        <div id="response" style="display:none;"></div>
        <div id="input">
            @include('prices.menu-left-contract')
            <div id="inputdata">
                <p></p>
                <div class="form-group typeahead"> <input type="text" id="contract_code" name="contract_code" value="" class="form-control form-control-sm typeahead" data-type="" placeholder="Mã số hợp đồng" data-toggle="tooltip" title="" data-original-title="Mã số hợp đồng"></div>
                <div class="form-group party_type_dn_hide party_type_cn_show"><textarea id="vv_thi_cong" name="vv_thi_cong" class="form-control form-control-sm party_type_dn_hide party_type_cn_show" placeholder="Về việc thi công" data-toggle="tooltip" title="" data-original-title="Về việc thi công"></textarea></div>
                <div class="form-group ">
                    <select id="contract_type1" name="contract_type" class="form-control form-control-sm " data-toggle="tooltip" title="" onchange="loaiHDTC()" data-original-title="Loại hợp đồng">
                        <option value="0">--- Chọn loại hợp đồng ---</option>
                        <option value="tc_tron_goi">Thi công trọn gói</option>
                        <option value="tc_phan_tho">Thi công phần thô</option>
                        <option value="tc_hoan_thien">Thi công hoàn thiện</option>
                        <option value="tc_noi_that">Thi công nội thất</option>
                        <option value="tc_nhan_cong">Thi công nhân công</option>
                    </select>
                </div>
                <div class="form-group "> <input type="text" id="contract_price" name="contract_price" value="" class="form-control form-control-sm " data-type="money" placeholder="Giá trị hợp đồng (đồng)" data-toggle="tooltip" title="" data-original-title="Giá trị hợp đồng (đồng)"></div>
                <div class="form-group "> <input type="text" id="contract_signed_date" name="contract_signed_date" value="" class="form-control form-control-sm " data-type="date" placeholder="Ngày ký (dd/mm/yyyy)" data-toggle="tooltip" onchange="validatedate(this)" title="" data-original-title="Ngày ký (dd/mm/yyyy)"></div>
                <div class="form-group "> <input type="text" id="contract_day" name="contract_day" value="" class="form-control form-control-sm " placeholder="Số ngày thực hiện" data-toggle="tooltip" title="" data-original-title="Số ngày thực hiện"></div>
                <div class="form-group "><textarea id="recipient" name="recipient" class="form-control form-control-sm " placeholder="Tên đối tác" data-toggle="tooltip" title="" data-original-title="Tên đối tác"></textarea></div>
                <div class="form-group party_type_dn_hide party_type_cn_show"> <input type="text" id="party_name" name="party_name" value="" class="form-control form-control-sm party_type_dn_hide party_type_cn_show" placeholder="Người đại diện" data-toggle="tooltip" title="" data-original-title="Người đại diện"></div>
                <div class="form-group party_type_dn_hide party_type_cn_show"> <input type="text" id="party_email" name="party_email" value="" class="form-control form-control-sm party_type_dn_hide party_type_cn_show" placeholder="Chức vụ" data-toggle="tooltip" title="" data-original-title="Chức vụ"></div>
                <div class="form-group party_type_dn_hide party_type_cn_show"> <input type="text" id="party_phone" name="party_phone" value="" class="form-control form-control-sm party_type_dn_hide party_type_cn_show" placeholder="Số điện thoại" data-toggle="tooltip" title="" data-original-title="Số điện thoại"></div>
                <div style="float:right"> <input type="checkbox" id="vat" name="vat" value="1"> VAT <button type="reset" class="btn">Reset</button> <button id="btn_print_hdtk" type="button" class="btn btn-info">Print</button></div>
            </div>
        </div>
        <div id="content">
            <div id="print-this">
                <h1 style="text-align:center;margin:0 0 20px;font-size:26px;"><strong>HỢP ĐỒNG ĐỐI TÁC</strong></h1>
                <br>
                <p style="text-align: center;">(V/v: Thi công <span class="vv_thi_cong">...</span>)</p>
                <p style="text-align: center;">Số hợp đồng: <span class="qr_code" id="contract_code">...</span></p>
                <p>Hôm nay, <span class="signed_date_auto">ngày 06 tháng 03 năm 2021</span>, chúng tôi gồm có:</p>
                <table class="party" style="border:collapse; border: none; width: 100%;">
                    <tbody>
                    <tr>
                        <th width="50%">BÊN A: <span class="office_info_auto-name">CÔNG TY TNHH TƯ VẤN THIẾT KẾ &amp; XÂY DỰNG 81ART</span></th>
                        <th><strong>BÊN B: <span class="recipient"></span></strong></th>
                    </tr>
                    <tr>
                        <td> <span class="idata" style="width: 95%;">Đại diện: <span class="office_info_auto-representative">PHẠM VĂN THÔNG</span></span><br>
                            <span class="idata" style="width: 95%;">Chức vụ: <span class="office_info_auto-position">Giám đốc</span></span><br>
                            <span class="idata" style="width: 95%;">Địa chỉ: <span class="office_info_auto-address">78 Nguyễn Minh Chấn, Hòa Khánh Nam, Q.Liên Chiểu, TP.Đà Nẵng</span></span></td>
                        <td> <span class="idata" style="width: 100%;">Đại diện: <span class="party_name"><span id="ngDaiDien"></span></span></span><br> <span class="idata" style="width: 100%;">Chức vụ: <span class="party_email"></span></span><br> <span class="idata" style="width: 100%;">Điện thoại: <span class="party_phone"></span></span></td>
                    </tr>
                    </tbody>
                </table>
                <br>
                <p><strong>Hai bên thống nhất ký kết và thực hiện hợp đồng <span class="contract_type_auto-title">thi công</span> công trình như sau:</strong></p>
                <p><strong> Điều 1: Chất lượng, Thời gian và tiến độ thực hiện:</strong></p>
                <ol>
                    <li>Bên B thực hiện đúng chất lượng và mẫu mã theo hồ sơ bản vẽ đã kí kết.</li>
                    <li>Thời gian hoàn thành chưa bao gồm phát sinh: <span class="contract-time-finish">...........</span></li>
                    <li>Quản lí kĩ thuật là người trực tiếp làm việc.</li>
                    <li>Bàn giao công trình cho bên A bị trễ tiến độ, bên B sẽ bị phạt 20% giá trị hợp đồng cho mỗi ngày trễ tiến độ (<span class="contract_price_phat">tương đương số tiền là ... VNĐ/ngày</span>).</li>
                </ol>
                <p><strong> Điều 2: Hình thức thanh toán:</strong></p>
                <ol>
                    <li>Tổng giá trị hợp đồng: <span class="contract_price"><span id="contract_price"></span>..........</span>VNĐ</li>
                    <li>
                        Hình thức thanh toán:
                        <ul class="contract-dt-thanhtoan">
                            <li>-Tạm ứng 50% sau khi ký hợp đồng. Số tiền: ........</li>
                            <li>-Thanh toán 50% còn lại sau khi nghiệm thu bàn giao. Số tiền: ............</li>
                        </ul>
                    </li>
                </ol>
                <p><strong> Điều 3: Trách nhiệm của mỗi bên:</strong></p>
                <ol>
                    <li>Bên A có quyền thay đổi thợ của Bên B nếu không đủ năng lực chuyên môn hoặc vi phạm nội quy công trường;</li>
                    <li>Bên B không được tự ý làm việc trực tiếp với Chủ đầu tư nếu không có sự đồng ý của Bên A;</li>
                    <li>Bên B vệ sinh cuối ngày và vận chuyển xà bần ra khỏi công trình</li>
                    <li>Bên B chịu trách nhiệm hoàn toàn nếu làm hư hỏng và mẩt mát vật tư thiết bị tại công trình.</li>
                </ol>
                <table class="sign">
                    <tbody>
                    <tr>
                        <th width="50%">ĐẠI DIỆN BÊN A</th>
                        <th>ĐẠI DIỆN BÊN B</th>
                    </tr>
                    <tr>
                        <td height="120px"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><span>PHẠM VĂN THÔNG</span></td>
                        <td><span class="party_name idata" style="min-width: 241px;"><span id="ngDaiDien"></span></span></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </form>
@endsection
