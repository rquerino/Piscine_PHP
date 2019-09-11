<?php
    if ($argc > 1)
    {
        $ar = preg_split('/\s+/', $argv[1]);
        $a2 = $ar;
        array_shift($a2);
        foreach ($a2 as $vv)
            echo "$vv ";
        echo "$ar[0]\n";
    }
?>