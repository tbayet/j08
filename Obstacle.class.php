<?php
include_once("Coord.trait.php");
include_once("Box.class.php");

Class Obstacle
{
	use Coord;
	private $img;
	private $box;

	public function __construct($x, $y, $dimx, $dimy, $img)
	{
		$this->x = $x;
		$this->y = $y;
		$this->dimx = $dimx;
		$this->dimy = $dimy;
		$this->img = $img;
		$box = new Box($x, $y, $dimx, $dimy, 0);
	}
	public function __toString()
	{
		return("<SCRIPT>draw_obstacle(".$this->box.", ".$this->img.");</SCRIPT>\n");
	}
}
?>
