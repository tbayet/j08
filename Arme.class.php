<?php
	include_once("Box.class.php");
	include_once("Coord.trait.php");
	class Arme
	{
		use Coord;
		public $box;

		public function __construct($x, $y, $dimx, $dimy, $rotate)
		{
			$this->x = $x;
			$this->y = $y;
			$this->dimx = $dimx;
			$this->dimy = $dimy;
			$this->rot = $rotate;
			$this->box = new Box($x, $y, $dimx, $dimy, $rotate, TRUE);
		}
		public function update($x, $y, $dimx, $dimy, $rotate)
		{
			$this->x = $x;
			$this->y = $y;
			$this->dimx = $dimx;
			$this->dimy = $dimy;
			$this->rot = $rotate;
			$this->box->update($x, $y, $dimx, $dimy, $rotate, TRUE);
		}
		public function __toString()
		{
			return($this->x.", ".$this->y.", ".$this->dimx.", ".$this->dimy);
		}
		public static function doc()
		{
			return(file_get_contents("doc/Arme.doc.txt"));
		}
	}
?>
