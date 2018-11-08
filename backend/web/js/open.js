/**
 * Open hidden elements
 * 
 * @type type
 */
jQuery(document).ready(function ($){
    $('[data-open="true"] > [data-click="true"]').click(function (){
        //$(this).siblings('data-click').toggle($(this).attr('data-effect'));
        
        var parent = $(this).parent();
        
        $("> [data-show]", parent).toggle($(parent).attr('data-effect'));
    });
});