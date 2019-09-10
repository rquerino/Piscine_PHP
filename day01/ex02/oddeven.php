<?php
	do
	{
		echo "Enter a number: ";
		if (($input = fgets(STDIN)) == false)
		{
			print("^D\n");
			break ;
		}
		$input = trim($input);
		if (is_numeric($input))
		{
			if ($input % 2 == 0)
				echo "The number " . $input . " is even\n";
			else if ($input % 2 != 0)
				echo "The number " . $input . " is odd\n";
		}
		else
			echo "'" . $input . "' is not a number\n";
	}
	while (true)
?>