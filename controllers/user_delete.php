<?php
//Appel des divers fichiers utiles
require_once('../loaderUsers.php');

// Connexion à la base de données
$DataBase=connectDB();
$id=$_POST['id'];
// Création de la requête SQL => effacement dans la base de l'objet 'User'
$request = $DataBase->prepare("DELETE FROM Users
                                WHERE id=$id;");
$request->setFetchMode(PDO::FETCH_CLASS,'User');
$request->execute();
?>