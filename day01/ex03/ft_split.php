<?php
function ft_split($str)
{
	$ar = preg_split('/\s+/', $str);
	//$ar = array_map('trim', explode(' ', $str));
	sort($ar);
	return $ar;
}
?>