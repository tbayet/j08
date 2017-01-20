<?php
include_once("Coord.trait.php");
include_once("Box.class.php");

class Vaisseau
{
	use Coord;

	public $nom;
	private $box;
	private $oldbox;
	private $pc;
	private $pp;
	public $vit;
	private $man;
	private $bouc;
	private $armes;


	public function __construct($x, $y, $rot)
	{
		$this->x = $x;
		$this->y = $y;
		$this->rot = $rot;
		$this->box = new Box($this->x, $this->y, $this->dimx, $this->dimy, $this->rot);
		$this->oldbox = clone $this->box;
	}

	public function move($mv)
	{
		$this->oldbox->update($this->x, $this->y, $this->dimx, $this->dimy, $this->rot);
		if ($this->rot == 0)
			$this->x = $this->x + $mv;
		else if ($this->rot == 90)
			$this->y = $this->y + $mv;
		else if ($this->rot == 180)
			$this->x = $this->x - $mv;
		else if ($this->rot == 270)
			$this->y = $this->y - $mv;
		$this->box->update($this->x, $this->y, $this->dimx, $this->dimy, $this->rot);
	}
	public function turnLeft()
	{
		$this->oldbox->update($this->x, $this->y, $this->dimx, $this->dimy, $this->rot);
		$this->rot -= 90;
		if ($this->rot < 0)
			$this->rot = 270;
		$this->box->update($this->x, $this->y, $this->dimx, $this->dimy, $this->rot);
	}

	public function turnRight()
	{
		$this->oldbox->update($this->x, $this->y, $this->dimx, $this->dimy, $this->rot);
		$this->rot += 90;
		if ($this->rot == 360)
			$this->rot = 0;
		$this->box->update($this->x, $this->y, $this->dimx, $this->dimy, $this->rot);
	}
	public function __toString()
	{
		return ($this->oldbox .", ".$this->box);
	}
	public function printme()
	{
		print("<SCRIPT>clear_ship(".$this->oldbox.");".PHP_EOL.
		"draw_ship(".$this->box.", 'red');".PHP_EOL."</SCRIPT>");
	}
}
?>
