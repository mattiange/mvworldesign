/*
 * Created on: 8-ott-2018 15:18:00
 * Author    : Mattia Leonardo Angelillo
 * Email     : mattia.angelillo@gmail.com
 */
$(document).ready(function (){
    var id = ".home-widget";
    
    $('[data-step]', id).each(function (i, el){
        $(el).show();
        
        var this_width = $(el).width();
        var this_height = $(el).height();
        var old_left = 0;
        var delay = 0;
        $("[data-delay]", this).each(function(j, el_1){
            var this_show_width  = $(el_1).width();
            var this_show_height = $(el_1).height();
            var left = Math.abs(this_width-this_show_width);
            //var left = ($(el_1).attr('data-left')===0 || typeof $(el_1).attr('data-left')==="undefined")?(Math.abs(this_width-this_show_width)):$(el_1).attr('data-left
            var top =  ($(el_1).attr('data-top')===0 || typeof $(el_1).attr('data-top')==="undefined")?(this_height-this_show_height):$(el_1).attr('data-top');
            //var right =  ($(el_1).attr('data-top')===0 || typeof $(el_1).attr('data-right')==="undefined")?0:$(el_1).attr('data-right');
            delay += parseInt($(el_1).attr("data-delay"));
            
            setTimeout(function (){
                if(old_left===0){
                        $(el_1).animate({
                            left: '+='+(left+(Math.abs(parseFloat($(el_1).css('left'))))), 
                            top: top
                        });
                        old_left = left/2;
                }else{
                    if(typeof $(el_1).attr('data-right') !== "undefined"){
                        $(el_1).animate({
                            right : $(el_1).attr('data-right'),
                            top : top
                        });
                    }else{
                        $(el_1).animate({
                            left: '+='+(old_left+(Math.abs(parseFloat($(el_1).css('left'))))), 
                            top: top
                        });
                        old_left = old_left/2;
                    }
                }
            }, delay);
        });
    });
});