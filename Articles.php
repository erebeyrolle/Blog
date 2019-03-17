<?php   
    require_once('loaderArticles.php');       
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mon Blog - Mes Articles</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="styles/Blog.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
            integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
            crossorigin="anonymous">

</head>
<body>
    
        <table>
            <tr><td><br/></td></tr>
            <tr>
                <td><label for="title">TITRE</label> : </td>
                <td><input name="title" id="title" /></td>
            </tr>
            <tr>
                <td><label for="content">ARTICLE</label> : </td>
                <td>
                    <textarea name="content" id="content" rows="10" cols="20">
                    </textarea>
                </td>
            </tr>
            <tr><td><br/></td></tr>
            <tr>
                <td></td>
                <td ><input onclick="addArticle()" type="button" value="Ajouter" /></td>
            
                <td></td>
                <td ><button class="btn"><i class="fas fa-thumbs-up"></i><span id="UpLike"></span>
                
                </button></td>
                <td></td>
                <td ><button class="btn" id="DnLike"><i class="fas fa-thumbs-down"></i></button></td>
            </tr>
        </table>
    
    <section id=parentNode border="">
                <?php   // Appel de tous les 'Articles' de la DB
                    $DataBase=ConnectDB();       
                    $request = $DataBase->prepare("SELECT * FROM Articles;");
                    $request->setFetchMode(PDO::FETCH_CLASS,'Article');
                    $request->execute();
                    $articles=$request->fetchAll();
                    // Affichage de tous les 'Articles' de la base
                    foreach ($articles as $article):
                        echo "<p id='$article->id'>";
                        echo $article->title;
                        echo ' ';
                        echo $article->content;
                        echo " <input onclick='showArticle($article->id)' type='button' value='Voir'>";
                        echo " <input onclick='updateArticle($article->id)' type='button' value='Modifier'>";
                        echo " <input onclick='deleteArticle($article->id)' type='button' value='Effacer'>";
                        echo "</p>";
                    endforeach;
                ?>
    </section>
    <script src="scripts/ArticlesAjax.js"></script> 
</body>
</html>