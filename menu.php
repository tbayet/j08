<?php
include_once("Tie.class.php");
include_once("Naboo.class.php");
include_once("Destroyer.class.php");
include_once("Obstacle.class.php");
include_once("Player.class.php");
include_once("function.php");
session_start();

if ($_GET['reset'] == 'reset')
{
	$_SESSION['init'] = False;
}
?>
<html>
<head>
	<script type="text/javascript" src="ship.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div style="color: lavender;">
	<form method="get" action="menu.php">
		<input type="submit" name="reset" value="reset" onclick=clearGame()>
	</form>
	</div>
<?php

function init()
{
	include("init.php");
	$_SESSION['player'] = $p1;
	$obstacles = array(); //TO PRINT IN FIRST LAYER
	$obstacles[0] = new Obstacle(45, 45, 3, 3, "img/meteor.png");
	$obstacles[1] = new Obstacle(30, 80, 6, 6, "img/meteor.png");
	$obstacles[2] = new Obstacle(120, 10, 5, 5, "img/meteor.png");
	$obstacles[3] = new Obstacle(100, 60, 10, 10, "img/meteor.png");
	$_SESSION['obstacles'] = $obstacles;
	$_SESSION['player']->start();
}
if ($_SESSION['init'] != True) //Futur Player
{
	init();
}

if ($_GET['value'] == 'Fin')
{
	$_SESSION['player'] = $_SESSION['player']->finish();
	foreach ($_SESSION['player']->ships as $ship)
	{
		$ship->start();
	}
}

if ($_GET['value'] == 'fire')
{
	$_SESSION['player']->ships = $_SESSION['player']->getCurrentShip()->fire($_SESSION['player']->nextP->ships);
}


function select()
{
	foreach($_SESSION['player']->ships as $ship)
	{
		if ($ship->nom == $_GET['ship'])
		{
			echo "toto";
			$_SESSION['player']->setCurrentShip($ship);
		}
	}

	if ($_SESSION['player']->getCurrentShip() != NULL)
		echo "<option value=".$_SESSION['player']->getCurrentShip()->nom.">".$_SESSION['player']->getCurrentShip()->nom."</option>";
	else
		echo "<option value=' '> </option>";
	foreach($_SESSION['player']->ships as $ship)
	{
		if ($_SESSION['player']->getCurrentShip() == NULL || $_SESSION['player']->getCurrentShip()->nom != $ship->nom)
			echo "<option value=".$ship->nom.">".$ship->nom."</option>";
	}
}

function ship($speed, $mouv)
{
	if ($_GET['value'] == 'OK')
	{
		$_SESSION['player']->getCurrentShip()->move($_GET['mouv']);
		print("<SCRIPT>animate_ship(".$_SESSION['player']->getCurrentShip().", '".$_SESSION['player']->color."');\n</SCRIPT>");
		$speed = $speed - $_GET['mouv'];
	}
	if ($speed <= $mouv)
	{
	//	$_SESSION['ship'] = NULL;//new Naboo("naboo");
	//	init();
	//	$speed = $_SESSION['ship']->vit;
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

function gestion_pp($pp)
{
	$j = 0;
	$num = 0;
	if ($_GET['value'] == 'PC')
	{
		$num = de_six($_GET['pp'], 1);
		if ($num != 0)
			$_SESSION['player']->getCurrentShip()->pc += ($num/6);
		$pp = $pp - $_GET['pp'];
	}
	else if ($_GET['value'] == 'Bouclier')
	{
		$_SESSION['player']->getCurrentShip()->bouc += $_GET['pp'];
		$pp = $pp - $_GET['pp'];
	}
	else if ($_GET['value'] == 'Vitesse')
	{
		$num = de_six($_GET['pp'], 1);
		$_SESSION['player']->getCurrentShip()->vit += $num;
		$lol = $_SESSION['player']->getCurrentShip()->vit;
		$pp = $pp - $_GET['pp'];
	}
	else if ($_GET['value'] == 'Arme')
	{
		$pp = $pp - $_GET['pp'];
	}
	while ($j <= $pp)
	{
		echo "<option value=".$j.">".$j."</option>";
		$j++;
	}
	return $pp;
}
?>

<!-- Choix du Vaisseau -->
	<form method="get" action="menu.php">
		<select width=100px name="ship">
		<?php select(); ?>
			<input type="submit" name="value" value="Ship"/>
		</select>
	</form>

<!-- Gestions PP -->
	<form method="get" action="menu.php">
		<select width=100px name="pp">
		<?php $_SESSION['player']->getCurrentShip()->pp = gestion_pp($_SESSION['player']->getCurrentShip()->pp);?>
			<input type="submit" name="value" value="PC"/>
			<input type="submit" name="value" value="Bouclier"/>
			<input type="submit" name="value" value="Vitesse"/>
		</select>
	</form>
<?php $speed = $_SESSION['player']->getCurrentShip()->vit; ?>

<!-- SPEED GESTION -->
	<form method="get" action="menu.php">
		<select width=100px name="mouv">
			<option value="0">0</option>
			<?php $_SESSION['player']->getCurrentShip()->vit = ship($speed, 4);?>
			<input type="submit" name="value" value="OK"/>
		</select>
	</form>

<!-- TURN LEFT GESTION -->
	<form method="get" action="menu.php">
		<input type="submit" name="value" value="Turn Left"/>
	</form>
<!-- TURN RIGHT GESTION -->
	<form method="get" action="menu.php">
		<input type="submit" name="value" value="Turn Right"/>
	</form>

<!-- FIRE GESTION -->
	<form method="get" action="menu.php">
		<input type="submit" name="value" value="fire"/>
	</form>

<!-- Change PLAYER -->
	<form method="get" action="menu.php">
		<input type="submit" name="value" value="Fin"/>
	</form>
<!-- Execution des Scripts -->
	<script type="text/javascript" src="ship.js"></script>
<?php

if ($_GET['value'] == 'Turn Left')
{
	$_SESSION['player']->getCurrentShip()->turnLeft();
	$_SESSION['player']->getCurrentShip()->printme($_SESSION['player']->color);
}
else if ($_GET['value'] == 'Turn Right')
{
	$_SESSION['player']->getCurrentShip()->turnRight();
	$_SESSION['player']->getCurrentShip()->printme($_SESSION['player']->color);
}

if ($_SESSION['init'] != True)
{
	foreach($_SESSION['obstacles'] as $obs)
	{
		print($obs);
	}
	$_SESSION['init'] = True;
}
?>
	</body>
</html>
