// JavaScript Document
jQuery(function(){
    jQuery(window).bind('scroll', function() {
        jQuery('.pane-node-field-references').each(function() {
            var refs = jQuery(this);
            var position = refs.position().top - jQuery(window).scrollTop();
            
            if (position <= 60) {
                refs.addClass('pinned');
            } else {
                refs.removeClass('pinned');
            }
        });        
    });
});