var checkbox_ham;
var checkbox_tret;
var checkbox_lung;
var checkbox_lau1;
var checkbox_lau2;
var checkbox_lau3;
var checkbox_santhuong;
var checkbox_mai;

var select_dacdiemnendat;
var select_sanlung;
var select_ketcaumai;
var select_vitrikd;

var txt_mongdukien;
var txt_santret;

var tbody_quymodientich;
var tr_ham;
var tr_tret;
var tr_lung;
var tr_lau1;
var tr_lau2;
var tr_lau3;
var tr_santhuong;
var tr_mai;
var tr_thongtang;
var tr_phanmong;
var tr_sanvuon;
var tr_tongDtSanSuDung;
var tr_tongDtSanTinhToan;

var tbody_tongchiphi;
var tr_phancoc;
var tr_phantho;
var tr_vattu;
var tr_noithat;

var dientichdat;

var tongSSudung;
var tongSTinhtoan;

var tienPhancoc;

var chiphiSan;
var chiphiNoithat;

var img;

$(document).ready(function(){

	img = $(".right-box");
	dientichdat = $("#dientichdat");

	tongSSudung = $("#span-tongSSudung");
	tongSTinhtoan = $("#span-tongSTinhtoan");

	chiphiSan = $("#chiphi-san");
	chiphiNoithat = $("#chiphi-noithat");

	tbody_quymodientich = $("#tbody-quymodientich");
	tbody_tongchiphi = $("#tbody-tongchiphi");

	checkbox_ham = $("#checkbox-ham");
	checkbox_tret = $("#checkbox-tret");
	checkbox_lung = $("#checkbox-lung");
	checkbox_lau1 = $("#checkbox-lau1");
	checkbox_lau2 = $("#checkbox-lau2");
	checkbox_lau3 = $("#checkbox-lau3");
	checkbox_santhuong = $("#checkbox-santhuong");
	checkbox_mai = $("#checkbox-mai");

	select_dacdiemnendat = $("#select-dacdiemnendat");
	select_sanlung = $("#select-sanlung");
	select_ketcaumai = $("#select-ketcaumai");
	select_vitrikd = $("#select-vitrikd");

	txt_mongdukien = $("#txt-mongdukien");
	txt_santret = $("#txt-santret");

	tr_ham = $("tr", tbody_quymodientich).eq(0);
	tr_tret = $("tr", tbody_quymodientich).eq(1);
	tr_lung = $("tr", tbody_quymodientich).eq(2);
	tr_lau1 = $("tr", tbody_quymodientich).eq(3);
	tr_lau2 = $("tr", tbody_quymodientich).eq(4);
	tr_lau3 = $("tr", tbody_quymodientich).eq(5);
	tr_santhuong = $("tr", tbody_quymodientich).eq(6);
	tr_mai = $("tr", tbody_quymodientich).eq(7);
	tr_thongtang = $("tr", tbody_quymodientich).eq(8);
	tr_phanmong = $("tr", tbody_quymodientich).eq(9);
	tr_sanvuon = $("tr", tbody_quymodientich).eq(10);
	tr_tongDtSanSuDung = $("tr", tbody_quymodientich).eq(11);
	tr_tongDtSanTinhToan = $("tr", tbody_quymodientich).eq(12);

	tr_phancoc = $("tr", tbody_tongchiphi).eq(0);
	tr_phantho = $("tr", tbody_tongchiphi).eq(1);
	tr_vattu = $("tr", tbody_tongchiphi).eq(2);
	//tr_noithat = $("tr", tbody_tongchiphi).eq(3);

	$("td", tr_ham).eq(2).text(1.8);
	$("td", tr_lau1).eq(2).text(1);
	$("td", tr_lau2).eq(2).text(1);
	$("td", tr_lau3).eq(2).text(1);
	$("td", tr_santhuong).eq(2).text(0.8);
});

function _change_dientichdat(obj){
	_tongdientich();
}

function select_loainha(obj){
	var arrRate = $(obj).val().split(";");
	$("td", tr_phantho).eq(1).text(arrRate[0]);
	$("td", tr_vattu).eq(1).text(arrRate[1]);
	//$("td", tr_noithat).eq(1).text(arrRate[2]);
	_tongdientich();
}

