<?php
	include_once("Vaisseau.class.php");
	class Naboo extends Vaisseau
	{
		function __construct($kwart)
		{
			$this->nom = $kwart;
			$this->dimx = 4;
			$this->dimy = 1;
			$this->pc = 5;
			$this->pp = 10;
			$this->vit = 15;
			$this->man = 4;
			$this->bouc = 0;
			$this->armes = array("arme1");
//			print($this->nom). PHP_EOL;
//			print($this->pc). PHP_EOL;
//			print($this->pp). PHP_EOL;
//			print($this->vit). PHP_EOL . PHP_EOL;
			parent::__construct("naboo");
		}
	}
?>
