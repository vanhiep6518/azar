function addDays(t, e) {
	return t.setDate(t.getDate() + e), t
}

function loaiHDTC() {
	var t = document.getElementById("contract_type1").value,
		e = $("#contract_type1 option:selected").text();
	$(".contract_type_auto-title").text(e), "tc_tron_goi" == t ? $("ul.task_list1").html("<li>- Bên A giao cho Bên B thầu tổ chức thi công và hoàn thành các hạng mục công trình theo bản vẽ thiết kế, nội dung công việc Bên B thực hiện và chủng loại vật tư Bên B cung cấp được giới hạn bỡi các mô tả trong bảng phụ lục đính kèm.</li>") : $("ul.task_list1").html("<li>- Bên B tổ chức thi công và hoàn thành các hạng mục công trình theo bản vẽ thiết kế, nội dung công việc Bên B thực hiện được giới hạn bỡi các mô tả trong bảng phụ lục đính kèm.</li>")
}

function staffPosition() {
	if (staffPositionId = document.getElementById("staff_position").value, 0 != staffPositionId) {
		var t = $("#staff_position option:selected").text();
		$(".staff_position_auto-title").text(t)
	}
}
$(document).ready(function() {
	var t = 0,
		e = 0,
		a = 0,
		n = 0,
		o = 0,
		i = 0,
		r = 0;
	$(".no_included_vat_note").hide(), $("#btn_print_bgtk").click(function() {
		window.print()
	});
	var u = new Date,
		m = new Date,
		l = String(u.getDate()).padStart(2, "0"),
		c = String(u.getMonth() + 1).padStart(2, "0"),
		_ = u.getFullYear(),
		d = addDays(u, 30);
	d = String(d.getDate()).padStart(2, "0") + "/" + String(d.getMonth() + 1).padStart(2, "0") + "/" + d.getFullYear();
	var h = addDays(m, 3);
	h = String(h.getDate()).padStart(2, "0") + "/" + String(h.getMonth() + 1).padStart(2, "0") + "/" + h.getFullYear();
	var g = (u = l + "/" + c + "/" + _).split("/");
	$(".signed_date_auto").text("ngày " + g[0] + " tháng " + g[1] + " năm " + g[2]), $(".signed_date_auto_bgtk").text("Đà Nẵng, ngày " + g[0] + " tháng " + g[1] + " năm " + g[2]), $(".signed_date_auto_hdtk").text("Đà Nẵng, ngày " + g[0] + " tháng " + g[1] + " năm " + g[2]), $("#giatriden").text(d.split("/")[0] + " tháng " + d.split("/")[1] + " năm " + d.split("/")[2] + "."), $("#thoi_han_bao_gia").focusout(function() {
		var t = $("#thoi_han_bao_gia").val();
		"" != t && $("#giatriden").text(t.split("/")[0] + " tháng " + t.split("/")[1] + " năm " + t.split("/")[2] + ".")
	}), $("#ngayhethangt").text(h.split("/")[0] + " tháng " + h.split("/")[1] + " năm " + h.split("/")[2] + "."), $("#bgtk_code").focusout(function() {
		var t = $("#bgtk_code").val();
		document.getElementById("office_id").value;
		if ("" != t) {
			$("#mabgtk").text(t + "/" + g[2] + "/BGTK");
			var e = t + "/" + g[2];
			$("#qr_code").attr("src", "https://chart.googleapis.com/chart?chs=60x60&cht=qr&chl=" + e + "&choe=UTF-8")
		} else {
			$("#mabgtk").text(t + "/" + g[2] + "/BGTK");
			e = t + "/" + g[2];
			$("#qr_code").attr("src", "https://chart.googleapis.com/chart?chs=60x60&cht=qr&chl=" + e + "&choe=UTF-8")
		}
	}), $("#land_area").focusout(function() {
		t = $("#land_area").val(), e = $("#construction_area").val(), document.getElementById("item-2").value = t - e, $("#land_area").text(formatNumber(t, ".", ","))
	}), $("#construction_area").focusout(function() {
		t = $("#land_area").val(), e = $("#construction_area").val(), document.getElementById("item-2").value = t - e, document.getElementById("item-1").value = e, document.getElementById("item-3").value = e
	});
	var s = 0;
	$("#sum_construction_area").focusout(function() {
		"" != (s = $("#sum_construction_area").val()) && (document.getElementById("item-1").value = s)
	}), $("#sum_garden_area").focusout(function() {
		var t = $("#sum_garden_area").val();
		"" != t && (document.getElementById("item-2").value = t)
	}), $("#sum_top_garden_area").focusout(function() {
		var t = $("#sum_top_garden_area").val();
		"" != t && (document.getElementById("item-3").value = t)
	}), $("#number_of_floor").focusout(function() {
		a = $("#number_of_floor").val(), e = $("#construction_area").val(), document.getElementById("item-1").value = e * a
	}), $("#roof_percent").focusout(function() {
		n = $("#roof_percent").val(), document.getElementById("item-1").value = e * a + e * n / 100 + e * o / 100, document.getElementById("item-3").value = e - e * n / 100
	}), $("#mezzanine_floor_percent").focusout(function() {
		"" != (o = $("#mezzanine_floor_percent").val()) && (t = $("#land_area").val(), e = $("#construction_area").val(), a = $("#number_of_floor").val(), document.getElementById("item-2").value = t - e, document.getElementById("item-1").value = e * a + e * n / 100 + e * o / 100), document.getElementById("item-3").value = e - e * n / 100
	}), $("#building_address").focusout(function() {
		var t = $("#building_address").val();
		$(".building_address").text(t)
	}), $("#recipient").focusout(function() {
		var t = $("#recipient").val();
		$(".recipient").text(t)
	}), $("#btn_print_hdtk").click(function() {
		window.print()
	}), $("#contract_code").focusout(function() {
		var t = $("#contract_code").val();
		$(".qr_code").text(t), $(".qr_code_hdtc").text(t + "/" + g[2] + "/HDTC"), $(".qr_code_hddt").text(t + "/" + g[2] + "/HDDT")
	}),$("#contract_code2").focusout(function() {
		var t = $("#contract_code2").val();
		$(".qr_code2").text(t), $(".qr_code_hdtc2").text(t + "/" + g[2] + "/HDTC"), $(".qr_code_hddt2").text(t + "/" + g[2] + "/HDDT")
	}),$("#contract__tkxd__address").focusout(function() {
		var t = $("#contract__tkxd__address").val();
		$(".contract__tkxd__address").text(t)
	}), $("#contract_codetcnt").focusout(function() {
		var t = $("#contract_codetcnt").val();
		$(".contract_codetcnt").text(t + "/" + g[2] + "/HDTC")
	}), $("#contract_price").focusout(function() {
		var t = $("#contract_price").val();
		$(".contract_price").text(formatNumber(t, ".", ","));
		var e = Number(t.replace(/[^0-9.-]+/g, "")),
			a = jsUcfirst(DOCSO.doc(e));
		$(".contract_price_word_auto").text(a);
		var n = Math.round(30 * e / 100),
			o = Math.round(50 * e / 100),
			i = Math.round(e - n - o);
		$(".payment_list_tcnt").html("<li><strong>Đợt 1:</strong><span> Sau khi ký kết hợp đồng, bên A tạm ứng trước cho bên B 30% giá trị hợp đồng. Số tiền: " + formatNumber(n, ".", ",") + " VNĐ.</span></li><li><strong>Đợt 2:</strong><span> Sau khi bên B thi công 50% khối lượng công việc, bên A tiếp tục tạm ứng cho bên B 50% giá trị hợp đồng. Số tiền: " + formatNumber(o, ".", ",") + " VNĐ.</span></li><li><strong>Đợt 3:</strong><span> Bên A thanh toán toàn bộ số tiền còn lại sau khi nghiệm thu và bàn giao toàn bộ công trình. Số tiền:  " + formatNumber(i, ".", ",") + " VNĐ.</span></li>");
		var r = Math.round(30 * e / 100),
			u = Math.round(30 * e / 100),
			m = Math.round(30 * e / 100);
		Math.round(e - r - u - m);
		$(".payment_list").html("<li>Đặt cọc 30% GTHĐ ngay sau khi Hợp đồng được ký kết, số tiền: " + formatNumber(r, ".", ",") + " VNĐ.</li><li>Tạm ứng 30% GTHĐ sau khi trình bày phương án mặt bằng, mặt tiền, số tiền: " + formatNumber(u, ".", ",") + " VNĐ.</li><li>Tạm ứng 30% GTHĐ sau khi trình bày phương án nội thất, số tiền: " + formatNumber(m, ".", ",") + " VNĐ.</li><li>Thanh toán giá trị còn lại theo quyết toán hợp đồng ngay khi Bên B bàn giao hồ sơ thiết kế.</li>");
		var l = Math.round(20 * e / 100),
			c = Math.round(10 * e / 100);
		$(".payment_list_hdtg").html("<li>Đợt 1: 20% GTHĐ sau khi ký kết hợp đồng: " + formatNumber(l, ".", ",") + " VNĐ.</li><li>Đợt 2: 20% GTHĐ sau khi đổ bê tông sàn tầng 2: " + formatNumber(l, ".", ",") + " VNĐ.</li><li>Đợt 3: 20% GTHĐ sau khi hoàn thành xong công việc ốp lát hoàn thiện trong nhà: " + formatNumber(l, ".", ",") + " VNĐ.</li><li>Đợt 4: 20% GTHĐ sau khi hoàn thành phần sơn và lắp đặt thiết bị vệ sinh, thiết bị   đèn: " + formatNumber(l, ".", ",") + " VNĐ.</li><li>Đợt 5: 10% GTHĐ sau khi tập kết vật tư nội thất tại chân công trình: " + formatNumber(c, ".", ",") + " VNĐ.</li><li>Đợt 6: 10% GTHĐ sau khi hoàn thành và bàn giao toàn bộ công trình: " + formatNumber(c, ".", ",") + " VNĐ.</li>");
		var _ = Math.round(e / 2),
			d = Math.round(e / 2),
			h = Math.round(e / 5);
		$(".contract-dt-thanhtoan").html("<li>-Tạm ứng 50% sau khi ký hợp đồng. Số tiền: " + formatNumber(_, ".", ",") + " VNĐ.</li><li>-Thanh toán 50% còn lại sau khi nghiệm thu bàn giao. Số tiền " + formatNumber(d, ".", ",") + " VNĐ.</li>"), $(".contract_price_phat").html("tương đương số tiền là " + formatNumber(h, ".", ",") + " VNĐ/ngày.")
	}), $("#contract_signed_date").focusout(function() {
		var t = $("#contract_signed_date").val();
		if ("" != t) {
			var e = t.split("/");
			$(".signed_date_auto").text("ngày " + e[0] + " tháng " + e[1] + " năm " + e[2]), $(".signed_date_auto_hdtk").text("Ngày " + e[0] + " tháng " + e[1] + " năm " + e[2]), $(".signed_date_auto_bgtk").text("Đà Nẵng, ngày " + e[0] + " tháng " + e[1] + " năm " + e[2])
		}
	}), $("#building_quymo").focusout(function() {
		var t = $("#building_quymo").val();
		$("#quymo").text(" " + t)
	}), $("#contract_date_start").focusout(function() {
		var t = $("#contract_date_start").val();
		$(".building_date_start").text(" " + t)
	}), $("#contract_date_end").focusout(function() {
		var t = $("#contract_date_end").val();
		$(".building_date_end").text(" " + t)
	}), $("#contract_day").focusout(function() {
		var t = $("#contract_day").val();
		$(".contract_day").text(t)
	}), $("#contract_day").focusout(function() {
		var t = $("#contract_day").val();
		$(".contract-time-finish").text(t + " ngày")
	}), $("#party_name").focusout(function() {
		var t = $("#party_name").val();
		$(".office_info_auto-name_customer").text(t.toUpperCase())
	}), $("#party_name_daidien").focusout(function() {
		var t = $("#party_name_daidien").val();
		$("#daidiendt").text(t)
	});
	var f = 0,
		b = 0,
		v = 0,
		p = 0;
	$(document).ready(function() {
		$("input:text").focus(function() {
			$(this).select()
		})
	}), $("#item-1").focusout(function() {
		var t = $("#item-1").val(),
			e = $("#don_gia_tk_chinh").val();
		if ("0,00" != t && "0,00" != e) {
			f = t * e, $(".use_area_item_total").text(formatNumber(f, ".", ","));
			var a = .1 * (i = f + v + b);
			r = i + a, $(".sub_total").text(formatNumber(i, ".", ",")), $(".vat_total").text(formatNumber(a, ".", ",")), $(".sum_total").text(formatNumber(r, ".", ",")), $(".sum_total_ko_thue").text(formatNumber(i, ".", ","));
			var n = jsUcfirst(DOCSO.doc(i));
			$(".contract_price_word_auto").text(n), $(".contract_price_word_auto_co_thue").text(jsUcfirst(DOCSO.doc(r)));
			var o = Math.round(30 * i / 100),
				u = Math.round(30 * i / 100),
				m = Math.round(30 * i / 100),
				l = (Math.round(i - o - u - m), Math.round(30 * r / 100)),
				c = Math.round(30 * r / 100),
				_ = Math.round(30 * r / 100);
			Math.round(r - l - c - _);
			$(".payment_list_co_thue").html("<li>Đặt cọc 30% GTHĐ ngay sau khi Hợp đồng được ký kết, số tiền: " + formatNumber(l, ".", ",") + " VNĐ.</li><li>Tạm ứng 30% GTHĐ sau khi trình bày phương án mặt bằng, mặt tiền, số tiền: " + formatNumber(c, ".", ",") + " VNĐ.</li><li>Tạm ứng 30% GTHĐ sau khi trình bày phương án nội thất, số tiền: " + formatNumber(_, ".", ",") + " VNĐ.</li><li>Thanh toán giá trị còn lại theo quyết toán hợp đồng ngay khi Bên B bàn giao hồ sơ thiết kế.</li>"), $(".payment_list_ko_thue").html("<li>Đặt cọc 30% GTHĐ ngay sau khi Hợp đồng được ký kết, số tiền: " + formatNumber(o, ".", ",") + " VNĐ.</li><li>Tạm ứng 30% GTHĐ sau khi trình bày phương án mặt bằng, mặt tiền, số tiền: " + formatNumber(u, ".", ",") + " VNĐ.</li><li>Tạm ứng 30% GTHĐ sau khi trình bày phương án nội thất, số tiền: " + formatNumber(m, ".", ",") + " VNĐ.</li><li>Thanh toán giá trị còn lại theo quyết toán hợp đồng ngay khi Bên B bàn giao hồ sơ thiết kế.</li>")
		}
	}), $("#item-2").focusout(function() {
		var t = $("#item-2").val(),
			e = $("#dongiavuon").val();
		if ("0,00" != t && "0,00" != e) {
			b = t * e, $(".garden_area_item_total").text(formatNumber(b, ".", ","));
			var a = .1 * (i = f + v + b);
			r = i + a, $(".sub_total").text(formatNumber(i, ".", ",")), $(".vat_total").text(formatNumber(a, ".", ",")), $(".sum_total").text(formatNumber(r, ".", ",")), $(".sum_total_ko_thue").text(formatNumber(i, ".", ","));
			var n = jsUcfirst(DOCSO.doc(i));
			$(".contract_price_word_auto").text(n), $(".contract_price_word_auto_co_thue").text(jsUcfirst(DOCSO.doc(r)));
			var o = Math.round(30 * i / 100),
				u = Math.round(30 * i / 100),
				m = Math.round(30 * i / 100),
				l = (Math.round(i - o - u - m), Math.round(30 * r / 100)),
				c = Math.round(30 * r / 100),
				_ = Math.round(30 * r / 100);
			Math.round(r - l - c - _);
			$(".payment_list_co_thue").html("<li>Đặt cọc 30% GTHĐ ngay sau khi Hợp đồng được ký kết, số tiền: " + formatNumber(l, ".", ",") + " VNĐ.</li><li>Tạm ứng 30% GTHĐ sau khi trình bày phương án mặt bằng, mặt tiền, số tiền: " + formatNumber(c, ".", ",") + " VNĐ.</li><li>Tạm ứng 30% GTHĐ sau khi trình bày phương án nội thất, số tiền: " + formatNumber(_, ".", ",") + " VNĐ.</li><li>Thanh toán giá trị còn lại theo quyết toán hợp đồng ngay khi Bên B bàn giao hồ sơ thiết kế.</li>"), $(".payment_list_ko_thue").html("<li>Đặt cọc 30% GTHĐ ngay sau khi Hợp đồng được ký kết, số tiền: " + formatNumber(o, ".", ",") + " VNĐ.</li><li>Tạm ứng 30% GTHĐ sau khi trình bày phương án mặt bằng, mặt tiền, số tiền: " + formatNumber(u, ".", ",") + " VNĐ.</li><li>Tạm ứng 30% GTHĐ sau khi trình bày phương án nội thất, số tiền: " + formatNumber(m, ".", ",") + " VNĐ.</li><li>Thanh toán giá trị còn lại theo quyết toán hợp đồng ngay khi Bên B bàn giao hồ sơ thiết kế.</li>")
		}
	}), $("#item-4").focusout(function() {
		var t = $("#item-4").val(),
			e = $("#dgkhac").val();
		p = t * e, $(".other_item_total").text(formatNumber(p, ".", ","))
	}), $("#dgkhac").focusout(function() {
		var t = $("#item-4").val(),
			e = $("#dgkhac").val();
		p = t * e, $(".other_item_total").text(formatNumber(p, ".", ",")), $("#dgkhac").val(formatNumber(e, ".", ","));
		var a = .1 * (i = f + v + b + p);
		r = i + a, $(".sub_total").text(formatNumber(i, ".", ",")), $(".vat_total").text(formatNumber(a, ".", ",")), $(".sum_total").text(formatNumber(r, ".", ",")), $(".sum_total_ko_thue").text(formatNumber(i, ".", ","));
		var n = jsUcfirst(DOCSO.doc(i));
		$(".contract_price_word_auto").text(n), $(".contract_price_word_auto_co_thue").text(jsUcfirst(DOCSO.doc(r)));
		var o = Math.round(30 * i / 100),
			u = Math.round(30 * i / 100),
			m = Math.round(30 * i / 100),
			l = (Math.round(i - o - u - m), Math.round(30 * r / 100)),
			c = Math.round(30 * r / 100),
			_ = Math.round(30 * r / 100);
		Math.round(r - l - c - _);
		$(".payment_list_co_thue").html("<li>Đặt cọc 30% GTHĐ ngay sau khi Hợp đồng được ký kết, số tiền: " + formatNumber(l, ".", ",") + " VNĐ.</li><li>Tạm ứng 30% GTHĐ sau khi trình bày phương án mặt bằng, mặt tiền, số tiền: " + formatNumber(c, ".", ",") + " VNĐ.</li><li>Tạm ứng 30% GTHĐ sau khi trình bày phương án nội thất, số tiền: " + formatNumber(_, ".", ",") + " VNĐ.</li><li>Thanh toán giá trị còn lại theo quyết toán hợp đồng ngay khi Bên B bàn giao hồ sơ thiết kế.</li>"), $(".payment_list_ko_thue").html("<li>Đặt cọc 30% GTHĐ ngay sau khi Hợp đồng được ký kết, số tiền: " + formatNumber(o, ".", ",") + " VNĐ.</li><li>Tạm ứng 30% GTHĐ sau khi trình bày phương án mặt bằng, mặt tiền, số tiền: " + formatNumber(u, ".", ",") + " VNĐ.</li><li>Tạm ứng 30% GTHĐ sau khi trình bày phương án nội thất, số tiền: " + formatNumber(m, ".", ",") + " VNĐ.</li><li>Thanh toán giá trị còn lại theo quyết toán hợp đồng ngay khi Bên B bàn giao hồ sơ thiết kế.</li>")
	}), $("#item-3").focusout(function() {
		var t = $("#item-3").val(),
			e = $("#dongiasanthuong").val();
		if ("0,00" != t && "0,00" != e) {
			v = t * e, $(".top_garden_area_item_total").text(formatNumber(v, ".", ","));
			var a = .1 * (i = f + v + b + p);
			r = i + a, $(".sub_total").text(formatNumber(i, ".", ",")), $(".vat_total").text(formatNumber(a, ".", ",")), $(".sum_total").text(formatNumber(r, ".", ",")), $(".sum_total_ko_thue").text(formatNumber(i, ".", ","));
			var n = jsUcfirst(DOCSO.doc(i));
			$(".contract_price_word_auto").text(n), $(".contract_price_word_auto_co_thue").text(jsUcfirst(DOCSO.doc(r)));
			var o = Math.round(30 * i / 100),
				u = Math.round(30 * i / 100),
				m = Math.round(30 * i / 100),
				l = (Math.round(i - o - u - m), Math.round(30 * r / 100)),
				c = Math.round(30 * r / 100),
				_ = Math.round(30 * r / 100);
			Math.round(r - l - c - _);
			$(".payment_list_co_thue").html("<li>Đặt cọc 30% GTHĐ ngay sau khi Hợp đồng được ký kết, số tiền: " + formatNumber(l, ".", ",") + " VNĐ.</li><li>Tạm ứng 30% GTHĐ sau khi trình bày phương án mặt bằng, mặt tiền, số tiền: " + formatNumber(c, ".", ",") + " VNĐ.</li><li>Tạm ứng 30% GTHĐ sau khi trình bày phương án nội thất, số tiền: " + formatNumber(_, ".", ",") + " VNĐ.</li><li>Thanh toán giá trị còn lại theo quyết toán hợp đồng ngay khi Bên B bàn giao hồ sơ thiết kế.</li>"), $(".payment_list_ko_thue").html("<li>Đặt cọc 30% GTHĐ ngay sau khi Hợp đồng được ký kết, số tiền: " + formatNumber(o, ".", ",") + " VNĐ.</li><li>Tạm ứng 30% GTHĐ sau khi trình bày phương án mặt bằng, mặt tiền, số tiền: " + formatNumber(u, ".", ",") + " VNĐ.</li><li>Tạm ứng 30% GTHĐ sau khi trình bày phương án nội thất, số tiền: " + formatNumber(m, ".", ",") + " VNĐ.</li><li>Thanh toán giá trị còn lại theo quyết toán hợp đồng ngay khi Bên B bàn giao hồ sơ thiết kế.</li>")
		}
	}), $("#don_gia_tk_chinh").focusout(function() {
		var t = $("#item-1").val(),
			e = $("#don_gia_tk_chinh").val();
		if ("0,00" != t && "0,00" != e) {
			f = t * e, $(".use_area_item_total").text(formatNumber(f, ".", ",")), $("#don_gia_tk_chinh").val(formatNumber(e, ".", ","));
			var a = .1 * (i = f + v + b + p);
			r = i + a, $(".sub_total").text(formatNumber(i, ".", ",")), $(".vat_total").text(formatNumber(a, ".", ",")), $(".sum_total").text(formatNumber(r, ".", ",")), $(".sum_total_ko_thue").text(formatNumber(i, ".", ","));
			var n = jsUcfirst(DOCSO.doc(i));
			$(".contract_price_word_auto").text(n), $(".contract_price_word_auto_co_thue").text(jsUcfirst(DOCSO.doc(r)));
			var o = Math.round(30 * i / 100),
				u = Math.round(30 * i / 100),
				m = Math.round(30 * i / 100),
				l = (Math.round(i - o - u - m), Math.round(30 * r / 100)),
				c = Math.round(30 * r / 100),
				_ = Math.round(30 * r / 100);
			Math.round(r - l - c - _);
			$(".payment_list_co_thue").html("<li>Đặt cọc 30% GTHĐ ngay sau khi Hợp đồng được ký kết, số tiền: " + formatNumber(l, ".", ",") + " VNĐ.</li><li>Tạm ứng 30% GTHĐ sau khi trình bày phương án mặt bằng, mặt tiền, số tiền: " + formatNumber(c, ".", ",") + " VNĐ.</li><li>Tạm ứng 30% GTHĐ sau khi trình bày phương án nội thất, số tiền: " + formatNumber(_, ".", ",") + " VNĐ.</li><li>Thanh toán giá trị còn lại theo quyết toán hợp đồng ngay khi Bên B bàn giao hồ sơ thiết kế.</li>"), $(".payment_list_ko_thue").html("<li>Đặt cọc 30% GTHĐ ngay sau khi Hợp đồng được ký kết, số tiền: " + formatNumber(o, ".", ",") + " VNĐ.</li><li>Tạm ứng 30% GTHĐ sau khi trình bày phương án mặt bằng, mặt tiền, số tiền: " + formatNumber(u, ".", ",") + " VNĐ.</li><li>Tạm ứng 30% GTHĐ sau khi trình bày phương án nội thất, số tiền: " + formatNumber(m, ".", ",") + " VNĐ.</li><li>Thanh toán giá trị còn lại theo quyết toán hợp đồng ngay khi Bên B bàn giao hồ sơ thiết kế.</li>")
		}
	}), $("#dongiavuon").focusout(function() {
		var t = $("#item-2").val(),
			e = $("#dongiavuon").val();
		if ("0,00" != t && "0,00" != e) {
			b = t * e, $(".garden_area_item_total").text(formatNumber(b, ".", ",")), $("#dongiavuon").val(formatNumber(e, ".", ","));
			var a = .1 * (i = f + v + b + p);
			r = i + a, $(".sub_total").text(formatNumber(i, ".", ",")), $(".vat_total").text(formatNumber(a, ".", ",")), $(".sum_total").text(formatNumber(r, ".", ",")), $(".sum_total_ko_thue").text(formatNumber(i, ".", ","));
			var n = jsUcfirst(DOCSO.doc(i));
			$(".contract_price_word_auto").text(n), $(".contract_price_word_auto_co_thue").text(jsUcfirst(DOCSO.doc(r)));
			var o = Math.round(30 * i / 100),
				u = Math.round(30 * i / 100),
				m = Math.round(30 * i / 100),
				l = (Math.round(i - o - u - m), Math.round(30 * r / 100)),
				c = Math.round(30 * r / 100),
				_ = Math.round(30 * r / 100);
			Math.round(r - l - c - _);
			$(".payment_list_co_thue").html("<li>Đặt cọc 30% GTHĐ ngay sau khi Hợp đồng được ký kết, số tiền: " + formatNumber(l, ".", ",") + " VNĐ.</li><li>Tạm ứng 30% GTHĐ sau khi trình bày phương án mặt bằng, mặt tiền, số tiền: " + formatNumber(c, ".", ",") + " VNĐ.</li><li>Tạm ứng 30% GTHĐ sau khi trình bày phương án nội thất, số tiền: " + formatNumber(_, ".", ",") + " VNĐ.</li><li>Thanh toán giá trị còn lại theo quyết toán hợp đồng ngay khi Bên B bàn giao hồ sơ thiết kế.</li>"), $(".payment_list_ko_thue").html("<li>Đặt cọc 30% GTHĐ ngay sau khi Hợp đồng được ký kết, số tiền: " + formatNumber(o, ".", ",") + " VNĐ.</li><li>Tạm ứng 30% GTHĐ sau khi trình bày phương án mặt bằng, mặt tiền, số tiền: " + formatNumber(u, ".", ",") + " VNĐ.</li><li>Tạm ứng 30% GTHĐ sau khi trình bày phương án nội thất, số tiền: " + formatNumber(m, ".", ",") + " VNĐ.</li><li>Thanh toán giá trị còn lại theo quyết toán hợp đồng ngay khi Bên B bàn giao hồ sơ thiết kế.</li>")
		}
	}), $("#dongiasanthuong").focusout(function() {
		var t = $("#item-3").val(),
			e = $("#dongiasanthuong").val();
		if ("0,00" != t && "0,00" != e) {
			v = t * e, $(".top_garden_area_item_total").text(formatNumber(v, ".", ",")), $("#dongiasanthuong").val(formatNumber(e, ".", ","));
			var a = .1 * (i = f + v + b + p);
			r = i + a, $(".sub_total").text(formatNumber(i, ".", ",")), $(".vat_total").text(formatNumber(a, ".", ",")), $(".sum_total").text(formatNumber(r, ".", ",")), $(".sum_total_ko_thue").text(formatNumber(i, ".", ","));
			var n = jsUcfirst(DOCSO.doc(i));
			$(".contract_price_word_auto").text(n), $(".contract_price_word_auto_co_thue").text(jsUcfirst(DOCSO.doc(r)));
			var o = Math.round(30 * i / 100),
				u = Math.round(30 * i / 100),
				m = Math.round(30 * i / 100),
				l = (Math.round(i - o - u - m), Math.round(30 * r / 100)),
				c = Math.round(30 * r / 100),
				_ = Math.round(30 * r / 100);
			Math.round(r - l - c - _);
			$(".payment_list_co_thue").html("<li>Đặt cọc 30% GTHĐ ngay sau khi Hợp đồng được ký kết, số tiền: " + formatNumber(l, ".", ",") + " VNĐ.</li><li>Tạm ứng 30% GTHĐ sau khi trình bày phương án mặt bằng, mặt tiền, số tiền: " + formatNumber(c, ".", ",") + " VNĐ.</li><li>Tạm ứng 30% GTHĐ sau khi trình bày phương án nội thất, số tiền: " + formatNumber(_, ".", ",") + " VNĐ.</li><li>Thanh toán giá trị còn lại theo quyết toán hợp đồng ngay khi Bên B bàn giao hồ sơ thiết kế.</li>"), $(".payment_list_ko_thue").html("<li>Đặt cọc 30% GTHĐ ngay sau khi Hợp đồng được ký kết, số tiền: " + formatNumber(o, ".", ",") + " VNĐ.</li><li>Tạm ứng 30% GTHĐ sau khi trình bày phương án mặt bằng, mặt tiền, số tiền: " + formatNumber(u, ".", ",") + " VNĐ.</li><li>Tạm ứng 30% GTHĐ sau khi trình bày phương án nội thất, số tiền: " + formatNumber(m, ".", ",") + " VNĐ.</li><li>Thanh toán giá trị còn lại theo quyết toán hợp đồng ngay khi Bên B bàn giao hồ sơ thiết kế.</li>")
		}
	}), $("#party_name").focusout(function() {
		var t = $("#party_name").val();
		$("#ngDaiDien").text(" " + t)
	}), $("#party_yearofbirth").focusout(function() {
		var t = $("#party_yearofbirth").val();
		$(".party_yearofbirth").text(t)
	}), $("#party_id").focusout(function() {
		var t = $("#party_id").val();
		$(".party_id").text(t)
	}), $("#party_id_provided_by").focusout(function() {
		var t = $("#party_id_provided_by").val();
		$(".party_id_provided_by").text(t)
	}), $("#party_address").focusout(function() {
		var t = $("#party_address").val();
		$(".party_address").text(t)
	}), $("#party_phone").focusout(function() {
		var t = $("#party_phone").val();
		$(".party_phone").text(t)
	}), $("#party_email").focusout(function() {
		var t = $("#party_email").val();
		$(".party_email").text(t)
	}), $("#staff_name").focusout(function() {
		var t = $("#staff_name").val();
		$(".staff_name").text(t)
	}), $("#ggt_code").focusout(function() {
		var t = $("#ggt_code").val();
		$(".qr_code").text(t + "/" + g[2] + "/GGT")
	}), $("#staff_id").focusout(function() {
		var t = $("#staff_id").val();
		$(".staff_id").text(t)
	}), $("#to_name").focusout(function() {
		var t = $("#to_name").val();
		$(".to_name").text(t)
	}), $("#to_do").focusout(function() {
		var t = $("#to_do").val();
		$(".to_do").text(t)
	}), $("#contract_day").focusout(function() {
		var t = $("#contract_day").val();
		$(".contract_day").text(t)
	}), $("#vv_thi_cong").focusout(function() {
		var t = $("#vv_thi_cong").val();
		$(".vv_thi_cong").text(t)
	})
});
var DOCSO = function() {
	var t = ["không", "một", "hai", "ba", "bốn", "năm", "sáu", "bảy", "tám", "chín"],
		e = function(e, a) {
			var n = "",
				o = Math.floor(e / 10),
				i = e % 10;
			return o > 1 ? (n = " " + t[o] + " mươi", 1 == i && (n += " mốt")) : 1 == o ? (n = " mười", 1 == i && (n += " một")) : a && i > 0 && (n = " lẻ"), 5 == i && o >= 1 ? n += " lăm" : 4 == i && o >= 1 ? n += " bốn" : (i > 1 || 1 == i && 0 == o) && (n += " " + t[i]), n
		},
		a = function(a, n) {
			var o = "",
				i = Math.floor(a / 100);
			a %= 100;
			return n || i > 0 ? (o = " " + t[i] + " trăm ", o += e(a, !0)) : o = e(a, !1), o
		},
		n = function(t, e) {
			var n = "",
				o = Math.floor(t / 1e6);
			t %= 1e6;
			o > 0 && (n = a(o, e) + " triệu ", e = !0);
			var i = Math.floor(t / 1e3);
			t %= 1e3;
			return i > 0 && (n += a(i, e) + " ngàn ", e = !0), t > 0 && (n += a(t, e)), n
		};
	return {
		doc: function(e) {
			if (0 == e) return t[0];
			var a = "",
				o = "";
			do {
				ty = e % 1e9, a = (e = Math.floor(e / 1e9)) > 0 ? n(ty, !0) + o + a : n(ty, !1) + o + a, o = " tỷ "
			} while (e > 0);
			return a.trim()
		}
	}
}();

