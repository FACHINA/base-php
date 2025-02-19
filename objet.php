<?php

class Person {
    // Propriétés

    // Public accessible depuis d'autre instance
    public string $nom;
    public string $prenom;
    // Privée accessible uniquement depuis la classe actuelle;
    private Date $date_naissance;
    public string $sexe;

    public function age() {
        return date_diff((new Date("now")), $this->date_naissance)->y;
    }
}

class Voiture {

    public Person $proprietaire;
    public string $marque;
    public string $nom;
    public int $annee_fabrication;

    public function attribuerPropriétaire()
    {
        $proprietaire = new Person();
        $proprietaire->nom = 'TOTO';
        $proprietaire->prenom = 'Doe';
        $proprietaire->date_naissance = '22024-02-05';
        $this->proprietaire = $proprietaire;
    }
}