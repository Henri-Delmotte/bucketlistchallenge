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
                <h1>Question 5</h1>
                <h2>Les employés qui ont participé à tous les projets sont:</h2>

            
                <?php
        
        
                    $req_nb_total_de_proj = "SELECT COUNT(*) AS NB FROM PROJET";
                    $req_nb_total_de_proj_exec = $bdd->prepare($req_nb_total_de_proj);
                    $req_nb_total_de_proj_exec->execute();
                    
                    $nb_total_de_proj = $req_nb_total_de_proj_exec->fetch()['NB'];

                    $req_tous_les_proj = "SELECT * FROM PROJET";
                    $req_tous_les_proj_exec = $bdd->prepare($req_tous_les_proj);
                    $req_tous_les_proj_exec->execute();

                    // liste de tous les employes
                    $req1 = "SELECT * FROM EMPLOYE WHERE NO IS NOT NULL";
                    $req1_exec = $bdd->prepare($req1);
                    $req1_exec->execute();
                    while($tuple_employes = $req1_exec->fetch()) {
                        // compte le nombre de projets pour lesquels l'employe a travaille
                        $req_nb_de_projets_real = "SELECT DISTINCT COUNT(NOM) AS NB_PROJ FROM PROJET WHERE
                                                        NOM IN (SELECT NOM FROM PROJET, EVALUATION
                                                                WHERE NOM = PROJET AND
                                                                    EXPERT = '".$tuple_employes['NO']."') 
                                                        OR
                                                        NOM IN (SELECT NOM FROM PROJET, TACHE
                                                                WHERE NOM = PROJET AND
                                                                    EMPLOYE = '".$tuple_employes['NO']."')
                                                        OR
                                                        NOM IN (SELECT NOM FROM PROJET
                                                                WHERE CHEF = '".$tuple_employes['NO']."' ) ";

                        $req_nb_de_projets_real_exec = $bdd->prepare($req_nb_de_projets_real);
                        $req_nb_de_projets_real_exec->execute();
                                            
                        
                        $nb_de_projets_real = $req_nb_de_projets_real_exec->fetch()['NB_PROJ'];
                        // si il a participe a tous les projets
                        if($nb_de_projets_real == $nb_total_de_proj) {
                            
                            //pour chaque projet
                            while($tuple_tous_les_proj = $req_tous_les_proj_exec->fetch()){

                                // Si il est chef pour ce projet
                                $req_chef = "SELECT COUNT(*) AS NB_CHEF FROM PROJET 
                                                                WHERE CHEF = '".$tuple_employes['NO']."' AND
                                                                        NOM = '".$tuple_tous_les_proj['NOM']."' ";

                                $req_chef_exec = $bdd->prepare($req_chef);
                                $req_chef_exec->execute();


                                if($req_chef_exec->fetch()['NB_CHEF'] > 0) {
                                    echo "<p> L'employé " . $tuple_employes['NOM'] . " avec la fonction " . $tuple_employes['NOM_FONCTION'] . " est CHEF pour le projet " . $tuple_tous_les_proj['NOM'] . "</p>";
                                }

                                // Si il est expert pour ce projet
                                $req_expert = "SELECT COUNT(*) AS NB_EXPERT FROM EVALUATION 
                                                                WHERE EXPERT = '".$tuple_employes['NO']."' AND
                                                                        PROJET = '".$tuple_tous_les_proj['NOM']."' ";
                                $req_expert_exec = $bdd->prepare($req_expert);
                                $req_expert_exec->execute();

                                if($req_expert_exec->fetch()['NB_EXPERT'] > 0) {
                                    echo "<p> L'employé " . $tuple_employes['NOM'] . " avec la fonction " . $tuple_employes['NOM_FONCTION'] . " est EXPERT pour le projet " . $tuple_tous_les_proj['NOM'] . "</p>";
                                }

                                // Si il est sur une tache pour ce projet
                                $req_tache = "SELECT COUNT(*) AS NB_TACHE FROM TACHE 
                                                                WHERE EMPLOYE = '".$tuple_employes['NO']."' AND
                                                                        PROJET = '".$tuple_tous_les_proj['NOM']."' ";

                                $req_tache_exec = $bdd->prepare($req_tache);
                                $req_tache_exec->execute();

                                if($req_tache_exec->fetch()['NB_TACHE'] > 0) {
                                    echo "<p> L'employé " . $tuple_employes['NOM'] . " avec la fonction " . $tuple_employes['NOM_FONCTION'] . " est sur une TACHE pour le projet " . $tuple_tous_les_proj['NOM'] . "</p>";
                                }
                            }
                            
                        }
                            
                    }
                
                ?>
            </section>
        </div>
     


    </body>
</html>