<?php

/*
 * T.CHENIER - 2018
 * print an empty Triangle
 * Algo. PhP exercices
 */

function triangleVide(int $nb) {
    for ($i = 1; $i <= $nb; $i++) {
        for ($j = 1; $j <= $i; $j++) {
            if ($j == 1 || $j == $i || $i == $nb)
                echo "*";
            else 
                echo "0";
        }
        echo PHP_EOL;
    }
}
