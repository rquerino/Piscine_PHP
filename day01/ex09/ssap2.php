<?php
	function	ft_char_type($c)
	{
		if (($c >= 'a' && $c <= 'z') || ($c >= 'A' && $c <= 'Z')) //Starts with letter
			return (0);
		if ($c >= '0' && $c <= '9') //Starts with number
			return (1);
		return (2); //Starts with a special character
	}
	function	ft_my_sorting($s1, $s2)
	{
		$a1 = str_split($s1);
		$a2 = str_split($s2);
		$i = 0;
		$r = 0;
		// Get the first different character
		while ($i < sizeof($a1) && $i < sizeof($a2) && 0 == ($r = strcasecmp($a1[$i], $a2[$i])))
			$i++;
		// If they're different
		if ($r != 0)
		{
			$c1 = ft_char_type($a1[$i]);
			$c2 = ft_char_type($a2[$i]);
			if ($c1 != $c2)
				return ($c1 > $c2 ? 1 : -1);
			return ($r);
		}
		else
			return (sizeof($a1) == $i ? -1 : 1); //If the string a1 reached the end, it means it's smaller than a2. Comes first.
	}
	array_shift($argv); //Remove the first element (file name).
	if ($argc > 1)
	{
		$ar = array();
		foreach ($argv as $av)
		{
			foreach (preg_split('/\s+/', trim($av)) as $vv)
			{
				array_push($ar, $vv);
			}
		}
		usort($ar, "ft_my_sorting");
		foreach($ar as $v)
			echo "$v\n";
	}
?>