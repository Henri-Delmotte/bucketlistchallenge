

<!DOCTYPE html>
  <html>  
    <?php
    $bdd = new PDO('mysql:host=ms8db;dbname=group10;charset=utf8', 'group10', '9Wm3YpoHai');
    ?>
    <!-- sudo kill `sudo lsof -t -i:3306` -->
    <head>
        <title>Sélection et affichage des tables</title>
        
        <link rel="stylesheet" href="style.css">
       
    
    </head>

    
    <body>
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
    <h2>Type d'ajout</h2>
    <form method="post" action="Question_3.php">
        <select name="liste">
            <option value="FONCTION">Fonction</option>
            <option value="EMPLOYE">Employé</option>
            <option value="PROJET">Projet</option>
        </select>
        <input type="submit" value="Valider">
    </form>

    <?php

    if (isset($_POST['liste'])) {

        if ($_POST['liste'] == "FONCTION"){

            echo "<h2>" . "Ajout d'une fonction" . "</h2>";
            echo '<form method="post" action="Question_3.php">' . '<input type="text" name="NOM" placeholder="Nom" required>' . 
            '<input type="text" name="TAUX_HORAIRE" placeholder="Taux horaire" required>' . '<input type="submit" value="ENVOYER">' . '</form>';
        }

        if ($_POST['liste'] == "EMPLOYE"){

            echo "<h2>" . "Ajout d'un employé" . "</h2>";

            $req1 = "SELECT * FROM DEPARTEMENT";
            $req_departement  = $bdd->prepare($req1);
            $req_departement  -> execute();

            $req2 = "SELECT * FROM FONCTION";
            $req_fonction  = $bdd->prepare($req2);
            $req_fonction  -> execute();
            ?>

            <form method="post" action = "Question_3.php">
                <input type="text" name="NO" placeholder="Numéro" required>
                <input type="text" name="NOM" placeholder="Nom" required>

                <label for="liste_departement">Département:</label>
                <select id="liste_departement" name="liste_departement">
                    <?php
                    while ($departement = $req_departement->fetch()){
                        echo "<option value='".$departement['NOM'] ."'> " . $departement['NOM'] . "</option>";
                    }
                    ?>
                </select>

                <label for="liste_fonction">Fonction:</label>
                <select id="liste_fonction" name="liste_fonction">
                    <option value="NULL">Aucune</option>
                    <?php
                    while ($fonction = $req_fonction->fetch()){
                        echo "<option value='".$fonction['NOM'] ."'> " . $fonction['NOM'] . "</option>";
                    }
                    ?>
                </select>

                <input type="submit" value="Valider">
            </form>
            <?php
        }

        if ($_POST['liste'] == "PROJET"){

            echo "<h2>" . "Ajout d'un projet" . "</h2>";

            $req1 = "SELECT * FROM DEPARTEMENT";
            $req_departement  = $bdd->prepare($req1);
            $req_departement  -> execute();

            $req2 = "SELECT * FROM EMPLOYE WHERE NOM_DEPARTEMENT IS NOT NULL AND NOM_FONCTION IS NOT NULL";
            $req_chef  = $bdd->prepare($req2);
            $req_chef  -> execute();

            ?>
            <form method="post" action = "Question_3.php">
                <input type="text" name="NOM" placeholder="Nom" required>

                <label for="liste_departement">Département:</label>
                <select id="liste_departement" name="liste_departement">
                    <?php
                    while ($departement = $req_departement->fetch()){
                        echo "<option value='".$departement['NOM'] ."'> " . $departement['NOM'] . "</option>";
                    }
                    ?>
                </select>
                
                <label for="date_debut">Date de début:</label>
                <input type="date" id="date_debut" name="DATE_DEBUT" required>

                <label for="liste_chef">Chef:</label>
                <select id="liste_chef" name="liste_chef">
                    <?php
                    while ($chef = $req_chef->fetch()){
                        echo "<option value='".$chef['NO'] ."'> " . $chef['NOM'] . " " . $chef['NO'] . "</option>";
                    }
                    ?>
                </select>
                
                <input type="text" name="BUDGET" placeholder="Budget" required>
                <input type="text" name="COUT" placeholder="Coût">

                <label for="date_fin">Date de fin:</label>
                <input type="date" id="date_fin" name="DATE_FIN">

                <input type="submit" value="Valider">
            </form>
            <?php
        }
    }
            
    if (isset($_POST["NOM"]) && isset($_POST["TAUX_HORAIRE"])){

        $NOM = $_POST["NOM"];
        $TAUX = $_POST["TAUX_HORAIRE"];

        $req1 = 'INSERT INTO `FONCTION` (`NOM`, `TAUX_HORAIRE`) VALUES (:NOM, :TAUX)';
        $req  = $bdd->prepare($req1);
        $req  -> execute([':NOM' => $NOM, ':TAUX' => $TAUX]);
    }

    if (isset($_POST["NO"]) && isset($_POST["NOM"]) && isset($_POST["liste_departement"]) && isset($_POST["liste_fonction"])){

        $NO = $_POST["NO"];
        $NOM = $_POST["NOM"];

        $DEPARTEMENT = $_POST["liste_departement"];
        if ($_POST["liste_departement"] == "NULL"){
            $DEPARTEMENT = NULL;
        }

        $FONCTION = $_POST["liste_fonction"];
        if ($FONCTION == "NULL"){
            $FONCTION = NULL;
        }
        
        $req1 = 'INSERT INTO `EMPLOYE` (`NO`, `NOM`, `NOM_DEPARTEMENT`, `NOM_FONCTION`) VALUES (:NO, :NOM, :DEPARTEMENT, :FONCTION)';
        $req  = $bdd->prepare($req1);
        $req  -> execute([':NO' => $NO, ':NOM' => $NOM, ':DEPARTEMENT' => $DEPARTEMENT, ':FONCTION' => $FONCTION]);
    }

    if (isset($_POST['NOM']) && isset($_POST['liste_departement']) && isset($_POST['DATE_DEBUT']) && isset($_POST['liste_chef']) && isset($_POST['BUDGET'])){
        

        $NOM = $_POST['NOM'];
        $DEPARTEMENT = $_POST['liste_departement'];
        $DATE_DEBUT = $_POST['DATE_DEBUT'];
        $CHEF = $_POST['liste_chef'];
        $BUDGET = $_POST['BUDGET'];
        $COUT = $_POST['COUT'];
        $DATE_FIN = $_POST['DATE_FIN'];
        
        $req1 = 'INSERT INTO `PROJET` (`NOM`, `NOM_DEPARTEMENT`, `DATE_DEBUT`, `CHEF`, `BUDGET`, `COUT`, `DATE_FIN`) 
                            VALUES (:NOM, :DEPARTEMENT, :DATE_DEBUT, :CHEF, :BUDGET, :COUT, :DATE_FIN)';
        $req  = $bdd->prepare($req1);
        $req  -> execute([':NOM' => $NOM, ':DEPARTEMENT' => $DEPARTEMENT, ':DATE_DEBUT' => $DATE_DEBUT,
                         ':CHEF' => $CHEF, ':BUDGET' => $BUDGET, ':COUT' => $COUT, ':DATE_FIN' => $DATE_FIN]);
    }

    $bdd = null;
    ?>


</section>
    </body>


</html>