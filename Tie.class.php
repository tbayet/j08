<?php
	include_once("Vaisseau.class.php");
	class Tie extends Vaisseau
	{
		const VIT = 21;
		const PP = 10;
		const PC = 3;

		function __construct($name, $x, $y, $rot)
		{
			start();
			$this->nom = $name;
			$this->dimx = 2;
			$this->dimy = 1;
			$this->pc = self::PC;
			$this->man = 2;
			$this->bouc = 0;
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
