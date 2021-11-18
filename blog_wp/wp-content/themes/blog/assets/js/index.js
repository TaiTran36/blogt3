jQuery(document).ready(function () {
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
        $('#site_right').animate({
            width:'0'
        },500);
        $('#site_right').animate({
            width: '60%'
        },500, function(){
            var windowsize = $(window).width();
            if(windowsize< 509){
                $('#site_right').css("width",'80%');
            }
            else{
                $('#site_right').css("width",'60%');
            }

        });
        // $(window).on("resize",function(){
        //    $('#site_right').css("width",$('.site_left').width()+275+"px");
        // });

    });
})
