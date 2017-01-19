<html>
<head>
	<script type="text/javascript" src="ship.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div style="color: lavender;">
	<a href="#" onclick=clearGame()>clear</a>
	</div>
	<script type="text/javascript" src="ship.js"></script>
	<script>
	<?php
	include_once ("Naboo.class.php");

	$Naboo = new Naboo("naboo");
	print("draw_ship(".$Naboo->x.", ".$Naboo->y.", ".$Naboo->dimx.", ".$Naboo->dimy.", 'red', 'img/naboo.png', ".$Naboo->rot.");\n");
	$Naboo->move(4);
	print("draw_ship(".$Naboo->x.", ".$Naboo->y.", ".$Naboo->dimx.", ".$Naboo->dimy.", 'green', 'img/naboo.png', ".$Naboo->rot.");\n");
	$Naboo->rot = 90;
	print("draw_ship(".$Naboo->x.", ".$Naboo->y.", ".$Naboo->dimx.", ".$Naboo->dimy.", 'orange', 'img/naboo.png', ".$Naboo->rot.");\n");
	$Naboo->move(4);
	print("draw_ship(".$Naboo->x.", ".$Naboo->y.", ".$Naboo->dimx.", ".$Naboo->dimy.", 'purple', 'img/naboo.png', ".$Naboo->rot.");\n");

//print("
//		draw_ship(5, 5, 4, 1, 'red', 'img/naboo.png', 0);
//	");

		?>
	</script>
</body>
