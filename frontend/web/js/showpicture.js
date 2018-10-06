/**
 * Date: 3/10/2018
 * Revision: 0
 * Author: Mattia Leonardo Angelillo
 */
jQuery(document).ready(function ($){
    var id_click = '[data-click="fullsize"]',
        id = '#showpicture',
        exit_id = '.exit';
    $(id_click).bind('click', function (){
        $(id).show();
        var src = $('img', this).attr('src'),
            alt = $('img', this).attr('alt'),
            title = $('img', this).attr('title'),
            margin_top = ($(window).height()-$('img', this).height())/2;
        if(margin_top<0){margin_top = ($(window).height()-$("[data-max-height]",this).attr('data-max-height'))/2;}
        
            $('body').css('overflow', 'hidden');
            $('.wrapper-img', id).css('margin-top', margin_top);
            $('img', id).attr({
                src : src,
                alt : alt,
                title : title
            });
    });
    $(exit_id, id).bind('click', function (){
        $(id).hide();
        $('body').css('overflow', 'auto');
    });
});