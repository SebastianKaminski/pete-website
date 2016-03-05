var getValue = function (input, div) {
	var value = 0,
		divider = div === undefined ? 1 : div;

    console.log(input, document.querySelectorAll(input.selector)[0].type);

	switch(document.querySelectorAll(input.selector)[0].type) {
		case "select-one":
			value = parseFloat(input.children("option:selected").val());
			break;
		case "text":
			value = parseFloat(input.val());
			break;
		default:
			value = 0;
	}
	if (value == 0 || value === undefined) {
		input.parent().parent().addClass("has-error");
	} else {
		input.parent().parent().removeClass("has-error");
	}
	return value / divider;

}

window.calculate = function () {
	var length = getValue(jQuery("input[name='room-length']"), 100),
    	width = getValue(jQuery("input[name='room-width']"), 100),
    	height = getValue(jQuery("select[name='room-height']")),
    	ftype = getValue(jQuery("select[name='floor-type']")),
    	rtype = getValue(jQuery("select[name='room-type']")),
    	gtype = getValue(jQuery("select[name='glazing-type']")),
    	nfacing = getValue(jQuery("input[name='north-facing']")),
    	fwindow = getValue(jQuery("input[name='french-windows']")),
    	owalls = getValue(jQuery("select[name='outside-walls']")),
    	ctype = getValue(jQuery("select[name='comfort-type']")),
    	btu = length * width * height * ftype * rtype * gtype * nfacing * fwindow * owalls * ctype;

	if (btu > 0) {
		jQuery("#result").html("Total BTUs: " + Number(btu).toFixed(2));
	} else {
		alert("Please check form!");
	}

	console.log(length, width, height, ftype, rtype, gtype, nfacing, fwindow, owalls, ctype, btu);
};
