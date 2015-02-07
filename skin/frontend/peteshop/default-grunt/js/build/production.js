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

function make_link(string) {
    var words = string.split(' '),
        ret = document.createDocumentFragment();
    for (var i = 0, l = words.length; i < l; i++) {
        if (words[i].match(/[-a-zA-Z0-9@:%_\+.~#?&//=]{2,256}\.[a-z]{2,4}\b(\/[-a-zA-Z0-9@:%_\+.~#?&//=]*)?/gi)) {
            var elm = document.createElement('a');
            elm.href = words[i];
            elm.textContent = words[i];
            if (ret.childNodes.length > 0) {
                ret.lastChild.textContent += ' ';
            }
            ret.appendChild(elm);
        } else {
            if (ret.lastChild && ret.lastChild.nodeType === 3) {
                ret.lastChild.textContent += ' ' + words[i];
            } else {
                ret.appendChild(document.createTextNode(' ' + words[i]));
            }
        }
    }
    return ret;
}