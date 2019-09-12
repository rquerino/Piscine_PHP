<?php
function ft_getmonth($str)
{
	if ($str == "January")
		return (1);
	else if ($str == "February")
		return (2);
	else if ($str == "March")
		return (3);
	else if ($str == "April")
		return (4);
	else if ($str == "May")
		return (5);
	else if ($str == "June")
		return (6);
	else if ($str == "July")
		return (7);
	else if ($str == "August")
		return (8);
	else if ($str == "September")
		return (9);
	else if ($str == "October")
		return (10);
	else if ($str == "November")
		return (11);
	else if ($str == "December")
		return (12);
	else
		return (0);
}
if ($argc == 2)
{
	$reg = '/(^\w{5,8})(\s)(\d{1,2})(\s)(\w{3,9})(\s)(\d{4})(\s)(\d{2})(:)(\d{2})(:)(\d{2})/m';
	$str = $argv[1];
	if (!preg_match($reg, $str))
	{
		echo "Wrong Format1\n";
		return ;
	}
	$ar = array();
	preg_match_all($reg, $str, $ar);
	//array_shift($arr); // Remove the full match result
	//var_dump($ar);
	$day = $ar[3][0];
	$month = ft_getmonth($ar[5][0]);
	$year = $ar[7][0];
	$hour = $ar[9][0];
	$min = $ar[11][0];
	$sec = $ar[13][0];
	//echo "month: $month, year: $year\n";
	if ($month == 0)
		echo "Wrong Format2\n";
	else if ($year < 1970)
		echo "0\n";
	else
	{
		$res = ($year - 1970) * 31556952;
		$res += ($month - 1) * 2629746;
		$res += $day * 86400;
		$res += $hour * 3600;
		$res += $min * 60;
		$res += $sec;
		echo "$res\n";
	}
}
?>