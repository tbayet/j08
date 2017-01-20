<?php
	function de_six($nb, $min)
	{
		$res = 0;
		while ($nb > 0)
		{
			$de;
			if (($de = mt_rand(1, 6)) >= $min)
				$res += $de;
			$nb--;
		}
		return($res);
	}
?>
