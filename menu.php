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
	<?php print("
		draw_ship(1, 1, 4, 1, 'red', 'img/naboo.png', 90);
		draw_ship(1, 1, 4, 1, 'blue', 'img/naboo.png', 0);
		draw_ship(1, 1, 4, 1, 'green', 'img/naboo.png', 180);
		draw_ship(1, 1, 4, 1, 'orange', 'img/naboo.png', 270);
		draw_ship(4, 11, 8, 5, 'red', 'img/naboo.png', 90);
		draw_ship(4, 11, 8, 5, 'blue', 'img/naboo.png', 0);
		draw_ship(4, 11, 8, 5, 'green', 'img/naboo.png', 180);
		draw_ship(4, 11, 8, 5, 'orange', 'img/naboo.png', 270);
		draw_ship(10, 20, 10, 3, 'orange', 'img/naboo.png', 0);
		draw_ship(10, 20, 10, 3, 'blue', 'img/naboo.png', 90);
	"); ?>
	</script>
</body>
