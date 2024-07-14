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
         <h1>Sélection et affichage des tables</h1>
    <menu_d>
    <!-- Selection d'une table en particulier -->
        <form method="post" action="Question_1.php">
            <select name="liste">
                <option value="DEPARTEMENT">DEPARTEMENT</option>
                <option value="EMPLOYE">EMPLOYE</option>
                <option value="EVALUATION">EVALUATION</option>
                <option value="FONCTION">FONCTION</option>
                <option value="MOTS_CLES">MOTS_CLES</option>
                <option value="PROJET">PROJET</option>
                <option value="RAPPORT">RAPPORT</option>
                <option value="TACHE">TACHE</option>
            </select>
        <input type="submit" value="Valider">
    </form>
    </menu_d>
<?php  

// Formulaire pour ajouter des contraintes en fonction de la table choisie

if($_POST["liste"]=="DEPARTEMENT"){ 
    echo "<h2>" . "Départements" . "</h2>";
    echo '<form method="post" action="Question_1.php">' . '<select name="liste_1">'. '<option value="DEPARTEMENT">Complèter</option>' . '</select>' .  '<input type="text" name="NOM" placeholder="Nom">' . '<input type="text" name="BUDGET" placeholder="Budget">' . '<input type="submit" value="ENVOYER">' . '</form>';
}

if($_POST["liste"]=="EMPLOYE")
    {
        echo "<h2>" . "Vous êtes dans EMPLOYE" . "</h2>" ;
        echo '<form method="post" action="Question_1.php">' . '<select name="liste_1">'. '<option value="EMPLOYE">Complèter</option>' . '</select>' . '<input type="text" name="NO" placeholder="Number">' .'<input type="text" name="NOM" placeholder="Nom">' . '<input type="text" name="NOM_DEPARTEMENT" placeholder="Nom du département">' . '<input type="text" name="NOM_FONCTION" placeholder="Nom de la fonction">' . '<input type="submit" value="ENVOYER">' . '</form>';
        
    }

if($_POST["liste"]=="EVALUATION")
    {
        echo "<h2>" . "Vous êtes dans EVALUATION" . "</h2>" ;
        echo '<form method="post" action="Question_1.php">' . '<select name="liste_1">'. '<option value="EVALUATION">Complèter</option>' . '</select>'. '<input type="text" name="PROJET" placeholder="Nom du projet">'  . '<input type="text" name="EXPERT" placeholder="Numéro de l\'expert">' . '<input type="text" name="COMMENTAIRES" placeholder="Commentaire">' . '<input type="text" name="AVIS" placeholder="Avis">' . '<input type="submit" value="ENVOYER">' . '</form>';
    }


if($_POST["liste"]=="FONCTION")
    {
    echo "<h2>" . "Vous êtes dans FONCTION" . "</h2>" ;
    echo '<form method="post" action="Question_1.php">' . '<select name="liste_1">'. '<option value="FONCTION">Complèter</option>' . '</select>'.  '<input type="text" name="NOM" placeholder="Nom de la fonction">'  . '<input type="text" name="TAUX_HORAIRE" placeholder="Taux horraire">' . '<input type="submit" value="ENVOYER">' . '</form>';
    }


if($_POST["liste"]=="MOTS_CLES")
{
    echo "<h2>" . "Vous êtes dans MOTS_CLES" . "</h2>" ;
    echo '<form method="post" action="Question_1.php">' . '<select name="liste_1">'. '<option value="MOTS_CLES">Complèter</option>' . '</select>' . '<input type="text" name="RAPPORT" placeholder="Nom du rapport">' . '<input type="text" name="MOT_CLE" placeholder="Mot clé">' . '<input type="submit" value="ENVOYER">' . '</form>';
   
}

