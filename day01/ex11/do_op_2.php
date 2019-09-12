<?php
	if ($argc == 2)
	{
		$i = 0;
		$size = strlen($argv[1]);
		$nbrs = array();
		$s = NULL;
		while ($i < $size && sizeof($nbrs) < 2)
		{
			if ($argv[1][$i] == '+' || $argv[1][$i] == '-' || $argv[1][$i] == '/' || $argv[1][$i] == '*' || $argv[1][$i] == '%')
			{
				if ($s == NULL)
					$s = $argv[1][$i];
				else
				{
					echo "Syntax Error\n";
					return ;
				}
			}
			else if (($argv[1][$i] >= 'a' && $argv[1][$i] <= 'z') || ($argv[1][$i] >= 'A' && $argv[1][$i] <= 'Z'))
			{
				echo "Syntax Error\n";
				return ;
			}
			else if ($argv[1][$i] >= '0' && $argv[1][$i] <= '9')
			{
				$ar = array();
				while ($argv[1][$i] >= '0' && $argv[1][$i] <= '9')
				{
					array_push($ar, $argv[1][$i]);
					$i++;
				}
				$nbrs[] = implode("", $ar);
				$i--;
			}
			$i++;
		}
		if (sizeof($nbrs) != 2 || !$s)
			echo "Syntax Error\n";
		else if ($s == '+')
			echo $nbrs[0] + $nbrs[1] . "\n";
		else if ($s == '-')
			echo $nbrs[0] - $nbrs[1] . "\n";
		else if ($s == '/')
			echo $nbrs[0] / $nbrs[1] . "\n";
		else if ($s == '*')
			echo $nbrs[0] * $nbrs[1] . "\n";
		else if ($s == '%')
			echo $nbrs[0] % $nbrs[1] . "\n";
		else
			echo "Syntax Error\n";
	}
	else
		echo "Incorrect Parameters\n";
?>