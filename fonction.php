<?php

$longueur = readline('Entrer la longueur du rectangle : ');
$largeur = readline('Entrer la largeur du rectangle : ');

function calculAire($longueur, $largeur) {
    return $longueur * $largeur;
}

echo 'L\'aire du rectangle est de ' . calculAire($longueur, $largeur) . 'm2' . "\n";
