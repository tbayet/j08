<?php
	include_once("Vaisseau.class.php");
	class Destroyer extends Vaisseau
	{
		const VIT = 10;
		const PP = 12;
		const PC = 8;

		function __construct($name, $x, $y, $rot)
		{
			start();
			$this->nom = $name;
			$this->dimx = 8;
			$this->dimy = 3;
			$this->pc = self::PC;
			$this->man = 5;
			$this->bouc = 2;
			$this->armes = array("arme1");
			parent::__construct($x, $y, $rot);
		}

		public function start()
		{
			$this->VIT = self::VIT;
			$this->pp = self::PP;
		}
		public function maxPC()
		{
			return (self::PC);
		}
	}
?>