if($_POST["liste"]=="PROJET")
    {
    echo "<h2>" . "Vous êtes dans PROJET" . "</h2>" ;
    echo '<form method="post" action="Question_1.php">' . '<select name="liste_1">'. '<option value="PROJET">Complèter</option>' . '</select>' . '<input type="text" name="NOM" placeholder="Nom du projet">' . '<input type="text" name="NOM_DEPARTEMENT" placeholder="Nom du département">' . '<input type="text" name="DATE_DEBUT" placeholder="Date du début">' . '<input type="text" name="CHEF" placeholder="Numéro du chef ">' .  '<input type="text" name="BUDGET" placeholder="Budget">' .   '<input type="text" name="COUT" placeholder="Cout ">' .  '<input type="text" name="DATE_FIN" placeholder="Date de fin">' . '<input type="submit" value="ENVOYER">' . '</form>';
    }

if($_POST["liste"]=="RAPPORT")
    {
    echo "<h2>" . "Vous êtes dans RAPPORT" . "</h2>" ;
    echo '<form method="post" action="Question_1.php">' . '<select name="liste_1">'. '<option value="RAPPORT">Complèter</option>' . '</select>' . '<input type="text" name="EMPLOYE" placeholder="Numéro Employé">'. '<input type="text" name="PROJET" placeholder="Nom du projet">' . '<input type="text" name="TITRE" placeholder="Titre">' . '<input type="submit" value="ENVOYER">' . '</form>';
    }

if($_POST["liste"]=="TACHE")
    {
    echo "<h2>" . "Vous êtes dans TACHE" . "</h2>" ;
    echo '<form method="post" action="Question_1.php">' . '<select name="liste_1">'. '<option value="TACHE">Complèter</option>' . '</select>' .'<input type="text" name="EMPLOYE" placeholder="Employé">'  .'<input type="text" name="PROJET" placeholder="Projet">' . '<input type="text" name="NOMBRE_HEURES" placeholder="Nombre d\'heures">'. '<input type="submit" value="ENVOYER">' . '</form>';
    }
?>



<?php

// Commentaire seulement pour 1 if car c'est le même principe pour les suivants 

if($_POST["liste_1"]=="DEPARTEMENT"){
    
      
    echo "<h3>" . "Vous êtes dans la classe Département " . "</h3>";
    echo "<br>";
    echo "<h4>" . "Voici l'affichage en fonction des données que vous avez entrée dans le formulaire  " . "</h4>";
    echo "<br>";
    
    // On creer deux variables pour stocker la valeur que l'utilisateur à entré dans le formulaire
    $NOM_1 = true;
    $BUDGET_1 = true;

    // Si l'utilisateur a complèter le formulaire, on stocke l'entré dans la variable cond_...
    if($_POST['NOM']!= NULL){
        $NOM_1 = "NOM LIKE '%" . $_POST["NOM"] . "%'";
    }
    if($_POST['BUDGET']!= NULL){
      $BUDGET_1 = "BUDGET= '" . $_POST["BUDGET"] . "'";
    }

    // On récupère les infos dans la tables en fonction des contraintes 
    $req1 = "SELECT * FROM DEPARTEMENT WHERE $NOM_1 and $BUDGET_1";
    $req  = $bdd->prepare($req1);
    $req  -> execute();


    //$req = $bdd->query("SELECT * FROM DEPARTEMENT WHERE $NOM_1 and $BUDGET_1");

    // On affiche ce que on a récupére sous formes de tableau 
    echo "<table border='1'>";
    echo "<tr><td>NOM</td><td>BUDGET</td></tr>\n";
    while ($tuple = $req->fetch()) {
        echo "<tr><td>{$tuple['NOM']}</td><td>{$tuple['BUDGET']}</td></tr>\n";
    }
    echo"</table>";
}

?>

<?php

