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
        <h1>Question 7</h1>
        <h2>Tableau de bord des employés</h2>
    
    <form method="post" action="Question_7.php">
    <label for="liste1">Classer par :</label>
        <select id="liste1" name="liste1">
            <option value="`NO`">Numéro</option>
            <option value="`NOM`">Nom</option>
            <option value="`H_SUM`">Heures</option>
            <option value="`H_AVG`">Moyenne/projet</option>
            <option value="`H_MIN`">Minimum/projet</option>
            <option value="`H_MAX`">Maximum/projet</option>
            <option value="`N_P`">Projets</option>
        </select>

        <label for="liste2">Dans l'ordre :</label>
        <select id="liste2" name="liste2">
            <option value="ASC">Croissant</option>
            <option value="DESC">Décroissant</option>
        </select>

        <input type="submit" value="Valider">
    </form>
    
    <?php
    $req_tableau = NULL;

    if (isset($_POST["liste1"])){

        if ($_POST["liste2"]=="ASC"){

            $req1 = "SELECT `NO` , `NOM`, SUM(`H_P`) AS `H_SUM`, AVG(`H_P`) AS `H_AVG`, MIN(`H_P`) AS `H_MIN`, MAX(`H_P`) AS `H_MAX`, COUNT(`PROJET`) AS `N_P`
                     FROM (SELECT `NO`, `NOM`, SUM(`NOMBRE_HEURES`) AS `H_P`, `PROJET`
                           FROM(SELECT *
                                FROM `EMPLOYE`
                                LEFT JOIN `TACHE` ON `TACHE`.`EMPLOYE`=`EMPLOYE`.`NO`
                                WHERE `NOMBRE_HEURES` IS NOT NULL) TABLE_1
                           GROUP BY `NO`, `PROJET`) TABLE_2
                     GROUP BY `NO`
                     ORDER BY " .$_POST["liste1"] . " ASC";

            $req_tableau  = $bdd->prepare($req1);
            $req_tableau  -> execute();
        }

        if ($_POST["liste2"]=="DESC"){

            $req1 = "SELECT `NO` , `NOM`, SUM(`H_P`) AS `H_SUM`, AVG(`H_P`) AS `H_AVG`, MIN(`H_P`) AS `H_MIN`, MAX(`H_P`) AS `H_MAX`, COUNT(`PROJET`) AS `N_P`
                     FROM (SELECT `NO`, `NOM`, SUM(`NOMBRE_HEURES`) AS `H_P`, `PROJET`
                           FROM(SELECT *
                                FROM `EMPLOYE`
                                LEFT JOIN `TACHE` ON `TACHE`.`EMPLOYE`=`EMPLOYE`.`NO`
                                WHERE `NOMBRE_HEURES` IS NOT NULL) TABLE_1
                           GROUP BY `NO`, `PROJET`) TABLE_2
                     GROUP BY `NO`
                     ORDER BY " .$_POST["liste1"] . " DESC";

            $req_tableau  = $bdd->prepare($req1);
            $req_tableau  -> execute();
        }

        echo "<table border='1'>";
        echo "<tr><td>Numéro</td><td>Nom</td><td>Heures</td><td>Moyenne/projet</td><td>Minimun/projet</td><td>Maximum/projet</td><td>Projets</td></tr>\n";
        while ($tuple = $req_tableau->fetch()) {
            echo "<tr><td>{$tuple['NO']}</td><td>{$tuple['NOM']}</td><td>{$tuple['H_SUM']}</td><td>{$tuple['H_AVG']}</td>
                  <td>{$tuple['H_MIN']}</td><td>{$tuple['H_MAX']}</td><td>{$tuple['N_P']}</td></tr>\n";
        }
        echo"</table>";
    }

    $bdd = null;
    ?>

    </section>
    </div>
        </body>
    
    
    </html>