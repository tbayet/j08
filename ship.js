var size = 10;
var idcanvas = "c_game";

function draw_ship(posx, posy, dimx, dimy, color, imgsrc, rotate)
{
	var canvas = parent.document.getElementById(idcanvas);
	var ctx = canvas.getContext("2d");
	var img = new Image();

	var px = posx - Math.trunc((dimx - 1) / 2);
	var py = posy - Math.trunc((dimy - 1) / 2);
	var px2 = px;
	var py2 = py;

	if (rotate == 90)
	{
		px2 = posx - (posy - py);
		py2 = posy - (posx - px);
	}
	else if (rotate == 180)
	{
		px2 = posx - ((px + dimx) - posx - 1);
		py2 = posy - (py + dimy - posy - 1);
	}
	else if (rotate == 270)
	{
		px2 = posx - (posy - py);
		py2 = posy - (px + dimx - posx - 1);
	}
	if (rotate == 90 || rotate == 270)
	{
		var tmp = dimx;
		dimx = dimy;
		dimy = tmp;
	}
	ctx.fillStyle = color;
	ctx.beginPath();
	ctx.fillRect(px2 * size, py2 * size, dimx *size, dimy *size);
//	img.src = imgsrc;
//	img.onload = function() {ctx.drawImage(img, px2 * size, py2 * size, dimx * size, dimy * size);};
}

function clearGame()
{
	var canvas = parent.document.getElementById(idcanvas);
	var ctx = canvas.getContext("2d");

	ctx.clearRect(0, 0, 1500, 1000);
}
