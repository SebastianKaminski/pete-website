var getValue = function (input, div) {
	var value = 0,
		divider = div === undefined ? 1 : div;
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
	var length = getValue($("input[name='room-length']")),
    	width = getValue($("input[name='room-width']")),
    	height = getValue($("select[name='room-height']")),
    	ftype = getValue($("select[name='floor-type']")),
    	rtype = getValue($("select[name='room-type']")),
    	gtype = getValue($("select[name='glazing-type']")),
    	nfacing = getValue($("input[name='north-facing']")),
    	fwindow = getValue($("input[name='french-windows']")),
    	owalls = getValue($("select[name='outside-walls']")),
    	ctype = getValue($("select[name='comfort-type']")),
    	btu = length * width * height * ftype * rtype * gtype * nfacing * fwindow * owalls * ctype;

	// getValue($("select[name='glazing-type']"));

	if (btu > 0) {
		$("#result").html("Total BTUs: " + Number(btu).toFixed(2));
	} else {
		alert("Please check form!");
	}

	console.log(length, width, height, ftype, rtype, gtype, nfacing, fwindow, owalls, ctype, btu);
};
