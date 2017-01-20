var size = 10;
var idcanvas = "c_game";

function draw_obstacle(x1, y1, x2, y2, img)
{
	var canvas = parent.document.getElementById(idcanvas);
	var ctx = canvas.getContext("2d");
	var image = new Image();

	ctx.strokeStyle = "yellow";
	ctx.lineWidth = 1;
	ctx.strokeRect(x1 * size, y1 * size, (x2 - x1) * size, (y2 - y1) * size);
	image.src = img;
	image.onload = function(){
		ctx.drawImage(image, x1 * size, y1 * size, (x2 - x1) * size, (y2 - y1) * size);
	}
}

function draw_ship(x1, y1, x2, y2, color)
{
	var canvas = parent.document.getElementById(idcanvas);
	var ctx = canvas.getContext("2d");

	ctx.fillStyle = color;
	ctx.beginPath();
	ctx.fillRect(x1 * size, y1 * size, (x2 - x1) * size, (y2 - y1) * size);
}

function clear_ship(x1, y1, x2, y2)
{
	var canvas = parent.document.getElementById(idcanvas);
	var ctx = canvas.getContext("2d");
	ctx.clearRect(x1 * size, y1 * size, (x2 - x1) * size, (y2 - y1) * size);
}

function animate_ship(x1, y1, x2, y2, x3, y3, x4, y4, color)
{
	var canvas = parent.document.getElementById(idcanvas);
	var ctx = canvas.getContext("2d");
	var dir;
	var inter;

	if (x1 != x3)
	{
		if (x1 < x3)
			dir = 'r';
		else
			dir = 'l';
	}
	else
	{
		if (y1 < y3)
			dir = 'd';
		else
			dir = 'u';
	}

	inter = setInterval( function ()
	{
		if ((dir == 'r' || dir == 'l') && x1 == x3)
			clearInterval(inter);
		else if ((dir == 'u' || dir == 'd') && y1 == y3)
			clearInterval(inter);
		else
		{
			ctx.clearRect(x1 * size, y1 * size, (x2 - x1) * size, (y2 - y1) * size);
			if (dir == 'r')
			{
				x1++;
				x2++;
			}
			else if (dir == 'l')
			{
				x1--;
				x2--;
			}
			else if (dir == 'u')
			{
				y1--;
				y2--;
			}
			else if (dir == 'd')
			{
				y1++;
				y2++;
			}
			draw_ship(x1, y1, x2, y2, color);
		}
	}, 500);
}

function clearGame()
{
	var canvas = parent.document.getElementById(idcanvas);
	var ctx = canvas.getContext("2d");

	ctx.clearRect(0, 0, 1500, 1000);
}
