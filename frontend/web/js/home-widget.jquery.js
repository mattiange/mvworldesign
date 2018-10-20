/*
 * Homepage widget slideshow with elements
 * 
 * Created on: 16-ott-2018 15:18:00
 * Author    : Mattia Leonardo Angelillo
 * Email     : mattia.angelillo@gmail.com
 */
(function( $ ) {
 
    $.fn.slider = function(options) {
        var settings = $.extend({
        }, options );
        
        var _this      = $(this);//Container's element
        var thisWidth  = _this.width();//Container's width
        var thisMaxWidth = 0;//Container's max width
        var thisHeight = thisMaxWidth = parseInt(_this.attr('data-max-width'));//Container's max width and Container's height
        var thisMaxHeight = parseInt(_this.attr('data-max-height'));//Container's max height
        var thisRatio  = thisMaxWidth/thisMaxHeight;//Container's aspect ratio
        var _elStep    = $('[data-step]', _el);//Group's element
        var _el        = $('>*', _elStep);//All element to show
        var ratio      = 0;//Aspect ratio of elements
        var elWidth    = null;//Width of element to show
        var elHeight   = null;//Height of element to show
        var old_left   = null;
        var left       = 0;//Left position
        var top        = 0;
        var delay      = 0;//Delay to show element
        
        container_size();//Dimensione del container
        
        $(_elStep).each(function(i, elStep){
            $(elStep).show();
            var temp = 0;
            $(_el).each(function (k, el){
                hideElement(el, 0-thisWidth-20);
                
                var width = parseInt($(el).width());
                var height = parseInt($(el).height());
                if(width>height){
                    ratio = height/(width/100);//in %, height/(width/100)
                }else{
                    ratio = width/(height/100);
                }

                $(el).css({
                    height : (ratio+"%"),
                    width : 'auto'
                });

                if($(el).attr('data-delay')==='undefined'){delay += 500;}
                else{delay += parseInt($(el).attr('data-delay'));}
                setTimeout(function (){
                    elHeight = $(el).height();
                    elWidth  = $(el).width();
                    var height, width;
                    top = ($(el).attr('data-top')===0 || typeof $(el).attr('data-top')==="undefined")?(thisHeight-elHeight):$(el).attr('data-top');
                    if(k===0){left = thisWidth-elWidth-temp;}
                    else{left -= elWidth/2;}

                    if(elHeight>thisHeight){
                        height = thisHeight/elHeight;
                    }else{
                        height = elHeight/thisHeight;
                    }
                    elWidth  = $(el).width();
                    if(elWidth>thisWidth){
                        width = thisWidth/elWidth;
                    }else{
                        width = elWidth/thisWidth;
                    }
                    
                    //Effect to apply
                    if($(el).attr('data-effect')==="left to right"){
                        left_to_right(el, left, $(el).attr('data-bottom'));
                    }else if($(el).attr('data-effect')==="top to bottom"){
                        top_to_bottom(el, top, $(el).attr('data-right'));
                    }else{
                        left_to_right(el, left, $(el).attr('data-bottom'));
                    }
                }, delay);
            });
        });
 
        return this;
        
        
        
        
        /*********************************************
         *  FUNCTIONS
        *********************************************/
        
        /**
         * 
         * @param {[Object object]} el
         * @param {int} pos
         * @returns {undefined}
         */
        function hideElement(el, pos){
            var left = 0-$(el).outerWidth();
            
            $(el).css({
                left : left
            });
        }
        
        /**
         * Container's size
         * 
         * @returns {undefined}
         */
        function container_size(){
            if(thisWidth>=thisMaxWidth){
                _this.width(thisMaxWidth).height(thisMaxHeight);
                thisWidth = thisMaxWidth;
                thisHeight = thisMaxHeight;
            }else{
                thisWidth  = _this.width();
                thisHeight = thisWidth/thisRatio;
                _this.height(thisHeight);
            }

        }
        
        /**
         * 
         * 
         * @param {[HtmlObject]} el
         * @param {String} left
         * @param {String} bottom 
         * @returns {undefined}
         */
        function left_to_right(el, left, bottom){
            $(el).animate({
                left : left,
                bottom : bottom
            });
        }
        
        /**
         * 
         * 
         * @param {[HtmlObject]} el
         * @param {String} top
         * @param {String} right
         * @returns {undefined}
         */
        function top_to_bottom(el, top, right){
            $(el).animate({
                top : top,
                right: right
            });
        }
    };
 
}( jQuery ));