function formatNumber(t, e, a) {
	x = (t += "").split(e), x1 = x[0], x2 = x.length > 1 ? "." + x[1] : "";
	for (var n = /(\d+)(\d{3})/; n.test(x1);) x1 = x1.replace(n, "$1" + a + "$2");
	return x1 + x2
}

function hideShowVAT() {
	var t = document.getElementById("vat");
	document.getElementById("vat");
	if (1 == t.checked) {
		$(".vat_row").show(), $(".no_included_vat_note").hide(), $(".sum_total").text(formatNumber(tongtien, ".", ","));
		var e = jsUcfirst(DOCSO.doc(tongtien));
		$("#sumtoal").text(e)
	} else {
		$(".vat_row").hide(), $(".no_included_vat_note").show(), $(".sum_total").text(formatNumber(tongtienChuaThue, ".", ","));
		e = jsUcfirst(DOCSO.doc(tongtienChuaThue));
		$("#sumtoal").text(e)
	}
}

function hideShowVAT_HDTK() {
	1 == document.getElementById("vat_hdtk").checked ? ($(".vat_row").show(), $(".vat_show").hide(), $(".vat_row_ko_thue").hide(), $(".no_included_vat_note").hide(), $(".payment_list_co_thue").show(), $(".payment_list_ko_thue").hide()) : ($(".vat_row").hide(), $(".vat_show").show(), $(".vat_row_ko_thue").show(), $(".no_included_vat_note").show(), $(".payment_list_co_thue").hide(), $(".payment_list_ko_thue").show())
}

