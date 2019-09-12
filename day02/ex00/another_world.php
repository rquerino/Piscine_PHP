<?php
	if ($argc >= 2)
    {
        $ar = preg_split('/\s+/', $argv[1]);
        $str = implode(" ", $ar);
        print("$str\n");
    }
?>