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
				$('body').css("padding-top", "95px");
			} else {
				nav.removeClass("navbar-fixed-top");
				$('body').css("padding-top", 0);
			}
		});    	
    });
})(jQuery);

if(!String.linkify) {
    String.prototype.linkify = function() {

        // http://, https://, ftp://
        var urlPattern = /\b(?:https?|ftp):\/\/[a-z0-9-+&@#\/%?=~_|!:,.;]*[a-z0-9-+&@#\/%=~_|]/gim;

        // www. sans http:// or https://
        var pseudoUrlPattern = /(^|[^\/])(www\.[\S]+(\b|$))/gim;

        // Email addresses
        var emailAddressPattern = /[\w.]+@[a-zA-Z_-]+?(?:\.[a-zA-Z]{2,6})+/gim;

        return this
            .replace(urlPattern, '<a href="$&">$&</a>')
            .replace(pseudoUrlPattern, '$1<a href="http://$2">$2</a>')
            .replace(emailAddressPattern, '<a href="mailto:$&">$&</a>');
    };
}