<?php
session_start();
class truc
{
	public $speed = 15;
}
if ($_SESSION['truc'] == NULL)
	$_SESSION['truc'] = new truc();
function ship($speed, $mouv)
{
	if ($_GET['value'] == 'OK')
		$speed = $speed - $_GET['mouv'];
	if ($speed <= $mouv)
	{
		$_SESSION['truc'] = new truc();
		$speed = $_SESSION['truc']->speed;
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

$speed = $_SESSION['truc']->speed;
?>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" types="text/css">
		<title>Super-Market</title>
	</head>
	<body>
		<p> </p>
		<form method="get" action="order.php">
			<select width=100px name="mouv">
<?php $_SESSION['truc']->speed = ship($speed, 4);?>
	<input type="submit" name="value" value="OK"/>
			</select>
		</form>
	</body>
</html>
