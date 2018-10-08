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
        //showpicture(this, id);
        //var clone = $("img", this).clone();
        if($(this).attr('data-mime') === "application/pdf"){
            var clone = $("embed",this).clone();
            $(id).show();
            $(".wrapper-img",id).append(clone.css({
                width: '800px',
                height: '600px'
            }));
        }else{
            showpicture(this, id);
        }
    });
    $(exit_id, id).bind('click', function (){
        $(id).hide();
        $('.wrapper-img',id).css('margin-top', '0');
        $('.wrapper-img embed',id).remove();
        $('.wrapper-img img',id).hide();
        $('body').css('overflow', 'auto');
    });
    
    $(window).resize(function (){
        showpicture(id_click, id);
    });
    
    
    /**
     * 
     * @param {type} _this
     * @param {type} id
     * @returns {undefined}
     */
    function showpicture(_this, id){
        $(id).show();
        $('.wrapper-img img',id).show();
        var src = $('img', _this).attr('src'),
            alt = $('img', _this).attr('alt'),
            title = $('img', _this).attr('title'),
            margin_top = ($(window).height()-$("[data-max-height]",_this).attr('data-max-height'))/2;
            
            if($("img", _this).height()<$("[data-max-height]", _this).attr('data-max-height')){margin_top = ($(window).height()-$("img",_this).height())/2}
            
            $('body').css('overflow', 'hidden');
            $('.wrapper-img', id).css('margin-top', margin_top);
            $('img', id).attr({
                src : src,
                alt : alt,
                title : title
            });
    }
});