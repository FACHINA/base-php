# Guide Complet Laravel

## I. PRÉREQUIS

Avant d'aborder Laravel, il est impératif de maîtriser certains fondamentaux du développement en PHP. Voici une liste des concepts clés à bien comprendre :

### 1. Notions de Variables
- Une variable en PHP est un conteneur permettant de stocker des informations. Elle se déclare avec le symbole `$` suivi d'un nom valide.

```php
$nom = "John Doe";
$age = 25;
$estActif = true;
```

- PHP propose plusieurs types de variables : `string`, `integer`, `float`, `boolean`, `array`, `object`, etc.

```php
$prix = 99.99; // float
$liste = ["pomme", "banane", "cerise"]; // array
```

- Différence entre post-incrémentation (`$x++`) et pré-incrémentation (`++$x`) :
  La différence est que la première renvoie la valeur avant l'incrémentation, la seconde après.

```php
$x = 5;
echo $x++; // Affiche 5, puis $x devient 6
echo ++$x; // Incrémente d'abord à 7, puis affiche 7
```

### 2. Instructions Conditionnelles
- Les structures `if`, `else`, `elseif` permettent d'exécuter du code selon certaines conditions.

```php
$age = 20;
if ($age >= 18) {
    echo "Majeur";
} else {
    echo "Mineur";
}
```

- L'opérateur ternaire :
  L'opérateur ternaire (condition ? valeur_si_vrai : valeur_si_faux) est une alternative compacte aux instructions if

```php
$status = ($age >= 18) ? "Majeur" : "Mineur";
echo $status;
```

### 3. Boucles
- `for`, `foreach`, et `while` permettent d'itérer sur des ensembles de données.

```php
for ($i = 0; $i < 5; $i++) {
    echo "Itération $i";
}
```

```php
$fruits = ["Pomme", "Banane", "Cerise"];
foreach ($fruits as $fruit) {
    echo $fruit;
}
```

- `switch case` est préférable à une série de `if` lorsque plusieurs conditions doivent être évaluées sur une même variable.

```php
$jour = "lundi";
switch ($jour) {
    case "lundi":
        echo "Début de semaine";
        break;
    case "vendredi":
        echo "Fin de semaine";
        break;
    default:
        echo "Jour normal";
}
```

### 4. Chaînes de Caractères
- Différence entre `""` et `''` : les doubles guillemets interprètent les variables ("Hello $name"), tandis que les simples guillemets ne le font pas ('Hello $name').


```php
$nom = "John";
echo "Bonjour $nom"; // Interpolation possible
echo 'Bonjour $nom'; // Affiche littéralement "Bonjour $nom"
```

- La concaténation :
La concaténation se fait via l'opérateur `.` ($str = "Bonjour " . $name;)
```php
$prenom = "John";
$nom = "Doe";
echo $prenom . " " . $nom; // "John Doe"
```

### 5. Notion d'Objet
- Un objet est une instance d'une classe permettant d'organiser le code de manière modulaire et réutilisable.

```php
class Utilisateur {
    public $nom;
    public $prenom;
    public function __construct($nom) {
        $this->nom = $nom;
    }
}
$user = new Utilisateur("Alice");
echo $user->nom; // Alice
```

- Une **propriété** est une variable définie dans une classe, tandis qu'une **méthode** est une fonction appartenant à cette classe.

### 6. Opérations Simples
- Opérations mathématiques de base : (+, -, *, /, %.)

```php
$a = 10;
$b = 2;
echo $a + $b; // 12
echo $a - $b; // 8
echo $a * $b; // 20
echo $a / $b; // 5
```

- Comparaison de valeurs (==, ===, !=, >, <, >=, <=.):

```php
$x = 5;
$y = "5";
var_dump($x == $y);  // true (égalité en valeur)
var_dump($x === $y); // false (égalité en valeur et type)
```

### 7. Fonctions
- Déclaration et appel de fonction :

```php
function direBonjour($nom) {
    return "Bonjour, " . $nom;
}
echo direBonjour("Alice");
```

- Exemples de fonctions intégrées :

```php
echo strlen("Hello"); // 5
echo strtoupper("hello"); // HELLO
```

### 8. Rédaction d'Algorithmes
- Structure d'un algorithme simple :

```php
function somme($a, $b) {
    return $a + $b;
}
echo somme(4, 5); // 9
```

### 9. Bases SQL
- Création d'une base de données et d'une table :

```sql
CREATE DATABASE ma_base;
USE ma_base;
CREATE TABLE utilisateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100),
    email VARCHAR(100) UNIQUE
);
```

- Insertion et récupération de données :

```sql
INSERT INTO utilisateurs (nom, email) VALUES ('Alice', 'alice@example.com');
SELECT * FROM utilisateurs;
```

### 10. Architecture MVC
- **Modèle (M)** : Gère les interactions avec la base de données.
- **Vue (V)** : Gère l'affichage des informations à l'utilisateur.
- **Contrôleur (C)** : Fait le lien entre modèle et vue.

---

## II. DÉBUT AVEC LARAVEL

### 1. Installation et Configuration
Objectif : Installer Laravel et comprendre sa structure de base pour démarrer un projet.

#### Installation avec la CLI Laravel
Laravel propose une méthode d'installation rapide via la CLI officielle. Assurez-vous d'avoir Composer installé sur votre machine.

```sh
composer global require laravel/installer
laravel new mon_projet
cd mon_projet
php artisan serve
```

Cela génère une application Laravel prête à l'emploi. Vérifiez son bon fonctionnement en accédant à `http://127.0.0.1:8000`.

### 2. Création des Routes (Routing)
Objectif : Définir les routes permettant de naviguer entre les pages.

Dans `routes/web.php` :
```php
Route::get('/', function () {
    return view('welcome');
});
```

### 3. Création des Contrôleurs
```sh
php artisan make:controller ClientController
```

---

Ce guide vous permettra d'acquérir une maîtrise solide du framework Laravel. Expérimentez et approfondissez chaque concept pour bâtir des applications robustes et évolutives !

