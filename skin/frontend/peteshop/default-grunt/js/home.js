/**
* Website Radrestore
* Website www.radrestore.co.uk
*
* @author Sebastian Kaminski
* @package peteshop
*
*/
(function ($) {
    "use strict";

    $(document).ready(function(){
    	// Script here
    	$("#categories").slick({
    		infinite: false,
    		dots: false,
			slidesToShow: 4,
			slidesToScroll: 4,
			responsive: [
				{
					breakpoint: 480,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1
					}
				}
			]
    	});
    });
})(jQuery);