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
$personne = new Personne(); // object
$nombre_de_vehicules = 6; // integer
$estActif = true; // boolean
$nom = "John Doe"; // string
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

    public string $nom;
    public string $prenom;
    public Date $dateNaissance;
    private string $adresse;
    private string $password

    public function __construct(string $nom, string $prenom, Date $dateNaissance, string $adresse) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->dateNaissance = $dateNaissance;
        $this->adresse = $adresse;
    }

    public function getAdresse(): string {
        return $this->adresse;
    }

    public function getPassword(): string {
        return $this->password;
    }

}

$user = new Utilisateur("Alice", "Doe", new Date("1990-01-01"), "123 Cotonou");

echo $user->nom; // Alice
echo $user->adresse; // Ne fonctionne pas car la propriété est privée (créer une méthode getAdresse() par exemple pour récupérer la valeur)
echo $user->getAdresse(); // Fonctionne car la méthode est publique
echo $user->getPassword(); // Fonctionne pas car la méthode est privée
```

- Une **propriété** est une variable définie dans une classe, tandis qu'une **méthode** est une fonction appartenant à cette classe.

### 6. Opérations Simples
- Opérations mathématiques de base : (`+`, `-`, `*`, `/`, `%`.)

```php
$a = 10;
$b = 2;
echo $a + $b; // 12
echo $a - $b; // 8
echo $a * $b; // 20
echo $a / $b; // 5
```

- Comparaison de valeurs (`==`, `===`, `!=`, `>`, `<`, `>=`, `<=`.):

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

Le modèle MVC (Model-View-Controller) est une architecture qui sépare une application en trois composants principaux : Model, View, et Controller. Voici un exemple pour la récupération d'un article dans le cadre de Laravel :

### Model :

Le modèle représente les données et la logique métier. Dans le cas d'un article, le modèle Article interagira avec la base de données pour récupérer l'article demandé.
Exemple : Article::find($id) permet de récupérer un article avec l'ID spécifié.

### Controller :

Le contrôleur gère la logique de l'application. Il reçoit la requête de l'utilisateur, interagit avec le modèle, puis renvoie une vue.
Exemple : Le contrôleur ArticleController pourrait avoir une méthode show($id) qui appelle le modèle pour récupérer l'article et le passe à la vue.

### View :

La vue est responsable de l'affichage des données. Elle prend les données du contrôleur et les présente à l'utilisateur dans un format lisible, comme un fichier Blade dans Laravel.
Exemple : La vue article.blade.php affichera le contenu de l'article récupéré.

---

## II. DÉBUT AVEC LARAVEL

### 1. Installation et Configuration
Objectif : Installer Laravel et comprendre sa structure de base pour démarrer un projet.

#### Installation avec la CLI Laravel
Laravel propose une méthode d'installation rapide via la CLI officielle. Assurez-vous d'avoir Composer installé sur votre machine.

```sh
composer global require laravel/installer
```
#### Installation du projet

**Important :** Créez votre projet dans un répertoire où vous avez les permissions appropriés.

Pour les utilisateurs `Windows` vous pourriez créer vos projets dans le repèrtoire `C:\dev\projets_lavavel`.
```
laravel new mon_projet
```
Cette commande créer le projet laravel dans le dossier `mon_projet`

#### Configurer votre espace de travail (VSCode)
Ouvrez votre projet dans VSCode et sauvegardez le en tant qu'espace de travail dans un dossier prévus à cet effet. Exemple: `C:\Utilisateur\<VotreNom>\Documents\vscode\espace_de_travail\laravel\`

#### Installer les extensions (VSCode)
Installer les extensions suivantes
- `PHP debug (Xdebug)`  
- `PHP Intelephense (Ben Mewburn)` 
- `PHP Namespace Resolver`
- `Laravel Extension Pack (Winnie Lin)`

#### Lancer l'application

```
cd mon_projet
php artisan serve
```

Cela génère une application Laravel prête à l'emploi. Vérifiez son bon fonctionnement en accédant à `http://127.0.0.1:8000`.

### 2. Création des Routes (Routing)
Objectif : Définir les routes permettant de naviguer entre les pages.

Dans `routes/web.php` :
#### Route `GET`
```php

Route::get('/', function () {
    return view('welcome');
});
```
#### Route `POST` avec nommage
Nommer une route permet de l'appeler plus facilement dans le code.
```php
Route::post('/inscription', function (Request $request) {
    $nom = $request->input('nom');
    $prenom = $request->input('prenom');
    $dateNaissance = $request->input('date_naissance');
    
    // Enregistrement dans la base de données
    // ...

    // Redirection vers la page d'accueil de l'administrateur sans le nom de la route
    return redirect('/admin/home');
    // Redirection vers la page d'accueil de l'administrateur avec le nom de la route
    return redirect()->route('admin.home');
})->name('inscription');
```
#### Route `PUT` (mise à jour complète)
```php
Route::put('/profil', function (Request $request) {
    // Modification de la ressource
    // ...
});
```
#### Route `PATCH` (mise à jour partielle)
```php
Route::patch('/profil', function (Request $request) {
    // Modification partielle de la ressource
    // ...
});
```
#### Route `DELETE`
```php
Route::delete('/suppression', function (Request $request) {
    // Suppression de la ressource
    // ...
});
```
#### Route `GET` avec paramètre
```php
Route::get('/articles/{id}', function ($id) {
    return view('article', ['id' => $id]);
});
```
#### Route associée à un contrôleur
```php
Route::get('/articles', [ArticleController::class, 'liste']);
Route::get('/articles/{id}', [ArticleController::class, 'show']);
```
Dans la classe ArticleController la méthode show($id) sera appelée lorsque l'utilisateur accède à l'URL `/articles/1` par exemple.
```php
class ArticleController extends Controller {
    public function show($id) {
        return view('article', ['id' => $id]);
    }
    public function liste() {
        $articles = Article::all();
        return view('article_list', ['articles' => $articles]);
        // Alternativement vous pouvez utiliser la méthode compact
        return view('article_list', compact('articles'));
    }
}
```

