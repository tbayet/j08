<?php

	trait Type {
			private $nom;
			private $dimx;
			private $dimy;
			private $pc;
			private $pp;
			private $vit;
			private $man;
			private $bouc;
			private $armes;

	}

	class Vaisseau
	{
		use Type;

		private $x;
		private $y;
		public $rot;

		function __construct($kwart)
		{
			$this->x = 100;
			$this->y = 300;
			$this->rot = 0;
		}

		function move($mv)
		{
			print($this->x). PHP_EOL;
			print($this->y). PHP_EOL;
			if ($this->rot == 0)
				$this->x = $this->x + $mv;
			else if ($this->rot == 90)
				$this->y = $this->y + $mv;
			else if ($this->rot == 180)
				$this->x = $this->x - $mv;
			else if ($this->rot == 270)
				$this->y = $this->y - $mv;
			print($this->x). PHP_EOL;
			print($this->y). PHP_EOL.PHP_EOL;
		}
	}

	class naboo extends Vaisseau
	{
		function __construct($kwart)
		{
			$this->nom = $kwart;
			$this->dimx = 1;
			$this->dimy = 4;
			$this->pc = 5;
			$this->pp = 10;
			$this->vit = 15;
			$this->man = 4;
			$this->bouc = 0;
			$this->armes = array("arme1");
			print($this->nom). PHP_EOL;
			print($this->pc). PHP_EOL;
			print($this->pp). PHP_EOL;
			print($this->vit). PHP_EOL . PHP_EOL;
			parent::__construct("naboo");
		}

	}


	$Naboo = new naboo("naboo");
	$Naboo->move(4);
	$Naboo->rot = 270;
	$Naboo->move(4);

?>
