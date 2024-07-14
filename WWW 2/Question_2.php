<!DOCTYPE html>
<html>

    
    <?php
    
    $bdd = new PDO('mysql:host=ms8db;dbname=group10;charset=utf8', 'group10', '9Wm3YpoHai');
    ?>


    <head>
        <title>Question 2</title>
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
        <h1>Question2</h1>
        
        <p> Veuillez choisir un projet </p>

        <?php
        // on fait une requète afin de récuperer la liste des projets existants 
        $req1 = "SELECT NOM FROM PROJET";
        $req  = $bdd->prepare($req1);
        $req  -> execute();

        

        ?>

        
        <form method="post" action="Question_2.php">
            <select name="liste">
            <?php 
                while ($tuple = $req->fetch()) {
                echo "<option value='".$tuple['NOM']."'> " . $tuple['NOM'] . "</option>";   
                }
                ?>    
            </select>
        <input type="submit" value="Valider">
    </form>
    <?php


    if (isset($_POST['liste'])) {

    echo "<h2>". "Vous avez sélectionné le projet :" . $_POST['liste'] . "</h2";
        echo "<ul>";

        $NOM_PROJET = htmlentities($_POST['liste']);
        
        
        $req1  = $bdd->query("SELECT * FROM TACHE WHERE PROJET = '".$NOM_PROJET."'");

    

        echo "<table border='1'>";
        echo "<tr><td>NOM</td><td>NO</td><td>NOM_FONCTION</td></tr>\n";
        while ($tuple1 = $req1->fetch()) {
            $req2   = $bdd->query("SELECT * FROM EMPLOYE WHERE NO = '".$tuple1['EMPLOYE']."'");
          
        while ($tuple2 = $req2->fetch()) {
            echo "<tr><td>{$tuple2['NOM']}</td><td>{$tuple2['NO']}</td><td>{$tuple2['NOM_FONCTION']}</td></tr>\n";
        }
         }
        echo"</table>";



        $req_1  = $bdd->query("SELECT * FROM TACHE WHERE PROJET = '".$NOM_PROJET."'");

        while ($tuple1 = $req_1->fetch() ) {
            $req2   = $bdd->query("SELECT * FROM EMPLOYE WHERE NO = '".$tuple1['EMPLOYE']."'");

            $tuple2 = $req2->fetch();
            
            $req3   = $bdd->query("SELECT * FROM FONCTION WHERE NOM = '".$tuple2['NOM_FONCTION']."'");


            $tuple3 = $req3->fetch();

            $COUT1   = $tuple1['NOMBRE_HEURES']* $tuple3['TAUX_HORAIRE'];
            $COUT  = $COUT + $COUT1;
        }

        echo "<h4>". "Le cout du projet est de :   " . $COUT ."</h4";

    }
    ?>
    

</section>
    </body>


</html>