function select_mucdodautu(obj){
	var arrRate = $(obj).val().split(";");
	$("td", tr_phantho).eq(2).text(arrRate[0]);
	$("td", tr_vattu).eq(2).text(arrRate[1]);
	//$("td", tr_noithat).eq(2).text(arrRate[2]);
	_tongdientich();
}

function _select_vitrikd(obj){
	var arrRate = $(obj).val().split(";");
	$("td", tr_phantho).eq(3).text(arrRate[0]);
	$("td", tr_vattu).eq(3).text(arrRate[1]);
	//$("td", tr_noithat).eq(2).text(arrRate[2]);
	_tongdientich();
}

// Check box kien truc
function _ham(obj){
	if($(obj).prop("checked")){
		$(tr_ham).show();
		$("img", img).eq(7).show();
	}else{
		_reset_row($("input", tr_ham));
		$(tr_ham).hide();
		$("img", img).eq(7).hide();
	}
	_tongdientich();
}

function _tret(obj){
	if($(obj).prop("checked")){
		$(tr_tret).show();
	}else{
		$(tr_tret).hide();
	}
	_tongdientich();
}

function _lung(obj){
	if($(obj).prop("checked")){
		$(tr_lung).show();
		$("img", img).eq(5).show();
		$(".hide-sanlung").show();
		$(tr_thongtang).show();
	}else{
		_reset_row($("input", tr_lung));
		$(tr_lung).hide();
		$("img", img).eq(5).hide();
		$(".hide-sanlung").hide();
		$(tr_thongtang).hide();
		$("td", tr_thongtang).eq(1).text("0");
		$("td", tr_thongtang).eq(3).text("0");
	}
	_tongdientich();
}

function _lau1(obj){
	if($(obj).prop("checked")){
		$(tr_lau1).show();
		$("img", img).eq(4).show();
	}else{
		_reset_row($("input", tr_lau1));
		_reset_row($("input", tr_lau2));
		_reset_row($("input", tr_lau3));
		$(checkbox_lau2).prop("checked", false);
		$(checkbox_lau3).prop("checked", false);
		$(tr_lau1).hide();
		$(tr_lau2).hide();
		$(tr_lau3).hide();

		$("img", img).eq(4).hide();
		$("img", img).eq(3).hide();
		$("img", img).eq(2).hide();
	}
	_tongdientich();
}

function _lau2(obj){
	if($(obj).prop("checked")){
		$(checkbox_lau1).prop("checked", true);
		$(tr_lau1).show();
		$(tr_lau2).show();

		$("img", img).eq(3).show();
		$("img", img).eq(4).show();
	}else{
		_reset_row($("input", tr_lau2));
		_reset_row($("input", tr_lau3));
		$(checkbox_lau3).prop("checked", false);
		$(tr_lau2).hide();
		$(tr_lau3).hide();

		$("img", img).eq(2).hide();
		$("img", img).eq(3).hide();
	}
	_tongdientich();
}

function _lau3(obj){
	if($(obj).prop("checked")){
		$(checkbox_lau1).prop("checked", true);
		$(checkbox_lau2).prop("checked", true);
		$(tr_lau1).show();
		$(tr_lau2).show();
		$(tr_lau3).show();

		$("img", img).eq(2).show();
		$("img", img).eq(3).show();
		$("img", img).eq(4).show();
	}else{
		_reset_row($("input", tr_lau1));
		$(tr_lau3).hide();

		$("img", img).eq(2).hide();
	}
	_tongdientich();
}

function _santhuong(obj){
	if($(obj).prop("checked")){
		$(tr_santhuong).show();

		$("img", img).eq(1).show();
	}else{
		_reset_row($("input", tr_santhuong));
		$(tr_santhuong).hide();

		$("img", img).eq(1).hide();
	}
	_tongdientich();
}
// End checkbox kien truc

function _dacdiemnendat(obj){
	var value = $(obj).val().split(";");

	// tienPhancoc = +value[3];

	$("td", tr_tret).eq(2).text(value[0]);
	$(txt_mongdukien).val(value[1]);
	$(txt_santret).val(value[2]);
	// $("td", tr_phancoc).eq(3).text(tienPhancoc.format(1,3));

	if(value[0] == "1"){
		thanhtien_phancoc();
		$(tr_phancoc).show();
	}else{
		$("td", tr_phancoc).eq(4).text("0");
		$(tr_phancoc).hide();
	}
	_change_row($("input", tr_tret));
}

