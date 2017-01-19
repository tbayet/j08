<?php
include_once("Naboo.class.php");
include_once("Obstacle.class.php");

session_start();

$init;

function init()
{
	$init = true;
	$_SESSION['ship'] = new Naboo("naboo");
	$obstacles = array(); //TO PRINT IN FIRST LAYER
	$obstacles[0] = new Obstacle(45, 45, 3, 3, "img/meteor.png");
	$obstacles[1] = new Obstacle(30, 80, 6, 6, "img/meteor.png");
	$obstacles[2] = new Obstacle(120, 10, 5, 5, "img/meteor.png");
	$obstacles[3] = new Obstacle(100, 60, 10, 10, "img/meteor.png");
	$_SESSION['obstacles'] = $obstacles;
}

if ($_SESSION['ship'] == NULL) //Futur Player
{
	init();
}
?>
<html>
<head>
	<script type="text/javascript" src="ship.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div style="color: lavender;">
		<a href="#" onclick=clearGame()>clear</a>
	</div>
	<?php
	function ship($speed, $mouv)
	{
		if ($_GET['value'] == 'OK')
		{
			$_SESSION['ship']->move($_GET['mouv']);
			print("<SCRIPT>animate_ship(".$_SESSION['ship'].", 'red');\n</SCRIPT>");
			$speed = $speed - $_GET['mouv'];
		}
		if ($speed <= $mouv)
		{
			$_SESSION['ship'] = NULL;//new Naboo("naboo");
			init();
			$speed = $_SESSION['ship']->vit;
		}
		$i = 0;
		while ($i != $mouv)
			$i++;
		while ($i <= $speed)
		{
			echo "<option value=".$i.">".$i."</option>";
			$i++;
		}
		return $speed;
	}
	$speed = $_SESSION['ship']->vit;
	?>
<!-- SPEED GESTION -->
	<form method="get" action="menu.php">
		<select width=100px name="mouv">
			<?php $_SESSION['ship']->vit = ship($speed, 4);?>
			<input type="submit" name="value" value="OK"/>
		</select>
	</form>

<!-- TURN LEFT GESTION -->
	<form method="get" action="menu.php">
		<input type="submit" name="turnLeft" value="OK"/>
	</form>
<!-- TURN RIGHT GESTION -->
	<form method="get" action="menu.php">
		<input type="submit" name="turnRight" value="OK"/>
	</form>

	<script type="text/javascript" src="ship.js"></script>
	<?php

if ($_GET['turnLeft'] == 'OK')
{
	$_SESSION['ship']->turnLeft();
	$_SESSION['ship']->printMe();
}
else if ($_GET['turnRight'] == 'OK')
{
	$_SESSION['ship']->turnRight();
	$_SESSION['ship']->printMe();
}

if (isset($init) && $init == True)
{
	foreach($_SESSION['obstacles'] as $obs)
	{
		print($obs);
	}
	$init = False;
}

	?>
	</body>
</html>
