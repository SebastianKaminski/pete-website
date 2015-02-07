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
    	/* Override product zoom function */
    	Product.Zoom.prototype.initialize = function (imageEl, trackEl, handleEl, zoomInEl, zoomOutEl, hintEl) {  return false;  }

    	/* Choose radiator finish */
    	$("#choose-radiator-finish").on("change", function () {
    		console.log("Finish has been changed:", $(this).val());
    	})
    });

})(jQuery);
