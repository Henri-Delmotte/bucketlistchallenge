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
$_SESSION['projet'] = $_POST['list'];
      if(isset($_SESSION['projet']))
      {
        echo "<h1>Le projet que vous avez choisi est le suivant: " . $_SESSION['projet'] .".</h1>" ;

        $req = $bdd->query("SELECT * FROM PROJET WHERE NOM = '" . $_SESSION['projet']. "' " );
        $proj = $req->fetch();

        if($proj['DATE_FIN'] != NULL)/*Si le projet est fini*/
        {
          /*On affiche les détails comme: depuis combien de temps le projet est fini, le coût, le budget, etc */
          echo "<p>Ce projet a commencé le ". $proj['DATE_DEBUT']." et c'est fini le ". $proj['DATE_FIN'] . ".</p>";
          if($proj['BUDGET'] > $proj['COUT'])/*Cas où le projet a un coût inférieur au budget */
          {
            echo "<p >". "Le budget de ce projet est de " . $proj['BUDGET'] . " pour un coût de " . $proj['COUT'] .".</p>";
            echo "<p style = 'color:green'>"."Ce projet est en ordre!" .".</p>";
            $emp_req = $bdd->query("SELECT * FROM EMPLOYE WHERE NO = '" . $proj['CHEF'] ."'");
            $emp_name = $emp_req->fetch();
            echo "<p>"."Merci au chef " . $emp_name['NOM'] . " pour sa contribution." . "</p>";
          }
          elseif ($proj['COUT']<1.1*$proj['BUDGET'] && $proj['COUT'] > $proj['BUDGET'])/*Coût entre le budget et 10% du budget */
          {
            echo "<p>". "Le budget de ce projet est" . $proj['BUDGET'] . " pour un coût de " . $proj['COUT'] .".</p>";
            echo "<p style = 'color:orange'>"."Ce projet n'est pas tout à fait en ordre!" .".</p>";
            $emp_req = $bdd->query("SELECT * FROM EMPLOYE WHERE NO = '" . $proj['CHEF'] ."'");
            $emp_name = $emp_req->fetch();
            echo "<p>"."Le chef " . $emp_name['NOM'] . " a légèrement dépassé le budget du projet" . "</p>";
          }
          elseif($proj['COUT'] > 1.1* $proj['BUDGET'])
          {
            echo "<p>". "Le budget de ce projet est de " . $proj['BUDGET'] . " pour un coût de " . $proj['COUT'] .".</p>";
            echo "<p style = 'color:red'>"."Ce projet n'est pas en ordre!" ."</p>";
            $emp_req = $bdd->query("SELECT * FROM EMPLOYE WHERE NO = '" . $proj['CHEF'] ."'");
            $emp_name = $emp_req->fetch();
            echo "<p>"."Le chef " . $emp_name['NOM'] . " n'a pas respecté le budget attribué a son projet.</p>";
          }
        }
        else/*Si le projet n'est pas fini */
        {
          /*Cette partie correspond a l'ajout ou soustraction des heures d'un employé qui travaille sur un projet pas terminé */
          echo "<p> Ce projet a commencé le " . $proj['DATE_DEBUT'] . " mais n'est pas encore fini.</p>";
          echo "<p> Voici la liste des employé qui travaillent sur ce projet si vous voulez ajouter des heures en plus</p>";
          $req_task = $bdd->query("SELECT * FROM TACHE WHERE PROJET = '" . $_POST['list'] ."'");
          ?>
          <form method = "post" action="Project_gestion.php">
          <select name = "list2">
          <?php
            while($task = $req_task->fetch())
            {
              $req_emp = $bdd->query("SELECT * FROM EMPLOYE WHERE NO = '". $task['EMPLOYE']."'");
              while($emp = $req_emp->fetch())
              {
               echo "<option value = '" . $emp['NOM']."'>".$emp['NOM']."</option>"; 
              }
            }
          ?>
          </select>
          <input type="submit" value="Soumettre">
          </form>

          <?php
          /*Cette partie correspond au choix d'un employé qui n'a pas encore une tâche*/
          echo "<p>Voici la liste des employés qui n'ont pas encore une tache: ";
          $add_req = $bdd->query("SELECT * FROM EMPLOYE WHERE NOT EXISTS (SELECT * FROM TACHE WHERE EMPLOYE.NO = TACHE.EMPLOYE)");
          ?>
            <form method="post" action="Project_gestion.php">
              <select name = "empl">
                <?php
                while($add = $add_req->fetch())
                {
                  echo "<option value = '".$add['NOM']."'>".$add['NOM']."</option>";
                }
                ?>
              </select>
              <input type="submit" value = "Soumettre">
            </form>
          <?php
          /*Partie correspondant à si on veut mettre fin au projet ou non*/
          echo"\n";
          echo "Voulez-vous finir ce projet ? Si non, n'appuyez pas sur le boutton et choissez une autre option.";
          ?>
            <form method="post" action="Project_gestion.php">
              <input type="submit" name= "yes" value="OUI">
            </form>
          <?php
          echo "\n";
        }

      }
      ?>

      </section>
      </div>
          </body>
      
      
      </html>