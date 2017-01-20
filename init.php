<?php
	$p1 = new Player("blue");
	$p2 = new Player("red");

	$p1->addShip(new Tie("Marion", , , 0));
	$p1->addShip(new Tie("Marine", , , 0));
	$p1->addShip(new Tie("Jean-Marie", , , 0));
	$p1->addShip(new Naboo("Soral", , , 0));
	$p1->addShip(new Naboo("Zemmour", , , 0));
	$p1->addShip(new Destroyer("Trump", , , 0));

	$p1->addShip(new Tie("Zaz", , , 180));
	$p1->addShip(new Tie("Cheminade", , , 180));
	$p1->addShip(new Tie("Mandela", , , 180));
	$p1->addShip(new Naboo("Lenine", , , 180));
	$p1->addShip(new Naboo("Melenchon", , , 180));
	$p1->addShip(new Destroyer("Gandhi", , , 180));

	$p1->setNext($p2);
	$p2->setNext($p1);
?>
