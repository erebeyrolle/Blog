<?php
//Appel des divers fichiers utiles
require_once('../loaderArticles.php');

// Connexion à la base de données
$DataBase=connectDB();
$id=$_POST['id'];
// Création de la requête SQL => effacement dans la base de l'objet 'User'
$request = $DataBase->prepare("DELETE FROM Articles
                                WHERE id=$id;");
$request->setFetchMode(PDO::FETCH_CLASS,'Article');
$request->execute();
?>