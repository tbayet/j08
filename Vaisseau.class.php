<?php
include_once("Coord.trait.php");
include_once("Arme.class.php");
include_once("Box.class.php");

class Vaisseau
{
	use Coord;

	public $nom;
	public $box;
	public $oldbox;
	public $pc;
	public $pp;
	public $vit;
	private $man;
	private $bouc;
	private $armes;

	public function __construct($x, $y, $rot)
	{
		$this->x = $x;
		$this->y = $y;
		$this->rot = $rot;
		$this->armes = new Arme($x, $y, 25, 1, $rot);
		$this->box = new Box($this->x, $this->y, $this->dimx, $this->dimy, $this->rot, FALSE);
		$this->oldbox = clone $this->box;
	}

	public function __destruct()
	{
		if ($this->pc <= 0)
			print("<SCRIPT> clear_ship(".$this->box.");</SCRIPT>\n");
	}

	public function fire(array $ships)
	{
		print("<SCRIPT>draw_fire(".$this->armes.");\n</SCRIPT>");
		$i = 0;
		foreach($ships as $ship)
		{
			$boite = $this->armes->box;
			if ($boite($ship->box) == True)
			{
				$this->armes;
				$ship->pc -= 3;
				if ($ship->pc <= 0)
				{
					array_splice($ships, $i, 1);
					$ship->nom = "";
					$ship->__destruct();
					$ship = NULL;
					$i--;
				}
			}
			$i++;
		}
		return ($ships);
	}

	public function move($mv)
	{
		$this->oldbox->update($this->x, $this->y, $this->dimx, $this->dimy, $this->rot, FALSE);
		if ($this->rot == 0)
			$this->x = $this->x + $mv;
		else if ($this->rot == 90)
			$this->y = $this->y + $mv;
		else if ($this->rot == 180)
			$this->x = $this->x - $mv;
		else if ($this->rot == 270)
			$this->y = $this->y - $mv;
		$this->box->update($this->x, $this->y, $this->dimx, $this->dimy, $this->rot, FALSE);
		$this->armes->update($x, $y, 25, 1, $rot);
	}
	public function turnLeft()
	{
		$this->oldbox->update($this->x, $this->y, $this->dimx, $this->dimy, $this->rot, FALSE);
		$this->rot -= 90;
		if ($this->rot < 0)
			$this->rot = 270;
		$this->box->update($this->x, $this->y, $this->dimx, $this->dimy, $this->rot, FALSE);
		$this->armes->update($x, $y, 25, 1, $rot);
	}

	public function turnRight()
	{
		$this->oldbox->update($this->x, $this->y, $this->dimx, $this->dimy, $this->rot, FALSE);
		$this->rot += 90;
		if ($this->rot == 360)
			$this->rot = 0;
		$this->box->update($this->x, $this->y, $this->dimx, $this->dimy, $this->rot, FALSE);
		$this->armes->update($x, $y, 25, 1, $rot);
	}
	public function __toString()
	{
		return ($this->oldbox .", ".$this->box);
	}
	public function printme($color)
	{
		print("<SCRIPT>clear_ship(".$this->oldbox.");".PHP_EOL.
		"draw_ship(".$this->box.", '".$color."');".PHP_EOL."</SCRIPT>");
	}
		public static function doc()
		{
			return(file_get_contents("doc/Vaisseau.doc.txt"));
		}
}
?>
