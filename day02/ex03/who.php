<?php
	$who = shell_exec("w");
	$ar = preg_split('/\n/', trim($who)); // trim line and divide by '\n'
	//ignore two lines
	array_shift($ar);
	array_shift($ar);
	foreach ($ar as $av)
	{
		$obj = preg_split('/\s+/', $av);
		$date = date('M d', time());
		$tty = ($obj[1] == "console") ? $obj[1] : "tty".$obj[1];
		echo $obj[0] . ' ' . str_pad($tty, 8) . ' ' . $date . ' ' . $obj[3] . " \n";
	}
?>