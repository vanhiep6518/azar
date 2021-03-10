@extends('layouts.report')

@section('content')
    <form method="post" action="" id="f-contract" name="f-contract">
        <div id="response" style="display:none;"></div>
        <div id="input">
            @include('prices.menu-left')
            <div id="inputdata">
                <p></p>
                <div class="form-group typeahead"> <input type="text" id="contract_code" name="contract_code" value="" class="form-control form-control-sm typeahead" data-type="" placeholder="Số RL" data-toggle="tooltip" title="" data-original-title="Số RL"></div>
                <div class="form-group typeahead"> <input type="text" id="contract_code2" name="contract_code" value="" class="form-control form-control-sm typeahead" data-type="" placeholder="Số RS" data-toggle="tooltip" title="" data-original-title="Số RS"></div>
                <div class="form-group ">
                    <select id="contract_type" name="contract_type" class="form-control form-control-sm " data-toggle="tooltip" title="" onchange="contractType()" data-original-title="Loại hợp đồng">
                        <option value="0">--- Chọn loại hợp đồng ---</option>
                        <option value="tk_moi">Thiết kế mới</option>
                        <option value="tk_cai_tao">Thiết kế cải tạo</option>
                        <option value="tk_san_vuon">Thiết kế sân vườn</option>
                    </select>
                </div>
                <div class="form-group "> <input type="text" id="contract_signed_date" name="contract_signed_date" value="" class="form-control form-control-sm " data-type="date" placeholder="Ngày ký (dd/mm/yyyy)" onchange="validatedate(this)" data-toggle="tooltip" title="" data-original-title="Ngày ký (dd/mm/yyyy)"></div>
                <div class="form-group "> <input type="text" id="contract_day" name="contract_day" value="" class="form-control form-control-sm " placeholder="Thời hạn thiết kế (số ngày)" data-toggle="tooltip" title="" data-original-title="Thời hạn thiết kế (số ngày)"></div>
                <div class="form-group party_type_dn_show party_type_cn_hide" style="display: none;"> <input type="text" id="company_name" name="company_name" value="" class="form-control form-control-sm party_type_dn_show party_type_cn_hide" placeholder="Tên doanh nghiệp" data-toggle="tooltip" title="" style="display: none;" data-original-title="Tên doanh nghiệp"></div>
                <div class="form-group party_type_dn_show party_type_cn_hide" style="display: none;"><textarea id="company_address" name="company_address" class="form-control form-control-sm party_type_dn_show party_type_cn_hide" placeholder="Địa chỉ" data-toggle="tooltip" title="" style="display: none;" data-original-title="Địa chỉ"></textarea></div>
                <div class="form-group party_type_dn_show party_type_cn_hide" style="display: none;"> <input type="text" id="company_taxcode" name="company_taxcode" value="" class="form-control form-control-sm party_type_dn_show party_type_cn_hide" placeholder="Mã số thuế" data-toggle="tooltip" title="" style="display: none;" data-original-title="Mã số thuế"></div>
                <div class="form-group party_type_dn_show party_type_cn_hide" style="display: none;"> <input type="text" id="company_phone" name="company_phone" value="" class="form-control form-control-sm party_type_dn_show party_type_cn_hide" placeholder="Số điện thoại" data-toggle="tooltip" title="" style="display: none;" data-original-title="Số điện thoại"></div>
                <div class="form-group party_type_dn_show party_type_cn_hide" style="display: none;"> <input type="text" id="company_email" name="company_email" value="" class="form-control form-control-sm party_type_dn_show party_type_cn_hide" placeholder="Email" data-toggle="tooltip" title="" style="display: none;" data-original-title="Email"></div>
                <div class="form-group typeahead"><textarea id="contract__tkxd__address" name="contract__tkxd__address" class="form-control form-control-sm " placeholder="Địa chỉ ký kết HĐ" data-toggle="tooltip" title="" data-original-title="Địa chỉ ký kết HĐ"></textarea></div>
                <div class="form-group party_type_dn_show party_type_cn_hide" style="display: none;"> <input type="text" id="company_representative" name="company_representative" value="" class="form-control form-control-sm party_type_dn_show party_type_cn_hide" placeholder="Người đại diện" data-toggle="tooltip" title="" style="display: none;" data-original-title="Người đại diện"></div>
                <div class="form-group party_type_dn_show party_type_cn_hide" style="display: none;"> <input type="text" id="company_representative_position" name="company_representative_position" value="" class="form-control form-control-sm party_type_dn_show party_type_cn_hide" placeholder="Chức vụ" data-toggle="tooltip" title="" style="display: none;" data-original-title="Chức vụ"></div>
                <div class="form-group "><textarea id="recipient" name="recipient" class="form-control form-control-sm " placeholder="Chủ đầu tư" data-toggle="tooltip" title="" data-original-title="Chủ đầu tư"></textarea></div>
                <div class="form-group party_type_dn_hide party_type_cn_show"> <input type="text" id="party_name" name="party_name" value="" class="form-control form-control-sm party_type_dn_hide party_type_cn_show" placeholder="Đại diện" data-toggle="tooltip" title="" data-original-title="Đại diện"></div>
                <div class="form-group party_type_dn_hide party_type_cn_show"><textarea id="party_address" name="party_address" class="form-control form-control-sm party_type_dn_hide party_type_cn_show" placeholder="Địa chỉ liên hệ" data-toggle="tooltip" title="" data-original-title="Địa chỉ liên hệ"></textarea></div>
                <div class="form-group party_type_dn_hide party_type_cn_show"> <input type="text" id="party_phone" name="party_phone" value="" class="form-control form-control-sm party_type_dn_hide party_type_cn_show" placeholder="Số điện thoại" data-toggle="tooltip" title="" data-original-title="Số điện thoại"></div>
                <div class="form-group party_type_dn_hide party_type_cn_show"> <input type="text" id="party_email" name="party_email" value="" class="form-control form-control-sm party_type_dn_hide party_type_cn_show" placeholder="Email" data-toggle="tooltip" title="" data-original-title="Email"></div>
                <div style="float:right"> <input type="checkbox" id="vat_hdtk" name="vat_hdtk" value="1" onclick="hideShowVAT_HDTK()"> VAT <button type="reset" class="btn">Reset</button> <button id="btn_print_hdtk" type="button" class="btn btn-info">Print</button></div>
            </div>
        </div>
        <div id="content">
            <div id="print-this">
                <p class="text-center"><strong>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM <br> <span style="text-decoration: underline;">Độc lập - Tự do - Hạnh phúc</span> </strong></p>
                <p></p>
                <br>
                <div class="text-center font-italic">
                    <div class="logo2__wrap"><img src="https://azar.vn/wp-content/uploads/2020/05/28925e707b368668df27.jpg" alt="Thiết kế &amp; Xây dựng Nhà đẹp AZAR" class="img-fluid"></div>
                </div>
                <h1 style="text-align:center;margin:0 0 20px;font-size:26px;"><strong>HỢP ĐỒNG THIẾT KẾ</strong></h1>
                <p class="text-center">Số RL:<span class="qr_code" id="contract_code">...</span>/RS - <span class="qr_code2" id="contract_code2">...</span></p>
                <ul>
                    <li>- Căn cứ Luật Xây dựng số 50/2014/QH13ngày 18/06/2014 của Quốc Hội khóa XI, kỳ họp thứ 4;</li>
                    <li>- Căn cứ Nghị định số 15/2013/NĐ-CP ngày 16/02/2013 của Chính phủ về quản lý chất lượng công trình</li>
                    <li>- Thông tư số 05/2015/TT-BXD ngày 30/10/2015 của Bộ Xây dựng quy định về quản lý chất lượng xây dựng và bảo trì nhà ở riêng lẻ</li>
                    <li>- Căn cứ Thông tư số 37/2015/NĐ-CPcủa Chính Phủ về việc hướng dẫn hợp đồng trong hoạt động xây dựng;</li>
                    <li>- Căn cứ vào các văn bản pháp luật khác có liên quan.</li>
                </ul>
                <table class="party" style="border:collapse; border: none; " width="100%">
                    <tbody>
                    <tr>
                        <th width="50%" style="vertical-align: top;"><strong>BÊN A: <span class="recipient">CHỦ ĐẦU TƯ</span></strong></th>
                        <th><strong>BÊN B: <span class="office_info_auto-name">CÔNG TY CỔ PHẦN TƯ VẤN THIẾT KẾ &amp; XÂY DỰNG AZAR</span></strong></th>
                    </tr>
                    <tr>
                        <td>
                            <p class="idata" style="width: 95%;">- Đại diện: <span class="party_name"><span id="ngDaiDien"></span></span></p>
                            <p class="idata" style="width: 95%;">- CMND: <span class="party_cmnd"></span></p>
                            <p class="" style="width: 95%;">- Địa chỉ:</p>
                            <p class="idata" style="width: 95%;"><span class="party_address"></span></p>
                            <p class="idata" style="width: 95%;"><span class="party_address"></span></p>
                            <p class="idata" style="width: 95%;">- Điện thoại: <span class="party_phone"></span></p>
                        </td>
                        <td>
                            <p>- Đại diện: <strong>Ông. LÊ QUANG TRUNG</strong></p>
                            <p>- Chức vụ: Giám đốc</p>
                            <p>- Địa chỉ: 29 Phú Xuân 2, Phường Hòa Minh, Quận Liên Chiểu, Tp. Đà Nẵng.</p>
                            <p>- Điện thoại: 0905.770.456</p>
                            <p>- STK: 99798868 - ACB Thanh Khê</p>
                            <p>- Mã số thuế: 0401992979</p>
                            <p>- Email: kientrucazar@gmail.com – azar.vn</p>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <p> Hai bên thống nhất ký kết Hợp đồng tư vấn, <span class="contract_type_auto-title">thiết kế</span> Kiến trúc - Nội thất cho công trình nhà ở gia đình (Địa chỉ: <span class="contract__tkxd__address line-under"></span> ) với các điều khoản sau:</p>
                <p><strong><span class="text-underline">Điều 1:</span> NỘI DUNG CÔNG VIỆC.</strong></p>
                <p>Bên B sẽ tiến hành thực hiện công việc tư vấn thiết kế cho bên A theo các công đoạn bao gồm:</p>
                <p><strong>1.1. Tư vấn và thiết kế sơ bộ ban đầu.</strong></p>
                <p>- Thiết kế mặt bằng các không gian, phối cảnh ngoại thất, phối cảnh nội thất.</p>
                <p>- Bố trí công năng, phân bố không gian.</p>
                <p><strong>1.2. Thiết kế kỹ thuật Thi công, triển khai chi tiết:</strong> Chủ đầu tư điều chỉnh không quá 3 lần điều chỉnh với khối lượng không quá 30% khối lượng trong suốt giai đoạn triển khai kỹ thuật</p>
                <ul class="task_list">
                    <li>■ Thiết kế và triển khai Kết cấu – Điện nước.</li>
                    <li>■ Triển khai hồ sơ chi tiết công trình.</li>
                </ul>
                <ul>
                    <li>
                        <strong>1.3. Hồ sơ thiết kế kỹ thuật bàn giao cho chủ đầu tư bao gồm:</strong>
                        <ul class="task_list">
                            <li>■ HS Kiến trúc phần Nội thất, Ngoại thất.</li>
                            <li>■ HS Hệ thống cấp nước, thoát nước, xử lý nước thải</li>
                            <li>■ HS Kết cấu</li>
                            <li>■ HS Xin phép xây dựng</li>
                            <li>■ HS Bố trí hệ thống điện , điều hòa</li>
                            <li>■ Phối cảnh Ngoại thất, Nội thất</li>
                        </ul>
                        <div class="clear"></div>
                    </li>
                </ul>
                <p><strong><span class="text-underline">Điều 2:</span> GIÁ TRỊ HỢP ĐỒNG &amp; PHƯƠNG THỨC THANH TOÁN.</strong></p>
                <p><strong>2.1. Giá trị hợp đồng được tính toán cụ thể như sau:</strong></p>
                <p></p>
                <table class="price mb-4" id="tablePrice">
                    <tbody>
                    <tr>
                        <th class="stt">STT</th>
                        <th class="content contract_type_auto-title">Thiết kế mới</th>
                        <th class="unit">ĐVT</th>
                        <th class="amount">Diện tích</th>
                        <th class="price">Đơn giá</th>
                        <th class="item-total">Thành tiền</th>
                    </tr>
                    <tr>
                        <td class="stt">1</td>
                        <td class="content">Diện tích thiết kế Kiến trúc</td>
                        <td class="unit">m<sup>2</sup></td>
                        <td class="amount"> <input id="item-1" name="item[1]" value="" class="item_editable use_area"></td>
                        <td class="price use_area_price" id="price use_area_price"> <input id="don_gia_tk_chinh" class="item_editable use_area" name="don_gia_tk_chinh" value=""></td>
                        <td class="item-total use_area_item_total"></td>
                    </tr>
                    <tr>
                        <td class="stt">2</td>
                        <td class="content">Diện tích thiết kế Nội thất</td>
                        <td class="unit">m<sup>2</sup></td>
                        <td class="amount"> <input id="item-2" name="item[2]" value="" class="item_editable garden_area"></td>
                        <td class="price garden_area_price"> <input id="dongiavuon" class="item_editable use_area" name="dongiavuon" value=""></td>
                        <td class="item-total garden_area_item_total"></td>
                    </tr>
                    <tr>
                        <td class="stt">3</td>
                        <td class="content">Diện tích thiết kế Sân vườn</td>
                        <td class="unit">m<sup>2</sup></td>
                        <td class="amount"> <input id="item-3" name="item[3]" value="" class="item_editable top_garden_area"></td>
                        <td class="price top_garden_area_price"> <input id="dongiasanthuong" class="item_editable use_area" name="dongiasanthuong" value=""></td>
                        <td class="item-total top_garden_area_item_total"></td>
                    </tr>
                    <tr>
                        <td class="stt">4</td>
                        <td class="content">Diện tích thiết kế Trọn gói</td>
                        <td class="unit">m<sup>2</sup></td>
                        <td class="amount"> <input id="item-4" name="item[4]" value="" class="item_editable top_garden_area2"></td>
                        <td class="price top_garden_area_price"> <input id="dongiasanthuong4" class="item_editable use_area" name="dongiasanthuong4" value=""></td>
                        <td class="item-total top_garden_area3_item_total"></td>
                    </tr>
                    <tr class="vat_row" style="display: none;">
                        <td colspan="5" class="center sum">TỔNG</td>
                        <td class="item-total sum sub_total"></td>
                    </tr>
                    <tr class="vat_row" style="display: none;">
                        <td colspan="5" class="center sum">Thuế VAT (10%)</td>
                        <td class="item-total sum vat_total"></td>
                    </tr>
                    <tr class="vat_row_ko_thue">
                        <td></td>
                        <td colspan="4" class="center sum" style="text-align: left;">Tổng giá trị thanh toán</td>
                        <td class="item-total sum sum_total_ko_thue"></td>
                    </tr>
                    <tr class="vat_row" style="display: none;">
                        <td></td>
                        <td colspan="4" class="center sum" style="text-align: left;">Tổng giá trị thanh toán</td>
                        <td class="item-total sum sum_total"></td>
                    </tr>
                    </tbody>
                </table>
                <p class="text-left"><strong style="width: 110px">Giá trị Thiết kế:</strong> <span class="line-under w-80"></span></p>
                <p class="text-left"><span style="width: 110px;text-align: right;display: inline-block;">Bằng chữ:</span> <span class="line-under w-80"></span></p>
                <p><span class="no_included_vat_note" style="display: none;">Đơn giá trên chưa bao gồm 10% VAT.</span></p>
                <p class="text-left"><i>Ghi chú: Đơn giá trên chưa bao gồm chi phi cấp phép, và giá trị thuế VAT.</i></p>
                <p>Diện tích trên là tạm tính tại thời điểm ký kết hợp đồng, diện tích thiết kế sẽ được tính lại nếu có phát sinh sau này.</p>
                <p><i>Bên B hoàn lại 100% tiền thiết kế cho bên A sau khi ký hợp đồng thi công.</i></p>
                <p><strong>2.1. Phương thức thanh toán: Thanh toán làm 3 đợt.</strong></p>
                <p><strong>2.1.1.</strong> Đợt 1: ~40% tổng giá trị của hợp đồng ngay sau khi ký kết hợp đồng.</p>
                <p>Thành tiền: <span class="line-under w-80"></span></p>
                <p><strong>2.1.2.</strong> Đợt 2: ~30% sau khi bên A và bên B chốt bản vẽ Mặt bằng, Mặt tiền.</p>
                <p>Thành tiền: <span class="line-under w-80"></span></p>
                <p><strong>2.1.3.</strong> Đợt 3: ~30% Bên A thanh toán hết giá trị còn lại của hợp đồng vào thời điểm khi bên B in bản vẽ và bàn giao toàn bộ hồ sơ thiết kế kỹ thuật.</p>
                <p>Thành tiền: <span class="line-under w-80"></span></p>
                <p><strong><span class="text-underline">Điều 3:</span> TIẾN ĐỘ CÔNG VIỆC.</strong></p>
                <p><b>3.1.</b> Thời hạn thiết kế là ngày kể từ ngày bên B nhận được tiền đợt 01 của Bên A, nhưng không bao gồm thời gian chờ chỉnh sửa của bên A.</p>
                <p><b>3.2.</b> Nếu thời gian thiết kế kéo dài vượt quá 60 ngày do sự phản hồi chậm trễ của Bên A , hoặc do thời gian thiết kế kéo dài của bên B mà không có bất kì lí do chính đáng nào, thì mỗi bên có quyền dừng hợp đồng và không hoàn trả số tiền tạm ứng ở giai đoạn tương đương.</p>
                <p><strong><span class="text-underline">Điều 4:</span> TRÁCH NHIỆM HAI BÊN.</strong></p>
                <p><b>Trách nhiệm Bên A:</b></p>
                <p><b>4.1.</b> Có trách nhiệm cung cấp đầy đủ thông tin, nội dung về tiêu chuẩn xây dựng, kết quả khảo sát địa chất đối với công trình trên 3 tầng… để bên B lấy làm cơ sở thiết kế.</p>
                <p><b>4.2.</b> Khi có những thay đổi về nhu cầu sử dụng bên A phải thỏa thuận kịp thời với bên B và xác nhận từng công đoạn thiết kế.</p>
                <p><b>4.3.</b> Nếu trong giai đoạn triển khai chi tiết bản vẽ, bên A muốn thay đổi mặt bằng công năng dẫn đến thay đổi bản vẽ 3D nội thất và triển khai chi tiết, bên B sẽ phải tính phát sinh thiết kế phí ít nhất là 30% tổng giá trị hợp đồng.</p>
                <p><b>4.2.</b> Có trách nhiệm hoàn tất, đứng tên trên các giấy tờ liên quan và tiến hành thủ tục hoàn công.</p>
                <p><b>4.3.</b> Có trách nhiệm thanh toán đầy đủ cho bên B theo đúng quy định điều 2 của hợp đồng. Thời hạn thanh toán không quá 10 ngày sau khi bên B bàn giao bản vẽ cho bên A.</p>
                <p><b>4.4.</b> Bên A phải chọn nhà thầu thi công chuyên nghiệp, khảo sát địa chất trước khi thi công và thực hiện đúng bản vẽ thiết kế của bên B. Bên B hoàn toàn không chịu trách nhiệm và ngừng giám sát tác giả nếu công trình xảy ra sự cố và kém chất lượng do nhà thầu bên A gây ra.</p>
                <p><b>4.5.</b> Hỗ trợ giám sát tác giả và làm rõ thiết kế trong quá trình thi công (Nếu công trình ở ngoại tỉnh sẽ được hỗ trợ qua điện thoại hoặc ký Hợp đồng giám sát). Có trách nhiệm thông báo thời gian và nội dung giám sát quyền tác giả cho bên B biết trước để sếp lịch kịp thời.</p>
                <p><b>4.7.</b> Đảm bảo tính hợp pháp của Chủ đầu tư đối với công trình đang thi công.</p>
                <p><i><b>Trách nhiệm Bên B:</b></i></p>
                <p><b>4.9.</b> Có trách nhiệm hoàn thành và bàn giao các loại bản vẽ, hồ sơ thiết kế đúng yêu cầu và thời gian cho bên A.</p>
                <p><strong><span class="text-underline">Điều 5:</span> ĐIỀU KHOẢN LOẠI TRỪ.</strong></p>
                <p>Bên B sẽ không chịu trách nhiệm các nội dung sau:</p>
                <ul class="payment_list_ko_thue">
                    <li><b>5.1.</b> Thẩm định giá trị xây lắp thực tế.</li>
                    <li><b>5.2.</b> Trách nhiệm thiệt hại về tài sản và vật tư không do lỗi thiết kế trong quá trình thi công.</li>
                    <li><b>5.3.</b> Những tư vấn ngoài phạm vi chuyên môn của công ty.</li>
                    <li><b>5.4.</b> Những thay đổi của chủ nhà so với hồ sơ thiết kế ban đầu.</li>
                </ul>
                <p><strong><span class="text-underline">Điều 6:</span> ĐIỀU KHOẢN CHUNG.</strong></p>
                <ul>
                    <li><b>6.1.</b> Hai bên cần chủ động thông báo cho nhau tiến độ thực hiện Hợp đồng. Nếu có vấn đề gì bất lợi phát sinh, các bên phải kịp thời thông báo cho nhau biết để tích cực giải quyết. (Nội dung được ghi lại dưới hình thức biên bản).</li>
                    <li><b>6.2.</b> Mọi sự sửa đổi hay bổ sung vào bản Hợp đồng này phải được sự đồng ý của cả hai Bên và được lập thành văn bản mới có giá trị hiệu lực.</li>
                    <li><b>6.3.</b> Hai bên cam kết thực hiện đúng các điều khoản của hợp đồng, bên nào vi phạm sẽ phải chịu trách nhiệm trước pháp luật về hợp đồng kinh tế.</li>
                    <li><b>6.4.</b> Hợp đồng này có hiệu lực từ ngày ký cho đến khi hoàn tất việc thanh lý Hợp đồng. Hợp đồng này được lập thành 02 bản, Bên A giữ 01 bản, Bên B giữ 01 bản, và có giá trị pháp lý như nhau.</li>
                </ul>
                <p>Sau khi đọc lại lần cuối cùng và thống nhất với những nội dung đã ghi trong Hợp đồng, hai bên cùng ký tên dưới đây.</p>
                <table class="sign" style="border:collapse; border: none; ">
                    <tbody>
                    <tr>
                        <td></td>
                        <td><i><span class="signed_date_auto_hdtk">Đà Nẵng, ngày 06 tháng 03 năm 2021</span></i></td>
                    </tr>
                    <tr>
                        <th width="50%"><strong>ĐẠI DIỆN BÊN A</strong></th>
                        <th><strong>ĐẠI DIỆN BÊN B</strong></th>
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
