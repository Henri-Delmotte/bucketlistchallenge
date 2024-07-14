<!DOCTYPE html>
<html>

    <!-- pour se connecter à la base de donnée -->
    <?php
    //$bdd = new PDO ('mysql:host=ms8db;dbname=groupe10', 'group10','9Wm3YpoHai');
    $bdd = new PDO('mysql:host=ms8db;dbname=group10;charset=utf8', 'group10', '9Wm3YpoHai');
    ?>


    <head>
        <title>Question 6</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body id="page_generale" >
        <header>
            <a href="./home.php">HOME</a>
            <div>
                <h1>Base de donnée (INFO0009-A-B)</h1>
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
                <h1>Question 6</h1>
                <h2>Tableau de bord des projets</h2>
                <form method="post" action="Question_6.php">
                    <label for="liste2">Dans l'ordre :</label>
                    <select id="liste2" name="liste2">
                        <option value="SEL">Sélectionner</option>
                        <option value="ASC">Croissant</option>
                        <option value="DESC">Décroissant</option>
                    </select>
                    <input type="submit" value="Valider">
                </form>
            
                <?php
                    //Liste des projets
                    if (($_POST["liste2"]=="ASC" || $_POST["liste2"]=="DESC")){
                        if ($_POST["liste2"]=="ASC"){
                            $req_projet = "SELECT * FROM PROJET ORDER BY DATE_DEBUT ASC, NOM ";
                            $req_projet_exec = $bdd->prepare($req_projet);
                            $req_projet_exec->execute();
                        }
                        if ($_POST["liste2"]=="DESC"){
                            $req_projet = "SELECT * FROM PROJET ORDER BY DATE_DEBUT DESC, NOM";
                            $req_projet_exec = $bdd->prepare($req_projet);
                            $req_projet_exec->execute();
                        }
                        
                        echo "<table border='1'>";
                        echo "<tr><td>Nom</td><td>Statut</td><td>date de début</td><td>budget</td><td>nombre total d'heure de travail</td></tr>\n";
                        while($tuple_projet = $req_projet_exec->fetch()) {
                            //recupere le nombre d'heure de travail pour chaque projets
                            $req_nb_heure = "SELECT SUM(NOMBRE_HEURES) AS SUMMED FROM TACHE WHERE PROJET = '".$tuple_projet['NOM']."' ";
                            $req_nb_heure_exec = $bdd->prepare($req_nb_heure);
                            $req_nb_heure_exec->execute();
                            $nb_total_heure_par_proj = $req_nb_heure_exec->fetch()['SUMMED'];
    
                            echo "<tr><td>{$tuple_projet['NOM']}</td>";
                            // verifie que le projet est fini ou non
                            if($tuple_projet['DATE_FIN'] != NULL ) {
                                echo "<td>en cours</td>";
                            }else {
                                echo "<td>terminé</td>";
                            }
                            // Affiche la date de debut, le budget et le nombre total d'heure pour chaque projets
                            
                            echo "<td>{$tuple_projet['DATE_DEBUT']}</td><td>{$tuple_projet['BUDGET']}</td><td>{$nb_total_heure_par_proj}</td></tr>\n";
                        }
                    }
                    
                ?>
            </section>
        </div>
     


    </body>
</html>