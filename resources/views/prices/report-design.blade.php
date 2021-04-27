@extends('layouts.report')

@section('content')
    <form method="post" action="" id="f-contract" name="f-contract">
        <div id="response" style="display:none;"></div>
        <div id="input">
            <div id="menu">
                <div class="header__logo">
                    <a href="https://81art.vn" class="d-flex justify-content-between" title="Thiết kế &amp; Xây dựng Nhà đẹp 81ART">
                        <div class="logo1__wrap"><img src="{{asset('images/Logo.png')}}" alt="Thiết kế &amp; Xây dựng Nhà đẹp 81ART" class="img-fluid --st1"></div>
{{--                        <div class="logo2__wrap"><img src="https://81ART.vn/wp-content/uploads/2020/04/lgotexxt.png" alt="Thiết kế &amp; Xây dựng Nhà đẹp 81ART" class="img-fluid --st2"></div>--}}
                    </a>
                </div>
                <div><a id="menu-bgtk" href="/bao-gia-thiet-ke" class="btn btn-light" title="" data-toggle="tooltip" data-original-title="Báo giá thiết kế">Báo giá thiết kế</a></div>
                <div><a id="menu-bgtc" href="/bao-gia-thi-cong" class="btn" title="" data-toggle="tooltip" data-original-title="Báo giá thi công">Báo giá thi công</a></div>
            </div>
            <div id="inputdata">
                <p></p>
                <div class="form-group "> <input type="text" id="contract_code" name="contract_code" value="" class="form-control form-control-sm " placeholder="Mã báo giá thiêt kế" data-toggle="tooltip" title="" data-original-title="Mã báo giá thiêt kế"></div>
                <div class="form-group "> <input type="text" id="contract_signed_date" name="contract_signed_date" value="" class="form-control form-control-sm " data-type="date" placeholder="Ngày báo giá (dd/mm/yyyy)" data-toggle="tooltip" onchange="validatedate(this)" title="" data-original-title="Ngày báo giá (dd/mm/yyyy)"></div>
                <div class="form-group "> <input type="text" id="sum_construction_area" name="sum_construction_area" value="" class="form-control form-control-sm " data-type="dec2" placeholder="Tổng diện tích sàn" data-toggle="tooltip" title="" data-original-title="Tổng diện tích sàn"></div>
                <div class="form-group "> <input type="text" id="sum_garden_area" name="sum_garden_area" value="" class="form-control form-control-sm " data-type="dec2" placeholder="Diện tích sân vườn" data-toggle="tooltip" title="" data-original-title="Diện tích sân vườn"></div>
                <div class="form-group "> <input type="text" id="sum_top_garden_area" name="sum_top_garden_area" value="" class="form-control form-control-sm " data-type="dec2" placeholder="Diện tích sân thượng" data-toggle="tooltip" title="" data-original-title="Diện tích sân thượng"></div>
                <div class="form-group "><textarea id="building_address" name="building_address" class="form-control form-control-sm " placeholder="Địa chỉ công trình" data-toggle="tooltip" title="" data-original-title="Địa chỉ công trình"></textarea></div>
                <div class="form-group ">
                    <select id="building_type" name="building_type" class="form-control form-control-sm " data-toggle="tooltip" title="" onchange="buildingType()" data-original-title="Loại công trình">
                        <option value="0">--- Chọn loại công trình ---</option>
                        <option value="nha_pho_1mt">Nhà phố 1 mặt tiền</option>
                        <option value="nha_pho_2mt">Nhà phố 2 mặt tiền</option>
                        <option value="biet_thu_hien_dai">Biệt thự hiện đại</option>
                        <option value="biet_thu_co_dien">Biệt thự cổ điển</option>
                        <option value="bar_nha_hang_cafe">Bar/ Nhà hàng/ Cafe</option>
                    </select>
                </div>
                <div class="form-group ">
                    <select id="building_status" name="building_status" class="form-control form-control-sm " data-toggle="tooltip" title="" onchange="buildingStatus()" data-original-title="Trạng thái">
                        <option value="0">--- Trạng thái ---</option>
                        <option value="xaymoi">Xây mới</option>
                        <option value="caitao">Cải tạo</option>
                    </select>
                </div>
                <div class="form-group ">
                    <select id="contract_type" name="contract_type" class="form-control form-control-sm " data-toggle="tooltip" title="" onchange="contractType()" data-original-title="Loại hợp đồng">
                        <option value="0">--- Chọn loại hợp đồng ---</option>
                        <option value="tk_moi">Thiết kế mới</option>
                        <option value="tk_cai_tao">Thiết kế cải tạo</option>
                        <option value="tk_san_vuon">Thiết kế sân vườn</option>
                    </select>
                </div>
                <div class="form-group "><textarea id="recipient" name="recipient" class="form-control form-control-sm " placeholder="Người nhận báo giá" data-toggle="tooltip" title="" data-original-title="Người nhận báo giá"></textarea></div>
                <div class="form-group "><input id="thoi_han_bao_gia" name="thoi_han_bao_gia" class="form-control form-control-sm " onchange="validatedate(this)" placeholder="Giá trị đến ngày dd/mm/yyyy" data-toggle="tooltip" title="" data-original-title="Báo giá có giá trị đến"></div>
                <div style="float:right"> <input type="checkbox" id="vat" name="vat" value="1" checked="true" onclick="hideShowVAT()"> VAT <button type="reset" onclick="resetAll()" class="btn">Reset</button> <button id="btn_print_bgtk" type="button" class="btn btn-info">Print</button></div>
            </div>
        </div>
        <div id="content">
            <div id="print-this">
                <h1 style="text-align:center;margin:0 0 20px;font-size:26px;"><strong>BÁO GIÁ THIẾT KẾ</strong></h1>
                <p>Số: <span class="qr_code"><span id="mabgtk">...</span></span><span class="signed_date_auto_bgtk" style="float:right;">Đà Nẵng, ngày 05 tháng 03 năm 2021</span></p>
                <p style="font-weight: bold;">Kính gửi: <span class="recipient">Công ty ...</span></p>
                <p>Chúng tôi: <span class="office_info_auto-name">CÔNG TY TNHH TƯ VẤN THIẾT KẾ &amp; XÂY DỰNG 81ART.</span></p>
                <p>Địa chỉ: <span class="office_info_auto-address">78 Nguyễn Minh Chấn, Hòa Khánh Nam, Q.Liên Chiểu, TP.Đà Nẵng</span></p>
                <p>Trân trọng báo giá thiết kế công trình: <span class="building_type_auto-title">...</span> - Trạng thái: <span class="building_status_auto-title">...</span></p>
                <p>Địa chỉ công trình: <span class="building_address">...</span></p>
                <table class="price" id="tablePrice">
                    <tbody>
                    <tr>
                        <th class="stt">STT</th>
                        <th class="content contract_type_auto-title">Thiết kế trọn gói</th>
                        <th class="unit">ĐVT</th>
                        <th class="amount">KL</th>
                        <th class="price">Đơn giá</th>
                        <th class="item-total">Thành tiền</th>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <ul class="task_list">
                                <li>-</li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td class="stt">1</td>
                        <td class="content">Tổng diện tích sàn</td>
                        <td class="unit">m<sup>2</sup></td>
                        <td class="amount"> <input id="item-1" name="item[1]" value="" class="item_editable use_area"></td>
                        <td class="price use_area_price" id="price use_area_price"> <input id="don_gia_tk_chinh" class="item_editable use_area" name="don_gia_tk_chinh" value=""></td>
                        <td class="item-total use_area_item_total"></td>
                    </tr>
                    <tr>
                        <td class="stt">2</td>
                        <td class="content">Diện tích sân vườn</td>
                        <td class="unit">m<sup>2</sup></td>
                        <td class="amount"> <input id="item-2" name="item[2]" value="" class="item_editable garden_area"></td>
                        <td class="price garden_area_price"> <input id="dongiavuon" class="item_editable use_area" name="dongiavuon" value=""></td>
                        <td class="item-total garden_area_item_total"></td>
                    </tr>
                    <tr>
                        <td class="stt">3</td>
                        <td class="content">Diện tích sân thượng</td>
                        <td class="unit">m<sup>2</sup></td>
                        <td class="amount"> <input id="item-3" name="item[3]" value="" class="item_editable top_garden_area"></td>
                        <td class="price top_garden_area_price"> <input id="dongiasanthuong" class="item_editable use_area" name="dongiasanthuong" value=""></td>
                        <td class="item-total top_garden_area_item_total"></td>
                    </tr>
                    <tr class="vat_row">
                        <td colspan="5" class="center sum">TỔNG</td>
                        <td class="item-total sum sub_total"></td>
                    </tr>
                    <tr class="vat_row">
                        <td colspan="5" class="center sum">Thuế VAT (10%)</td>
                        <td class="item-total sum vat_total"></td>
                    </tr>
                    <tr>
                        <td colspan="5" class="center sum">TỔNG CỘNG</td>
                        <td class="item-total sum sum_total"></td>
                    </tr>
                    </tbody>
                </table>
                <p style="margin-top:10px;">Bằng chữ: <input id="don_gia_tk_chinh" class="item_editable use_area w-75 text-left" name="don_gia_tk_chinh" value="... đồng."></p>
                <p style="margin-top:10px;" class="sum">Ghi chú:</p>
                <p> <span class="no_included_vat_note" style="display: none;">+ Đơn giá trên chưa bao gồm Thuế GTGT (VAT).<br></span> + Diện tích trên đây là tạm tính. <br> + Trong trường hợp diện tích quá nhỏ, giá trị hợp đồng tối thiểu là 20.000.000 đồng. <br> + Hạng mục không liệt kê hoặc có khối lượng bằng 0 được hiểu là không thực hiện. <br> + Báo giá có giá trị đến hết ngày. <span class="valid_until_date idata" style="min-width: 150px;"><span id="giatriden">04 tháng 04 năm 2021.</span></span></p>
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
                        <td><span class="office_info_auto-representative">PHẠM VĂN THÔNG</san></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </form>
@endsection
