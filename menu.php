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
		draw_ship(1, 1, 3, 2, 'blue');
		draw_ship(20, 30, 5, 3, 'red');
	"); ?>
	</script>
</body>
