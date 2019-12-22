<?php

function createInput($nom,$type) {
    echo '<input type="'.$type.'"  name="'.$nom.'" id="'.$nom.'" value="';
    if (isset($_SESSION[$nom])) echo htmlspecialchars($_SESSION[$nom]);
    elseif (isset($_COOKIE[$nom])) {
        echo htmlspecialchars($_COOKIE[$nom]);
    }
    echo '"/>';
}



function validateForm($structure) {

    $formIsOk = true;

    if (
        $structure["nom"] == "" ||
        $structure["rue"] == "" ||
        $structure["cp"] == "" ||
        $structure["ville"] == "" ||
        $structure["estasso"] == "" 

    ) {
        return "Veuillez remplir tout les champs";

    } else if (  strlen((string)$structure["cp"]) > 5 ) {

        return "Le code postal est invalide";

    } /* else if (!is_int($structure["nb_donateurs"])) {

        return "Le nombre de donnateurs est invalide";

    } else if (!is_int($structure["nb_actionnaires"])) {

        return "Le nombre d'actionnaires est invalide";

    } */ else {

        return "OK";
    }
}


?>
