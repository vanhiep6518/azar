$( document ).ready(function() {

    $('.customer-info').click(function (){
        var id = $(this).data('id');
        console.log(id)
        ajaxCustomerInfo(id);
    })

    function ajaxCustomerInfo(id){
        $.ajax({
            url : "/admin/order/ajax-customer-info?id="+id,
            method: 'get',
            processData: false,
            contentType: false,
            success : function (res){
                if(res){
                    // console.log(res)
                    $('#modalCustomerInfo .modal-body').html(res)
                }
            }
        });
        return false;
    }


});
