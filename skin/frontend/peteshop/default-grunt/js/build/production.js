/**
* Website name here
* Website URL here
*
* @author Author name here
* @package mypackagename_default
*
*/
(function ($) {
    "use strict";

    $(document).ready(function(){
    	// Search
    	$("#show-search-form").on("click", function (e) {
    		e.preventDefault();
    		$("#search_mini_form").toggleClass('hidden');
    	});

    	// Menu
		var nav = $('.navbar-fixed-top');
		
		$(window).scroll(function () {
			if ($(this).scrollTop() > 136) {
				nav.css("top", 0);
			} else {
				nav.css("top", "160px");
			}
		});    	
    });
})(jQuery);