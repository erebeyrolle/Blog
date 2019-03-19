<?php
//echo ("Requête OK");

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

echo(json_encode($showArticle));
?>
{
    "id" : "0",
    "title" : "Mon titre",
    "content" : "This is a wider card."
}