<?php
session_start();
?>

<!--Cette fonction regroupe la mise en page d'un projet choisi-->

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
    echo "<h2> Vous êtes dans le projet " . $_SESSION['projet'] . "</h2>";

    $_SESSION['employe'] = $_POST['list2'];/*On stock l'employé choisi dans Project.php à qui on veut modifier le nb d'heures*/
    $_SESSION['task'] = $_POST['empl'];/*On stock l'employé choisi dans Project.php qu'on veut ajouter au projet*/
    $_SESSION['ye'] = $_POST['yes'];/*Si on veut finir le projet*/
    $_SESSION['exp'] = $_POST['expert'];/*Si on veut l'avis d'un expert */

    if(isset($_SESSION['employe']))/*Ajout/soustraction du nombre d'heure d'un employé */
    {
        $request = $bdd->query("SELECT * FROM EMPLOYE WHERE NOM ='".$_SESSION['employe'] . "'");
        $task_need = $request->fetch();
        $_SESSION['no'] = $task_need['NO'];
        $task_req = $bdd->query("SELECT * FROM TACHE WHERE EMPLOYE ='".$task_need['NO']."' AND PROJET = '".$_SESSION['projet']."'");
        $task = $task_req->fetch();
        echo "<p> Voici les détails de l'employé ". $_SESSION['employe'] ." dans le sein du projet ". $_SESSION['projet'].":</p>"; 
        echo "<table>";
        echo "<tr><th>EMPLOYE</th><th>PROJET</th><th>NOMBRE_HEURES</th></tr>\n";
        echo "<tr><td>". $_SESSION['employe']."</td><td>".$_SESSION['projet']."</td><td>".$task['NOMBRE_HEURES']."</td></tr>";
        echo "</table>\n";

        echo "<p>Combien d'heures voulez-vous ajouter à l'employé: " .$_SESSION['employe']."?</p>";
        ?>
        <form method="post" action= "Modif.php">
        <input type = "number" name = "heure" placeholder="Heures" required>
        <input type="submit" value="Soumettre">
        </form>
        <?php
    }
    elseif(isset($_SESSION['task']))/*Ajout d'un employé qui n'a pas de tâche au projet choisi */
    {
        echo "<p>Vous avez ajoutez l'employé: ". $_SESSION['task'].". Voici ses données: </p>";
        $emp = $bdd->query("SELECT * FROM EMPLOYE WHERE NOM ='". $_SESSION['task']."'");
        $get = $emp->fetch();
        echo "<table>";
        echo "<tr><th>EMPLOYE</th><th>PROJET</th><th>NOM_FONCTION</th></tr>\n";
        echo "<tr><td>". $_SESSION['task']."</td><td>".$get['NOM_DEPARTEMENT']."</td><td>".$get['NOM_FONCTION']."</td></tr>";
        echo "</table>\n";
        echo "<p>Voulez-vous vraiment ajouter cet employé au projet " . $_SESSION['projet']."?</p>"; 
        ?>
        <form method="post" action = "Modif.php">
            <input type="submit" name="OUI" value="Oui">
            <input type="submit" name="NON" value = "Non">
        </form>
        <?php
    }
    elseif(isset($_SESSION['ye']))/*Fin du projet */
    {
        /*Calcul du coût du projet */
        $prix = 0;
        $no_emp_req = $bdd->query("SELECT * FROM TACHE WHERE PROJET = '". $_SESSION['projet']."'");
        while($no_emp = $no_emp_req->fetch())
        {
          $req_h = $bdd->query("SELECT * FROM EMPLOYE WHERE NO = '". $no_emp['EMPLOYE']."'");
          while($h = $req_h->fetch())
          {
            $req_f = $bdd->query("SELECT * FROM FONCTION WHERE NOM ='". $h['NOM_FONCTION']."' ");
            $f = $req_f->fetch();
            $prix = $prix + $no_emp['NOMBRE_HEURES']*$f['TAUX_HORAIRE'];
          }
        }

        $date = date("d-m-Y");
        echo "<p> Le projet " . $_SESSION['projet']." vient de s'arrêter le " . $date." avec un budget de ".$prix.".</p>";
        $set1 = "UPDATE PROJET SET DATE_FIN = $date, COUT = $prix WHERE NOM = $_SESSION[projet]";
        $set = $bdd->prepare($set1);
        $set -> execute();
        /*Partie correspondant au choix de l'avis d'un expert s'occupant de ce projet*/
        $exp = $bdd->query("SELECT * FROM EVALUATION WHERE PROJET ='". $_SESSION['projet']."'");
        $val = $exp->fetch();
        echo "\n";
        /*Si on a au moins un expert qui a donné son avis */
        if($val != null)
        {
          $exp_name = $bdd->query("SELECT * FROM EMPLOYE WHERE NO ='". $val['EXPERT']."'");
          ?>
          <form action="post" action="Project_gestion.php">
            <select name='expert'>
              <?php
              while($experto = $exp_name->fetch())
              {
                echo "<option value ='". $experto['NOM']."'";
              }
              ?>
            </select>
          </form>

          <?php
          if(isset($_POST['expert']))
          {
            $exp_req = $bdd->query("SELECT * FROM EMPLOYE WHERE NOM ='". $_POST['expert']."'");
            $exp = $exp_req->fetch();
            $avis_req = $bdd->query("SELECT * FROM EVALUATION WHERE EXPERT ='".$exp['NO']."' ");
            $avis = $avis_req->fetch();
            echo "<p> L'expert ".$_POST['expert']." nous dit: ".$avis['COMMENTAIRES'].".</p>";
          } 
        }        
        /*Si il n'y a pas d'expert qui a donné son avis sur ce projet */
        echo "<p>Il semblerait que aucun expert n'est donné son avis sur ce projet ! </p>";

    }
    ?>

    </section>
    </div>
        </body>
    
    
    </html>