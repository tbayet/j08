<?php
class Box
{
	private $x1;
	private $y1;
	private $x2;
	private $y2;

	public function __construct($posx, $posy, $dimx, $dimy, $rotate)
	{
		$px = $posx - intval(($dimx - 1) / 2);
		$py = $posy - intval(($dimy - 1) / 2);
		$this->x1 = $px;
		$this->y1 = $py;

		if ($rotate == 90)
		{
			$this->x1 = $posx - ($posy - $py);
			$this->y1 = $posy - ($posx - $px);
		}
		else if ($rotate == 180)
		{
			$this->x1 = $posx - (($px + $dimx) - $posx - 1);
			$this->y1 = $posy - ($py + $dimy - $posy - 1);
		}
		else if ($rotate == 270)
		{
			$this->x1 = $posx - ($posy - $py);
			$this->y1 = $posy - ($px + $dimx - $posx - 1);
		}
		if ($rotate == 90 || $rotate == 270)
		{
			$tmp = $dimx;
			$dimx = $dimy;
			$dimy = $tmp;
		}
		$this->x2 = $this->x1 + $dimx;
		$this->y2 = $this->y1 + $dimy;
	}
	public function update($posx, $posy, $dimx, $dimy, $rotate)
	{
		$px = $posx - intval(($dimx - 1) / 2);
		$py = $posy - intval(($dimy - 1) / 2);
		$this->x1 = $px;
		$this->y1 = $py;

		if ($rotate == 90)
		{
			$this->x1 = $posx - ($posy - $py);
			$this->y1 = $posy - ($posx - $px);
		}
		else if ($rotate == 180)
		{
			$this->x1 = $posx - (($px + $dimx) - $posx - 1);
			$this->y1 = $posy - ($py + $dimy - $posy - 1);
		}
		else if ($rotate == 270)
		{
			$this->x1 = $posx - ($posy - $py);
			$this->y1 = $posy - ($px + $dimx - $posx - 1);
		}
		if ($rotate == 90 || $rotate == 270)
		{
			$tmp = $dimx;
			$dimx = $dimy;
			$dimy = $tmp;
		}
		$this->x2 = $this->x1 + $dimx;
		$this->y2 = $this->y1 + $dimy;
	}
	public function __invoke(Box $elem)
	{
		$bool_x = False;
		$bool_y = False;
		if (($this->x1 > $elem->x1 && $this->x1 < $elem->x2)
			|| ($this->x2 > $elem->x1 && $this->x2 < $elem->x2)
			|| ($this->x1 < $elem->x1 && $this->x2 > $this->x2))
		{
			$bool_x = True;
		}
		if (($this->y1 > $elem->y1 && $this->y1 < $elem->y2)
			|| ($this->y2 > $elem->y1 && $this->y2 < $elem->y2)
			|| ($this->y1 < $elem->y1 && $this->y2 > $this->y2))
		{
			$bool_y = True;
		}
		if ($bool_x === True && $bool_y === True)
			return (True);
		return (False);
	}
	public function __toString()
	{
		return ($this->x1.", ".$this->y1.", ".$this->x2.", ".$this->y2);
	}
}
?>
