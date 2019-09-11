<?php
    function ft_is_sort($tab)
    {
        $ar = $tab;
        sort($ar);
        return ($tab == $ar);
    }
?>