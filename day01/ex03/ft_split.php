<?php
function ft_split($str)
{
	//$ar = explode(" ", $str);
	$ar = array_map('trim', explode(' ', $str));
	sort($ar);
	return $ar;
}
?>