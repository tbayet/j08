var size = 10;
var idcanvas = "c_game";

function draw_ship(posx, posy, dimx, dimy, color)
{
	var canvas = parent.document.getElementById(idcanvas);
	var ctx = canvas.getContext("2d");

	var x;
	var y = posy;
	var img = new Image();

	ctx.fillStyle = color;
	while (y < (posy + dimy))
	{
		x = posx;
		while (x < (posx + dimx))
		{
			ctx.beginPath();
			ctx.fillRect(x * size, y * size, size, size);
			x++;
		}
		y++;
	}

    img.src = 'img/naboo.png';
	img.onload = function() {ctx.drawImage(img, posx * size, posy * size, dimx * size, dimy * size);};
}

function clearGame()
{
	var canvas = parent.document.getElementById(idcanvas);
	var ctx = canvas.getContext("2d");

	ctx.clearRect(0, 0, 1500, 1000);
}
