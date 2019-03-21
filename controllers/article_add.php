<?php
//Appel des divers fichiers utiles
require_once('../loaderArticles.php');

// Contrôle Article non vide
// if(false){
    if(!empty($_POST)){

        extract($_POST);

        $title=htmlspecialchars($title);
        $content=htmlspecialchars($content);

        if($title!="" AND $content!=""){
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

                //echo(json_encode($article));

                $responseOK = new ResponseSuccess(true,"Article OK",$article);
                echo(json_encode($responseOK));
        }  
        else   {
                $responseNOK = new ResponseFail(false,"Article NOK");
                echo(json_encode($responseNOK));
                }
    }
    

// if (isset($_POST['title']))
//     {
//     $title=htmlspecialchars($_POST['title']);
//     }else
//     {
//         echo('Veuillez entrer un titre');
//     }

// // Contrôle article non vide
// if (isset($_POST['content']))
//     {
//     $content=htmlspecialchars($_POST['content']);
//     }else
//     {
//         echo('Veuillez entrer du texte');
//     }

// $responseOK = new ResponseSuccess(true,"Article OK",null);
// echo(json_encode($responseOK));

// $responseNOK = new ResponseFail(false,"Article NOK");
// echo(json_encode($responseNOK));

// Connexion à la base de données
// $DataBase=connectDB();

// // Création de la requête SQL => écriture dans la base
// $request = $DataBase->prepare("INSERT INTO Articles(title,content)
//                                 VALUES('$title','$content');");
// $request->execute();

// //Instanciation nouvel Article
// $article=new Article();
// $article->id=$DataBase->lastInsertId();
// $article->title=$title;
// $article->content=$content;
// $article->UpLike=0;
// $article->DnLike=0;

// // Variable pour récupérer le dernier élément insérer dans la DB
// $id=$DataBase->lastInsertId();

// echo(json_encode($article));

?>