### 3. Création des Contrôleurs
**Objectif :** Apprendre à créer des contrôleurs via Artisan.

Les controllers sont des classes qui gèrent les interactions entre les modèles et les vues. Ils contiennent des méthodes qui sont appelées lorsque une requête est envoyée à l'application.
En bref les controlleur continnent la logique métiers de l'application.

L'utiliation des controlleurs permet de séparer la logique métier de l'application et de rendre le code plus lisible et modulaire.
```sh
php artisan make:controller ClientController
```


### 4. Création des Vues avec Blade
Objectif : Apprendre à afficher dynamiquement les informations et des projets via Blade.

Blade est le moteur de templates de Laravel. Il permet de séparer la logique et la présentation en créant des vues dynamiques. Pour utiliser Blade, crée un fichier `.blade.php` dans le dossier `resources/views`.

#### Accéder aux variables dans une vue

```php
class ClientController extends Controller {
    public function index() {
        $clients = Client::all();
        return view('clients', compact('clients'));
    }
    public function show($id) {
        $client = Client::find($id);
        $age_client = $client->calculerAge();
        return view('client.show', compact('client', 'age_client'));
    }
}
```
#### Exemple de fichier Blade pour la fonctionnalité d'affichage d'un client :
```php
<--- resources/views/client.show.blade.php --->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Client</title>
</head>
<body>
    <h1>Client : {{ $client->nom }}</h1>
    <p>Age : {{ $age_client }}</p>
</body>
</html>
```
#### Exemple de fichier Blade pour afficher une liste :
```php
<!-- resources/views/clients.blade.php -->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Clients</title>
</head>
<body>
    <h1>Liste des Clients</h1>
    <ul>
        @foreach ($clients as $client)
            <li>{{ $client->nom }} - {{ $client->email }}</li>
        @endforeach
    </ul>
</body>
</html>
```

---

### 5. Création des Modèles (Models) et Gestion de la Base de Données
**Objectif :** Créer des modèles pour représenter les tables, et interagir avec la base de données.

Les modèles Laravel permettent de manipuler les données d'une table de manière intuitive. Chaque modèle est lié à une table spécifique dans la base de données.

#### Exemple de création d'un modèle `Client` :
```sh
php artisan make:model Client
```

Ce modèle sera lié à une table `clients` dans la base de données. Pour effectuer une requête avec Eloquent (l'ORM de Laravel), vous pouvez simplement faire :

```php
$clients = Client::all(); // Récupérer tous les clients
$client1 = Client::find(1); // Récupérer un client avec l'ID 1
$client_aballo = Client::where('nom', 'Aballo')->first(); // Récupérer le premier client ayant le nom Aballo
```

#### Création de la migration pour les tables `clients` et `projects` :
Les migrations permettent de créer des tables et de gérer leur structure de manière versionnée.

```sh
php artisan make:migration create_clients_table
php artisan make:migration create_projects_table
```

Ensuite, définis la structure des tables dans les fichiers de migration :

```php
// database/migrations/xxxx_xx_xx_create_clients_table.php
public function up()
{
    Schema::create('clients', function (Blueprint $table) {
        $table->id();
        $table->string('nom');
        $table->string('email')->unique();
        $table->timestamps();
    });
}
```

Fais de même pour la table `projects` :
```php
// database/migrations/xxxx_xx_xx_create_projects_table.php
public function up()
{
    Schema::create('projects', function (Blueprint $table) {
        $table->id();
        $table->string('nom');
        $table->text('description');
        $table->foreignId('client_id')->constrained(); // Relation avec clients
        $table->timestamps();
    });
}
```

Après avoir créé les migrations, exécute-les pour créer les tables :
```sh
php artisan migrate
```

---

### 6. Validation des Données et Gestion des Formulaires
Objectif : Apprendre à valider les données avant de les enregistrer dans la base de données.

Laravel propose un système de validation très puissant. Avant d’enregistrer les données dans la base, tu peux utiliser les règles de validation pour t'assurer que les données soumises respectent les critères requis.

#### Exemple de validation de formulaire pour un client :

```php
public function store(Request $request)
{
    $validated = $request->validate([
        'nom' => 'required|max:255',
        'email' => 'required|email|unique:clients,email',
    ]);

    // Créer un nouveau client après validation
    Client::create($validated);

    return redirect()->route('clients.index');
}
```

#### Création d'un formulaire pour ajouter un client :

```php
<!-- resources/views/create_client.blade.php -->
<form action="{{ route('clients.store') }}" method="POST">
    @csrf
    <label for="nom">Nom :</label>
    <input type="text" name="nom" required>

    <label for="email">Email :</label>
    <input type="email" name="email" required>

    <button type="submit">Ajouter Client</button>
</form>
```

La directive `@csrf` protège contre les attaques CSRF (Cross-Site Request Forgery), et la méthode `POST` est utilisée pour envoyer les données de formulaire.

---


Ce guide vous permettra d'acquérir une maîtrise solide du framework Laravel. Expérimentez et approfondissez chaque concept pour bâtir des applications robustes et évolutives !

