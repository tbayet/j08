<?php
	include_once('Fighter.class.php');

	class UnholyFactory
	{
		private $army = array();

		public function absorb($c)
		{
			if ($c instanceof Fighter)
			{
				if (!array_key_exists($c->getName(), $this->army))
				{
					$this->army[$c->getName()] = $c;
					print("(Factory absorbed a fighter of type ".$c->getName().")".PHP_EOL);
				}
				else
					print("(Factory already absorbed a fighter of type ".$c->getName().")".PHP_EOL);
			}
			else
				print("(Factory can't absorb this, it's not a fighter)".PHP_EOL);
		}

		public function fabricate($c)
		{
			if (array_key_exists($c, $this->army))
			{
				print("(Factory fabricates a fighter of type ".$c.")".PHP_EOL);
				return ($this->army[$c]);
			}
			else
				print("(Factory hasn't absorbed any fighter of type ".$c.")".PHP_EOL);
			return (null);
		}
	}
?>
