<?php
session_start();
?>
<!--Dans ce code, on met a jour des données des employé dans la base de données-->
<!DOCTYPE html>
<html>

    
    <?php
    $bdd = new PDO('mysql:host=ms8db;dbname=group10;charset=utf8', 'group10', '9Wm3YpoHai');
    ?>
    <head>
        <title>Question 1</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body id="page_generale" >
    <header>
            <h1>Base de donnée (INFO0009-A-B)</h1>
            <h2>Projet 2021-2022 – Deuxième Partie</h2>
            
        </header>
        <div id="contenu_de_la_page">
            <nav id="barre_de_navigation">
            <ul>
                <li><a href="./home.php">HOME</a></li>
            </ul>
           
           
            <h1>Réponses aux questions</h1>
            <ul>
                <li><a href="./Question_1.php">Question 1</a></li>
                <li><a href="./Question_2.php">Question 2</a></li>
                <li><a href="./Question_3.php">Question 3</a></li>
                <li><a href="./Question_4.php">Question 4</a></li>
                <li><a href="./Question_5.php">Question 5</a></li>
                <li><a href="./Question_6.php">Question 6</a></li>
                <li><a href="./Question_7.php">Question 7</a></li>
                </ul>

                <form method="post" action="login.php">
                <p>
                    <input type="hidden" name="disconnect" value="yes">
                    <input type="submit" value="Déconnection">
                </p>
            </form>
            </nav>
            
    
            <section>
<?php
    $_SESSION['h'] = $_POST['heure'];/*Ajout/soustraction d'un nombre d'heure */
    $_SESSION['oui'] = $_POST['OUI'];/*Si on ajoute l'employé */
    $_SESSION['non'] = $_POST['NON'];/*Si on n'ajoute pas l'employé */


    if(isset($_SESSION['h']))/*Mise à jour du nombre d'heures de l'employé choisi */
    {
        echo "<p> Le nombre d'heures ajoutées est ".$_SESSION['h']." pour l'employé ".$_SESSION['employe']." dans le cadre du projet ".$_SESSION['projet']." a bien été effectué.</p>";
        $upd1 = "UPDATE TACHE SET NOMBRE_HEURES = $_SESSION[h] + NOMBRE_HEURES WHERE EMPLOYE =$_SESSION[employe] AND PROJET =$_SESSION[projet]";
        $upd = $bdd->prepare($upd1);
        $upd -> execute();
        $task_req = $bdd->query("SELECT * FROM TACHE WHERE EMPLOYE ='".$_SESSION['no']."' AND PROJET = '". $_SESSION['projet']."'");
        $task = $task_req->fetch();
        echo "<p>L'employé passe à ". $task['NOMBRE_HEURES'].".</p>";
    }
    elseif(isset($_SESSION['oui']))/*Ajout d'un employé sans tâche */
    {
        $get_info = $bdd->query("SELECT * FROM EMPLOYE WHERE NOM = '". $_SESSION['task']."'");
        $info = $get_info->fetch();
        $EMPLOYE = $info['NO'];
        $PROJET = $_SESSION['projet'];
        $request1 = "INSERT INTO `TACHE` (`EMPLOYE`,`PROJET`,`NOMBRE_HEURES`) VALUES (:EMPLOYE, :PROJET, :NOMBRE_HEURES)";
        $request = $bdd->prepare($request);
        $request -> execute([':EMPLOYE' => $EMPLOYE, ':PROJET' => $PROJET,':NOMBRE_HEURES' => null]);
        echo "<p>Vous avez bien ajouté l'employé ".$_SESSION['task']." au projet ".$_SESSION['projet'].".</p>";
    }
    elseif(isset($_SESSION['non']))/*On ne veut pas ajouter l'employé */
    {
        echo "<p>Votre commande à bien été prise en compte!</p>";
    }
    ?>

    </section>
    </div>
        </body>
    
    
    </html>