if($_POST["liste_1"]=="EMPLOYE"){
    

    echo "<h3>" . "Vous êtes dans la classe Employé " . "</h3>";
    echo "<br>";
    echo "<h4>" . "Voici l'affichage en fonction des données que vous avez entrée dans le formulaire  " . "</h4>";
    echo "<br>";
    
    $NO_1                 = true;
    $NOM_1                = true;
    $NOM_DEPARTEMENT_1    = true;
    $NOM_FONCTION_1       = true;
      
    if($_POST['NO']!= NULL){
     $NO_1 = "NO= '" . $_POST["NO"] . "'";
    }
    if($_POST['NOM']!= NULL){
      $NOM_1 = "NOM LIKE '%" . $_POST["NOM"] . "%'";
    }
    if($_POST["NOM_DEPARTEMENT"]!= NULL){
     $NOM_DEPARTEMENT_1 = "NOM_DEPARTEMENT LIKE '%" . $_POST["NOM_DEPARTEMENT"] . "%'";
    }
    if($_POST["NOM_FONCTION"]!= NULL){
     $NOM_FONCTION_1 = "NOM_FONCTION LIKE '%" . $_POST["NOM_FONCTION"] . "%'";
    }
    
    
    $req1 = "SELECT * FROM EMPLOYE WHERE $NO_1 and $NOM_1 and $NOM_DEPARTEMENT_1 and $NOM_FONCTION_1";
    $req  = $bdd->prepare($req1);
    $req  -> execute();
    
    echo "<table border='1'>";
    echo "<tr><td>NO</td><td>NOM</td><td>NOM_DEPARTEMENT</td><td>NOM_FONCTION</td></tr>\n";
    while ($tuple = $req->fetch()) {
     echo "<tr><td>{$tuple['NO']}</td><td>{$tuple['NOM']}</td><td>{$tuple['NOM_DEPARTEMENT']}</td><td>{$tuple['NOM_FONCTION']}</td></tr>\n";
    }
    echo"</table>";
  
}

?>

<?php

if($_POST["liste_1"]=="EVALUATION"){
    

    echo "<h3>" . "Vous êtes dans la classe Evaluation " . "</h3>";
    echo "<br>";
    echo "<h4>" . "Voici l'affichage en fonction des données que vous avez entrée dans le formulaire  " . "</h4>";
    echo "<br>";
    
      
    $PROJET_1                = true;
    $EXPERT_1                = true;
    $COMMENTAIRES_1          = true;
    $AVIS_1                  = true;
      
    if($_POST['PROJET']!= NULL){
     $PROJET_1 = "PROJET LIKE '%" . $_POST["PROJET"] . "%'";
    }
    if($_POST['EXPERT']!= NULL){
     $EXPERT_1 = "EXPERT= '" . $_POST["EXPERT"] . "'";
    }
    if($_POST["COMMENTAIRES"]!= NULL){
     $COMMENTAIRES_1 = "COMMENTAIRES LIKE '%" . $_POST["COMMENTAIRES"] . "%'";
    }
    if($_POST["AVIS"]!= NULL){
      $AVIS_1 = "AVIS LIKE '%" . $_POST["AVIS"] . "%'";
    }
    
    $req1 = "SELECT * FROM EVALUATION WHERE $PROJET_1 and $EXPERT_1 and $COMMENTAIRES_1 and $AVIS_1";
    $req  = $bdd->prepare($req1);
    $req  -> execute();
    
    echo "<table border='1'>";
    echo "<tr><td>PROJET</td><td>EXPERT</td><td>COMMENTAIRES</td><td>AVIS</td></tr>\n";
    while ($tuple = $req->fetch()) {
      echo "<tr><td>{$tuple['PROJET']}</td><td>{$tuple['EXPERT']}</td><td>{$tuple['COMMENTAIRES']}</td><td>{$tuple['AVIS']}</td></tr>\n";
    }
    echo"</table>";
  
}

?>


<?php

if($_POST["liste_1"]=="FONCTION"){
    

    echo "<h3>" . "Vous êtes dans la classe Fonction " . "</h3>";
    echo "<br>";
    echo "<h4>" . "Voici l'affichage en fonction des données que vous avez entrée dans le formulaire  " . "</h4>";
    echo "<br>";
    
    $NOM_1                = true;
    $TAUX_HORAIRE_1       = true;
    
    if($_POST['NOM']!= NULL){
      $NOM_1 = "NOM LIKE '%" . $_POST["NOM"] . "%'";
    }
    if($_POST['TAUX_HORAIRE']!= NULL){
      $TAUX_HORAIRE_1 = "TAUX_HORAIRE= '" . $_POST["TAUX_HORAIRE"] . "'";
    }
  
    $req1 = "SELECT * FROM FONCTION WHERE $NOM_1 and $TAUX_HORAIRE_1";
    $req  = $bdd->prepare($req1);
    $req  -> execute();
    
  
    echo "<table border='1'>";
    echo "<tr><td>NOM</td><td>TAUX HORRAIRE</td></tr>\n";
    while ($tuple = $req->fetch()) {
    echo "<tr><td>{$tuple['NOM']}</td><td>{$tuple['TAUX_HORAIRE']}</td></tr>\n";
    }
    echo"</table>";

}

