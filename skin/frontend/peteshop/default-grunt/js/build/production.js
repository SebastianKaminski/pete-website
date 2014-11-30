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
			if ($(this).scrollTop() > 162) {
				nav.addClass("navbar-fixed-top");
				$('body').css("padding-top", "70px");
			} else {
				nav.removeClass("navbar-fixed-top");
				$('body').css("padding-top", 0);
			}
		});    	
    });
})(jQuery);