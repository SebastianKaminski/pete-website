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
    		$("#search_mini_form").toggleClass('hidden');
    	});
    });
})(jQuery);