function format_curency(t) {
	t.value = t.value.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")
}

function jsUcfirst(t) {
	return t.charAt(0).toUpperCase() + t.slice(1)
}

function exportHTML() {
	var t = "<html xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:w='urn:schemas-microsoft-com:office:word' xmlns='http://www.w3.org/TR/REC-html40'><head><meta charset='utf-8'><title>Export HTML to Word Document with JavaScript</title></head><body>" + document.getElementById("print-this").innerHTML + "</body></html>",
		e = "data:application/vnd.ms-word;charset=utf-8," + encodeURIComponent(t),
		a = document.createElement("a");
	document.body.appendChild(a), a.href = e, a.download = "document.doc", a.click(), document.body.removeChild(a)
}

function Export2Doc(t, e = "") {
	var a = "<html xmlns:o='urn:schemas-microsoft-com:office:officexmlns:w='urn:schemas-microsoft-com:office:word'xmlns='http://www.w3.org/TR/REC-html40'><head><meta charset='utf-8'><title>Export HTML To Doc</title></head><body>" + document.getElementById(t).innerHTML + "</body></html>",
		n = new Blob(["\ufeff", a], {
			type: "application/msword"
		}),
		o = "data:application/vnd.ms-word;charset=utf-8," + encodeURIComponent(a);
	e = e ? e + ".doc" : "document.doc";
	var i = document.createElement("a");
	document.body.appendChild(i), navigator.msSaveOrOpenBlob ? navigator.msSaveOrOpenBlob(n, e) : (i.href = o, i.download = e, i.click()), document.body.removeChild(i)
}

