<?php

/*
 * T.CHENIER - IMIE 2018
 * Compare two string and 
 * return true or false if thoses matches.
 */
function compareTwoString(string $s, string $r): bool {
    $i = 0;
    $j = 0;
    $k = 0;

    while ($i < strlen($s)) {
        while ($j < strlen($r)) {
            if ($s[$i + $j] == $r[$j]) {
                $k++;
            }
            $j++;
        }
        $i++;
    }

    if ($k == strlen($r))
        return (true);
    return (false);
    
}
$s = "salut test de test";
$r = "salut t";

if (compareTwoString($s, $r))
{
    echo 'ok';
} else {
    echo 'ko';
}