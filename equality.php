<?php

$a = '1';
$b = 1;

if ($a == $b) {
    echo '$a est égal à $b';
} else {
    echo '$a n\'est pas égal à $b';
}

echo "\n";

// Compare les types des variables
if ($a === $b) {
    echo '$a est strictement égal à $b';
} else {
    echo '$a n\'est pas strictement égal à $b';
}