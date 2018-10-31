/**
 * Date: 3/10/2018
 * Revision: 0
 * Author: Mattia Leonardo Angelillo
 */
(function( $ ) {
    $.fn.portfolio = function(options) {
        var settings = $.extend({
            overlayItem : '.item-overlay',
            overlayContent : '.overlay-content'
        }, options );
        
        var _this   = $(this);
        var _overlayItem = $(settings.overlayItem, _this);
        var _overlayContent = $(settings.overlayContent, _this);
        
        _overlayItem.bind({
            mouseenter : function (){
                var thisHeight = $(this).height(),
                overlayItemHeight = _overlayContent.height();
                
                $(this).css('opacity', 1);
                _overlayContent.css({
                    bottom :(thisHeight-overlayItemHeight)/2,
                    opacity : 1
                });
            },
            mouseleave : function (){
                $(this).css('opacity', 0);
            }
        });
    };
}(jQuery));