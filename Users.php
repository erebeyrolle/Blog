<?php   
    require_once('loaderUsers.php');       
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mon Blog - New User</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="styles/Blog.css" />
    
</head>
<body>
    <main>
        
        <section>
            <label for="lastname">Name</label>
            <input name="lastname" id="lastname" placeholder="Nom">
            <label for="firstname">Prénom</label>
            <input name="firstname" id="firstname" placeholder="Prénom">
            <label for="email">Email</label>
            <input name="email" id="email" placeholder="Email">                    
                <br/><br/>         
            <input onclick="createUser()" type="button" value="Valider" >
                <br/><br/>                    

        </section>
        <span>Les utilisateurs habituels sont :</span>
        <br/>
        <section id=parentNode>
        <br/>
                <?php   // Appel de tous les 'Users' de la DB
                    $DataBase=ConnectDB();       
                    $request = $DataBase->prepare("SELECT * FROM Users;");
                    $request->setFetchMode(PDO::FETCH_CLASS,'User');
                    $request->execute();
                    $users=$request->fetchAll();
                    // Affichage de tous les 'Users' de la base
                    foreach ($users as $user):
                        echo "<p id='$user->id'>";
                        echo $user->lastname;
                        echo ' ';
                        echo $user->firstname;
                        echo " <input onclick='showUser($user->id)' type='button' value='Voir'>";
                        echo " <input onclick='updateUser($user->id)' type='button' value='Modifier'>";
                        echo " <input onclick='deleteUser($user->id)' type='button' value='Effacer'>";
                        echo "</p>";
                    endforeach;
                ?>

        </section>
    </main>
    <script src="scripts/UsersAjax.js"></script>
</body>
</html>