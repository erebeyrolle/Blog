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



// Connexion à la base de données
$DataBase=connectDB();

// Création de la requête SQL => écriture dans la base
$request = $DataBase->prepare("INSERT INTO Articles(title,content)
                                VALUES('$title','$content');");
$request->execute();

//Instanciation nouvel Article
$article=new Article();
$article->id=$DataBase->lastInsertId();
$article->title=$title;
$article->content=$content;
$article->UpLike=0;
$article->DnLike=0;

// Variable pour récupérer le dernier élément insérer dans la DB
$id=$DataBase->lastInsertId();

echo(json_encode($article));

?>