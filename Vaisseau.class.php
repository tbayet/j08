<?php
	include_once("Type.trait.php");
	class Vaisseau
	{
		use Type;

		public $x;
		public $y;
		public $rot;

		function __construct($kwart)
		{
			$this->x = 5;
			$this->y = 5;
			$this->rot = 0;
		}

		function move($mv)
		{
	//		print($this->x). PHP_EOL;
	//		print($this->y). PHP_EOL;
			if ($this->rot == 0)
				$this->x = $this->x + $mv;
			else if ($this->rot == 90)
				$this->y = $this->y + $mv;
			else if ($this->rot == 180)
				$this->x = $this->x - $mv;
			else if ($this->rot == 270)
				$this->y = $this->y - $mv;
	//		print($this->x). PHP_EOL;
	//		print($this->y). PHP_EOL.PHP_EOL;
		}
	}
?>
