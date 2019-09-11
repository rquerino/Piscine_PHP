<?php
// i starts with 1 to skip the program name
$i = 1;
while ($argv[$i] != NULL)
{
    echo "$argv[$i]\n";
    $i++;
}
?>