<?php
date_default_timezone_set('UTC');
$date=date('Y-d-m H:i:s');


if(isset($_POST['content'])){
    $content = htmlspecialchars($_POST['content']);
    createOneComment($date,$content);
}else{
    echo("La zone de texte commentaire ne peut être vide ...");
}
var_dump($date);
var_dump($content);

function createOneComment($date, $content) {
    $connec = new PDO('mysql:host=localhost; dbname=Blog','root','0000');
    $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$request = $connec->prepare("INSERT INTO Commentaires (dateCreation,content)
    //                                       VALUES ('$date', '$content');");
    $request = $connec->prepare("INSERT INTO Commentaires (content)
                                               VALUES ( '$content');");
/*echo("INSERT INTO Commentaires (dateCreation,content)
VALUES ('$date, '$content');");*/
    $request->execute();
}

function getLastContent($content)  {
    $connec = new PDO('mysql:host=localhost; dbname=Blog','root','0000');
    $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $request = $connec->prepare("SELECT content,dateCreation FROM Commentaires
                                                ORDER BY dateCreation
                                                LIMIT 1;");


    $request->execute();
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

$comments=getLastContent( $content);
foreach ($comments as $key => $value):
        echo $value['content']."\n";
        echo $value['dateCreation']."<br/>";
endforeach;

?>