function resetAll() {
	$("#contract_code").value = "", $("#contract_signed_date").value = "", $("#land_area").value = "", $("#basement_floor_area").value = "", $("#basement_deep").value = "", $("#construction_area").value = "", $("#building_address").value = "", $("#building_type").value = "", $("#recipient").value = "", $("#thoi_han_bao_gia").value = ""
}

function myFunction() {
	var t = document.getElementById("office_id").value;
	$("#office_id option:selected").text(), $("#bgtk_code").val();
	"dn" == t ? ($(".office_info_auto-name").text("CÔNG TY KIẾN TRÚC KAVILA"), $(".office_info_auto-address").text("246 Lê Thanh Nghị, Q. Hải Châu, TP. Đà Nẵng"), $(".office_info_auto-position").text("Giám đốc"), $(".office_info_auto-representative").text("Trịnh Thái Hoàng")) : ($(".office_info_auto-name").text("CÔNG TY KIẾN TRÚC KAVILA - Chi nhánh khác"), $(".office_info_auto-address").text(".................................."), $(".office_info_auto-position").text("Giám đốc điều hành"), $(".office_info_auto-representative").text(".................................."))
}

function validatedate(t) {
	if (!t.value.match(/^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/)) return alert("Sai định dạng! Nhập đúng định dạng dd/mm/yyyy!"), document.getElementById("contract_signed_date").focus(), !1;
	var e = t.value.split("/"),
		a = t.value.split("-");
	if (lopera1 = e.length, lopera2 = a.length, lopera1 > 1) var n = t.value.split("/");
	else if (lopera2 > 1) n = t.value.split("-");
	var o = parseInt(n[0]),
		i = parseInt(n[1]),
		r = parseInt(n[2]);
	if ((1 == i || i > 2) && o > [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31][i - 1]) return alert("Sai định dạng! Nhập đúng định dạng dd/mm/yyyy!"), document.getElementById("contract_signed_date").focus(), !1;
	if (2 == i) {
		var u = !1;
		if ((r % 4 || !(r % 100)) && r % 400 || (u = !0), 0 == u && o >= 29) return alert("Sai định dạng! Nhập đúng định dạng dd/mm/yyyy!"), document.getElementById("contract_signed_date").focus(), !1;
		if (1 == u && o > 29) return alert("Sai định dạng! Nhập đúng định dạng dd/mm/yyyy!"), document.getElementById("contract_signed_date").focus(), !1
	}
}

