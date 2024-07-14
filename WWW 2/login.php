<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div id="container_login">
            <?php
            
                if (isset($_POST['disconnect'])) {
                    session_unset();
                }
                $bdd = new PDO('mysql:host=ms8db;dbname=group10;charset=utf8', 'group10', '9Wm3YpoHai');
                if ($bdd == NULL)
                    echo "Problème de connection";
                if (isset($_POST["login"])) {
                    $req = $bdd->query("SELECT * FROM users WHERE Login = '" . $_POST["login"] . "' AND Pass = '" . $_POST["pass"] . "' ");
                    $tuple = $req->fetch();
                    if ($tuple) {
                        $_SESSION['login'] = $tuple["Login"];
                        echo '<meta http-equiv="refresh" content="0;url=home.php">';
                    } else
                        echo "<style> #container_login 
                                        input[type=text], input[type=password] { 
                                        background-color: rgba(255, 0, 0, 0.517);; 
                                        } </style>";
                }
                if (!isset($_SESSION['login'])) {
                
            ?>
            
            <form method="post" action="login.php">
                    <h1>Connexion</h1>
                    <label><b>Nom d'utilisateur</b></label>
                    <input type="text" name="login" required>
                    <label><b>Mot de passe</b></label>
                    <input type="password" name="pass" required>
                    <input type="submit" value="Envoyer">
                
                </form>
            <?php

            } else {
            ?>
                <h1>Veuillez entrer vos identifiants</h1>
                <form method="post" action="login.php">
                    <p>
                        <input type="text" name="login" required>
                        <input type="password" name="pass" required>
                        <input type="submit" value="Envoyer">
                    </p>
                </form>
            <?php
            }
            ?>
        </div>
    </body>
</html>