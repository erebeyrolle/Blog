<?php
//Appel des divers fichiers utiles
require_once('../loaderArticles.php');

// Contrôle si la variable est bien un nombre et non vide
// if(is_numeric($_POST['UpLike']))
// {
//     $UpLike=$_POST['UpLike'];
    
// }

// Connexion à la base de données
$DataBase=connectDB();
$id=$_POST['id'];
// Création de la requête SQL écriture "Likes" positifs
    $request = $DataBase->prepare(" UPDATE Articles
                                    SET  UpLike=UpLike+1
                                    WHERE id=$id;");
    $request->execute();

?>