function myFunctionHDTK() {
	var t = document.getElementById("office_id").value;
	$("#office_id option:selected").text(), $("#bgtk_code").val();
	"dn" == t ? ($(".office_info_auto-name").text("CÔNG TY KIẾN TRÚC KAVILA"), $(".office_info_auto-address").text("246 Lê Thanh Nghị, Q. Hải Châu, TP. Đà Nẵng"), $(".office_info_auto-position").text("Giám đốc"), $(".office_info_auto-representative").text("Trịnh Thái Hoàng"), $(".office_info_auto-bank").text("0041000123456 - Ngân hàng Vietcombank Đà Nẵng"), $(".office_info_auto-tax_code").text("0401 436 026"), $(".office_info_auto-phone").text("(02366) 500 246"), $(".office_info_auto-email").text("kavilavn@gmail.com")) : ($(".office_info_auto-name").text("CHI NHÁNH KHÁC"), $(".office_info_auto-address").text(".................................."), $(".office_info_auto-position").text("Giám đốc điều hành"), $(".office_info_auto-representative").text(".................................."), $(".office_info_auto-bank").text(".................................."), $(".office_info_auto-tax_code").text(".................................."), $(".office_info_auto-phone").text(".................................."), $(".office_info_auto-email").text(".................................."))
}

function buildingStyle() {
	if (buildingStyleId = document.getElementById("building_style").value, 0 != buildingStyleId) {
		var t = $("#building_style option:selected").text();
		$(".building_style_auto-title").text(t)
	}
}

function buildingStatus() {
	if (buildingStatusId = document.getElementById("building_status").value, 0 != buildingStatusId) {
		var t = $("#building_status option:selected").text();
		$(".building_status_auto-title").text(t)
	}
}

function showHideContractFull() {
	var t = document.getElementById("hdtc-them");
	"none" === t.style.display ? t.style.display = "block" : t.style.display = "none"
}

