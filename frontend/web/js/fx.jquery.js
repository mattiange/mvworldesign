/**
 * Date: 2/11/2018
 * Revision: 0
 * Author: Mattia Leonardo Angelillo
 * License: GNU GPLv3
 * Depends: jQuery | jQuery UI
 * //////////////////////////////////
 * FX to apply
 * /////////////////////////////////
 * 
 * @param {jQuery} $
 * @returns {jQuery element}
 */
(function( $ ) {
    $.fn.fx = function(options) {
        var settings = $.extend({
            //FX object
            fx : {
                random  : true, // Random effects
                duration : 300,
                //FX array
                //Se random=fale , default in 0 element
                fx      : [
                    'slide',
                    'clip',
                    'blind',
                    'puff',
                    'bounce',
                    'drop',
                    'explode',
                    'fade',
                    'fold',
                    'highlight',
                    'pulsate',
                    'scale',
                    'shake',
                    'size',
                    'transfer',
                ]
            },
            /**
             * value: in | out
             */
            transition : 'in'
        }, options );
        
        var _this = $(this);
        var min = 1;
        var max = settings.fx.fx.length;
        var random = Math.floor((Math.random()*max) + min);
        var delay = 0;
        var o;
        
        if(this.length>1){
            _this.each(function (i, el){
                delay += 100;
                setTimeout(function (){
                    if(settings.fx.random===true){
                        random = Math.floor((Math.random()* max) + min);
                    }else{
                        random = 0;
                    }
                    if (settings.fx.fx[random] === "scale" ) {
                        o = { percent: 50 };
                    } else if (settings.fx.fx[random] === "transfer" ) {
                        o = {className: "ui-effects-transfer" };
                    }

                    //Effect to apply
                    $(el).effect(settings.fx.fx[random], o, settings.fx.duration, function (){
                        $(el).hide().fadeIn();
                    });
                }, delay);
            });
        }else{//Single element
            if(settings.fx.random===true){
                random = Math.floor((Math.random()* max) + min);
            }else{
                random = 0;
            }
            if (settings.fx.fx[random] === "scale" ) {
                o = { percent: 50 };
            } else if (settings.fx.fx[random] === "transfer" ) {
                o = {className: "ui-effects-transfer" };
            }

            //Effect to apply
            _this.effect(settings.fx.fx[random], o, settings.fx.duration, function(){
                _this.hide().fadeIn();
            });
        }
    };
}(jQuery));