?>



<?php

if($_POST["liste_1"]=="MOTS_CLES"){
    
    
    
    echo "<h3>" . "Vous êtes dans la classe Tâche " . "</h3>";
    echo "<br>";
    echo "<h4>" . "Voici l'affichage en fonction des données que vous avez entrée dans le formulaire  " . "</h4>";
    echo "<br>";
    


    $RAPPORT_1                = true;
    $MOT_CLE_1                = true;
    
    if($_POST['RAPPORT']!= NULL){
      $RAPPORT_1 = "RAPPORT LIKE '%" . $_POST["RAPPORT"] . "%'";
    }
    if($_POST['MOT_CLE']!= NULL){
      $MOT_CLE_1 = "MOT_CLE= '%" . $_POST["MOT_CLE"] . "%'";
    }
  
    $req1 = "SELECT * FROM MOT_CLES WHERE $RAPPORT_1 and $MOT_CLE_1";
    $req  = $bdd->prepare($req1);
    $req  -> execute();
  
    echo "<table border='1'>";
    echo "<tr><td>RAPPORT</td><td>MOT_CLE</td></tr>\n";
    while ($tuple = $req->fetch()) {
    echo "<tr><td>{$tuple['RAPPORT']}</td><td>{$tuple['MOT_CLE']}</td></tr>\n";
    }
    echo"</table>";
    

    
}

?>


<?php

if($_POST["liste_1"]=="PROJET"){
    

    echo "<h3>" . "Vous êtes dans la classe Projet " . "</h3>";
    echo "<br>";
    echo "<h4>" . "Voici l'affichage en fonction des données que vous avez entrée dans le formulaire  " . "</h4>";
    echo "<br>";

    $NOM_1              = true;
    $DEPARTEMENT_1      = true;
    $DATE_DEBUT_1       = true;
    $CHEF_1             = true;
    $BUDGET_1           = true;
    $COUT_1             = true;
    $DATE_FIN_1         = true;

    if($_POST['NOM']!= NULL){
        $NOM_1 = "NOM LIKE '%" . $_POST["NOM"] . "%'";
    }
    if($_POST['NOM_DEPARTEMENT']!= NULL){
        $DEPARTEMENT_1 = "NOM_DEPARTEMENT LIKE '%" . $_POST["NOM_DEPARTEMENT"] . "%'";
    }
    if($_POST['DATE_DEBUT']!= NULL){
        $DATE_DEBUT_1 = "DATE_DEBUT= '" . $_POST["DATE_DEBUT"] . "'";
    }
    if($_POST['CHEF']!= NULL){
        $CHEF_1 = "CHEF= '" . $_POST["CHEF"] . "'";
    }
    if($_POST['BUDGET']!= NULL){
        $BUDGET_1 = "BUDGET= '" . $_POST["BUDGET"] . "'";
    }
    if($_POST['COUT']!= NULL){
        $COUT_1 = "COUT= '" . $_POST["COUT"] . "'";
    }
    if($_POST['DATE_FIN']!= NULL){
        $DATE_FIN_1 = "DATE_FIN= '" . $_POST["DATE_FIN"] . "'";
    }


    $req1 = "SELECT * FROM PROJET WHERE $NOM_1 and $DEPARTEMENT_1 and $DATE_DEBUT_1 and $CHEF_1 and $BUDGET_1 and $COUT_1 and $DATE_FIN_1";
    $req  = $bdd->prepare($req1);
    $req  -> execute();
            

    echo "<table border='1'>";
    echo "<tr><td>NOM</td><td>DEPARTEMENT</td><td>DATE_DEBUT</td><td>CHEF</td><td>BUDGET</td><td>COUT</td><td>DATE_FIN</td></tr>\n";
    while ($tuple = $req->fetch()) {
        echo "<tr><td>{$tuple['NOM']}</td><td>{$tuple['NOM_DEPARTEMENT']}</td><td>{$tuple['DATE_DEBUT']}</td><td>{$tuple['CHEF']}</td><td>{$tuple['BUDGET']}</td><td>{$tuple['COUT']}</td><td>{$tuple['DATE_FIN']}</td></tr>\n";
    }
    echo"</table>";
  
}