function buildingType() {
	if (buildingTypeId = document.getElementById("building_type").value, 0 != buildingTypeId) {
		var t = $("#building_type option:selected").text();
		$(".building_type_auto-title").text(t);
		var e = new XMLHttpRequest;
		e.open("GET", "price.json", !0), e.setRequestHeader("content-type", "application/json"), e.onreadystatechange = function() {
			if (4 == e.readyState && 200 == e.status) {
				var t = JSON.parse(e.responseText);
				if ("nha_pho_1mt" == buildingTypeId)
					if ("tk_moi" == contractTypeId) {
						console.log(buildingTypeId + "-" + contractTypeId);
						var a = t[0].type[1].Price,
							n = t[2].type[1].Price,
							o = t[2].type[1].Price;
						$("#don_gia_tk_chinh").val(formatNumber(a, ".", ",")), $("#dongiavuon").val(formatNumber(n, ".", ",")), $("#dongiasanthuong").val(formatNumber(o, ".", ","));
						var i = a * document.getElementById("item-1").value;
						$(".use_area_item_total").text(formatNumber(i, ".", ","));
						var r = n * document.getElementById("item-2").value;
						$(".garden_area_item_total").text(formatNumber(r, ".", ","));
						var u = o * document.getElementById("item-3").value;
						$(".top_garden_area_item_total").text(formatNumber(u, ".", ",")), $(".sub_total").text(formatNumber(i + r + u, ".", ",")), $(".vat_total").text(formatNumber(.1 * (i + r + u), ".", ",")), $(".sum_total").text(formatNumber(i + r + u + .1 * (i + r + u), ".", ",")), tongtien = i + r + u + .1 * (i + r + u), tongtienChuaThue = i + r + u;
						var m = jsUcfirst(DOCSO.doc(tongtien));
						$("#sumtoal").text(m)
					} else if ("tk_cai_tao" == contractTypeId) {
					console.log(buildingTypeId + "-" + contractTypeId);
					a = t[1].type[0].Price, n = t[2].type[0].Price, o = t[2].type[0].Price;
					$("#don_gia_tk_chinh").val(formatNumber(a, ".", ",")), $("#dongiavuon").val(formatNumber(n, ".", ",")), $("#dongiasanthuong").val(formatNumber(o, ".", ","));
					i = a * document.getElementById("item-1").value;
					$(".use_area_item_total").text(formatNumber(i, ".", ","));
					r = n * document.getElementById("item-2").value;
					$(".garden_area_item_total").text(formatNumber(r, ".", ","));
					u = o * document.getElementById("item-3").value;
					$(".top_garden_area_item_total").text(formatNumber(u, ".", ",")), $(".sub_total").text(formatNumber(i + r + u, ".", ",")), $(".vat_total").text(formatNumber(.1 * (i + r + u), ".", ",")), $(".sum_total").text(formatNumber(i + r + u + .1 * (i + r + u), ".", ",")), tongtien = i + r + u + .1 * (i + r + u), tongtienChuaThue = i + r + u;
					m = jsUcfirst(DOCSO.doc(tongtien));
					$("#sumtoal").text(m)
				} else {
					console.log(buildingTypeId + "-" + contractTypeId);
					a = t[2].type[0].Price, n = t[2].type[0].Price, o = t[2].type[0].Price;
					$("#don_gia_tk_chinh").val(formatNumber(a, ".", ",")), $("#dongiavuon").val(formatNumber(n, ".", ",")), $("#dongiasanthuong").val(formatNumber(o, ".", ","));
					i = a * document.getElementById("item-1").value;
					$(".use_area_item_total").text(formatNumber(i, ".", ","));
					r = n * document.getElementById("item-2").value;
					$(".garden_area_item_total").text(formatNumber(r, ".", ","));
					u = o * document.getElementById("item-3").value;
					$(".top_garden_area_item_total").text(formatNumber(u, ".", ",")), $(".sub_total").text(formatNumber(i + r + u, ".", ",")), $(".vat_total").text(formatNumber(.1 * (i + r + u), ".", ",")), $(".sum_total").text(formatNumber(i + r + u + .1 * (i + r + u), ".", ",")), tongtien = i + r + u + .1 * (i + r + u), tongtienChuaThue = i + r + u;
					m = jsUcfirst(DOCSO.doc(tongtien));
					$("#sumtoal").text(m)
				} else if ("nha_pho_2mt" == buildingTypeId)
					if ("tk_moi" == contractTypeId) {
						console.log(buildingTypeId + "-" + contractTypeId);
						a = t[0].type[1].Price, n = t[2].type[1].Price, o = t[2].type[1].Price;
						$("#don_gia_tk_chinh").val(formatNumber(a, ".", ",")), $("#dongiavuon").val(formatNumber(n, ".", ",")), $("#dongiasanthuong").val(formatNumber(o, ".", ","));
						i = a * document.getElementById("item-1").value;
						$(".use_area_item_total").text(formatNumber(i, ".", ","));
						r = n * document.getElementById("item-2").value;
						$(".garden_area_item_total").text(formatNumber(r, ".", ","));
						u = o * document.getElementById("item-3").value;
						$(".top_garden_area_item_total").text(formatNumber(u, ".", ",")), $(".sub_total").text(formatNumber(i + r + u, ".", ",")), $(".vat_total").text(formatNumber(.1 * (i + r + u), ".", ",")), $(".sum_total").text(formatNumber(i + r + u + .1 * (i + r + u), ".", ",")), tongtien = i + r + u + .1 * (i + r + u), tongtienChuaThue = i + r + u;
						m = jsUcfirst(DOCSO.doc(tongtien));
						$("#sumtoal").text(m)
					} else if ("tk_cai_tao" == contractTypeId) {
					console.log(buildingTypeId + "-" + contractTypeId);
					a = t[1].type[0].Price, n = t[2].type[0].Price, o = t[2].type[0].Price;
					$("#don_gia_tk_chinh").val(formatNumber(a, ".", ",")), $("#dongiavuon").val(formatNumber(n, ".", ",")), $("#dongiasanthuong").val(formatNumber(o, ".", ","));
					i = a * document.getElementById("item-1").value;
					$(".use_area_item_total").text(formatNumber(i, ".", ","));
					r = n * document.getElementById("item-2").value;
					$(".garden_area_item_total").text(formatNumber(r, ".", ","));
					u = o * document.getElementById("item-3").value;
					$(".top_garden_area_item_total").text(formatNumber(u, ".", ",")), $(".sub_total").text(formatNumber(i + r + u, ".", ",")), $(".vat_total").text(formatNumber(.1 * (i + r + u), ".", ",")), $(".sum_total").text(formatNumber(i + r + u + .1 * (i + r + u), ".", ",")), tongtien = i + r + u + .1 * (i + r + u), tongtienChuaThue = i + r + u;
					m = jsUcfirst(DOCSO.doc(tongtien));
					$("#sumtoal").text(m)
				} else {
					console.log(buildingTypeId + "-" + contractTypeId);
					a = t[2].type[0].Price, n = t[2].type[0].Price, o = t[2].type[0].Price;
					$("#don_gia_tk_chinh").val(formatNumber(a, ".", ",")), $("#dongiavuon").val(formatNumber(n, ".", ",")), $("#dongiasanthuong").val(formatNumber(o, ".", ","));
					i = a * document.getElementById("item-1").value;
					$(".use_area_item_total").text(formatNumber(i, ".", ","));
					r = n * document.getElementById("item-2").value;
					$(".garden_area_item_total").text(formatNumber(r, ".", ","));
					u = o * document.getElementById("item-3").value;
					$(".top_garden_area_item_total").text(formatNumber(u, ".", ",")), $(".sub_total").text(formatNumber(i + r + u, ".", ",")), $(".vat_total").text(formatNumber(.1 * (i + r + u), ".", ",")), $(".sum_total").text(formatNumber(i + r + u + .1 * (i + r + u), ".", ",")), tongtien = i + r + u + .1 * (i + r + u), tongtienChuaThue = i + r + u;
					m = jsUcfirst(DOCSO.doc(tongtien));
					$("#sumtoal").text(m)
				} else if ("biet_thu_hien_dai" == buildingTypeId || "bar_nha_hang_cafe" == buildingTypeId)
					if ("tk_moi" == contractTypeId) {
						console.log(buildingTypeId + "-" + contractTypeId);
						a = t[0].type[2].Price, n = t[2].type[3].Price, o = t[2].type[3].Price;
						$("#don_gia_tk_chinh").val(formatNumber(a, ".", ",")), $("#dongiavuon").val(formatNumber(n, ".", ",")), $("#dongiasanthuong").val(formatNumber(o, ".", ","));
						i = a * document.getElementById("item-1").value;
						$(".use_area_item_total").text(formatNumber(i, ".", ","));
						r = n * document.getElementById("item-2").value;
						$(".garden_area_item_total").text(formatNumber(r, ".", ","));
						u = o * document.getElementById("item-3").value;
						$(".top_garden_area_item_total").text(formatNumber(u, ".", ",")), $(".sub_total").text(formatNumber(i + r + u, ".", ",")), $(".vat_total").text(formatNumber(.1 * (i + r + u), ".", ",")), $(".sum_total").text(formatNumber(i + r + u + .1 * (i + r + u), ".", ",")), tongtien = i + r + u + .1 * (i + r + u), tongtienChuaThue = i + r + u;
						m = jsUcfirst(DOCSO.doc(tongtien));
						$("#sumtoal").text(m)
					} else if ("tk_cai_tao" == contractTypeId) {
					a = t[1].type[2].Price, n = t[2].type[2].Price, o = t[2].type[2].Price;
					$("#don_gia_tk_chinh").val(formatNumber(a, ".", ",")), $("#dongiavuon").val(formatNumber(n, ".", ",")), $("#dongiasanthuong").val(formatNumber(o, ".", ","));
					i = a * document.getElementById("item-1").value;
					$(".use_area_item_total").text(formatNumber(i, ".", ","));
					r = n * document.getElementById("item-2").value;
					$(".garden_area_item_total").text(formatNumber(r, ".", ","));
					u = o * document.getElementById("item-3").value;
					$(".top_garden_area_item_total").text(formatNumber(u, ".", ",")), $(".sub_total").text(formatNumber(i + r + u, ".", ",")), $(".vat_total").text(formatNumber(.1 * (i + r + u), ".", ",")), $(".sum_total").text(formatNumber(i + r + u + .1 * (i + r + u), ".", ",")), tongtien = i + r + u + .1 * (i + r + u), tongtienChuaThue = i + r + u;
					m = jsUcfirst(DOCSO.doc(tongtien));
					$("#sumtoal").text(m)
				} else {
					console.log(buildingTypeId + "-" + contractTypeId);
					a = t[2].type[2].Price, n = t[2].type[2].Price, o = t[2].type[2].Price;
					$("#don_gia_tk_chinh").val(formatNumber(a, ".", ",")), $("#dongiavuon").val(formatNumber(n, ".", ",")), $("#dongiasanthuong").val(formatNumber(o, ".", ","));
					i = a * document.getElementById("item-1").value;
					$(".use_area_item_total").text(formatNumber(i, ".", ","));
					r = n * document.getElementById("item-2").value;
					$(".garden_area_item_total").text(formatNumber(r, ".", ","));
					u = o * document.getElementById("item-3").value;
					$(".top_garden_area_item_total").text(formatNumber(u, ".", ",")), $(".sub_total").text(formatNumber(i + r + u, ".", ",")), $(".vat_total").text(formatNumber(.1 * (i + r + u), ".", ",")), $(".sum_total").text(formatNumber(i + r + u + .1 * (i + r + u), ".", ",")), tongtien = i + r + u + .1 * (i + r + u), tongtienChuaThue = i + r + u;
					m = jsUcfirst(DOCSO.doc(tongtien));
					$("#sumtoal").text(m)
				} else if (console.log(buildingTypeId + "-" + contractTypeId), "tk_moi" == contractTypeId) {
					console.log(buildingTypeId + "-" + contractTypeId);
					a = t[0].type[3].Price, n = t[2].type[3].Price, o = t[2].type[3].Price;
					$("#don_gia_tk_chinh").val(formatNumber(a, ".", ",")), $("#dongiavuon").val(formatNumber(n, ".", ",")), $("#dongiasanthuong").val(formatNumber(o, ".", ","));
					i = a * document.getElementById("item-1").value;
					$(".use_area_item_total").text(formatNumber(i, ".", ","));
					r = n * document.getElementById("item-2").value;
					$(".garden_area_item_total").text(formatNumber(r, ".", ","));
					u = o * document.getElementById("item-3").value;
					$(".top_garden_area_item_total").text(formatNumber(u, ".", ",")), $(".sub_total").text(formatNumber(i + r + u, ".", ",")), $(".vat_total").text(formatNumber(.1 * (i + r + u), ".", ",")), $(".sum_total").text(formatNumber(i + r + u + .1 * (i + r + u), ".", ",")), tongtien = i + r + u + .1 * (i + r + u), tongtienChuaThue = i + r + u;
					m = jsUcfirst(DOCSO.doc(tongtien));
					$("#sumtoal").text(m)
				} else if ("tk_cai_tao" == contractTypeId) {
					console.log(buildingTypeId + "-" + contractTypeId);
					a = t[1].type[2].Price, n = t[2].type[2].Price, o = t[2].type[2].Price;
					$("#don_gia_tk_chinh").val(formatNumber(a, ".", ",")), $("#dongiavuon").val(formatNumber(n, ".", ",")), $("#dongiasanthuong").val(formatNumber(o, ".", ","));
					i = a * document.getElementById("item-1").value;
					$(".use_area_item_total").text(formatNumber(i, ".", ","));
					r = n * document.getElementById("item-2").value;
					$(".garden_area_item_total").text(formatNumber(r, ".", ","));
					u = o * document.getElementById("item-3").value;
					$(".top_garden_area_item_total").text(formatNumber(u, ".", ",")), $(".sub_total").text(formatNumber(i + r + u, ".", ",")), $(".vat_total").text(formatNumber(.1 * (i + r + u), ".", ",")), $(".sum_total").text(formatNumber(i + r + u + .1 * (i + r + u), ".", ",")), tongtien = i + r + u + .1 * (i + r + u), tongtienChuaThue = i + r + u;
					m = jsUcfirst(DOCSO.doc(tongtien));
					$("#sumtoal").text(m)
				} else {
					console.log(buildingTypeId + "-" + contractTypeId);
					a = t[2].type[2].Price, n = t[2].type[2].Price, o = t[2].type[2].Price;
					$("#don_gia_tk_chinh").val(formatNumber(a, ".", ",")), $("#dongiavuon").val(formatNumber(n, ".", ",")), $("#dongiasanthuong").val(formatNumber(o, ".", ","));
					i = a * document.getElementById("item-1").value;
					$(".use_area_item_total").text(formatNumber(i, ".", ","));
					r = n * document.getElementById("item-2").value;
					$(".garden_area_item_total").text(formatNumber(r, ".", ","));
					u = o * document.getElementById("item-3").value;
					$(".top_garden_area_item_total").text(formatNumber(u, ".", ",")), $(".sub_total").text(formatNumber(i + r + u, ".", ",")), $(".vat_total").text(formatNumber(.1 * (i + r + u), ".", ",")), $(".sum_total").text(formatNumber(i + r + u + .1 * (i + r + u), ".", ",")), tongtien = i + r + u + .1 * (i + r + u), tongtienChuaThue = i + r + u;
					m = jsUcfirst(DOCSO.doc(tongtien));
					$("#sumtoal").text(m)
				}
			}
		}, e.send(null)
	}
}

