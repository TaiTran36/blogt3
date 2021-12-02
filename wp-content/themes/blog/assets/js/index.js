jQuery(document).ready(function () {
    // scroll_auto(2000);

    // $('.height_100').animate({
    //     justify-content: 'left',
    // },500, function(){
    //     if($('#site_right').hasClass('start_theme')) {
    //         $('#site_right').removeClass('start_theme')
    //     }
    // });

    $(window).resize(function() {
        var windowsize = $(window).width();
        if(windowsize > 509 && windowsize < 991){
            $('#site_right').css("width",'70%');
        }
        else if(windowsize < 509){
            $('#site_right').css("width",'85%');
        }
        else{
            $('#site_right').css("width",'60%');
        }
    });

    $('.menu .list_item').click(function(){
        if($(this).hasClass('active')) {
            return;
        }

        $(this).css('po')

        let item = $(this).data('item');
        let old_active = $(this).data('active');

        $('.menu .menu_item_' + old_active).removeClass('active');
        $('.menu .menu_item_' + old_active).children().children().children().removeClass('color-active');
        $('.menu .menu_item_' + old_active).children().children().next().removeClass('color-active')

        $(this).addClass('active');
        $(this).children().children().children().addClass('color-active');
        $(this).children().children().next().addClass('color-active')

        $('.menu .list_item').each(function () {
            $(this).data('active', item);
        });

        $('.page_' + old_active).animate({
            top: '-6%', opacity : '0'
            },700, function(){

        });

        $('.page_' + item).animate({
            top: '2%', opacity : '1'
        },1500, function(){
            $('.page_' + old_active).animate({
                top: '30%', opacity : '0'
            },0, function(){
            });
        });

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
        });

    start_display_info();

}
