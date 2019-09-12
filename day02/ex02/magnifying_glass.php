<?php
	function ft_flag_a($av, $i) //find "<a "
	{
		if ($av[$i] == '<' && $av[$i + 1] == 'a' && $av[$i + 2] == ' ')
			return (1);
		return (0);
	}
	function ft_istitle($av, $i) // find: "title=""
	{
		if ($av[$i - 6] == 't' && $av[$i - 5] == 'i' && $av[$i - 4] == 't' &&
			$av[$i - 3] == 'l' && $av[$i - 2] == 'e' && $av[$i - 1] == '=' &&
			$av[$i] == '"')
			return (1);
		return (0);
	}
	function ft_endflag_a($av, $i) // find: "/a>" if flag_a == 1
	{
		if ($av[$i - 2] == '/' && $av[$i - 1] == 'a' && $av[$i] == '>')
			return (1);
		return (0);
	}
	if ($argc == 2)
	{
		$av = file_get_contents($argv[1]);
		$i = 0;
		$fl_a = 0;
		while ($av[$i])
		{
			if (ft_flag_a($av, $i))
			{
				$fl_a = 1;
			}
			if ($fl_a == 1 && ft_istitle($av, $i))
			{
				$i++;
				while ($av[$i] != '"')
				{
					$av[$i] = strtoupper($av[$i]);
					$i++;
				}
			}
			if ($fl_a == 1 && $av[$i] == '>')
			{
				$i++;
				while ($av[$i] != '<' && $av[$i] != '')
				{
					$av[$i] = strtoupper($av[$i]);
					$i++;
				}
			}
			if ($fl_a == 1 && ft_endflag_a($av, $i))
				$fl_a = 0;
			$i++;
		}
		echo $av;
	}
?>