function contractType() {
	if (contractTypeId = document.getElementById("contract_type").value, 0 != contractTypeId) {
		var t = $("#contract_type option:selected").text();
		$(".contract_type_auto-title").text(t);
		document.getElementById("output");
		var e = new XMLHttpRequest;
		console.log(e), e.open("GET", "price.json", !0), e.setRequestHeader("content-type", "application/json"), e.onreadystatechange = function() {
			if (4 == e.readyState && 200 == e.status) {
				var t = JSON.parse(e.responseText);
				if ("tk_moi" == contractTypeId)
					if ($("ul.task_list").html("<li>■ 3D nội thất</li><li>■ 3D ngoại thất</li><li>■ Bản vẽ kiến trúc</li><li>■ Bản vẽ nội thất</li> <li>■ Bản vẽ kết cấu</li><li>■ Bản vẽ điện nước</li><li>■ Hồ sơ xin phép xây dựng</li><li>■ Bản vẽ khái toán</li>"), "nha_pho_1mt" == buildingTypeId) {
						console.log(contractTypeId + "-" + buildingTypeId), console.log(contractTypeId + "-" + buildingTypeId);
						var a = t[0].type[0].Price,
							n = t[2].type[0].Price,
							o = t[2].type[0].Price;
						$("#don_gia_tk_chinh").val(formatNumber(a, ".", ",")), $("#dongiavuon").val(formatNumber(n, ".", ",")), $("#dongiasanthuong").val(formatNumber(o, ".", ","));
						var i = a * document.getElementById("item-1").value;
						$(".use_area_item_total").text(formatNumber(i, ".", ","));
						var r = n * document.getElementById("item-2").value;
						$(".garden_area_item_total").text(formatNumber(r, ".", ","));
						var u = o * document.getElementById("item-3").value;
						$(".top_garden_area_item_total").text(formatNumber(u, ".", ",")), $(".sub_total").text(formatNumber(i + r + u, ".", ",")), $(".vat_total").text(formatNumber(.1 * (i + r + u), ".", ",")), $(".sum_total").text(formatNumber(i + r + u + .1 * (i + r + u), ".", ",")), tongtien = i + r + u + .1 * (i + r + u), tongtienChuaThue = i + r + u;
						var m = jsUcfirst(DOCSO.doc(tongtien));
						$("#sumtoal").text(m)
					} else if ("nha_pho_2mt" == buildingTypeId) {
					console.log(contractTypeId + "-" + buildingTypeId);
					a = t[0].type[1].Price, n = t[2].type[1].Price, o = t[2].type[1].Price;
					$("#don_gia_tk_chinh").val(formatNumber(a, ".", ",")), $("#dongiavuon").val(formatNumber(n, ".", ",")), $("#dongiasanthuong").val(formatNumber(o, ".", ","));
					i = a * document.getElementById("item-1").value;
					$(".use_area_item_total").text(formatNumber(i, ".", ","));
					r = n * document.getElementById("item-2").value;
					$(".garden_area_item_total").text(formatNumber(r, ".", ","));
					u = o * document.getElementById("item-3").value;
					$(".top_garden_area_item_total").text(formatNumber(u, ".", ",")), $(".sub_total").text(formatNumber(i + r + u, ".", ",")), $(".vat_total").text(formatNumber(.1 * (i + r + u), ".", ",")), $(".sum_total").text(formatNumber(i + r + u + .1 * (i + r + u), ".", ",")), tongtien = i + r + u + .1 * (i + r + u), tongtienChuaThue = i + r + u;
					m = jsUcfirst(DOCSO.doc(tongtien));
					$("#sumtoal").text(m)
				} else if ("biet_thu_hien_dai" == buildingTypeId || "bar_nha_hang_cafe" == buildingTypeId) {
					console.log(contractTypeId + "-" + buildingTypeId);
					a = t[0].type[2].Price, n = t[2].type[3].Price, o = t[2].type[3].Price;
					$("#don_gia_tk_chinh").val(formatNumber(a, ".", ",")), $("#dongiavuon").val(formatNumber(n, ".", ",")), $("#dongiasanthuong").val(formatNumber(o, ".", ","));
					i = a * document.getElementById("item-1").value;
					$(".use_area_item_total").text(formatNumber(i, ".", ","));
					r = n * document.getElementById("item-2").value;
					$(".garden_area_item_total").text(formatNumber(r, ".", ","));
					u = o * document.getElementById("item-3").value;
					$(".top_garden_area_item_total").text(formatNumber(u, ".", ",")), $(".sub_total").text(formatNumber(i + r + u, ".", ",")), $(".vat_total").text(formatNumber(.1 * (i + r + u), ".", ",")), $(".sum_total").text(formatNumber(i + r + u + .1 * (i + r + u), ".", ",")), tongtien = i + r + u + .1 * (i + r + u), tongtienChuaThue = i + r + u;
					m = jsUcfirst(DOCSO.doc(tongtien));
					$("#sumtoal").text(m)
				} else {
					console.log(contractTypeId + "-" + buildingTypeId);
					a = t[0].type[3].Price, n = t[2].type[3].Price, o = t[2].type[3].Price;
					$("#don_gia_tk_chinh").val(formatNumber(a, ".", ",")), $("#dongiavuon").val(formatNumber(n, ".", ",")), $("#dongiasanthuong").val(formatNumber(o, ".", ","));
					i = a * document.getElementById("item-1").value;
					$(".use_area_item_total").text(formatNumber(i, ".", ","));
					r = n * document.getElementById("item-2").value;
					$(".garden_area_item_total").text(formatNumber(r, ".", ","));
					u = o * document.getElementById("item-3").value;
					$(".top_garden_area_item_total").text(formatNumber(u, ".", ",")), $(".sub_total").text(formatNumber(i + r + u, ".", ",")), $(".vat_total").text(formatNumber(.1 * (i + r + u), ".", ",")), $(".sum_total").text(formatNumber(i + r + u + .1 * (i + r + u), ".", ",")), tongtien = i + r + u + .1 * (i + r + u), tongtienChuaThue = i + r + u;
					m = jsUcfirst(DOCSO.doc(tongtien));
					$("#sumtoal").text(m)
				} else if ("tk_cai_tao" == contractTypeId)
					if ($("ul.task_list").html("<li>■ 3D nội thất</li><li>■ 3D ngoại thất</li><li>■ Bản vẽ kiến trúc</li><li>■ Bản vẽ nội thất</li> <li>■ Bản vẽ kết cấu</li><li>■ Bản vẽ điện nước</li><li>■ Hồ sơ xin phép xây dựng</li>"), "nha_pho_1mt" == buildingTypeId || "nha_pho_2mt" == buildingTypeId) {
						console.log(contractTypeId + "-" + buildingTypeId);
						a = t[1].type[0].Price, n = t[2].type[0].Price, o = t[2].type[0].Price;
						$("#don_gia_tk_chinh").val(formatNumber(a, ".", ",")), $("#dongiavuon").val(formatNumber(n, ".", ",")), $("#dongiasanthuong").val(formatNumber(o, ".", ","));
						i = a * document.getElementById("item-1").value;
						$(".use_area_item_total").text(formatNumber(i, ".", ","));
						r = n * document.getElementById("item-2").value;
						$(".garden_area_item_total").text(formatNumber(r, ".", ","));
						u = o * document.getElementById("item-3").value;
						$(".top_garden_area_item_total").text(formatNumber(u, ".", ",")), $(".sub_total").text(formatNumber(i + r + u, ".", ",")), $(".vat_total").text(formatNumber(.1 * (i + r + u), ".", ",")), $(".sum_total").text(formatNumber(i + r + u + .1 * (i + r + u), ".", ",")), tongtien = i + r + u + .1 * (i + r + u), tongtienChuaThue = i + r + u;
						m = jsUcfirst(DOCSO.doc(tongtien));
						$("#sumtoal").text(m)
					} else {
						console.log(contractTypeId + "-" + buildingTypeId);
						a = t[1].type[2].Price, n = t[2].type[2].Price, o = t[2].type[2].Price;
						$("#don_gia_tk_chinh").val(formatNumber(a, ".", ",")), $("#dongiavuon").val(formatNumber(n, ".", ",")), $("#dongiasanthuong").val(formatNumber(o, ".", ","));
						i = a * document.getElementById("item-1").value;
						$(".use_area_item_total").text(formatNumber(i, ".", ","));
						r = n * document.getElementById("item-2").value;
						$(".garden_area_item_total").text(formatNumber(r, ".", ","));
						u = o * document.getElementById("item-3").value;
						$(".top_garden_area_item_total").text(formatNumber(u, ".", ",")), $(".sub_total").text(formatNumber(i + r + u, ".", ",")), $(".vat_total").text(formatNumber(.1 * (i + r + u), ".", ",")), $(".sum_total").text(formatNumber(i + r + u + .1 * (i + r + u), ".", ",")), tongtien = i + r + u + .1 * (i + r + u), tongtienChuaThue = i + r + u;
						m = jsUcfirst(DOCSO.doc(tongtien));
						$("#sumtoal").text(m)
					}
				else if ($("ul.task_list").html("<li>■ Bản vẽ sân vườn bố trí cây xanh chi tiết hồ bơi bể cá</li><li>■ Bản vẽ hàng rào cổng ngõ, mái che gara</li><li>■ Bản vẽ điện nước sân vườn</li>"), "nha_pho_1mt" == buildingTypeId || "nha_pho_2mt" == buildingTypeId) {
					console.log(contractTypeId + "-" + buildingTypeId);
					a = t[2].type[0].Price, n = t[2].type[0].Price, o = t[2].type[0].Price;
					$("#don_gia_tk_chinh").val(formatNumber(a, ".", ",")), $("#dongiavuon").val(formatNumber(n, ".", ",")), $("#dongiasanthuong").val(formatNumber(o, ".", ","));
					i = a * document.getElementById("item-1").value;
					$(".use_area_item_total").text(formatNumber(i, ".", ","));
					r = n * document.getElementById("item-2").value;
					$(".garden_area_item_total").text(formatNumber(r, ".", ","));
					u = o * document.getElementById("item-3").value;
					$(".top_garden_area_item_total").text(formatNumber(u, ".", ",")), $(".sub_total").text(formatNumber(i + r + u, ".", ",")), $(".vat_total").text(formatNumber(.1 * (i + r + u), ".", ",")), $(".sum_total").text(formatNumber(i + r + u + .1 * (i + r + u), ".", ",")), tongtien = i + r + u + .1 * (i + r + u), tongtienChuaThue = i + r + u;
					m = jsUcfirst(DOCSO.doc(tongtien));
					$("#sumtoal").text(m)
				} else {
					console.log(contractTypeId + "-" + buildingTypeId);
					a = t[2].type[2].Price, n = t[2].type[2].Price, o = t[2].type[2].Price;
					$("#don_gia_tk_chinh").val(formatNumber(a, ".", ",")), $("#dongiavuon").val(formatNumber(n, ".", ",")), $("#dongiasanthuong").val(formatNumber(o, ".", ","));
					i = a * document.getElementById("item-1").value;
					$(".use_area_item_total").text(formatNumber(i, ".", ","));
					r = n * document.getElementById("item-2").value;
					$(".garden_area_item_total").text(formatNumber(r, ".", ","));
					u = o * document.getElementById("item-3").value;
					$(".top_garden_area_item_total").text(formatNumber(u, ".", ",")), $(".sub_total").text(formatNumber(i + r + u, ".", ",")), $(".vat_total").text(formatNumber(.1 * (i + r + u), ".", ",")), $(".sum_total").text(formatNumber(i + r + u + .1 * (i + r + u), ".", ",")), tongtien = i + r + u + .1 * (i + r + u), tongtienChuaThue = i + r + u;
					m = jsUcfirst(DOCSO.doc(tongtien));
					$("#sumtoal").text(m)
				}
			}
		}, e.send(null)
	} else document.getElementsByClassName("price use_area_price").value = 0, document.getElementsByClassName("price garden_area_price").value = 0, document.getElementsByClassName("price top_garden_area_price").value = 0
}