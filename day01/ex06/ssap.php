<?php
	array_shift($argv); //Remove the first element (file name).
	if ($argc > 1)
	{
		$i = 1;
		$ar = array();
		foreach ($argv as $av)
		{
			foreach (preg_split('/\s+/', trim($av)) as $vv)
			{
				array_push($ar, $vv);
			}
		}
		sort($ar);
		foreach($ar as $a)
			echo "$a\n";
	}
?>