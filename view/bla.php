<?php

require_once ('../Controller/fonctions.php');
require_once ('../Model/DAO.php');
session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Back Office</title>
</head>
<body>



<h1>Secteurs d'activités</h1>
<form name="" action="index.php" method="post">


    <label for="">Libelle</label>
    <?php createInput('libelle','text'); ?><br/>

    <p>
        <input type="submit" name="secteur_add" value="Créer secteur d'activite" />
        <input type="reset" value="Annuler"/>
    </p>
</form>
<?php
displaySecteurs()
?>


<h1>Structures</h1>
<form name="" action="index.php" method="post">


    <label for="">Nom</label>
    <?php createInput('nom','text'); ?><br/>

    <label for="">Rue</label>
    <?php createInput('rue','text'); ?><br/>

    <label for="">Code postal</label>
    <?php createInput('cp','text'); ?><br/>

    <label for="">Ville</label>
    <?php createInput('ville','text'); ?><br/>

    <label for="">Association</label>
    <?php createInput('assoc','checkbox'); ?><br/>

    <label for="">Nombre de donateurs</label>
    <?php createInput('nbDonateurs','number'); ?><br/>

    <label for="">Nombre d'actionnaires</label>
    <?php createInput('nbActionnaires','number'); ?><br/>


    <p>
        <input type="submit" name="structure_form" value="Créer structure"/>
        <input type="reset" value="Annuler"/>
    </p>
</form>
<?php
displayStructures();
?>

</body>
</html>