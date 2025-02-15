<?php

$nom = readline('Entrer votre nom : ');
$prenom = readline('Entrer votre prénom : ');
$age = readline('Entrer votre âge : ');

// Avec les doubles quotes
// echo "Bonjour $prenom $nom \n";
// echo "L'age de $prenom est $age ans \n";

// Avec les simples quotes (ne fonctionne pas)
// echo 'Bonjour $prenom $nom';

// Avec les simples quotes et la concaténation
echo 'Bonjour ' . $prenom . ' ' . $nom . "\n";
echo 'L\'age de ' . $prenom . ' est ' . $age . ' ans';

// Avec les doubles quotes et la concaténation
// echo "Bonjour " . $prenom . " " . $nom;