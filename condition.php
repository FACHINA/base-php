<?php

$email = readline('Entrer votre adresse email : ');
$password = readline('Entrer votre mot de passe : ');
$confirm_password = readline('Confirmer votre mot de passe : ');

// if ($password == $confirm_password) {
//     echo "Votre compte a bien été créé";
// } else {
//     echo "Les mots de passe ne correspondent pas";
// }

echo $password == $confirm_password ? "Votre compte a bien été créé" : "Les mots de passe ne correspondent pas";
