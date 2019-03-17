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

// Connexion à la base de données
$DataBase=connectDB();

// Création de la requête SQL => écriture dans la base
$request = $DataBase->prepare("INSERT INTO Users(lastname,firstname,email)
                                VALUES('$lastname','$firstname','$email');");
$request->execute();

//Instanciation nouvel Utilisateur
$user=new User();
$user->id=$DataBase->lastInsertId();
$user->lastname=$lastname;
$user->firstname=$firstname;
$user->email=$email;

// Variable pour récupérer le dernier élément insérer dans la DB
$id=$DataBase->lastInsertId();

echo(json_encode($user));

?>