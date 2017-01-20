<?php
	include_once("Vaisseau.class.php");
	class Naboo extends Vaisseau
	{
		const VIT = 15;
		const PP = 10;
		const PC = 5;

		function __construct($name, $x, $y, $rot)
		{
			start();
			$this->nom = $name;
			$this->dimx = 4;
			$this->dimy = 1;
			$this->pc = self::PC;
			$this->man = 4;
			$this->bouc = 0;
			$this->armes = array("arme1");
			parent::__construct($x, $y, $rot);
		}

		public function start()
		{
			$this->vit = self::VIT;
			$this->pp = self::PP;
		}
		public function maxPC()
		{
			return (self::PC);
		}
	}
?>
