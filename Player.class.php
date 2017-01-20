<?php
include_once("Naboo.class.php");
include_once("Vaisseau.class.php");

class Player
{
	private $ships;
	public $color;
	private $nextP;

	private static $selected;

	public function __construct($color)
	{
		$this->ships = array();
		$this->color = $color;
		self::$selected = NULL;
	}
	public function setNext(Player $next)
	{
		$this->nextP = $next;
	}
	public function start()
	{
		self::$selected = $this;
	}
	public function finish()
	{
		self::$selected = $this->nextP;
		return ($this->nextP);
	}
	public static function getCurrent()
	{
		return (self::$selected);
	}
	public function addShip(Vaisseau $ship)
	{
		array_push($this->ships, $ship);
	}
}
?>
