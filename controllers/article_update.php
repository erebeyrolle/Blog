<?php
//Appel des divers fichiers utiles
require_once('../loaderArticles.php');


// Contrôle title non vide
if (isset($_POST['title']))
    {
    $title=htmlspecialchars($_POST['title']);
    }else
    {
        echo('Veuillez entrer un titre');
    }

// Contrôle article non vide
if (isset($_POST['content']))
    {
    $content=htmlspecialchars($_POST['content']);
    }else
    {
        echo('Veuillez entrer du texte');
    }

// Récupération de l'id que l'on passe dans une variable pour modifier la DB
$id = $_POST['id'];
// Connexion à la base de données
$DataBase=connectDB();

// Création de la requête SQL => Mise à jour de la base avec nouvelles données
$request = $DataBase->prepare(" UPDATE Articles 
                                SET title='$title',content='$content'
                                WHERE id='$id'");
$request->execute();

//echo(json_encode($user));

?>