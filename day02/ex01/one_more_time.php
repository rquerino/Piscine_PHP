<?php
	if ($argc == 2)
	{
		function ft_getmonth($str)
		{
			if ($str == "Janvier" || $str == "janvier")
				return ("01");
			else if ($str == "Février" || $str == "février")
				return ("02");
			else if ($str == "Mars" || $str == "mars")
				return ("03");
			else if ($str == "Avril" || $str == "avril")
				return ("04");
			else if ($str == "Mai" || $str == "mai")
				return ("05");
			else if ($str == "Juin" || $str == "juin")
				return ("06");
			else if ($str == "Juillet" || $str == "juillet")
				return ("07");
			else if ($str == "Aout" || $str == "aout")
				return ("08");
			else if ($str == "Septembre" || $str == "septembre")
				return ("09");
			else if ($str == "Octobre" || $str == "octobre")
				return ("10");
			else if ($str == "Novembre"|| $str == "novembre")
				return ("11");
			else if ($str == "Décembre" || $str == "décembre")
				return ("12");
		}
		$re = '/^([Ll]undi|[Mm]ardi|[Mm]ercredi|[Jj]eudi|[Vv]endredi|[Ss]amedi|[Dd]imanche) (0?[1-9]|[12][0-9]|3[01]) ([Jj]anvier|[Ff]évrier|[Mm]ars|[Aa]vril|[Mm]ai|[Jj]uin|[Jj]uillet|[Aa]out|[Ss]eptembre|[Oo]ctobre|[Nn]ovembre|[Dd]écembre) (\d{4}) ([01][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])/m';
		$str = $argv[1];
		if (!preg_match($re, $str))
			echo "Wrong Format\n";
		else
		{
			$time1  = strtotime('1970-01-01 00:00:00');
			preg_match_all($re, $str, $matches);
			$ajusted = $matches[4][0] . '-' . ft_getmonth($matches[3][0]) . '-' . $matches[2][0] . " " . $matches[5][0] . ':' . $matches[6][0] . ':' . $matches[7][0];
			$time2 = strtotime($ajusted);
			echo $time2 - $time1 . "\n";
		}
	}
?>