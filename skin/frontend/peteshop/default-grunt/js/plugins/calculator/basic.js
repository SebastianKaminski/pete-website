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
		input.parent().addClass("has-error");
	} else {
		input.parent().removeClass("has-error");
	}
	return value / divider;

}

window.calculate = function () {
	var length = $("input[name='room-length']").val();
	var width = $("input[name='room-width']").val();
	var height = $("select[name='room-height'] option:selected").val();
	var ftype = $("select[name='floor-type'] option:selected").val();
	var rtype = $("select[name='room-type'] option:selected").val();
	var gtype = $("select[name='glazing-type'] option:selected").val();
	var nfacing = $("input[name='north-facing']").val();
	var fwindow = $("input[name='french-windows']").val();
	var owalls = $("select[name='outside-walls'] option:selected").val();
	var ctype = $("select[name='comfort-type'] option:selected").val();
	var btu = length * width * height * ftype * rtype * gtype * nfacing * fwindow * owalls * ctype;

	// getValue($("select[name='glazing-type']"));

	if (btu > 0) {
		$("#result").html("Total BTUs: " + Number(btu).toFixed(2));
	} else {
		alert("Please check form!");
	}

	console.log(length, width, height, ftype, rtype, gtype, nfacing, fwindow, owalls, ctype, btu);
};
