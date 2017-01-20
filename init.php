<?php
	$p1 = new Player("blue");
	$p2 = new Player("red");

	$p1->addShip(new Tie("Marion",14 ,10 , 0));
	$p1->addShip(new Tie("Marine",14 ,4 , 0));
	$p1->addShip(new Tie("Jean-Marie", 14,7 , 0));
	$p1->addShip(new Naboo("Soral",9 , 4, 0));
	$p1->addShip(new Naboo("Zemmour",9 ,10 , 0));
	$p1->addShip(new Destroyer("Trump",6 ,7 , 0));

	$p2->addShip(new Tie("Zaz",136 ,90 , 180));
	$p2->addShip(new Tie("Cheminade", 136, 96, 180));
	$p2->addShip(new Tie("Mandela", 136, 93, 180));
	$p2->addShip(new Naboo("Lenine",151 ,96 , 180));
	$p2->addShip(new Naboo("Melenchon",151 ,90 , 180));
	//$p2->addShip(new Destroyer("Gandhi",144 ,93 , 180));
	$p2->addShip(new Destroyer("Gandhi", 30, 7, 180));

	$p1->setNext($p2);
	$p2->setNext($p1);

	foreach($p1->ships as $ship)
	{
		$ship->printme($p1->color);
	}
	foreach($p2->ships as $ship)
	{
		$ship->printme($p2->color);
	}
 
?>
