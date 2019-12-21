
<?php

use model\manager\secteurManager;

require_once './model/manager/secteurManager.php';

if(isset($_GET)) {

    switch($action) {
        case 'new':

            // on appelle la vue formulaire de secteur

            $view = "formSecteur";
            break;
        
        case 'edit':

            // on appelle la vue formulaire de secteur

            $view = "formSecteur";
            break;

        case 'delete':

            secteurManager::deleteSecteurById($_GET['id']);

            $secteurs = SecteurManager::getAllSecteurs();

            $view = "accueil";
            break;

        case 'submit':

            //lorsqu'o valide le formulaire de création / modifictaion

            break;
    }
}


?>