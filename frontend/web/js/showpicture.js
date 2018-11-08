/**
 * Date: 3/10/2018
 * Revision: 0
 * Author: Mattia Leonardo Angelillo
 */
(function( $ ) {
    $.fn.showel = function(options) {
        var settings = $.extend({
            elToClone : '.clone',
            idToClone : '#showpicture',
            exitClass : '.exit',
        }, options );
        
        var _this       = $(this);
        var clone       = null;
        var idToClone_  = settings.idToClone;
        var copyEl_     = settings.elToClone;
        var exitClass   = settings.exitClass;
        
        _this.bind('click', function(){
            clone = $(copyEl_, _this).clone();
            
            $(idToClone_).show().append(clone);
            $("*", idToClone_).show();
        });
    };
})(jQuery);