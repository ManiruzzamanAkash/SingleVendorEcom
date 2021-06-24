(function($) {   
    "use strict";
	$( document ).ready(function() {
	    if ($(window).width() > 991) {
	        $(".product_desc_scroll, .pro_sticky_img").stick_in_parent();
	    }
	});
	
})(jQuery)