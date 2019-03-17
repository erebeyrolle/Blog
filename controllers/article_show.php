<?php
//Appel des divers fichiers utiles
require_once('../loaderArticles.php');

// Connexion à la base de données
$DataBase=connectDB();
$id=$_POST['id'];
// Création de la requête SQL => récupération dans la base de l'objet 'Article'
$request = $DataBase->prepare("SELECT * FROM Articles
                                WHERE id=$id");
$request->setFetchMode(PDO::FETCH_CLASS,'Article');
$request->execute();
$showArticle=$request->fetch();

echo(json_encode($showArticle));
?>