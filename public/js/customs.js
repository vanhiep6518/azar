$(document).ready(function() {
    // $("#num-order").change(function() {
    //     var num_order = $("#num-order").val();
    //     var price = $("#price").val();
    //     var data = { num_order: num_order, price: price };
    //     $.ajax({
    //         url: '?mod=product&action=getNumOrder',
    //         method: 'POST',
    //         data: data,
    //         dataType: 'text',
    //         success: function(data) {
    //             $(".price").text(data);
    //         },
    //         error: function(xhr, ajaxOptions, thrownError) {
    //             alert(xhr.status);
    //             alert(thrownError);
    //         }
    //     });
    // });
    // $('#plus').click(function() {
    //     var num_order = $("#num-order").val();
    //     var price = $("#price").val();
    //     var data = { num_order: num_order, price: price };
    //     $.ajax({
    //         url: '?mod=product&action=getNumOrder',
    //         method: 'POST',
    //         data: data,
    //         dataType: 'text',
    //         success: function(data) {
    //             $(".price").text(data);
    //         },
    //         error: function(xhr, ajaxOptions, thrownError) {
    //             alert(xhr.status);
    //             alert(thrownError);
    //         }
    //     });
    // });
    // $('#minus').click(function() {
    //     var num_order = $("#num-order").val();
    //     var price = $("#price").val();
    //     var data = { num_order: num_order, price: price };
    //     $.ajax({
    //         url: '?mod=product&action=getNumOrder',
    //         method: 'POST',
    //         data: data,
    //         dataType: 'text',
    //         success: function(data) {
    //             $(".price").text(data);
    //         },
    //         error: function(xhr, ajaxOptions, thrownError) {
    //             alert(xhr.status);
    //             alert(thrownError);
    //         }
    //     });
    // });
    $(".num-order").change(function() {
        var rowId = $(this).attr('data-id');
        var qty = $(this).val();
        var data = { rowId: rowId, qty: qty, "_token": $('meta[name="csrf-token"]').attr('content')};
        // console.log(data);
        $.ajax({
            url: '/cart/update',
            method: 'POST',
            data: data,
            dataType: 'json',
            success: function(data) {
                console.log(data)
                $("#" + rowId).html("<span>" + (new Intl.NumberFormat().format(data.sub_total)) + "đ</span>");
                $("#total-price").html("<span>" + data.total + "đ</span>");
                // $("#num").text(data.num_order_cart);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
    });

    //add to cart
    $('.add-cart2').click(function() {
        var id = $(this).data('id');
        form = document.getElementById('add-cart-form');
        formdata = new FormData(form);
        $.ajax({
            url : '/cart/add/'+id,
            data: formdata,
            method: 'post',
            dataType: 'json',
            processData: false,
            contentType: false,
            success : function (data){
                toastr.success('Sản phẩm đã được thêm vào giỏ hàng')
                $(".order_num").text(data.num_order);
            }
        });
        return false;
    });

    $('.add-cart').click(function() {
        var id = $(this).data('id');
        $.ajax({
            url: '/cart/add/'+id,
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                // console.log(data)
                toastr.success('Sản phẩm đã được thêm vào giỏ hàng')
                $(".order_num").text(data.num_order);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
    });
});
