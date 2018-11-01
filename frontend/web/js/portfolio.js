/**
 * Date: 3/10/2018
 * Revision: 0
 * Author: Mattia Leonardo Angelillo
 */
(function( $ ) {
    $.fn.portfolio = function(options) {
        var settings = $.extend({
            overlayItem : '.item-overlay',
            overlayContent : '.overlay-content',
            filter : 'data-filter',
            category : 'data-category'
        }, options );
        
        var _this           = $(this);//Containers
        var _overlayItem    = $(settings.overlayItem, _this);//Overlay element
        var _overlayContent = $(settings.overlayContent, _this);//Overlay content
        var _filter         = $("["+settings.filter+"]", _this);
        var oldFilter       = null;
        
        /**
         * Portfolio's events
         */
        _overlayItem.bind({
            /**
             * Mouse Enter
             * 
             * @returns {undefined}
             */
            mouseenter : function (){
                var thisHeight = $(this).height(),
                overlayItemHeight = _overlayContent.height();
                
                $(this).css('opacity', 1);
                _overlayContent.css({
                    bottom :(thisHeight-overlayItemHeight)/2,
                    opacity : 1
                });
            },
            /**
             * Mouse out
             * 
             * @returns {undefined}
             */
            mouseleave : function (){
                $(this).css('opacity', 0);
            }
        });
        
        filter();
        
        /**
         * Category to show
         * 
         * @returns {undefined}
         */
        function filter(){
            _filter.click(function (){
                var filter = $(this).attr(settings.filter);
                
                if (typeof oldFilter === 'undefined' && filter !=="all") {
                    $(this).addClass('active');
                    $(" > ["+settings.category+"!="+filter+"].filter", _this).hide('drop', 500);
                }

                if(filter !== oldFilter){
                    $(" ["+settings.filter+"]", _this).removeClass('active');
                    if(typeof oldFilter !== 'undefined'){$(this).addClass('active');}

                    oldFilter = filter;
                    
                    $("> .filter", _this).show();
                    if(filter!=="all"){
                        $("> ["+settings.category+"!="+filter+"].filter", _this).hide('drop', 500);
                    }
                }
            });
        }
    };
}(jQuery));