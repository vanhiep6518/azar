$( document ).ready(function() {
    $('.menu__mobile').click(function(){
        $('body').toggleClass('mm-wrapper_opened mm-wrapper_blocking mm-wrapper_background mm-wrapper_opening');
        $('#menu__mobile').toggleClass('mm-menu_opened');
        return false;
    })
});
