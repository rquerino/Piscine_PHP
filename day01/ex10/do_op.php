<?php
	array_shift($argv); //Remove the first element (file name).
	if ($argc == 4)
	{
		$ar = array();
		foreach ($argv as $av)
			foreach (preg_split('/\s+/', trim($av)) as $vv)
				array_push($ar, $vv);
		if ($ar[1] == '+')
			echo $ar[0] + $ar[2] . "\n";
		else if ($ar[1] == '-')
			echo $ar[0] - $ar[2] . "\n";
		else if ($ar[1] == '/')
			echo $ar[0] / $ar[2] . "\n";
		else if ($ar[1] == '*')
			echo $ar[0] * $ar[2] . "\n";
		else if ($ar[1] == '%')
			echo $ar[0] % $ar[2] . "\n";
	}
?>