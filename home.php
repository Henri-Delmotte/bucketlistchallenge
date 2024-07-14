<!DOCTYPE html>
<html>

    <!-- pour se connecter à la base de donnée -->
    <?php
    //$bdd = new PDO ('mysql:host=ms8db;dbname=groupe10', 'group10','9Wm3YpoHai');
    $bdd = new PDO('mysql:host=ms8db;dbname=group10;charset=utf8', 'group10', '9Wm3YpoHai');
    ?>


    <head>
        <title>HOME</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body id="page_generale" >
        <header>
            <a href="./home.php">HOME</a>
            <div>
                <h1>HOME : Base de donnée (INFO0009-A-B)</h1>
                <h2>Projet 2021-2022 – Deuxième Partie</h2>
            </div>
            <form method="post" action="login.php" class="disconnect">
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
                <p>Question 1 : Selection et affichage de table</p>
                <p1>L'utilisateur commence par choisir la classe dont il veut avoir plus info. Ensuite on lui demande de contraintre l'affichage
                    afin d'afficher seulement les infos qui l'intéresse
                </p1>
                <p>Question 2 : Selection Projet</p>
                <p1>L'utilisateur choisit un projet parmis la liste de projet existante, nous affichons ensuite le nom et le numéro des employés ayant
                    contribué au projet. Nous calculons aussi le coup réel du projet. 
                </p1>
                <p>Question 3 : Ajout d'une fonction, d'un employé ou d'un projet</p>
                <p1>L'utilisateur choisit d'abord s'il veut ajouter une fonction, un employé, ou un projet, puis insère les valeurs de ses attributs. 
                </p1>
                <p>Question 4 : Gestion des projets et des employés qui travaillent dessus</p>
                <p1>L'utilisateur choisi le projet qu'il veut analyser. En fonction du statut, l'utilisateur peut manipuler ce dernier.</p1>
                <p>Question 5 : </p>
                <p1>Affiche les noms, les fonctions et les rôles des employés ayant travaillé sur tous les projets.</p1>
                <p>Question 6 : </p>
                <p1>Affiche pour chacun des projets, son nom, son statut, sa date de début, son budget et le nombre d'heures de travail cumulées</p1>
                <p>Question 7 : Tableau de bord pour les employés</p>
                <p1>Nous affichons un tableau qui, pour chaque employé ayant travaillé sur un projet, donne son numéro, son nom,
                     le nombre d'heures total qu'il a passé sur des projets, le nombre d'heure moyen qu'il a passé sur chacun de ces projets,
                     les nombres d'heures minimum puis maximum qu'il a passé sur un projet et le nombre de projets sur lesquels il a travaillé.
                     Ce tableau est trié comme choisi au préalable par l'utilisateur.
                </p1>

            </section>
        </div>
    </body>

</html>