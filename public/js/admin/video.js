$( document ).ready(function() {

    $('.btn-edit').click(function (){
        var id = $(this).data('id');
        ajaxEdit(id);
    })

    function ajaxEdit(id){

        $.ajax({
            url : "/admin/video/ajax-edit?id="+id,
            method: 'get',
            processData: false,
            contentType: false,
            success : function (res){
                if(res){
                    // console.log(res)
                    $( ".cat-info" ).html(res);
                }
            }
        });
        return false;
    }


});
