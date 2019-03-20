<?php
//echo ("Requête OK");
/**
 * Send as JSON
 */
//header("Content-Type: application/json", true);

// Loading necessaries php files
require_once('../loaderArticles.php');

// Connexion à la base de données
$DataBase=connectDB();
$id=$_POST['id'];

// Création de la requête SQL => récupération dans la base de l'objet 'Article'
$request = $DataBase->prepare("SELECT * FROM Articles 
                                WHERE id<$id
                                ORDER BY id DESC LIMIT 3 ");
$request->setFetchMode(PDO::FETCH_CLASS,'Article');
$request->execute();
$showArticle=$request->fetchAll();

// $request = $DataBase->prepare("SELECT * FROM Articles
//                                 WHERE id=1 ");
// $request->setFetchMode(PDO::FETCH_CLASS,'Article');
// $request->execute();
// $showArticle=$request->fetch();

//var_dump(json_encode($showArticle));

echo (json_encode($showArticle));
?>

