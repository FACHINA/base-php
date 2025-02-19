<?php

$age = readline("Entrez votre age : ");

// Sans le ternaire
$status = "majeur";
if($status < 18) {
    $status = "mineur";
}
echo "Vous êtes $status";

// Avec le ternaire
echo 'Vous êtes ' . $age < 18 ? 'mineur' : 'majeur'; 