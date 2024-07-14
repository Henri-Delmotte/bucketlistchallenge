<?php
session_start();
?>
<!DOCTYPE html>
<html>  
    <?php
  $bdd = new PDO('mysql:host=ms8db;dbname=group10;charset=utf8', 'group10', '9Wm3YpoHai');
    ?>
    <head>
        <title>Question 4</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body id="page_generale" >
        <header>
            <a href="./home.php">HOME</a>
            <div>
                <h1>HOME : Base de donnée (INFO0009-A-B)</h1>
                <h2>Projet 2021-2022 – Deuxième Partie</h2>
            </div>
            <form method="post" action="login.php">
                <a>
                    <input type="hidden" name="disconnect" value="yes">
                    <input type="submit" value="Déconnection">
                </a>
            </form>  
            
        </header>
        <div id="contenu_de_la_page">
            <nav id="barre_de_navigation">
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
            </nav>

            <section>
              <h1><strong>Création de tâches et imputation des heures</strong></h1>
              <p>Choissez le projet que vous voulez analyser.</p>
              <?php
                $req = $bdd->query('SELECT NOM FROM PROJET');
                echo "Voici la liste des projets disponibles:";
              ?>
              <form method="post" action="Project.php">
                <select name="list">  
                  <?php
                  while($name = $req->fetch())
                  {
                    echo "<option value = '".$name['NOM']."'>".$name['NOM']."</option>";
                  }
                  ?>
                </select>
                <input type="submit" value="Soumettre">
              </form>
              <?php
                $bdd = null;
              ?>
            </section>
        </div>
    </body>


</html>