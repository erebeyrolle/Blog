<?php
//echo ("Requête OK");
/**
 * Send as JSON
 */
header("Content-Type: application/json", true);

// Loading necessaries php files
require_once('../loaderArticles.php');

// Connexion à la base de données
$DataBase=connectDB();
//$id=$_POST['id'];

// Création de la requête SQL => récupération dans la base de l'objet 'Article'
$request = $DataBase->prepare("SELECT * FROM Articles
                                ORDER BY id DESC LIMIT 3 ");
$request->setFetchMode(PDO::FETCH_CLASS,'Article');
$request->execute();
$showArticle=$request->fetchAll();

//var_dump($showArticle);

//echo (json_encode($showArticle));
?>
{
    "id" : "0",
    "title" : "1st titre",
    "content" : "1st => This is a wider card."

    "id" : "1",
    "title" : "2nd titre",
    "content" : "2nd => This is a wider card."

    "id" : "2",
    "title" : "3rd titre",
    "content" : "3rd => This is a wider card."
}