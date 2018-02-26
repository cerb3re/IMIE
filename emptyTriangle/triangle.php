<?php

/*
 * T.CHENIER - 2018
 * print an empty Triangle
 * Algo. PhP exercices
 */

function triangleVide(int $nb) {
    for ($i = 0; $i <= $nb; $i++) {
        for ($j = 0; $j <= $i; $j++) {
            if ($j == 0 || $j == $i || $i == $nb)
                echo "*";
            else 
                echo "0";
        }
        echo PHP_EOL;
    }
}