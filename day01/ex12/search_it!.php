<?php
	array_shift($argv);
	if ($argc > 2)
	{
		$key = $argv[0];
		$ar = array();
		array_shift($argv);
		$res = NULL;
		foreach ($argv as $av)
		{
			$ar = explode(":", $av);
			if ($key == $ar[0])
				$res = $ar[1];
		}
		if ($res != NULL)
			echo "$res\n";
	}
?>