function _sanlung(obj){
	var value = $(obj).val();
	$("td", tr_lung).eq(2).text(value);

	_change_row($("input", tr_lung));
}

function _ketcaumai(obj){
	var value = $(obj).val();
	$("td", tr_mai).eq(2).text(value);

	_change_row($("input", tr_mai));
}

function _reset_row(obj){
	var parent = $(obj).parent().parent();
	var td1 = $(obj).val("");
	var td3 = $("td", parent).eq(3);

	$(td3).text(0);
}

function _change_row(obj){
	var parent = $(obj).parent().parent();
	var td1 = $(obj).val();
	var td2 = $("td", parent).eq(2).text();
	var td3 = $("td", parent).eq(3);

	$(td3).text((td1 * td2).toFixed(1));

	thanhtien_phancoc();
	_tongdientich();
}

function _change_row2(obj){
	var parent = $(obj).parent();
	var td1 = $(obj).text();
	var td2 = $("td", parent).eq(2).text();
	var td3 = $("td", parent).eq(3);

	$(td3).text((td1 * td2).toFixed(1));	
}

function _tongdientich(){

	
	var phanmong = $("td", tr_phanmong).eq(1);
	var sanvuon = $("td", tr_sanvuon).eq(1);

	$(phanmong).text($("input", tr_tret).val());
	$(sanvuon).text($(dientichdat).val() - $("input", tr_tret).val());

	if($("#checkbox-lung").prop("checked")){
		var thongtang = $("td", tr_thongtang).eq(1);
		$(thongtang).text($("input", tr_tret).val() - $("input", tr_lung).val());
		_change_row2(thongtang);
	}

	_change_row2(phanmong);
	_change_row2(sanvuon);

	var sSudung = 0;
	var sTinhtoan = 0;

	$("tr", tbody_quymodientich).each(function(index){
		if($("input", this).val()){
			sSudung = sSudung + +$("input", this).val();
		}
		sTinhtoan = sTinhtoan + +$("td", this).eq(3).text();
	});

	// sSudung = sSudung - $("input", tr_mai).val() - $("td", tr_phanmong).eq(1).text() - 
	// ( $("input", tr_santhuong).val() * 0.3);

	sSudung = sSudung - $("input", tr_mai).val() - ( $("input", tr_santhuong).val() * 0.3);

	$(tongSSudung).text(sSudung.format(1, 3));
	$(tongSTinhtoan).text(sTinhtoan.format(1, 3));
	$("#tongdientich").text(sTinhtoan.format(1, 3));

	thanhtien_phancoc();
	thanhtien(sTinhtoan);
}

function thanhtien(tongS){
	var sTong = 0;
	$("tr", tbody_tongchiphi).each(function(index){
		if(index > 0){
			var dongia = $("td", this).eq(1).text().replace(/,/g,"");
			var heso = $("td", this).eq(2).text();
			var hesovitri = $("td", this).eq(3).text();
			console.log(dongia);
			// var temp = $("td", this).eq(1).text() * $("td", this).eq(2).text() * tongS;
			var temp = +dongia * +heso * +hesovitri * tongS;
			$("td", this).eq(4).text(temp.format(0, 3));
			sTong = sTong + temp;
		}else{

			var indexSelect = $(select_dacdiemnendat).val().split(";");
			if(indexSelect[0] == "1"){
				sTong = sTong + tienPhancoc;
			}
			
		}
	});

	// $(chiphiNoithat).text(sTong.format(1, 3));
	// sTong = sTong - ($("td", tr_noithat).eq(1).text() * $("td", tr_noithat).eq(2).text() * tongS);
	// $(chiphiSan).text(sTong.format(1, 3));
	$(chiphiSan).text(sTong.format(0, 3));
}

function lay_so_tang(){
	return $("input:checked", ".sotang").length;
}

function thanhtien_phancoc(){
	var sotang = lay_so_tang();
	var stret = +$("#input-santret").val();
	tienPhancoc = 1.2*1.2/50*20*300000*sotang*stret;
	$("td", tr_phancoc).eq(4).text(tienPhancoc.format(0, 3));
}

Number.prototype.format = function(n, x) {
    var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
    return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$&,');
};