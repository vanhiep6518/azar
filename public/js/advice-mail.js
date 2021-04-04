
$( document ).ready(function() {
    $('.btn-send-advice').click(function() {
        form = document.getElementById('send-advice-form');
        formdata = new FormData(form);

        $.ajax({
            url : '/send-advice',
            data: formdata,
            method: 'post',
            dataType: 'json',
            processData: false,
            contentType: false,
            beforeSend: function() {
                $('.ajax-loader').css("display" , "inline-block");
            },
            success : function (res){
                $('.ajax-loader').css("display" , "none");
                if(res.status == 'success'){
                    $('.wpcf7-response-output').text('Xin cảm ơn, form đã được gửi thành công.').removeClass('fail').show()
                }else{
                    console.log(res)
                    $('.wpcf7-response-output').text('Gửi thất bại, Quý khách vui lòng nhập đầy đủ thông tin.').addClass('fail').show()
                }
            }
        });
        return false;
    });

    $('call-form').click(function(){
        $('html,body').animate({scrollTop: document.body.scrollHeight},"fast");
    })
});

