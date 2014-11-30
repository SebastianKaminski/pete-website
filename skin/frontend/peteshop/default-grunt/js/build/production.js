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
		var nav = $('.navbar');
		
		$(window).scroll(function () {
			if ($(this).scrollTop() > 160) {
				nav.addClass("navbar-fixed-top");
			} else {
				nav.removeClass("navbar-fixed-top");
			}
		});    	
    });
})(jQuery);