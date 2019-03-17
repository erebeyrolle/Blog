<?php
//Appel des divers fichiers utiles
require_once('../loaderUsers.php');


// Contrôle lastname non vide
if (isset($_POST['lastname']))
    {
    $lastname=htmlspecialchars($_POST['lastname']);
    }else
    {
        echo('Veuillez entrer votre nom');
    }

// Contrôle firstname non vide
if (isset($_POST['firstname']))
    {
    $firstname=htmlspecialchars($_POST['firstname']);
    }else
    {
        echo('Veuillez entrer votre prénom');
    }

// Contrôle email non vide
if (isset($_POST['email']))
    {
    $email=htmlspecialchars($_POST['email']);
    }else
    {
        echo('Veuillez entrer votre email');
    }

// Contrôle email si bien email
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //echo "Email address '$email' est valide.\n";
} else {
    echo "Email address '$email' est non valide.\n";
}

// Récupération de l'id que l'on passe dans une variable pour modifier la DB
$id = $_POST['id'];
// Connexion à la base de données
$DataBase=connectDB();

// Création de la requête SQL => Mise à jour de la base avec nouvelles données
$request = $DataBase->prepare(" UPDATE Users 
                                SET lastname='$lastname',firstname='$firstname',email='$email'
                                WHERE id='$id'");
$request->execute();

//echo(json_encode($user));

?>