?>

<?php

if($_POST["liste_1"]=="RAPPORT"){
    

    echo "<h3>" . "Vous êtes dans la classe Rapport " . "</h3>";
    echo "<br>";
    echo "<h4>" . "Voici l'affichage en fonction des données que vous avez entrée dans le formulaire  " . "</h4>";
    echo "<br>";

    $EMPLOYE_1 = true;
    $PROJET_1 = true;
    $TITRE_1 = true;

    if($_POST['EMPLOYE']!= NULL){
        $EMPLOYE_1 = "EMPLOYE= '" . $_POST["EMPLOYE"] . "'";
    }
    if($_POST['PROJET']!= NULL){
        $PROJET_1 = "PROJET LIKE '%" . $_POST["PROJET"] . "%'";
    }
    if($_POST['TITRE']!= NULL){
        $TITRE_1 = "TITRE LIKE '%" . $_POST["TITRE"] . "%'";
    }
       
    $req1 = "SELECT * FROM RAPPORT WHERE $EMPLOYE_1 and $PROJET_1 and $TITRE_1";
    $req  = $bdd->prepare($req1);
    $req  -> execute();
    
            
    echo "<table border='1'>";
    echo "<tr><td>EMPLOYE</td><td>PROJET</td><td>TITRE</td></tr>\n";
    while ($tuple = $req->fetch()) {
        echo "<tr><td>{$tuple['EMPLOYE']}</td><td>{$tuple['PROJET']}</td><td>{$tuple['TITRE']}</td></tr>\n";
    }
    echo"</table>";
}

?>


<?php

if($_POST["liste_1"]=="TACHE"){
    

    echo "<h3>" . "Vous êtes dans la classe Tâche " . "</h3>";
    echo "<br>";
    echo "<h4>" . "Voici l'affichage en fonction des données que vous avez entrée dans le formulaire  " . "</h4>";
    echo "<br>";
      
    $EMPLOYE_1 = true;
    $PROJET_1 = true;
    $NOMBRE_HEURES_1 = true;
    
    if($_POST['EMPLOYE']!= NULL){
        $EMPLOYE_1 = "EMPLOYE= '" . $_POST["EMPLOYE"] . "'";
    }
    if($_POST['PROJET']!= NULL){
        $PROJET_1 = "PROJET LIKE '%" . $_POST["PROJET"] . "%'";
    }
    if($_POST['NOMBRE_HEURES']!= NULL){
        $NOMBRE_HEURES_1 = "NOMBRE_HEURES= '" . $_POST["NOMBRE_HEURES"] . "'";
    }
          
    $req1 = "SELECT * FROM TACHE WHERE $EMPLOYE_1 and $PROJET_1 and $NOMBRE_HEURES_1";
    $req  = $bdd->prepare($req1);
    $req  -> execute();

            
      
    echo "<table border='1'>";
    echo "<tr><td>EMPLOYE</td><td>PROJET</td><td>NOMBRE_HEURES</td></tr>\n";
    while ($tuple = $req->fetch()) {
        echo "<tr><td>{$tuple['EMPLOYE']}</td><td>{$tuple['PROJET']}</td><td>{$tuple['NOMBRE_HEURES']}</td></tr>\n";
    }
    echo"</table>";
  
}

?>

</section>
</div>
    </body>


</html>