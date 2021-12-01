jQuery(document).ready(function () {
    scroll_auto(2000);

    $(window).resize(function() {
        var windowsize = $(window).width();
        if(windowsize > 509 && windowsize < 991){
            $('#site_right').css("width",'70%');
        }
        else if(windowsize < 509){
            $('#site_right').css("width",'85%');
        }
        else{
            $('#site_right').css("width",'55%');
        }
    });

    $('.menu .list_item').click(function(){
        $('#site_right').animate({
            width:'0',
        },500);
        scroll_auto(0);
    });
})

function start_display_info() {
    if($('#site_right').hasClass('start_theme')) {
        $('#site_right').removeClass('start_theme')
        $('.height_100').css('justify-content' , 'left');
    }
}

function scroll_auto(delay) {
    $('#site_right').delay( delay ).animate({
        width: '55%',
    },500, function(){
        let windowsize = $(window).width();
        let width = "55%";
        if(windowsize < 509){
            width = "80%";
        }

        $('#site_right').css('width' , width);
        start_display_info()
    });
}
