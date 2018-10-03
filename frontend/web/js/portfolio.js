jQuery(document).ready(function ($){
    $('#portfolio .item-overlay').bind({
        mouseenter : function (e){
            var this_width = $(this).width(),
                this_height = $(this).height(),
                overlayitem_width = $(".overlay-content", this).width(),
                overlayitem_height = $(".overlay-content", this).height();
            
            $(this).css('opacity', 1);
            $(".overlay-content", this).css({
                bottom :(this_height-overlayitem_height)/2,
                opacity : 1
            });
        },
        mouseleave : function (e){
            $(this).css('opacity', 0);
        }
    });
});