(function( $ ) {
    $.fn.verticalAlign = function(options) {
        var settings = $.extend({
        }, options );
        
        var _this = $(this);
        var thisHeight = 0;
        var parentHeight = 0;
        var top = 0;
        
        _this.each(function (i, el){
            thisHeight = $(el).innerHeight();
            parentHeight = $(el).parent().innerHeight();
            top = (parentHeight-thisHeight)/2;
            
            $(el).css('margin-top', top);
        });
    };
}(jQuery));