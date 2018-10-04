/**
 * Date: 3/10/2018
 * Revision: 0
 * Author: Mattia Leonardo Angelillo
 */
jQuery(document).ready(function ($){
    /**
     * Show hoverlay text
     */
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
    
    /**
     * Show selected category
     */
    var old_filter;
    $("#portfolio [data-filter]").click(function (){
        var filter = $(this).attr('data-filter');
        
        if (typeof old_filter === 'undefined') {
            old_filter = filter;
            
            $("#portfolio > [data-category!="+filter+"].filter").hide('drop', 500);
        }
        
        if(filter !== old_filter){
            old_filter = filter;
            
            $("#portfolio > .filter").show();
            if(filter!=="all"){
                $("#portfolio > [data-category!="+filter+"].filter").hide('drop', 500);
            }
        }
    });
});