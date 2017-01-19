var size = 10;
var idbg = "c_background";

function draw_background(nbcolumns, nblines)
{
	var canvas = document.getElementById(idbg);
	var ctx = canvas.getContext("2d");

	ctx.strokeStyle="lavender";
	ctx.lineWidth = 1;
	var i = 0;
	while (i <= nbcolumns)
	{
		ctx.beginPath();
		ctx.moveTo(i * size, 0);
		ctx.lineTo(i * size, nblines * size);
		ctx.stroke();
		ctx.closePath();
		i++;
	}
	i = 0;
	while (i <= nblines)
	{
		ctx.beginPath();
		ctx.moveTo(0, i * size);
		ctx.lineTo(nbcolumns * size, i * size);
		ctx.stroke();
		ctx.closePath();
		i++;
	}
}
