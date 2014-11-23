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
    	$("#show-search-form").on("click", function (e) {
    		e.preventDefault();
    		console.log("click suko");
    		$("#search_mini_form").toggle();
    	})
    });
})(jQuery);